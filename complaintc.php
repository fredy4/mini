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
	<form action="complaint.php" method="post">
     	<h1>Register your Complaint</h1>
     	<p>
            <label for="cmpl"> Your Complaint</label>
            <input id="cmpl" name="cmpl" required="required" type="text"/>
        </p>
        <p class="send button"> 
            <input type="submit" name="submit" value="send" /> 
    	</p>
     </form>
</body>
</html>