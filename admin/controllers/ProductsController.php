<?php 
	//load file model
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		//ke thua class ProductsModel
		use ProductsModel;
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
			$this->loadView("ProductsReadView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update ban ghi
		public function update(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham lay ban ghi tuong ung voi id truyen vao
			$record = $this->modelGetRecord($id);
			//tao bien $action de biet duoc khi an nut submit action se di chuyen den url nao
			$action = "index.php?controller=products&action=doUpdate&id=$id";
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsCreateUpdateView.php",["record"=>$record,"id"=>$id,"action"=>$action]);
		}
		//update ban ghi - POST
		public function doUpdate(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham modeUpdate
			$this->modelUpdate($id);
			//quay tro lai mvc products
			header("location:index.php?controller=products&action=read");
		}
		//create
		public function create(){
			//tao bien $action de biet duoc khi an nut submit action se di chuyen den url nao
			$action = "index.php?controller=products&action=doCreate";
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsCreateUpdateView.php",["action"=>$action]);
		}
		//create ban ghi - POST
		public function doCreate(){
			//goi ham modeCreate
			$this->modelCreate();
			//quay tro lai mvc products
			header("location:index.php?controller=products&action=read");
		}
		//delete
		public function delete(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham modelDelete
			$this->modelDelete($id);
			//quay tro lai mvc products
			header("location:index.php?controller=products&action=read");
		}
	}
 ?>