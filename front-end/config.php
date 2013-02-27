<?php
function getFileType($ext){
	$ext=strtolower($ext);
	$list=array("css"=>"text/css","js"=>"application/javascript","png"=>"image/png","gif"=>"image/gif","jpg"=>"image/jpeg","jpeg"=>"image/jpeg");
	if(@$list[$ext]){
		return $list[$ext];
	}else{
		return "application/".$ext;
	}
}
function returnFolder($extension){
	if($extension){
	$extension=strtolower($extension);
	if($extension=="css")
		return "CSS";
	if($extension=="JS")
		return "JS";
	if($extension=="png"||$extension=="gif"||$extension=="jpg"||$extension=="jpeg"||$extension=="bmp"||$extension=="tiff")
		return "IMG";
	else
		return "Others";
	}else{
		return false;
	}
}

function getFileName($url){
	$exploded_url=explode("/",$url);
	$count=count($exploded_url);
	return $exploded_url[$count-1];
}
?>