<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 10-02-2019
 * Time: 14:21
 */
class NewModel extends Model {
    public function Index() {
        $this->query('SELECT * FROM news ORDER BY news_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view() {
        $this->query('SELECT * FROM news WHERE featured = 1 ORDER BY news_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['news_title'] == '' || $post['news_description'] == '' || $post['group_img'] == '') {
                Messages::setMsg('Please fill all fields!','error');
                return;
            }

            // Upload image
            if (isset($_FILES['edit_age'])) {
                $target_dir = UPLOAD_PATH;
                $allowedFile = array("jpg","png");
                // call the Upload class and upload file
                $upload = new Upload($_FILES['edit_age'],"$target_dir",1000000,$allowedFile);
                // show results
                $result = $upload->GetResult();
                print "<pre>";
                print_r($result);
                print "</pre>";
            }

            if(!isset($post['featured'])) $post['featured'] = 0;
            /// Insert into MySQL
            $this->query('INSERT INTO news (featured, news_title, news_description, news_img) VALUES(:featured, :title, :body, :image)');
            $this->bind(':featured', $post['featured']);
            $this->bind(':title', $post['news_title']);
            $this->bind(':body', $post['news_description']);
            $this->bind(':image', $post['group_img']);
            $this->execute();
            // verify
            if($this->lastInsertId()) {
                // Redirect
                header('Location: '.ROOT_URL.'news');
            }
            return;
        }
    }

    public function edit() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['news_title'] == '' || $post['news_description'] == '' || $post['group_img'] == '') {
                Messages::setMsg('Please fill all fields!','error');
                return;
            }

            // Upload image
            if (isset($_FILES['edit_age'])) {
                $target_dir = UPLOAD_PATH;
                $allowedFile = array("jpg","png");
                // call the Upload class and upload file
                $upload = new Upload($_FILES['edit_age'],"$target_dir",1000000,$allowedFile);
                // show results
                $result = $upload->GetResult();
                print "<pre>";
                print_r($result);
                print "</pre>";
            }

            if(!isset($post['featured'])) $post['featured'] = 0;
            /// Insert into MySQL
            $this->query('UPDATE news SET featured = :featured, news_title = :title, news_description = :body, news_img = :image WHERE news_id = :gid');
            $this->bind(':featured', $post['featured']);
            $this->bind(':gid', $post['news_id']);
            $this->bind(':title', $post['news_title']);
            $this->bind(':body', $post['news_description']);
            $this->bind(':image', $post['group_img']);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'news');
            //}
            return;
        }
        if(isset($_SESSION['gr_id'])) {
            $this->query('SELECT * FROM news WHERE news_id = :gr_id');
            $this->bind(':gr_id', $_SESSION['gr_id']);
            $rows = $this->resultSet();
            return $rows;
            unset($_SESSION['gr_id']);
        }
    }

    public function delete() {
        if(isset($_POST['delete'])){
            $_SESSION['gr_id'] = $_POST['delete'];

            /// Insert into MySQL
            $this->query('DELETE FROM news WHERE news_id = :gid');
            $this->bind(':gid', intval($_SESSION['gr_id']));
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            //header('Location: '.ROOT_URL.'groups');
            //}
            header('Content-type: application/json; charset=UTF-8');
            $response = array();
            echo json_encode($response);
        }
        header('Location: '.ROOT_URL.'news');
        return;
    }
}