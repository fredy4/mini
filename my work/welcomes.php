<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> MACHINE SERVICE INC </title>
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
  <link rel="stylesheet" type="text/css" href="css/stylewels.css" />
  <?php
   $sql=mysql_connect("localhost","root","");
   if(!$sql)
  	  {
	   die("Couldn't connect".mysql_error());
	  }
   mysql_select_db("msi",$sql);
   if(isset($_POST["username"])){
   	$id=$_POST["username"];
   	$pwd=$_POST["password"];
   	if($_POST["submit"]=="Login") 
   	{
	   $cln=mysql_query("SELECT * FROM teacher WHERE id='$id'");
	   $cl=mysql_fetch_array($cln);
	   if($cl)
	   {
	   	$con=mysql_query("SELECT * FROM teacher WHERE id='$id' AND password='$pwd'");
	   	$ck=mysql_fetch_array($con);
	   	if(!$ck)
	   	{
	   		$_SESSION["log"]=0;
	   		header("Location: login.php");
	   	}
	   	else
	   	{
	   		$_SESSION["log"]=1;
	   		$_SESSION["id"]=$ck["id"];
	   		if($id=="admin"){
	   			$_SESSION["type"]="a";
	   			header("Location:welcomea.php");
	   		}
	   		else
	   		{
	   			$_SESSION["type"]="t";
	   			header("Location:welcomet.php");
	   		}
	   	}
	   }
	  else{
      $con=mysql_query("SELECT * from student where id='$id' AND password='$pwd'");
	  $ck=mysql_fetch_array($con);
	  if(!$ck)
	 	{
		 $_SESSION["log"]=0;
		 header("Location: login.php");
		}
	  else
		{
		  $_SESSION["log"]=1;
		  $_SESSION["id"]=$ck["id"];
		  $_SESSION["name"]=$ck["name"];
		  $_SESSION["type"]="s";
		}
       }
     }
	if($_POST["submit"]=="register")
		{ 
		  $nam=$_POST["name"];
		  $no=$_POST["rno"];
		  $cls=$_POST["class"];
		  $mail=$_POST["email"];
		  $len=strlen($id);
		  $len=$len-2;
		  $batch=substr($id,$len,2);
		  $batch=2*1000+$batch+4;
		  mysql_query("INSERT INTO student (id,name,password,no,class,email,batch,status) VALUES ('$id','$nam','$pwd','$no','$cls','$mail','$batch','nw')");
		  $_SESSION["log"]=1;
		  $_SESSION["id"]=$_POST["username"];
		  $_SESSION["name"]=$_POST["name"];
		  $_SESSION["type"]="s";
		}
		}
	 else
      {
	   if(isset($_SESSION["log"]))    
			{
			 if($_SESSION["log"]==0)
		      header("Location: index.php");
			 else if($_SESSION["type"]=="t")
			  header("Location:welcomet.php");
			 else if($_SESSION["type"]=="a")
			  header("Location:welcomea.php");			    
			}
		else
         header("Location:index.php");			
	  } 
    ?>
</head>
<body>
	<?php include("sheader.php"); ?>	
    <div id="contents">
    	<header>Notifications<hr></header>
    	<?php
    	$id=$_SESSION["id"];
    	$con=mysql_query("SELECT * FROM notifications WHERE id='$id' ORDER BY nid desc");
    	echo "<div class='list'><ul>";
    	while ($cont=mysql_fetch_array($con)) {
  			echo "<li>";
    		$type=$cont["type"];
    		
    		if($type=="tlr"){
    			echo "You got a request to join in the team";
    		}
    		elseif ($type=="tmr") {
    			echo "You got a request from member";
    		}
    		elseif ($type=="tla") {
    			echo "Leader accepted your request";
    		}
    		elseif ($type=="tma") {
    			echo "Member accepted your request";
    		}
    		elseif ($type=='alt') {
    			echo" You got an alert";
    		}
    		elseif($type=='exm'){
    			echo "You got an exam";
    		}
    		elseif($type=='mfl'){
    			echo "You have to submit multiple files";
    		}
    		elseif($type=='doc'){
    			echo "You have to upload document";
    		}
    		echo "</li>";
    	}
    	echo "</ul></div>";
    	?>
    </div>
    <?php include("footer.php");
    ?>

</body>
</html>
