<?php
class Shared extends Controller {
    protected function Index(){
        $viewmodel = new SharedModel();
        $this->ReturnView($viewmodel->Index(),true);
    }
}