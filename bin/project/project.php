<?php
class project{
	public function __toString(){
		
	}
	public function __construct(){

	}
	public function delete($inputs){
		/*project:delete name:hello*/
		if(!isset($inputs["name"])){
			echo "Name app empty or not exist.Please command --help.\n";
			return;
		}
		$name = strtolower($inputs["name"]);
		$path = ROOT_APP."/{$name}/";
		if(is_dir($path)){
			delTree($path);
		}

	}
	public function make($inputs){

		if(!isset($inputs["name"])){
			echo " Name Application empty or not exist. Please command --help.\n";
			return;
		}
		$name = strtolower($inputs["name"]);
		$roles = isset($inputs["role"])?explode(",", str_replace(array("[","]"), "",$inputs["role"])):array();

		
		$path = ROOT_APP."/{$name}/";
		if(!is_dir($path)) @mkdir($path,0775,true);

		//check roles
		recurse_copy(__DIR__."/template/",$path);

		//create role folder
		if(count($roles)>0){

			foreach ($roles as $role) {
				recurse_copy(__DIR__."/template/role",$path."/role/".strtolower($role)."/");	
			}
		}

		echo ">>>'{$inputs["name"]}' app is created in ".date("F, j Y g:i a")."\n";

	}	
	public function role($inputs){
		/**project:role create:[]*/
		/**project:role delete:[]*/


		$name = strtolower($inputs["name"]);
		$path = ROOT_APP."/{$name}/";
		if(!is_dir($path)) @mkdir($path,0775,true);

		if(isset($inputs["create"])){
			$roles = explode(",", str_replace(array("[","]"), "",$inputs["create"]));
			//create role folder
			if(count($roles)>0){
			
				foreach ($roles as $role) {
					recurse_copy(__DIR__."/template/role",$path."/role/".strtolower($role)."/");	
				}
			}
			echo ">>>Role {$inputs["create"]} in '{$inputs["name"]}' app is created in ".date("F, j Y g:i a")."\n";
		}else if(isset($inputs["delete"])){
			$roles = explode(",", str_replace(array("[","]"), "",$inputs["delete"]));
			//create role folder
			if(count($roles)>0){
		
				foreach ($roles as $role) {
					delTree($path."/role/".strtolower($role)."/");	
				}
			}
			echo ">>>Role {$inputs["delete"]} in '{$inputs["name"]}' app is created in ".date("F, j Y g:i a")."\n";
		}
	}
}	
?>