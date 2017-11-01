<?php
//將表單元件的值轉成php變數
  $Var1=htmlspecialchars($_POST["SID"]);
  $Var2=htmlspecialchars($_POST["SName"]);
  $Var3=htmlspecialchars($_POST["SCode"]);
  $Var4=htmlspecialchars($_POST["SLoc"]);
  $Var5=htmlspecialchars($_POST["SComment"]);
?>
<html lang="lang="zh-Hant-TW"">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>畢業旅行投票確認</title>
</head>

<body>

<p>畢業旅行投票-確認投票</p>
<form method='post' action='save1.php'>

<?php
print "
<table border='1' width='100%' id='table1'>
    <tr>
        <td align='right' width=200>學號</td>
        <td><input type='hidden' name='SID' value='$Var1'>$Var1</td>
    </tr>
    <tr>
        <td align='right' width=200>姓名</td>
        <td><input type='hidden' name='SName' value='$Var2'>$Var2</td>
    </tr>
    <tr>
        <td align='right' width=200>身份證末四碼</td>
        <td><input type='hidden' name='SCode' value='$Var3'>$Var3</td>
    </tr>
    <tr>
        <td align='right' width=200>選擇地點</td>
        <td><input type='hidden'  name='SLoc' value='$Var4'>$Var4</td>
    </tr>
    <tr>
        <td align='right' width=200>意見</td>
        <td><input type='hidden' name='SComment' value='$Var5'>$Var5</td>
    </tr>
    <tr>
        <td align='right' width=200>　</td>
        <td>
        ";
if ($Var4=='')
   echo "沒有選擇地點<a href='javascript:history.back()'>,請回上一頁重新填寫</a>";
else
   echo "若要更改<a href='javascript:history.back()'>,請回上一頁重新填寫</a>";
echo "
        </td>
    </tr>
</table>";
if (empty($Var1)||empty($Var2)||empty($Var3)||empty($Var4))//要有前四欄資料才能存檔
print "
<table border='1' width='100%' id='table1'>
    <tr>
        <td align='center'>
            <input type='hidden' name='SMethod' value='insert' >
            <input type='submit' name='Submit'  value='確認投票' disabled='disabled'>　
        </td>
    </tr>
</table>
";
else
print "
<table border='1' width='100%' id='table1'>
    <tr>
        <td align='right'>
            <input type='hidden' name='SMethod' value='insert' >
            <input type='submit' name='Submit' value='確認投票'>　
        </td>
    </tr>
</table>
";
?>

</form>
</body>

</html>