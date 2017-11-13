<?php
//admin
session_start(); 
unset($_SESSION['authenticated']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-Hant-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="http://jq22com.qiniudn.com/two.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.1.1/Tween.min.js"></script>

<title>登入系統</title>
</head>
<style type="text/css">
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
html,
body {
  padding: 0;
  margin: 0;
}

canvas {
  display: block;
}

</style>
<body bgcolor="#0e8abb">
    <div style="text-align:center ; margin:20px auto">
    <font face="Fredoka One" size="10em" color="#c90000">畢業旅行投票</font>
    </div>
    <div style="text-align:center;">
    <br/>
    <div style="margin:0 auto;border: 2px solid #c9a400; width:300px ; height: 50px">
    <font face="Fredoka One" size="3em" color="#c90000">謝謝您參與投票!!!</font>
    <br/>
    <font face="Fredoka One" size="3em" color="#c90000"><a href="vote2.php">重新進入投票</a></font>
    
    </div>
    </div>
    
</div>
<canvas id="c" style="background-color:#0e8abb">
<script src="JS/cityrun.js"></script>
</canvas>
</body>
</html>