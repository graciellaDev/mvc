<?php
session_start();
header("Content-Type:text/html;charset=UTF-8");
session_start();
require_once("config.php");
function  my_autoloader($class) {
	if(file_exists("controller/".$class.".php")) {
	    
		require_once "controller/".$class.".php";
	}
	elseif(file_exists("model/".$class.".php")) {
		require_once "model/".$class.".php";
		
	}
}

spl_autoload_register('my_autoloader');
if($_GET['option']) {
	$class = trim(strip_tags($_GET['option']));
}
else {
	$class ='maine';	
}
	if(class_exists($class)) {
	    $obj=new $class;
		$obj->get_body($class);
	}
	else {
		exit("<p>Нет данных для входа</p>");
	}

session_destroy();
?>