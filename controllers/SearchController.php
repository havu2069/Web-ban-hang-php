<?php 
	//load file model
	include "models/SearchModel.php";
	class SearchController extends Controller{
		//ke thua class ProductsModel
		use SearchModel;
		public function search(){
			//xac dinh so ban ghi tren mot trang
			$recordPerPage = 16;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecord();
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//smartSearch
		public function smartSearch(){
			$data = $this->modelSmartSearch();
			$str = "";
			foreach($data as $rows){
				$str = $str."<li><img src='assets/upload/products/{$rows->photo}'><a href='index.php?controller=products&action=detail&id={$rows->id}'>{$rows->name}</a></li>";
			}
			echo $str;
		}
		//searchPrice
		public function searchPrice(){
			//xac dinh so ban ghi tren mot trang
			$recordPerPage = 16;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecordSearchPrice();
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelSearchPrice($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchPrice.php",["data"=>$data,"numPage"=>$numPage]);
		}
	}
 ?>