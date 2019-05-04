<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 07-02-2019
 * Time: 15:47
*/
class Sections extends Controller {
    protected function Index(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new SectionModel();
        $this->ReturnView($viewmodel->Index(),true);
    }

    protected function view() {
        $viewmodel = new SectionModel();
        $this->ReturnView($viewmodel->view(), true);
    }

    protected function edit(){
        if(!isset($_SESSION['is_logged_in'])) {
            header('Location: '.ROOT_URL);
        }
        $viewmodel = new SectionModel();
        $this->ReturnView($viewmodel->edit(),true);
    }
}