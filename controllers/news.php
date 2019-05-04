<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 07-02-2019
 * Time: 15:47
*/
class News extends Controller {
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new NewModel();
        $this->ReturnView($viewmodel->Index(),true);
    }

    protected function view() {
        $viewmodel = new NewModel();
        $this->ReturnView($viewmodel->view(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new NewModel();
        $this->ReturnView($viewmodel->add(),true);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new NewModel();
        $this->ReturnView($viewmodel->edit(),true);
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new NewModel();
        $this->ReturnView($viewmodel->delete(),true);
    }

}