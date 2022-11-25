<?php 
	//load file model
	include "models/UsersModel.php";
	class UsersController extends Controller{
		//ke thua class UsersModel
		use UsersModel;
		public function read(){
			//xac dinh so ban ghi tren mot trang
			$recordPerPage = 4;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecord();
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("UsersReadView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update ban ghi
		public function update(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham lay ban ghi tuong ung voi id truyen vao
			$record = $this->modelGetRecord($id);
			//goi view, truyen du lieu ra view
			$this->loadView("UsersCreateUpdateView.php",["record"=>$record,"id"=>$id]);
		}
		//update ban ghi - POST
		public function doUpdate(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham modeUpdate
			$this->modelUpdate($id);
			//quay tro lai mvc users
			header("location:index.php?controller=users&action=read");
		}
	}
 ?>