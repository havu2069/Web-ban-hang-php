<?php 
	//load model
	include "models/HomeModel.php";
	class HomeController extends Controller{
		use HomeModel;
		//ham mac dinh neu khong co action truyen tu url
		public function index(){
			//load view
			$this->loadView("HomeView.php");
		}
	}
 ?>