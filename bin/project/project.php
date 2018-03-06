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
			//delTree($path);
		}

		//connect to server to delete

	}
	private function _download($file,$url){
		//https://gist.github.com/stuudmuffin/104fe2f24b3c3d02b21e1fb3d61eeb6a
		/*install:update*/
		ob_start();
		echo "Loading ...\n";

		ob_flush();
		flush();

		$targetFile = fopen($file, 'w' );
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
		curl_setopt( $ch, CURLOPT_PROGRESSFUNCTION,  function(  $resource, $download_size, $downloaded_size, $upload_size, $uploaded_size )
		{
			if($download_size>0){
				$a = ($downloaded_size * 100) / $download_size;
				 $progress = ceil($a);

			     echo "progress $downloaded_size/$download_size - $progress%\n";
		        ob_flush();
				flush();
				sleep(1);
			}
		});
		curl_setopt( $ch, CURLOPT_FILE, $targetFile );
		curl_exec( $ch );
		
		fclose( $targetFile);
		echo "Done\n";
		ob_flush();
		flush();
	}

	public function download($inputs){
		/*project:delete name:hello*/
		if(!isset($inputs["name"])){
			echo "Name app empty or not exist.Please command --help.\n";
			return;
		}
		$name = strtolower($inputs["name"]);

		//connect to server to download
		$file = ROOT_APP."/{$name}.zip";
		echo "Fetching  project '{$name}'...\n";
		$data = file_get_contents("http://mobile.ahlustore.website/bin/cmd.php?mvc=project/download/{$name}&key=".AhluComposer()->key);
		file_put_contents($file,$data);

		if($data){
			$path = ROOT_APP."/{$name}/";
			if(!is_dir($path)){
				mkdir($path,0775,true);
			}


			echo  "Project '{$name}' downloaded in {$file}\n";
			echo "Beging extract project '{$name}'...\n";
			$zipArchive = new ZipArchive();
			$result = $zipArchive->open($file);
			if ($result === TRUE) {
			    $zipArchive ->extractTo(ROOT_APP);
			    $zipArchive ->close();
			    echo "unzip project '{$name}' sucessfully...\n\n";
			    //delete
			    
			} else {
			    echo "Fail to unzip project '{$name}'...\n\n";
			}

		}else{
			echo "Can not project {$name}\n\n";
		}

		@unlink($file);
	}
	public function upload($inputs){
		/*project:delete name:hello*/
		if(!isset($inputs["name"])){
			echo "Name app empty or not exist.Please command --help.\n";
			return;
		}
		$name = strtolower($inputs["name"]);

		//connect to server to download
		$file = ROOT_APP."/{$name}.zip";
		echo "Zipping  project '{$name}'...\n";
		
		if(zip( ROOT_APP."/{$name}",$file)){
			//upload len server
			echo "Uploading  project '{$name}'...\n";

			
		}

		@unlink($file);
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