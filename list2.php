<html lang="lang="zh-Hant-TW"">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>畢業旅行投票資料</title>
</head>

<body>

<p>畢業旅行投票資料</p>
<table border="1" width="100%" id="table1">
    <tr>
        <td>學號</td>
        <td>姓名</td>
        <td>選擇地點</td>
        <td>投票時間</td>
        <td>意見</td>
    </tr>
<?php
require_once 'db_func4.php';
$rowAll = ListVotes();
foreach($rowAll as $row)
{
    print "
    <tr>
        <td>".$row["SID"]."</td>
        <td>".$row["SName"]."</td>
        <td>".$row["SLoc"]."</td>
        <td>".$row['SDate']."</td>
        <td>".$row["SComment"]."_</td>
    </tr>";
}
?>
</table>
<hr>
投票結果
<table border="1" width="100%" id="table2">
<?php
$rowAll = CountVotes();
foreach($rowAll as $row)
{
    print "
    <tr>
        <td>".$row["SLoc"]."</td>
        <td>".$row["SNum"]."</td>
    </tr>";
}
?>
</table>
</body>

</html>