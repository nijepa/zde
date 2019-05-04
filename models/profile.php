<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 10-02-2019
 * Time: 14:21
 */
class ProfileModel extends Model {
    public function Index() {

            $this->query('SELECT * FROM profile ');
            $rows = $this->resultSet();
            return $rows;
  
    }

    public function edit() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['profile_name'] == '' || $post['profile_subname'] == '' || $post['profile_description'] == '') {
                Messages::setMsg('Please fill all fields!','error');
                return;
            }

            /// Insert into MySQL
            $this->query('UPDATE profile SET profile_name = :pname, profile_subname = :sub, profile_description = :description, profile_img = :image, profile_address = :address, profile_email = :email, profile_email2 = :email2, profile_phone = :phone, profile_mob = :mob, profile_working = :working WHERE profile_id = :pid');
            $this->bind(':pid', $post['profile_id']);
            $this->bind(':pname', $post['profile_name']);
            $this->bind(':sub', $post['profile_subname']);
            $this->bind(':description', $post['profile_description']);
            $this->bind(':image', $post['profile_img']);
            $this->bind(':address', $post['profile_address']);
            $this->bind(':email', $post['profile_email']);
            $this->bind(':email2', $post['profile_email2']);
            $this->bind(':phone', $post['profile_phone']);
            $this->bind(':mob', $post['profile_mob']);
            $this->bind(':working', $post['profile_working']);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'shared');
            //}
            return;
        } else {
            $this->query('SELECT * FROM profile ');
            $rows = $this->resultSet();
            return $rows;
        }
    }
}