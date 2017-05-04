<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>MSI</title>
  <?php 
    if(isset($_SESSION["log"])){
    
     if($_SESSION["log"]==1&&$_SESSION["type"]=="c")
       header("Location: welcome.php");
     elseif($_SESSION["log"]==1&&$_SESSION["type"]=="shp")
       header("Location: welcomeshp.php");
     elseif($_SESSION["log"]==1&&$_SESSION["type"]=="svc")
       header("Location: welcomesvc.php");
     elseif($_SESSION["log"]==0)
        header("Location:index.php");
    }
    else
             header("Location:index.php");


    $sql=mysql_connect("localhost","root","root123");
   if(!$sql)
      {
       die("Couldn't connect".mysql_error());
      }
  mysql_select_db("msi",$sql);
  ?>


</head>
<body>
<?php echo $_SESSION["id"];?>
<li> <a href="logout.php">Log out</a></li>

  <?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);
$idpc = $_GET['idpk'];
$query = "SELECT * FROM complaint WHERE compl_id='$idpc'" ;
$result = mysql_query($query) or die(mysql_error()); 
$row = mysql_fetch_assoc($result); 
//print_r($row);
 
      $pr=$_GET["product"];
        $type=$_GET["type"];
        $br=$_GET["brand"];
       //$no=$row["no"];
        $do=$_GET["dop"];
        $cm=$_GET["comp"];
        $nsc=$_GET["nsc"];

mysql_query("INSERT INTO notify(product,type,brand,dop,comp,nsc)VALUES('$pr','$type','$br','$do','$cm','$nsc')");
   
         

?>
<li> <a href="welcomeco.php"> << </a></li>
Notification Sent.

</body>
</html>