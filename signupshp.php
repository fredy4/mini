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
				$nam=$_POST["name"];
				$stat=$_POST["state"];
				$city=$_POST["city"];
				$mno=$_POST["mno"];
				$add=$_POST["address"];
				$email=$_POST["email"];
				$level=$_POST["level"];
				mysql_query("INSERT INTO shop (id, name, password, address, city, state, mno, email, level) VALUES ('$id', '$nam', '$pwd', '$add', '$city', '$stat', '$mno',  '$email', '$level')");
				$_SESSION["log"]=1;
			    $_SESSION["id"]=$_POST["username"];
			    $_SESSION["type"]="shp";
			    header("Location:welcomeshp.php");
			}

			elseif ($_POST["submit"]=="login") {
				$tmp=mysql_fetch_array(mysql_query("SELECT * FROM shop where id = '$id' AND password = '$pwd'"));
				if($tmp){
					$_SESSION["log"]=1;
					$_SESSION["type"]="shp";
					$_SESSION["id"]=$id;
					header("Location:welcomeshp.php");

				}
				else{
					unset($_SESSION["log"]);
					unset($_SESSION["type"]);
					header("Location:loginshp.php");
				}
			}

		}
	?>
</body>
</html>