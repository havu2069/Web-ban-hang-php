<?php 
	trait LoginModel{
		public function modelGetRecord(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//---
			//lay doi tuong ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("select email, password from users where email=:_email and password = :_password");
			//thuc thi truy van
			$query->execute(array(":_email"=>$email,":_password"=>$password));
			//lay mot ban ghi
			$result = $query->fetch();
			//---
			return $result;
		}
	}
 ?>