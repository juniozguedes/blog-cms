<?php
include_once('header.php');

session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
$con = new PDO($dsn, $dbuser, $dbpass);
$del_user_id = $_GET['del_user_id'];


$DELETE = $con->prepare("DELETE FROM cadastrados  where id='$del_user_id'");
$DELETE->execute();
header("location:select.php");



}
catch(PDOException $e)
{
echo "error:".$e->getMessage();
}

 include_once('footer.php');?>

?>
