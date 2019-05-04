<?php
class Manufacturers extends Controller {
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ManufacturerModel();
        $this->ReturnView($viewmodel->Index(),true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ManufacturerModel();
        $this->ReturnView($viewmodel->add(),true);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ManufacturerModel();
        $this->ReturnView($viewmodel->edit(),true);
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ManufacturerModel();
        $this->ReturnView($viewmodel->delete(),true);
    }
}