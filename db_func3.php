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
//將表單元件的值存入資料庫
$link=mysql_connect("localhost", "bioinfo", "6193") or die(mysql_error());
mysql_select_db("dino") or die(mysql_error());
if ($Var6 == 'insert')
    $query="INSERT INTO vote(SID, SName, SCode, SLoc, SComment) VALUES('$Var1', '$Var2', '$Var3', '$Var4', '$Var5')";
else
    $query="UPDATE vote SET SName='$Var2', SCode='$Var3', SLoc='$Var4', SComment='$Var5', SDate=NOW() WHERE SID='$Var1'";
$result=mysql_query($query) or die(mysql_error());
mysql_close($link);
*/
function SaveVoteTest($sID, $sName, $sCode, $sLoc, $sComment, $sMethod)
{
    return "OK";
}
function SaveVote($sID, $sName, $sCode, $sLoc, $sComment, $sMethod)
{
    $dbconfig = $GLOBALS['dbconfig'];
    $dsn = $dbconfig['driver'].":host=".$dbconfig['host'].";dbname=".$dbconfig['database'];
    $pdo = new PDO($dsn, $dbconfig['username'],$dbconfig['password']);
    $pdo->query("set names utf8");
    if ($sMethod == 'insert')
        $sql="INSERT INTO tour_vote(SID, SName, SCode, SLoc, SComment) VALUES(:SID, :SName, :SCode, :SLoc, :SComment)";
    else //($sMethod == 'update')
        $sql="UPDATE tour_vote SET SName=:SName, SCode=:SCode, SLoc=:SLoc, SComment=:SComment WHERE SID=:SID";

    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':SID', $sID, PDO::PARAM_STR); 
    $pdoStatement->bindValue(':SName', $sName, PDO::PARAM_STR); 
    $pdoStatement->bindValue(':SCode', $sCode, PDO::PARAM_STR); 
    $pdoStatement->bindValue(':SLoc', $sLoc, PDO::PARAM_STR); 
    $pdoStatement->bindValue(':SComment', $sComment, PDO::PARAM_STR);  
    if (!$pdoStatement->execute()) {
        print_r($pdoStatement->errorInfo());
    }
}
