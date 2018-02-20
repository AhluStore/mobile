<?php

class install{
	public function __toString(){
		
	}
	public function __construct(){

	}

	public function download($file,$url){
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
	public function update($inputs){
		/*install:update*/
		$this->download( __DIR__.'/update.zip','http://ftp.free.org/mirrors/releases.ubuntu-fr.org/11.04/ubuntu-11.04-desktop-i386-fr.iso');

	}
	public function module($inputs){
		/*install:module project:name name:name*/

		$project =  isset($inputs["project"])?$inputs["project"]:"";
		$module =  isset($inputs["name"])?$inputs["name"]:"";

		
		$file =  __DIR__."/$module.zip";
		$to =  ROOT_APP."/$project/admin/modules/";
		if(!is_dir($to)){
			echo "Path {$to} not exist.\n";
			return;
		}
		
		$this->download($file,"http://mobile.ahlustore.website/modules_src/$module.zip");

		//read file or folder will be copy
		echo "Beging UnZipping $module.zip.\n";
		ob_flush();
		flush();
		$zip = new ZipArchive();
		if ($zip->open($file) === TRUE) {
		    $zip->extractTo($to."/$module.zip\n");
		    $zip->close();
		    ob_clean();
		    echo "unZip $module.zip success.\n";
		} else {
		    echo "Can unZip $module.zip\n";
		}

		unlink($file);
	}
}	
?>