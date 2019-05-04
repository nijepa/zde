<?php
session_start();
// Include Config
require('config.php');

require('classes/Upload.php');
require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/users.php');
require('controllers/groups.php');
require('controllers/products.php');
require('controllers/news.php');
require('controllers/profiles.php');
require('controllers/manufacturers.php');
require('controllers/shared.php');
require('controllers/services.php');
require('controllers/sections.php');

require('models/home.php');
require('models/user.php');
require('models/group.php');
require('models/product.php');
require('models/new.php');
require('models/profile.php');
require('models/manufacturer.php');
require('models/shared.php');
require('models/service.php');
require('models/section.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
    $controller->executeAction();
}