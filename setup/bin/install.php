<?php
require_once("../../c.php");
require_once("../../default.php");
require_once("./error.php");
if(is_dir("../../base/")){
	/*
		We have the base directory, lets check further
	*/
	if(is_dir("../../base/default.version/")){
		/*
			We already have a default version directory,
		*/
		Error=new Error("The Controller is already installed on your Server!\nIf you ar facing the versioning problem then try changing the version from control panel or create a new one.");
	}else{
		/*
			Okay, he has got it broken.
			Setup the directory Heirarchy along with a Ver.1.1 folder.
		*/
	
	}
}else{
	/*
		We are on fresh!
		Lets start!
	*/
}

?>