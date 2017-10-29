<?php
include_once('header.php');

session_start();
try{
	$con = new PDO ("mysql:host=localhost;dbname=blog","root","");
	echo "<div class='alert alert-success' role='alert'>
  Connected, Welcome, your ID num is:".$_SESSION['id']."
</div>";
}
catch(PDOException $e)
{
	echo "error:".$e->getMessage();
}
 ?>
<div class="col-md-12">
 <a class="btn btn-dark btn-lg btn-block" href="select.php">Manage Accounts</a><br/>
 <a class="btn btn-dark btn-lg btn-block" href="cadastro.php">Register new Admin</a><br/>
 <a class="btn btn-dark btn-lg btn-block" href="delete_a_user.php">Delete Users</a><br/>

 <a class="btn btn-danger btn-lg btn-block" href="logout.php">Sair</a>
</div>
<?php include_once('footer.php');?>
