<?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);

$query = "SELECT * FROM product";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
<td width=100>Company:</td> 
<td width=100>Product Name:</td> 
<td width=100>Product Type:</td> 
<td width=100>Cost:</td> 
<td width=100>Available:</td> 
</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['company'] . "</td>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['type'] .  "</td>"; 
print "<td>" . $row['cost'] . "</td>";
print "<td>" . $row['no'] . "</td>";
print "</tr>"; 
} 
print "</table>"; 
?>