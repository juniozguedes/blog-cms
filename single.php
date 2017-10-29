<?php include('header.php');?>
<?php
session_start();
if (isset($_SESSION['id']) && empty($_SESSION['id'])==false)
{ #Verifica se tem algo guardado na variável global $_SESSION['id'] e verifica também se ela não está vazia garantindo acesso a área restrita.
header("Location:premmyposts.php");
}else{ #Caso o $SESSION ID não esteja populado, será requisitado o login
}

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
$this_id = $_GET['this_id'];
$con = new PDO($dsn, $dbuser, $dbpass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select = $con->prepare("SELECT * FROM posts WHERE id=$this_id");

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>
<div class="col-md-12">

        <div class="col-md-4 blog-main">

          <div class="blog-post">
            <br>
            <br>
            <h2 class="blog-post-title"><?php echo $data['titulo']; ?></h2>
            <!--<p>Autor-id:<?php echo $data['id']; ?></p><-->
            <hr>
            <p><?php echo $data['post']; ?><p>
              <a class='btn btn-outline-primary' id='edit' href='single.php?this_id=<?php echo $data['id']; ?>'>Read More</a>

            <hr>
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

</div>
</div>

<?php
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage();
}

?>
<?php include('footer.php');?>
