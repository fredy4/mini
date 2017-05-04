<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title> MSI </title>
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
		if(isset($_POST["username"])){
			$id=$_POST["username"];
			$pwd=$_POST["password"];
			if(($_POST["submit"])=="register"){
	
				$email=$_POST["email"];
				mysql_query("INSERT INTO company (id, password, email) VALUES ('$id','$pwd', '$email')");
				$_SESSION["log"]=1;
			    $_SESSION["id"]=$_POST["username"];
			    $_SESSION["type"]="co";
			    header("Location:welcomeco.php");
			}

			elseif ($_POST["submit"]=="login") {
				$tmp=mysql_fetch_array(mysql_query("SELECT * FROM company where id = '$id' AND password = '$pwd'"));
				if($tmp){
					$_SESSION["log"]=1;
					$_SESSION["type"]="co";
					$_SESSION["id"]=$id;
					header("Location:welcomeco.php");

				}
				else{
					unset($_SESSION["log"]);
					unset($_SESSION["type"]);
					header("Location:loginco.php");
				}
			}

		}
	?>
</body>
</html>