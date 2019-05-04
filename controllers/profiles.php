<?php
/**
 * Created by PhpStorm.
 * User: Nijepa
 * Date: 07-02-2019
 * Time: 15:47
*/
class Profiles extends Controller {
    protected function Index(){
        $viewmodel = new ProfileModel();
        $this->ReturnView($viewmodel->Index(),true);
    }
    
    protected function edit(){
        $viewmodel = new ProfileModel();
        $this->ReturnView($viewmodel->edit(),true);
    }
}