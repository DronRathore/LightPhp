<?php
/*
		The Login Class of LightPHP
		import("Login");
*/
class Login{
	private $_username,$_password,$_secret_key;
	
	public function  __construct($username="",$password="",$secret_key=""){
		$this->_username=$username;
		$this->_password=$password;
		$this->_sercret_key=$secret_key;
		if($this->prepareInputs())
			$this->tryLogin();
		else
			$this->pushErrors();
		return $this;
	}
	private function prepareInputs(){
		if(strlen($this->_username)>5&&strlen($this->_password)>6&&strlen($this->_sercret_key)==32&&$this->_sercret_key==$_SESSION["secret_key"])
			return true;
		else
			return false;
	}
	/*
		We can't gurantee whether the user get logged in or not
		but only thing we can do is just try!
	*/
	private function tryLogin(){
		$db=$_GLOBALS["db"];
	}
	private function pushErrors($error_text=""){
		if(empty($error_text))
			pushError("<b>Login Failure:</b> You should provide all the inputs.");
		else
			pushError("<b>Login Failure:</b>".$error_text);
	
	}
}
?>