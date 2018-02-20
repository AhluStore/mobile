<?php

define("ROOT",__DIR__);
define("ROOT_APP",__DIR__);

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file") && !is_link($dir)) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  } 


	if ( isset( $argv ) ) {

		
		//remove cmd php
		array_shift($argv);
		//print_r($argv);
				//check help
		if(trim($argv[0])=="--help"){
			echo <<<AHLU
------Guide Help--------------
#######Project#######
"project:make name:name_app role:[user,guest]" 
By default roles is empty


#######Page#######
>>>>#title_id# is id page, and it must be unique and Capital word
>>>>role:name , by defaut is empty

Create normal page :
   "page:make project:hello role:name name:title_id display:normal" 

Create simple list:
  "page:make project:hello role:name name:title_id display:list" .

Create slide menu page:
   "page:make project:hello role:name name:title_id display:menu" .

Create scrolling page:  
  "page:make project:hello role:name name:title_id display:scroll" .

Create panel menu page: 
 "page:make project:hello role:name name:title_id display:panel" 

Create panel menu page:
 "page:make project:hello role:name name:title_id display:tab type:[move|none] pos:[top|bottom]
--------------------------------------------------------------------------\n
AHLU;

			exit(1);
		}

		//get c va m
		$c_m = explode(":",array_shift($argv));
		$inputs = array();


		//parse args
		foreach($argv as $item){
			$b = explode(":",$item);
			$inputs[$b[0]] = isset($b[1])?$b[1]:null;
		}

		//call mvc
		// page:create name:value ....
		$c = $c_m[0];
		$m = $c_m[1];

		//
		$file = ROOT."/bin/$c/$c.php";
		if(!file_exists($file)){
			echo "Can not excute this command, Please review 'help' command line!\n";
			exit(1);
		}
		include_once $file;
		$c = new $c();

		if(!method_exists($c, $m)){
			echo "Can not excute this command, the function is not avaible, Please review 'help' command line to know more!\n";
			exit(1);
		}

		
		// now excute
		$c->{$m}($inputs);
	}else{

	}
?>