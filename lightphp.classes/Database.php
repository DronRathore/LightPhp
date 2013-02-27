<?php
/*
	The Database Connectivity Class of LightPHP
	import("Database");
*/
class Database{
	private $_db_name,$_table_name,$_connection;
	public function __construct($db_name="",$table_name=""){
		$this->_connect();
		$this->_db_name=$db_name;
		$this->_table_name=$table_name;
		
	}
	public function switchDatabase($db_name=""){
			$this->_db_name=strlen($db_name)>0?$db_name:$this->_db_name;
	}
	public function switchTable($table_name=""){
		$this->_table_name=strlen($table_name)>0?$table_name:$this->_table_name;
	}
	private function _connect(){
		try{
			ob_clean();
			$this->_connection=mysql_connect("localhost",DB_USER_NAME,DB_PASSWORD);
			ob_end_clean();
			if(!($this->_connection))
				throw new Exception();
		}catch(Exception $e){
			$this->_pushError("MySQL Login Failure: Check the LightPHP config.php file and correct the DB_USER_NAME and DB_PASSWORD.");
			LightPHP_Error_Log("MySQL Login Failure: Check the LightPHP config.php file and correct the DB_USER_NAME and DB_PASSWORD.".$e."\r\n");
		}
	}
	private function _pushError($error_string=""){
		//if(strlen($error_string)>0)
			//$GLOBALS["Errors"]
		
	}
}
?>