<?php session_start();?>

<html>
<head>
	<title>Evaluation</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
		<link rel="stylesheet" type="text/css" href="css/styleeval.css">
		<script src="jquery.js"></script>
		<?php
		 if(isset($_SESSION["log"]))    
			{
			 if($_SESSION["log"]==0)
		      header("Location: index.php");
			 else if($_SESSION["type"]=="s")
			  header("Location:welcomes.php");
			 else if($_SESSION["type"]=="a")
			  header("Location:welcomea.php");			    
			}
		else
         header("Location:index.php");
     	$sql=mysql_connect("localhost","root","");
   		if(!$sql){
	   		die("Couldn't connect".mysql_error());
	  	}
   			mysql_select_db("project",$sql);
  		  	$id=$_SESSION["id"];
		?>

		<script>
		$(document).ready(function(){
			$(".clik").click(function(){
				$(this).parent().children(".inn").slideToggle("slow");
			});
			$(":date").dateinput({format:'yyyy/mm/dd'});
			
		}); 
		</script>
</head>
<body>


	<?php include("theader.php");?>
	<div id="contents">
		<div id="head">
			Evaluation


<?php 
	if(isset($_POST["submit"])) {
		if($_POST["submit"]=='submit'){
		 $sid=$_POST["id"];
		 $tid=$_POST["tid"];
		 $dat=$_POST["date"];
		 $prsnt=$_POST["present"];
		 $mk=$_POST["mark"];
		 $invlv=$_POST["involve"];
		 $mrk=mysql_query("SELECT * FROM ceval WHERE date='$dat' AND id='$sid'");
		 $mrk1=mysql_fetch_array($mrk);
		 if(!$mrk1)
		     mysql_query("INSERT INTO ceval (date,id,tid,present,knowledge,involve) VALUES('$dat','$sid','$tid','$prsnt','$mk','$invlv')");
		}
	
	}
	?>
	
		</div>
		<div id="content">
			<?php

			$cls=mysql_query("SELECT tclass from TEACHER where id='$id'");
			$cls1=mysql_fetch_array($cls);
			$cls=$cls1['tclass'];
			$pen=mysql_query("SELECT tid,id,tname,name FROM teaminfo JOIN student ON teaminfo.leader=student.id WHERE teaminfo.tstatus='ys' AND student.class='$cls' ORDER BY tid");
			$pen1=mysql_fetch_array($pen);
			if($pen1){
				echo "<h1>Approved groups:</h1><hr><ul class='gname'>";
				do{
					echo "<li>Group".$pen1['tid']."-".$pen1['tname']."...by...".$pen1['name']."</li>";
					$lid=$pen1['id'];
					echo "<div class='gdetails'>Members:<ul class='mname'>";
					$mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$lid' AND (team.status='la' OR team.status='ma') ");
          			while($me1=mysql_fetch_array($mem)) 
         			{
            			echo "<li><span class='clik'>".$me1["name"]."</span>";
            			$sid=$me1["id"];
            			$tmd=$pen1["tid"];
            			echo "<div class='inn'><form method='post' action='eval.php' class='memb'><input type='hidden' name='id' value='$sid'><input type='hidden' name='tid' value='$tmd'><p>Date:<input type='date' name='date'></p><p>Present:<select name='present'><option>Yes</option><option>No</option></select></p><p>Knowledge:<input type='text' name='mark' placeholder='enter marks out of 100'></p><p>Involvement:<input type='text' name='involve' placeholder='enter marks out of 100'></p><p class='button'><input type='submit' value='submit' name='submit'></p></form></div></li>";

          			}
          			echo "</ul></div>";
				}while($pen1=mysql_fetch_array($pen));
				echo "</ul>";
			} 	
			?>
		</div>
	</div>


</body>
</html>
