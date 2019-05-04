<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 10-02-2019
 * Time: 14:23
 */
class Products extends Controller {
    protected function Index() {
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

    protected function view() {
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->view(), true);
    }

    protected function info() {
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->info(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->add(),true);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->edit(),true);
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new ProductModel();
        $this->ReturnView($viewmodel->delete(),true);
    }
}