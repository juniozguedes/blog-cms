<?php include('header.php');?>
<?php
session_start();
$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
$con = new PDO($dsn, $dbuser, $dbpass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select = $con->prepare("SELECT * FROM posts");

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>
<div class="col-md-6">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <br>
            <br>
            <h2 class="blog-post-title"><?php echo $data['titulo']; ?></h2>
            <!--<p>Autor-id:<?php echo $data['id']; ?></p><-->
            <hr>
            <p><?php echo $data['post']; ?><p><a class='btn btn-outline-primary' id='edit' href='single.php?this_id=<?php echo $data['id']; ?>'>Edit</a>
              <a class='btn btn-outline-primary edit' id='edit' href='single.php?this_id=<?php echo $data['id']; ?>'>Edit</a>

            <?php 
                if (isset($_SESSION['id']) && empty($_SESSION['id'])==false){
                echo "<script>
                        var element = document.getElementById('edit');
                        element.parentNode.removeChild(element);
                      </script>"; 
                }else{
                 ;
  }
            ?>
              <a class='btn btn-outline-primary edit' href='single.php?this_id=<?php echo $data['id']; ?>'>Edit</a>

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
