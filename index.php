<?php 
	//bat session
	session_start();
	//load file connection.php
	include "application/Connection.php";
	//load file controller
	include "application/Controller.php";
	//---
	//lay bien controller truyen tu url
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "home";
	//viet hoa ky tu dau tien
	$controller = ucfirst($controller);
	//gan chuoi de bien $controller thanh duong dan file vat ly
	//vd: index.php?controller=users -> controllers/UsersController.php
	$fileController = "controllers/$controller"."Controller.php";
	//echo $fileController;
	//lay bien action truyen tu url
	$action = isset($_GET["action"]) ? $_GET["action"] : "index";
	//---
	//kiem tra neu file ton tai thi include no
	if(file_exists($fileController)){
		include $fileController;
		//ghep chuoi de thanh ten class
		$class = $controller."Controller";
		//khoi tao bien object cua class $class
		$obj = new $class();//<=> $obj = new UsersController()
		//goi ham ben trong class
		$obj->$action();
	}
	//---
 ?>