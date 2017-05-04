<?php session_start(); ?>
<!DOCTYPE html>
    <html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover">

<head>
  <title>MSI</title>
  <?php 
    if(isset($_SESSION["log"])){
    
     if($_SESSION["log"]==1&&$_SESSION["type"]=="co")
       header("Location: welcomeco.php");
     elseif($_SESSION["log"]==1&&$_SESSION["type"]=="c")
       header("Location: welcome.php");
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
<?php echo "Hi, ".$_SESSION["id"];?>
<li> <a href="logout.php">Log out</a></li>

  <?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);
$idpc = $_GET['q'];
$query = "SELECT * FROM shop WHERE id='$idpc'" ;
$result = mysql_query($query) or die(mysql_error()); 
$row = mysql_fetch_assoc($result); 

$ab=$row['district'];
$abc=$row['state'];
//$abcd=$row['nationality'];
$temppp=mysql_fetch_array(mysql_query("SELECT * FROM shop where level='0'"));
  $mgm=$temppp['level'];
   //print "$mgm";
  $qrry =mysql_fetch_array(mysql_query( "SELECT * FROM state where state='$abc'"));
    $gm=$qrry['code'];
    //print "$gm";
     $querry =mysql_fetch_array(mysql_query( "SELECT * FROM district where district='$ab'"));
            $mg=$querry['code'];
            //print "$mg";

            $code=$mgm.$gm.$mg;
            //print "$code";

             mysql_query("UPDATE shop SET level='$code' WHERE id='$idpc'");
            mysql_query("UPDATE shop SET status='active' WHERE id='$idpc'");
             header("Location:welcomeshp.php");

?>
</body>
</html>

