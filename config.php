<?php
/*
	The base configuration file of LightPhp.
	The DB Configuration and other stuff.
*/
ini_set("session.name","LightPhp");
session_start();
define("TABLE_PREFIX", "lp_");
define("DB_USER_NAME", "root");
define("DB_PASSWORD", "fusion");
define("DB_HOST", "127.0.0.1");
define("PASSWORD_KEY","kSd8D392NLo03N9Gcn9CnXC3NLS");
define("MY_FOLDER",__dir__);
define("MY_CLASSES","\lightphp.classes");
define("DEBUG_MODE",true);
define("LOG_DIRECTORY",__dir__."/log/");
require_once(__dir__."./functions.php");
?>