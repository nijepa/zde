<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 10-02-2019
 * Time: 14:21
 */
class SectionModel extends Model {
    public function Index() {
        $this->query('SELECT * FROM sections');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view() {
        $this->query('SELECT * FROM news WHERE featured = 1 ORDER BY news_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function edit() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if(!isset($post['featured'])) $post['featured'] = 0;
            /// Insert into MySQL
            $this->query('UPDATE sections SET enabled = :featured WHERE section_id = :gid');
            $this->bind(':featured', $post['featured']);
            $this->bind(':gid', $post['section_id']);
            $this->execute();
            // verify
            //if($this->lastInsertId()) {
            // Redirect
            header('Location: '.ROOT_URL.'sections');
            //}
            return;
        }
        if(isset($_SESSION['gr_id'])) {
            $this->query('SELECT * FROM sections WHERE section_id = :gr_id');
            $this->bind(':gr_id', $_SESSION['gr_id']);
            $rows = $this->resultSet();
            return $rows;
            unset($_SESSION['gr_id']);
        }
    }
}