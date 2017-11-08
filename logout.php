<?php
//admin
session_start(); 
unset($_SESSION['authenticated']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-Hant-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登入系統</title>
</head>
<style type="text/css">
<!--
body {
margin:0;
padding:0;
font: bold 14px/1.5em Verdana;
}

h2 {
font: bold 18px Verdana, Arial, Helvetica, sans-serif;
color: #000;
margin: 0px;
padding: 0px 0px 0px 15px;
}

</style>
<body bgcolor="#F0F0F0">
<div style="text-align:center;">
　<img src="clinic.jpg"/>
<h2> 畢業旅行投票</h2>
</div>
<div style="text-align:center;">
<br/>
<div style="margin:0 auto;border: 2px solid blue; width:300px;">
謝謝您參與投票!!!
<br/>
<a href="vote2.php">重新進入投票</a>
</div>
</div>
</body>
</html>