<?php session_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>MSI</title>
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
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);

$query = "SELECT * FROM cart ";
$result = mysql_query($query) 
or die(mysql_error()); 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  $ab=$row['pid'];
{ $date = strtotime("+0 day", strtotime("$row[dop]"));
//echo date("Y-m-d", $date);

$current_datetime = date("Y-m-d", $date);
 //print $current_datetime;
 $date1 = strtotime("+30 day", strtotime("$row[dop]"));
 $send_date=date("Y-m-d", $date1);
//
    
//$send_date = date("Y-m-d H:i", strtotime($row['send_date'])); // suppose $row['send_date']'s value is '2016-10-17 15:00'
 for($row['pid']=1;$row['pid']<50;$row['pid']++){
if($current_datetime == $send_date){
    
// the message
$msg = "You have reached your machine's 1st service time.";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($ab,"Service Message",$msg);


}
}
 
}


?>
</body>
</html>