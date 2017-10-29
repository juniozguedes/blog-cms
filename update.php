<?php
include_once('header.php');

session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
$con = new PDO($dsn, $dbuser, $dbpass);

$edit_id = $_GET['edit_id'];


$select = $con->prepare("SELECT * FROM posts where id='$edit_id' ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();
if(isset($_POST['done']))
{
$titulo = $_POST['titulo'];
$post = $_POST['post'];


$update = $con->prepare("UPDATE posts SET titulo=:titulo ,post=:post where id='$edit_id'");
$update->bindParam(':titulo',$titulo);
$update->bindParam(':post',$post);
$update->execute();
header("location:premmyposts.php");
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage();
}
?>
<form method="post">
<input type="text" name="titulo" placeholder="titulo" >
<input type="text" name="post" placeholder="Post" >
<input type="submit" name="done" >
</form>
<?php include_once('footer.php');?>
