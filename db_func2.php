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
//CheckUser
/*
$link=mysql_connect("localhost", "bioinfo", "6193") or die(mysql_error());
    mysql_select_db("dino") or die(mysql_error());
    $query="SELECT SID, SName, SCode, SLoc, SComment, SDate FROM vote WHERE SID='$Var1'";
    $result=mysql_query($query) or die(mysql_error());
    $num_rows = mysql_num_rows($result);

    if ($num_rows ==1)
    {
        $row = mysql_fetch_array($result);
*/
function CheckVotedTest($sID)
{
    $row =array("SID"=>"920100625", "SName"=>"朱小弟", "SCode"=>"43");
    return "Hello";
}
function CheckVoted($sID)
{
    $dbconfig = $GLOBALS['dbconfig'];
    $dsn = $dbconfig['driver'].":host=".$dbconfig['host'].";dbname=".$dbconfig['database'];
    $pdo = new PDO($dsn, $dbconfig['username'],$dbconfig['password']);
    $pdo->query("set names utf8");
    $sql = "SELECT * FROM tour_vote WHERE SID = :SID";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':SID', $sID, PDO::PARAM_STR);  
    if (!$pdoStatement->execute()) {
        print_r($pdoStatement->errorInfo());
        return NULL;
    }
    $row = $pdoStatement->fetch();
    if ($row)
    {
        return $row;
    }
    return NULL;
}