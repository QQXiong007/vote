<?php
session_start(); 
if(!isset($_SESSION["authenticated"])|| (time() - $_SESSION['authenticated']) > 600 ) 
{
    $redir = "login.php";
    header("Location: $redir");
    exit;
}
?>

<html lang="lang="zh-Hant-TW"">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/plugins/CSSPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/easing/EasePack.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenLite.min.js"></script>

<link href="CSS/signin.css" rel="stylesheet">

<title>畢業旅行投票</title>
</head>
<body>
<div style = "text-align:center">
            <canvas style = "border-radius: 0% ; height:320px ; width:100%">
                <script src="JS/yellowDot_T.js"></script>
            </canvas>
    </div>

<form method='post' action='confirm2.php'>
<center>
<table width='70%' id='table1' style = "background-color:#888888">
    <tr>
        <td align='right' width='200' style = "color:#000000 ; font-size: 20px;" >學號</td>
        <td><input type='text' name='SID' size='10'>　</td>
    </tr>
    <tr>
        <td align='right' width='200' style = "color:#0000000 ; font-size: 20px;">姓名</td>
        <td><input type='text' name='SName' size='10'>　</td>
    </tr>
    <tr>
        <td align='right' width='200' style = "color:#000000 ; font-size: 20px;">身份證末四碼</td>
        <td><input type='text' name='SCode' size='10'></td>
    </tr>
    <tr>
        <td align='right' width='200' style = "color:#000000 ; font-size: 20px;">選擇地點</td>
        <td><input type='radio' value='澎湖' name='SLoc' style = "color:#ffffff ; font-size: 20px;">澎湖
            <input type='radio' value='花蓮' name='SLoc' style = "color:#ffffff ; font-size: 20px;">花蓮
            <input type='radio' value='泰國' name='SLoc' style = "color:#ffffff ; font-size: 20px;">泰國</td>
    </tr>
    <tr>
        <td align='right' width='200' style = "color:#000000 ; font-size: 20px;">意見</td>
        <td><input type='text' name='SComment' size='50'>　</td>
    </tr>
    <tr>
        <td align='right' width='200' style = "color:#000000 ; font-size: 20px;">　</td>
        <td><input type='submit' name='Submit' value='投票'>　</td>
    </tr>
</table>
</center>
</form>
</body>
</html>