<?php
/*
	The Resource Handler File
*/
require_once("../config.php");
require_once("./config.php");
class Static_Resource{
	private $_URL,$_mime,$_extension;
	
	public function __construct($url){
		if($this->_getURL($url)){
			$this->_hasGzip();
		}else{
			$this->_blankRender($url);
		}
	}
	private function _getUrl($url){
		$ext=$this->getExtensionType($url);
		$this->_mime=getFileType($ext);
		$folder=returnFolder($ext);
		if(is_dir(__dir__."./content/")&&$folder){
			if(is_dir(__dir__."./content/".$folder)){
				if(is_readable(__dir__."./content/".$folder."/".getFileName($url))){
					$this->_URL=__dir__."./content/".$folder."/".getFileName($url);
					return true;
				}else{
					return false;
				}
			}else{
				/*
					Broken Front-End!
					Log this!
				*/
				LightPHP_Error_Log("Front-End Is Broken! Please fix it from DashBoard!");
				return false;
			}
		}else{
			/*
				We won't have any configured Front-End Directory
				Just Log this case.
			*/
			LightPHP_Error_Log("Booh..! No Front-End. Configure a one from your project panel.");
			return false;
		}
	}
	private function getExtensionType($url){
		$exploded_url=explode(".",$url);
		$count=count($exploded_url);
		$extension=$count>1?$exploded_url[$count-1]:false;
		return $extension;
	}
	private function _reBuild(){
		if(is_readable($this->_URL)){
			$file=fopen($this->_URL.".gz","w");
			$content=file_get_contents($this->_URL);
			$content=gzencode($content,7);
			fputs($file,$content,strlen($content));
			header("Content-Encoding:gzip");
			header("Content-Type:".$this->_mime.";charset=UTF-8");
			echo $content;
		}
	}
	private function _hasGzip(){
		if(is_readable($this->_URL.".gz")){
			$compressTime=filemtime($this->_URL.".gz");
			$realFileTime=filemtime($this->_URL);
			if($compressTime>$realFileTime){
				/*
					We can render the pre Zipped file
				*/
				header("Content-Encoding:gzip");
				header("Content-Type:".$this->_mime.";charset=UTF-8");
				echo file_get_contents($this->_URL.".gz");
			}else{
					$this->_reBuild();
			}
		}else{
			$this->_reBuild();
		}
	}
	private function _blankRender(){
		header("Content-Encoding:gzip");
		header("Content-Type:".$this->_mime.";charset=UTF-8");
		$string="/* \n This File Actually does not exists so you need to place it before you access it. \n*/";
		echo gzencode($string,9);
	}
}
$resource=new Static_Resource($_SERVER["REQUEST_URI"]);
?>