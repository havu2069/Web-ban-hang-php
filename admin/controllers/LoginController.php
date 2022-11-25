<?php 
	//load file LoginModel.php vao day
	include "models/LoginModel.php";
	class LoginController extends Controller{
		//ke thua class LoginModel
		use LoginModel;
		public function index(){
			//goi view
			$this->loadView("LoginView.php");
		}
		//khi user an nut submit thi se den ham sau
		public function login(){
			//goi ham modelLogin de lay du lieu tu csdl
			$record = $this->modelGetRecord();
			if(isset($record->email)){
				//dang nhap thanh cong
				$_SESSION["admin_email"] = $record->email;
				//quay tro lai trang index
				header("location:index.php");				
			}else{
				//di chuyen den trang login
				header("location:index.php?controller=login&notify=invalid");
			}
		}
		//dang xuat
		public function logout(){
			//huy session
			unset($_SESSION["admin_email"]);
			//quay tro lai trang index
			header("location:index.php");
		}
	}
 ?>