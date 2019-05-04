<?php
class Services extends Controller {
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ServiceModel();
        $this->ReturnView($viewmodel->Index(),true);
    }

    protected function info() {
        $viewmodel = new ServiceModel();
        $this->ReturnView($viewmodel->info(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ServiceModel();
        $this->ReturnView($viewmodel->add(),true);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ServiceModel();
        $this->ReturnView($viewmodel->edit(),true);
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ServiceModel();
        $this->ReturnView($viewmodel->delete(),true);
    }
}