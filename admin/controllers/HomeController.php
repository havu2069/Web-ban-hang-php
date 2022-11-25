<?php  
	class HomeController extends Controller
	{
		//Hàm tạo
		public function __construct(){
			//kiểm tra xem user đã đăng nhập chưa
			$this->authentication();
		}
		public function index(){
			//load view
			$this->loadview("HomeView.php");
		}
	}
?>