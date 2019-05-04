<?php
class Users extends Controller {
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->Index(),true);
    }

    protected function register() {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register(), true);
    }

    protected function login() {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);
    }

    protected function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        header('Location: '.ROOT_URL);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->edit(),true);
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->delete(),true);
    }
}