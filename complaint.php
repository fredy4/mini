<!DOCTYPE html>
<html>
<head>
<?php 	
   $sql=mysql_connect("localhost","root","root123");
   if(!$sql)
  	  {
	   die("Couldn't connect".mysql_error());
	  }
   mysql_select_db("msi",$sql);
	?>
	</head>
	<body>
	<?php
	if(($_POST["submit"])=="send"){
	
	$cmp=$_POST["cmpl"];
	mysql_query("INSERT INTO complaint (compl) VALUES ('$cmp')");
	header("Location:success.php");
	}
	?>
	</body>
	</html>
	




