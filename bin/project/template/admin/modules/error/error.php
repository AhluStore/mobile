<?php
	class error{

		public function get404($msg){
			
			include_once "view/404.php";
		}
		public function get500($msg){
			include_once "view/500.php";
		}
	}
?>