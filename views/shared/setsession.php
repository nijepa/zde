<?php

session_start();

    // Session variable for articles id - edit, view
    if(isset($_POST['gr_id'])){
        $_SESSION['gr_id'] = $_POST['gr_id'];
        var_dump($_SESSION['gr_id']);
    }

    // Session variables for links id
    if(isset($_POST['link_id'])){
        $_SESSION['link_id'] = $_POST['link_id'];
    }

    // Session variables for articles id - delete
    if(isset($_POST['delete'])){
        $_SESSION['gr_id'] = $_POST['delete'];
        echo json_encode($response);
    }

?>