<?php
class UserModel extends Model {
    public function Index(){
        $this->query('SELECT * FROM users ORDER BY register_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function register(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){
            if($post['uname'] == '' || $post['email'] == '' || $post['password'] == '') {
                Messages::setMsg('Please fill all fields!','error');
                return;
            }
            /// Insert into MySQL
            $this->query('INSERT INTO users (uname, email, password) VALUES(:uname, :email, :password)');
            $this->bind(':uname', $post['uname']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            // verify
            if($this->lastInsertId()) {
                // Redirect
                header('Location: '.ROOT_URL.'users');
            }
            return;
        }
    }

    public function login() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){
            /// Compare login
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "uname" => $row['uname'],
                    "email" => $row['email'],
                );
                header('Location: '.ROOT_URL.'shared');
            } else {
                Messages::setMsg('Pogrešan email ili password !', 'error');
            }
            return;
        }
    }

    public function edit() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){
            if($post['uname'] == '' || $post['email'] == '' || $post['password'] == '') {
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
            $this->query('UPDATE users SET uname = :uname, email = :email, password = :password WHERE id = :gid');
            $this->bind(':gid', $post['id']);
            $this->bind(':uname', $post['uname']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'users');
            //}
            return;
        }
        if(isset($_SESSION['gr_id'])) {
            $this->query('SELECT * FROM users WHERE id = :gr_id');
            $this->bind(':gr_id', $_SESSION['gr_id']);
            $rows = $this->resultSet();
            return $rows;
            unset($_SESSION['gr_id']);
        }
    }

    public function delete() {
        if(isset($_POST['delete'])){
            $_SESSION['gr_id'] = $_POST['delete'];
            //$_SESSION['gr_id']=$_POST['delete'];

            /// Insert into MySQL
            $this->query('DELETE FROM users WHERE id = :gid');
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
        header('Location: '.ROOT_URL.'users');
        return;
    }
}