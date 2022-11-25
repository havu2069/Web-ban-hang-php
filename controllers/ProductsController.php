<?php 
	//load file model
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		//ke thua class ProductsModel
		use ProductsModel;
		public function categories(){
			$category_id = isset($_GET["catid"])?$_GET["catid"]:0;
			//xac dinh so ban ghi tren mot trang
			$recordPerPage = 12;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecord($category_id);
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage,$category_id);
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsCategoryView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//chi tiet san pham
		public function detail(){			
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsDetailView.php");
		}
		//danh gia so sao
		public function rating(){			
			$id = isset($_GET["id"])?$_GET["id"]:0;
			//goi ham tu model de insert ban ghi
			$this->modelRating();
			header("location:index.php?controller=products&action=detail&id=$id");
		}
	}
 ?>