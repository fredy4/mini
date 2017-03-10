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
	<?php
if(($_POST["submit"])=="Add"){

				
				$id=$_POST["id"];
				$nam=$_POST["name"];
				$typ=$_POST["type"];
				$comp=$_POST["company"];
				$no=$_POST["no"];
				$cost=$_POST["cost"];
				mysql_query("INSERT INTO product (id,name,type,company,no,cost) VALUES ('$id','$nam','$typ','$comp','$no','$cost')");
				header("Location:successp.php");
				
			}
?>
</head>
</html>