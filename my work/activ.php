<?php session_start();

$sql=mysql_connect("localhost","root","");
       if(!$sql)
  	     {
	      die("Couldn't connect".mysql_error());
	     }
       mysql_select_db("msi",$sql);
       $id=$_SESSION["id"];

if(isset($_GET["name"])){
	echo "<h2>".$_GET["name"]."</h2><hr>";
	$akt=$_GET["name"];
	$td=$_GET["id"];
	$aktv=mysql_query("SELECT * FROM activities WHERE title='$akt' AND tid='$td'");
	$aktt=mysql_fetch_array($aktv);
	$con=$aktt["value"];
	echo "<div id='con'>".$con."<br><br><br><hr><form method='post' action='welcomet.php'><input type='hidden' name='gid' value='$td'><input type='hidden' name='title' value='$akt'><p class='button'><input type='submit' name='submit' value='submit'></div >";
 }

?>


<style>

/*styling both submit buttons */
#con p.button input{
	margin-left: 38%;
	width: 20%;
	cursor: pointer;	
	background: rgb(61, 157, 179);
	padding: 8px 5px;
	font-family: 'BebasNeueRegular','Arial Narrow',Arial,sans-serif;
	color: #fff;
	font-size: 18px;	
	border: 1px solid rgb(28, 108, 122);	
	margin-bottom: 10px;	
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
	        border-radius: 3px;	
	        box-shadow:0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
	        0px 0px 0px 3px rgb(254, 254, 254),
	        0px 5px 3px 3px rgb(210, 210, 210);
}
#con p.button input:hover{
	background: rgb(74, 179, 198);
}
#con p.button input:active,
#con p.button input:focus{
	background: rgb(40, 137, 154);
	position: relative;
	top: 1px;
	border: 1px solid rgb(12, 76, 87);	
	-webkit-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
	   -moz-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
	        box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
}

</style>
