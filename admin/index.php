<?php  
	//bắt session
	session_start();
	//load file connection.php
	include "../application/Connection.php";
	//load file controller 
	include "../application/Controller.php";
	//---
	//Lấy biến controller truyền từ url
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "home";
	//viết hoa ký tư đầu tiên
	$controller = ucfirst($controller);
	//Gán chuỗi để biến $controller thành đường dẫn file vật lý
	//VD: index.pp?controller=users -> controllers/UsersController.php
	$fileController = "controllers/$controller"."Controller.php";
	//echo $fileController;
	//Lấy biến action truyền từ url
	$action = isset($_GET["action"]) ? $_GET["action"] : "index";
	//--
	//kiểm tra nếu file tồn tại thì include nó
	if (file_exists($fileController)) {
		include $fileController;
		//ghép chuỗi để thành tên class
		$class = $controller."Controller";
		//khởi tạo biến object của class $class
		$obj = new $class();  // <=> $obj = new UsersController();
		//gọi hàm bên trong class
		$obj->$action();
	}
?>