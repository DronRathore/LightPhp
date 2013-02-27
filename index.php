<?php
	require_once("./config.php");
?>
<!doctype html>
<html>
<head>
<title>Setup: Static Contents</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" media="all" href="./index.css"/>
<script src="./OmJS.js" type="javascript"></script>
<style>
body{margin:0px;padding:0px;overflow-x:hidden;}
a{text-decoration:none;}
.body-center-wrap{width:100%;}
.body-center{display:inline-block;width:100%;height:100%;}
.body-lfloat{position:fixed;left:0px;width:220px;height:100%;top:0px;padding:3px;padding-left:10px;}
.body-rfloat{float:left;position:relative;z-index:200;display:inline-block;min-height:700px;background:#fff;padding:10px;width:100%;margin-left:220px;margin-top:-10px;border-left:1px solid #ccc;box-shadow:0px 0px 3px #c3d1ec;}
.lf-content{display:inline-block;width:100%;}
h2{font:11px tahoma;color:#666;}
h1{font:21px "Segoe UI","lucida grande",georgia;width:85%;border-bottom:1px solid #eee;padding-bottom:5px;color:#777;}
.navigation{list-style:none;margin:20px 0px;padding:0px;}
.navigation li{list-style:none;margin:0px;padding:0px;}
.navig-a{font:13px 'Segoe ui',tahoma;position:relative;z-index:100;color:#666;cursor:pointer;display:block;padding:5px;padding-left:10px;}
.navig-a:hover{background:#c3d1ec;color:#333;}
</style>
</head>
<body>
	<div class="body-center-wrap">
		<div class="body-center">
			<div class="body-lfloat">
				<div class="lf-content">
					<h2>Last Comitt:<label class="time">26 Feb 2013, 12:00</label></h2>
					<ul class="navigation">
						<li><a href="/" class="navig-a"><b>+</b> New Stuff</a></li>
						<li><a href="/" class="navig-a"><b>◌</b> Dashboard</a></li>
						<li><a href="/" class="navig-a"><b>□</b> Databases</a></li>
						<li><a href="/" class="navig-a"><b>◌</b> Front End</a></li>
						<li><a href="/" class="navig-a"><b>◌</b> Account</a></li>
						<li><a href="/" class="navig-a"><b>«</b> Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="body-rfloat">
				<div class="rf-content">
					<div class="head">
						<h1>Dashboard</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>