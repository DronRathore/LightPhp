<?php
/*
	The Database Connectivity Class of LightPHP
	import("Database");
*/
class Database{
	private $_db_name,$_connection,$_username,$_password,$_host,$_result,_isInit;
	public function __construct($db_name=""){
		$this->_username=DB_USER_NAME;
		$this->_password=DB_PASSWORD;
		$this->_host="localhost";
		
		if($this->connect())
			$this->_isInit=true;
		else
			$this->_isInit=false;
		$this->_db_name=$db_name;
	}
	public function selectDatabase($db_name=""){
		$this->_db_name=strlen($db_name)>0?$db_name:$this->_db_name;
		mysql_select_db($this->_db_name,$this->_connection);
	}
	public function switchUser($username,$password=""){
		$this->_username=$username;
		$this->_password=$password;
	}
	public function switchHost($host){
		$this->_host=$host;
	}
	public function connect(){
		try{
			ob_clean();
			$this->_connection=mysql_connect($this->_host,$this->_username,$this->_password);
			ob_end_clean();
			if(!($this->_connection))
				throw new Exception();
			else
				return true;
		}catch(Exception $e){
			LightPHP_Error_Log("MySQL Login Failure: ".$e."\r\n");
			pushError("An Internal Server Error Occured, please try again.");
			return false;
		}
	}
	public function executeScalar($query){
		try{
			ob_clean();
			$result=mysql_query($query,$this->_connection);
			ob_end_clean();
			if(!$result)
				throw new Exception();
			else
				return true;
		}catch(Exception $e){
			LightPHP_Error_Log("Error in your Query. ".mysql_error($this->_connection).$e."\r\n");
			return false;
		}
	}
	public function query($query,$isarr=false){
		try{
			ob_clean();
			$_result=mysql_query($query);
			ob_end_clean();
			if($result){
				$_result=!($isarr)?mysql_fetch_assoc($_result):mysql_fetch_array($_result);
				return $_result;
			}
			throw new Exception();
		}catch(Exception $e){
			LightPHP_Error_Log("Error in your Query. ".mysql_error($this->_connection).$e."\r\n");
		}
		
	}
}
?>