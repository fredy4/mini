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
				$nat=$_POST["nationality"];
				$stat=$_POST["state"];
				$dist=$_POST["district"];
				$mno=$_POST["mno"];
				$add=$_POST["address"];
				$level=$_POST["level"];
				$status="inactive";
				mysql_query("INSERT INTO shop (id, name, password, address, district, state, nationality,mno, level,status) VALUES ('$id', '$nam', '$pwd', '$add', '$dist', '$stat','$nat' ,'$mno', '$level','$status')");
				$_SESSION["log"]=1;
			    $_SESSION["id"]=$_POST["username"];
			    $_SESSION["type"]="shp";
			    $_SESSION["state"]=$_POST["state"];;
				$_SESSION["district"]=$_POST["district"];
				$_SESSION["nationality"]=$_POST["nationality"];
			    //$_SESSION["status"]="inactive";	
			    header("Location:welcomeshp.php");
			    
	

			}

			elseif ($_POST["submit"]=="login") {
				$tmp=mysql_fetch_array(mysql_query("SELECT * FROM shop where id = '$id' AND password = '$pwd'"));
				if($tmp){
					$_SESSION["log"]=1;
					$_SESSION["type"]="shp";
					$_SESSION["id"]=$id;
					$_SESSION["state"]=$tmp["state"];
					$_SESSION["district"]=$tmp["district"];
					header("Location:welcomeshp.php");

				}
				else{
					$_SESSION["log"]=0;
		 			header("Location: loginshp.php");
				}
			}

		}
	?>
</body>
</html>