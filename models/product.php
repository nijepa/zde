<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 10-02-2019
 * Time: 14:21
 */
class ProductModel extends Model {
    public function Index() {
        $this->query('SELECT products.*, groups.group_title FROM products INNER JOIN groups ON products.sub_id = groups.group_id ORDER BY prod_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function main() {
        $this->query('SELECT products.*, groups.group_title FROM products INNER JOIN groups ON products.sub_id = groups.group_id WHERE favorite = 1 ORDER BY prod_date DESC LIMIT 3');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view() {
        $this->query('SELECT products.*, groups.group_title AS gp FROM products INNER JOIN groups ON products.sub_id = groups.group_id WHERE sub_id = :sub ORDER BY prod_date DESC');
        $this->bind(':sub', $_SESSION['gr_id']);
        $rows = $this->resultSet();
        return $rows;
    }

    public function info() {
        $this->query('SELECT products.*, groups.group_title AS gp FROM products INNER JOIN groups ON products.sub_id = groups.group_id WHERE prod_id = :pid');
        $this->bind(':pid', $_SESSION['gr_id']);
        $rows = $this->resultSet();
        return $rows;
    }

    public function group(){
        $this->query('SELECT * FROM groups ORDER BY group_title ASC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['prod_name'] == '' || $post['prod_group'] == '' || $post['prod_price'] == '') {
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

            if(!isset($post['prod_fav'])) $post['prod_fav'] = 0;
            if(!isset($post['prod_camera'])) $post['prod_camera'] = 0;
            /// Insert into MySQL
            $this->query('INSERT INTO products (favorite, prod_name, sub_id, prod_description, prod_img, prod_processor, prod_memory, prod_hd, prod_optic, prod_graphic, prod_batery, prod_camera, prod_price) VALUES(:fav, :pname, :sub, :description, :image, :processor, :memory, :hd, :optic, :graphic, :batery, :camera, :price)');
            $this->bind(':fav', $post['prod_fav']);
            $this->bind(':pname', $post['prod_name']);
            $this->bind(':sub', $post['prod_group']);
            $this->bind(':description', $post['prod_description']);
            $this->bind(':image', $post['group_img']);
            $this->bind(':processor', $post['prod_processor']);
            $this->bind(':memory', $post['prod_memory']);
            $this->bind(':hd', $post['prod_hd']);
            $this->bind(':optic', $post['prod_optic']);
            $this->bind(':graphic', $post['prod_graphic']);
            $this->bind(':batery', $post['prod_batery']);
            $this->bind(':camera', $post['prod_camera']);
            $this->bind(':price', $post['prod_price']);
            $this->execute();
            // verify
            if($this->lastInsertId()) {
                // Redirect
                header('Location: '.ROOT_URL.'products');
            }
            return;
        }
    }

    public function edit() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['prod_name'] == '' || $post['prod_group'] == '' || $post['prod_price'] == '') {
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

            if(!isset($post['prod_fav'])) $post['prod_fav'] = 0;
            if(!isset($post['prod_camera'])) $post['prod_camera'] = 0;
            /// Insert into MySQL
            $this->query('UPDATE products SET favorite = :fav, prod_name = :pname, sub_id = :sub, prod_description = :description, prod_img = :image, prod_processor = :processor, prod_memory = :memory, prod_hd = :hd, prod_optic = :optic, prod_graphic = :graphic, prod_batery = :batery, prod_camera = :camera, prod_price = :price  WHERE prod_id = :pid');
            $this->bind(':pid', $_SESSION['gr_id']);
            $this->bind(':fav', $post['prod_fav']);
            $this->bind(':pname', $post['prod_name']);
            $this->bind(':sub', $post['prod_group']);
            $this->bind(':description', $post['prod_description']);
            $this->bind(':image', $post['group_img']);
            $this->bind(':processor', $post['prod_processor']);
            $this->bind(':memory', $post['prod_memory']);
            $this->bind(':hd', $post['prod_hd']);
            $this->bind(':optic', $post['prod_optic']);
            $this->bind(':graphic', $post['prod_graphic']);
            $this->bind(':batery', $post['prod_batery']);
            $this->bind(':camera', $post['prod_camera']);
            $this->bind(':price', $post['prod_price']);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'products');
            //}
            return;
        }
        if(isset($_SESSION['gr_id'])) {
            $this->query('SELECT * FROM products WHERE prod_id = :gr_id');
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
            $this->query('DELETE FROM products WHERE prod_id = :gid');
            $this->bind(':gid', intval($_SESSION['gr_id']));
            $this->execute();

            header('Content-type: application/json; charset=UTF-8');
            $response = array();
            echo json_encode($response);
        }
        header('Location: '.ROOT_URL.'products');
        return;
    }
}