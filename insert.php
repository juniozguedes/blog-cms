<?php
include_once('header.php');

session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
$con = new PDO($dsn, $dbuser, $dbpass);
if(isset($_POST['done']))
{
$titulo = $_POST['titulo'];
$post = 	$_POST['post'];

$insert = $con->prepare("INSERT INTO posts (titulo,post) VALUES(:titulo,:post)");
$insert->bindParam(':titulo',$titulo);
$insert->bindParam(':post',$post);
$insert->execute();
echo "insert it";
if (isset($_SESSION['id']) && empty($_SESSION['id'])==false)
{ #Verifica se tem algo guardado na variável global $_SESSION['id'] e verifica também se ela não está vazia garantindo acesso a área restrita.
header("Location:premmyposts.php");
}else{ #Caso o $SESSION ID não esteja populado, será requisitado o login
header("Location:posts.php");
}
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage();
}
?>
	<div class="col-md-12 principalcompadding">

<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <textarea  name="post" placeholder="Your post" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
	 <button type="submit" name="done" class="btn btn-primary">Send Post</button>
</form>
</div>
<?php include_once('footer.php');?>
