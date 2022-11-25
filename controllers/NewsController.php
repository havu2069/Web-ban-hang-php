<?php 
//load file model
	include "models/NewsModel.php";
	class NewsController extends Controller{
		use NewsModel;
		public function index(){
			$this->loadView("NewsView.php");
		}
	}

 ?>