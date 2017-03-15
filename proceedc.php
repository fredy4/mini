<!DOCTYPE html>
<html>
<head>
	<title>MSI</title>
</head>
<body>
<?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);

$query = "SELECT * FROM product WHERE id='$_GET[q]'";
$result = mysql_query($query) 
or die(mysql_error()); 
if(($_POST["submit"])=="Proceed"){
	$qnty=$_POST['quantity'];
	$mno=$_POST['mno'];




</body>
</html>