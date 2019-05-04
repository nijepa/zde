<?php
class ManufacturerModel extends Model {
    public function Index(){
        $this->query('SELECT * FROM manufacturers');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['man_name'] == '' || $post['group_img'] == '') {
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

            /// Insert into MySQL
            $this->query('INSERT INTO manufacturers (man_name, man_img) VALUES(:name, :image)');
            $this->bind(':name', $post['man_name']);
            $this->bind(':image', $post['group_img']);
            $this->execute();
            // verify
            if($this->lastInsertId()) {
                // Redirect
                header('Location: '.ROOT_URL.'manufacturers');
            }
            return;
        }
    }

    public function edit() {

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['man_name'] == '' || $post['group_img'] == '') {
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

            /// Insert into MySQL
            $this->query('UPDATE manufacturers SET man_name = :title, man_img = :image WHERE man_id = :gid');
            $this->bind(':gid', $post['man_id']);
            $this->bind(':title', $post['man_name']);
            $this->bind(':image', $post['group_img']);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'manufacturers');
            //}
            return;
        }
        if(isset($_SESSION['gr_id'])) {
            $this->query('SELECT * FROM manufacturers WHERE man_id = :gr_id');
            $this->bind(':gr_id', $_SESSION['gr_id']);
            $rows = $this->resultSet();
            return $rows;
            unset($_SESSION['gr_id']);
        }
    }

    public function delete() {
        if(isset($_POST['delete'])){
            $_SESSION['gr_id']=$_POST['delete'];
            //$_SESSION['gr_id']=$_POST['delete'];

            /// Insert into MySQL
            $this->query('DELETE FROM manufacturers WHERE man_id = :gid');
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
        header('Location: '.ROOT_URL.'manufacturers');
        return;
    }
}