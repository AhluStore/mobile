<?php
class FlxZipArchive extends ZipArchive 
{
 public function addDir($location, $name) 
 {
       $this->addEmptyDir($name);
       $this->addDirDo($location, $name);
 } 
 private function addDirDo($location, $name) 
 {
    $name .= '/';
    $location .= '/';
    $dir = opendir ($location);
    while ($file = readdir($dir))
    {
        if ($file == '.' || $file == '..') continue;
        $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
        $this->$do($location . $file, $name . $file);
    }
 } 
}
function zip($the_folder ,$zip_file_name ="backup.zip"){

	$za = new FlxZipArchive();
	$res = $za->open($zip_file_name, ZipArchive::CREATE);
	if($res === TRUE) 
	{
	    $za->addDir($the_folder, basename($the_folder));
	    $za->close();
	    
	    return true;
	}
	return false;
}

?>