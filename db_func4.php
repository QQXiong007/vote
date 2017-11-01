<?php
/**
 * @file
 * db_funtions.php: demo PDO usage
 * Hsueh-Ting Chu 2017/10/13
 */
//require_once 'testlog.php';
$GLOBALS['dbconfig'] = array (
'database' => 'web2017',
'username' => 'student2017',
'password' => 'mALL7Fs2E7hcuXsD',
'host' => 'localhost',
'port' => '',
'driver' => 'mysql',
);
/*
//從資料庫讀出投票資料
<?php
$link=mysql_connect("localhost", "bioinfo", "6193") or die(mysql_error());
mysql_select_db("dino") or die(mysql_error());
$query="SELECT SID, SName, SLoc, SComment, SDate FROM vote ORDER BY SDate";
$result=mysql_query($query) or die(mysql_error());
$num_rows = mysql_num_rows($result);
echo "<p>".$num_rows."筆投票資料</p>
";

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
print "
    <tr>
        <td>".$row["SID"]."</td>
        <td>".$row["SName"]."</td>
        <td>".$row["SLoc"]."</td>
        <td>".$row['SDate']."</td>
        <td>".$row["SComment"]."_</td>
    </tr>
";
}
*/
function ListVotesTest()
{
    return "OK";
}
function ListVotes()
{
    $dbconfig = $GLOBALS['dbconfig'];
    $dsn = $dbconfig['driver'].":host=".$dbconfig['host'].";dbname=".$dbconfig['database'];
    $pdo = new PDO($dsn, $dbconfig['username'],$dbconfig['password']);
    $pdo->query("set names utf8");
    $sql="SELECT * from tour_vote";       
    $pdoStatement = $pdo->prepare($sql);
    if (!$pdoStatement->execute()) {
        print_r($pdoStatement->errorInfo());
    }
    $rowAll = $pdoStatement->fetchAll();
    return $rowAll;
}
/*
$query="SELECT Count(SLoc) AS SNum, SLoc FROM tour_vote GROUP BY SLoc";
$result=mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "
        <td>".$row["SLoc"]."</td>
        <td>".$row["SNum"]."</td>    
";
}*/
function CountVotesTest()
{
    return "OK";
}
function CountVotes()
{
    $dbconfig = $GLOBALS['dbconfig'];
    $dsn = $dbconfig['driver'].":host=".$dbconfig['host'].";dbname=".$dbconfig['database'];
    $pdo = new PDO($dsn, $dbconfig['username'],$dbconfig['password']);
    $pdo->query("set names utf8");
    $sql="SELECT Count(SLoc) AS SNum, SLoc FROM tour_vote GROUP BY SLoc";      
    $pdoStatement = $pdo->prepare($sql);
    if (!$pdoStatement->execute()) {
        print_r($pdoStatement->errorInfo());
    }
    $rowAll = $pdoStatement->fetchAll();
    return $rowAll;
}
