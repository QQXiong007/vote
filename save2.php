<?php
    //將表單元件的值轉成php變數
    $Var1=htmlspecialchars($_POST["SID"]);
    $Var2=htmlspecialchars($_POST["SName"]);
    $Var3=htmlspecialchars($_POST["SCode"]);
    $Var4=htmlspecialchars($_POST["SLoc"]);
    $Var5=htmlspecialchars($_POST["SComment"]);
    $Var6=htmlspecialchars($_POST["SMethod"]);
?>

<html lang="lang="zh-Hant-TW"">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>畢業旅行投票</title>
</head>


<?php
//將表單元件的值存入資料庫//
//
require_once 'db_func3.php';
SaveVote($Var1, $Var2, $Var3, $Var4, $Var5, $Var6);
?>

<body>

<p>畢業旅行投票-投票完成</p>

<?php
echo "
<table border='1' width='100%' id='table1'>
    <tr>
        <td align=right width=200>學號</td>
        <td>$Var1</td>
    </tr>
    <tr>
        <td align=right width=200>姓名</td>
        <td>$Var2</td>
    </tr>
    <tr>
        <td align=right width=200>身份證末四碼</td>
        <td>$Var3</td>
    </tr>
    <tr>
        <td align=right width=200>選擇地點</td>
        <td>$Var4</td>
    </tr>
    <tr>
        <td align=right width=200>意見</td>
        <td>$Var5</td>
    </tr>
</table>";
?>
</form>
<hr>
<a href='list2.php'>查看報名資料</a>
</body>

</html>