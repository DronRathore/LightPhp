<?php
/*
	The regular routine use functions
*/
$GLOBALS["User_Errors"]=array();
/*
	Class importer
*/
function import($file){
	if(is_readable("./".MY_CLASSES."/".$file.'.php')){
		require_once("./".MY_CLASSES."/".$file.'.php');
	}else{
		if(DEBUG_MODE)
			LightPHP_Error_Log("Module Not Found: ".$file);
	}
}
/*
	The Log File Writing Routine
*/
function LightPHP_Error_Log($error_string){
if(DEBUG_MODE){
	if(is_readable(LOG_DIRECTORY."log.txt")){
		$file=fopen(LOG_DIRECTORY."log.txt","a");
		$date=date("d-m-y h:s",time())." ";
		fputs($file,$date,strlen($date));
		fputs($file,$error_string,strlen($error_string));
		fclose($file);
	}else{
		if(is_dir(LOG_DIRECTORY)){
		$file=fopen(LOG_DIRECTORY."log.txt","w");
		$date=date("d-m-y h:s",time())." ";
		fputs($file,$date,strlen($date));
		fputs($file,$error_string,strlen($error_string));
		fclose($file);
	}else{
		mkdir("./log");
		$file=fopen(LOG_DIRECTORY."log.txt","w");
		$date=date("d-m-y h:s",time())." ";
		fputs($file,$date,strlen($date));
		fputs($file,$error_string,strlen($error_string));
		fclose($file);

	}
	}
}
}
/*
	The Error Pushing Function
*/
function pushError($error){
	array_push($GLOBALS["User_Errors"],$error);
}
?>