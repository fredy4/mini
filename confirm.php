<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>MSI</title>
  <?php 
    if(isset($_SESSION["log"])){
    
     if($_SESSION["log"]==1&&$_SESSION["type"]=="co")
       header("Location: welcomeco.php");
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
<?php echo "Hi, ".$_SESSION["name"];?>
<li> <a href="logout.php">Log out</a></li>

  <?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);
$idpc = $_GET['idpk'];
$query = "SELECT * FROM product WHERE id='$idpc'" ;
$result = mysql_query($query) or die(mysql_error()); 
$row = mysql_fetch_assoc($result); 
//print_r($row);
 
      $nam=$row["name"];
        $type=$row["type"];
        $company=$row["company"];
       //$no=$row["no"];
        $cost=$row["cost"];
        $qnty=$_GET["quantity"];
        $mno=$_GET["mno"];
        
mysql_query("INSERT INTO cart (product,typ,brand,amount,quantity,mno)VALUES('$nam','$type','$company','$cost','$qnty','$mno')");
   
         

?>
Your order has been successfully placed....
</body>
</html>