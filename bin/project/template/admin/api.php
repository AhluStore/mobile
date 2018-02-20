<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/vendor/api.php";

function registerDBMe(){

  $_file_config = json_decode(file_get_contents(current_app_request_admin()."/db.json"),true);
  $_config = array();
  $_config["host"]="localhost";
  $_config["username"]="root";
  $_config["password"]="";
  $_config["database"]="pgd";
  $_config["prefix"]="me_";

   $_config= array_merge( $_config,$_file_config);
  return $_config;
}
registerDB("registerDBMe");  


//now
define("MODULES",__DIR__."/modules/");

	function AhluError(){
		static $error=null ;
		if(!class_exists("error")){
			include MODULES."error/error.php";
			$error= new error();
		}
		
	   return  $error;
	}
	//check post method

	$c = isset($_GET["c"])?$_GET["c"]:"home";
	$m = isset($_GET["m"])?$_GET["m"]:"index";
	$p = isset($_GET["p"])?explode("/", $_GET["p"]):array();

	//check $c
	$path_c = MODULES."{$c}/{$c}_API.php";
	if(file_exists( $path_c)){
		include $path_c;
		$c = "{$c}_API";
		if(class_exists($c)){
			$cls = new $c();

			if(method_exists($cls, $m)){
				
				try{
					$cls->ahlu = isset($_POST["ahlu"])?json_decode(rawurldecode($_POST["ahlu"])): new stdClass();
				}catch(Exception $e){

				}

				call_user_func_array(array($cls,$m), $p);
			}else{
			   AhluError()->get404("Can not find method $m in '$c' controller");
			}
			
		}else{
			AhluError()->get404("Can not find '$c' controller");
		}
	}else{
		AhluError()->get404("Can not find the page request");
	}
?>