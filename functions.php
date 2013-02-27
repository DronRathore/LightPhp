<?php
/*
	The regular routine use functions
*/
function import($file){
	if(is_readable("./".MY_CLASSES."/".$file.'.php')){
		require_once("./".MY_CLASSES."/".$file.'.php');
	}else{
		if(DEBUG_MODE)
			LightPHP_Error_Log("Module Not Found: ".$file);
	}
}
function LightPHP_Error_Log($error_string){
if(DEBUG_MODE){
	if(is_readable(LOG_DIRECTORY."log.txt")){
		$file=fopen(LOG_DIRECTORY."log.txt","a");
		$date=date("d-m-y h:s",time())." ";
		fputs($file,$date,strlen($date));
		fputs($file,$error_string,strlen($error_string));
		fclose($file);
	}else{

		$file=fopen(LOG_DIRECTORY."log.txt","w");
		$date=date("d-m-y h:s",time())." ";
		fputs($file,$date,strlen($date));
		fputs($file,$error_string,strlen($error_string));
		fclose($file);
	}
}
}
?>