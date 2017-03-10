<?php session_start();

$sql=mysql_connect("localhost","root","");
       if(!$sql)
  	     {
	      die("Couldn't connect".mysql_error());
	     }
       mysql_select_db("project",$sql);
       $id=$_SESSION["id"];

if(isset($_GET["name"])){
	echo "<h2>".$_GET["name"]."</h2><hr>";
	$akt=$_GET["name"];
	
// calculating team id,batch,class
	$tid=mysql_query("SELECT teaminfo.tid,team.leader,team.member from teaminfo JOIN team ON team.leader=teaminfo.leader WHERE team.member='$id' AND (team.status='la' OR team.status='ma')");
	$tid1=mysql_fetch_array($tid);
	$td=$tid1["tid"];
	$leadr=$tid1["leader"];
	$inf=mysql_query("SELECT class,batch FROM student where id='$leadr'");
	$inf1=mysql_fetch_array($inf);
	$cls=$inf1["class"];
	$btch=$inf1["batch"];

	$aktv=mysql_query("SELECT * FROM actlist WHERE actname='$akt' AND class='$cls'");
	$aktt=mysql_fetch_array($aktv);
	$akts=$aktt["acttype"];
//printing....	
	if ($akts=="docsub"){
	  $doc=mysql_query("SELECT name FROM activities WHERE name='$akt' AND tid='$td' AND dept='$cls'");
	  $doc1=mysql_fetch_array($doc);
	  if($doc1){
	  	echo "already submitted";
	  }
	  else{
	  	if($tid1["leader"]==$tid1["member"]){
	  		echo "<form action='team.php' method='post' class='dat' enctype='multipart/form-data'><input type='hidden' name='group' value=$td/> <input type='hidden' name='actv' value='$akt'><input type='hidden' name='clas' value='$cls'> <input type='hidden' name='batch' value=$btch><input type='hidden' name='type' value='$akts'><p><input type='file' name ='file' id='file' required='required'/></p><p class='button'><input type='submit' name='submit' value='submit'/></p></form>";
	  	}
	  	else{
	  		echo "You haven't submitted yet.. Ask your project leader to submit it!!";
	  	}
	  }
	}
	elseif ($akts=="mulfile") {
		$doc=mysql_query("SELECT count(*) AS number FROM activities WHERE name='$akt' AND tid='$td' AND dept='$cls'");
		$doc1=mysql_fetch_array($doc);
		$count=$doc1["number"];
		echo "<span style='color:red; margin-right:40%'>Your group has submitted ".$count."entrie(s)</span>";
		if($count<5){
		echo "<form action='team.php' method='post' class='dat' enctype='multipart/form-data'><input type='hidden' name='group' value=$td/> <input type='hidden' name='actv' value='$akt'><input type='hidden' name='clas' value='$cls'> <input type='hidden' name='batch' value=$btch><input type='hidden' name='type' value='$akts'><p>Title:<input type='text' name='title'></p><p>Content:<textarea rows='17' id='text' name='content'></textarea></p><p class='button'><input type='submit' name='submit' value='Send'/></p></form>";	
		}
	}
	elseif ($akts=="alert") {
		$doc=mysql_query("SELECT * FROM actlist WHERE actname='$akt' AND class='$cls'");
		$doc1=mysql_fetch_array($doc);
		echo "<div class='dat'>".$doc1["details"]."<br><br></div>";
		}
	elseif ($akts=="exam") {
		$doc=mysql_query("SELECT * FROM actlist WHERE actname='$akt' AND class='$cls'");
		$doc1=mysql_fetch_array($doc);
		echo "<div class='dat'>".$doc1["details"]."<br><br></div>";
		
		}
}

?>