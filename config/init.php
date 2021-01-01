<?php 
// START SESSION
session_start();

require_once 'config.php';
// require_once('lib/Template.php');   // this file is for INCLUDING other files in one place.
// INCLUDE HELPERS
require_once 'helpers/system_helper.php';

// Autoloader
spl_autoload_register(function($class_name){
    require_once 'lib/'.$class_name.'.php';
})

?>