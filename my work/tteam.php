<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title> Team management </title>
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
		<link rel="stylesheet" type="text/css" href="css/stylett.css">
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
			$(document).ready(function() {
    		var triggers = $(".modal").overlay({

      // some mask tweaks suitable for modal dialogs
     		 mask: {
       		 color: '#000000',
        	loadSpeed: 200,
        	opacity: 0.9
      		},

      		closeOnClick: false
  			});
    	});
		</script>
	</head>

<?php

if(isset($_POST["approve"])){
	$ttid=$_POST["gid"];
	mysql_query("UPDATE teaminfo SET tstatus='ys' WHERE tid='$ttid'");
	
}
//data base operation of activities
if(isset($_POST['submit'])){
		$title=$_POST["title"];
		$details=$_POST["details"];
		$clas1=mysql_query("SELECT tclass FROM TEACHER where id='$id'");
		$clas=mysql_fetch_array($clas1);
		$class=$clas["tclass"];
		$batc=mysql_query("SELECT batch FROM student ORDER BY batch DESC limit 1,1");
		$batc1=mysql_fetch_array($batc);
		$batch=$batc1["batch"];
	if($_POST["submit"]=="Send Alert")
	{	
		$type="alert";
		mysql_query("INSERT INTO actlist VALUES ('$title','$details','$type','$class','$batch')");
		if($_POST["alertto"]=="All students"){
			$stn=mysql_query("SELECT id FROM student WHERE class='$class'");
			while($stn1=mysql_fetch_array($stn)){
				$sid=$stn1["id"];
				mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$sid','alt','$title','team.php')");
			}
		}
		else{
			$stn=mysql_query("SELECT id FROM student JOIN teaminfo ON student.id=teaminfo.leader WHERE class='$class'");
			while($stn1=mysql_fetch_array($stn)){
			$sid=$stn1["id"];
			mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$sid','alt','$title','team.php')");
			}
		}
	}
	if($_POST["submit"]=="Submit"){
		$type="docsub";
		mysql_query("INSERT INTO actlist VALUES ('$title','$details','$type','$class','$batch')");
		$stn=mysql_query("SELECT id FROM student JOIN teaminfo ON student.id=teaminfo.leader WHERE class='$class'");
			while($stn1=mysql_fetch_array($stn)){
			$sid=$stn1["id"];
			mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$sid','doc','$title','team.php')");
			}
	}
	if($_POST["submit"]=="Send"){
		$type="mulfile";
		mysql_query("INSERT INTO actlist VALUES ('$title','$details','$type','$class','$batch')");
		$stn=mysql_query("SELECT id FROM student JOIN teaminfo ON student.id=teaminfo.leader WHERE class='$class'");
		while($stn1=mysql_fetch_array($stn)){
		$sid=$stn1["id"];
		mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$sid','mfl','$title','team.php')");
		}
	}
	if($_POST["submit"]=="Notify"){
		$type="exam";
		mysql_query("INSERT INTO actlist VALUES ('$title','$details','$type','$class','$batch')");
		$stn=mysql_query("SELECT id FROM student WHERE class='$class'");
		while($stn1=mysql_fetch_array($stn)){
			$sid=$stn1["id"];
			mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$sid','exm','$title','team.php')");
		}


	}
	
} ?>
<body>
	<?php include("theader.php");?>
	<div id="contents">
		<div id="head">
			Teams
		</div>
		<ul id="newact">
			<li>New activity
			<ul><li class="modal" rel="#alert">alert</li>
				<li class="modal" rel="#docsub">doc submission</li>
				<li class="modal" rel="#muldoc">multiple doc submission</li>
				<li class="modal" rel="#exam">exam</li></ul>
			</li></ul>
		<ul id="newact">
			<li class="modal" rel="#result">View Result</li></ul>
		 <div id="content">
			<?php
			$cls=mysql_query("SELECT tclass from TEACHER where id='$id'");
			$cls1=mysql_fetch_array($cls);
			$cls=$cls1['tclass'];
			$pen=mysql_query("SELECT tid,tname,id,name FROM teaminfo JOIN student ON teaminfo.leader=student.id WHERE teaminfo.tstatus='pn' AND student.class='$cls'");
			$pen1=mysql_fetch_array($pen);
			if($pen1){
				echo "<h1>Groups to approve:</h1><hr><ul class='gname'>";
				do{
					$ttid=$pen1['tid'];
					echo "<li>Group".$pen1['tid']."-".$pen1['tname']."...by...".$pen1['name']."<form action='tteam.php' method='post' style='float:right'><input type='hidden' name='gid' value='$ttid'><input type='submit' name='approve' value='approve'></form></span></li>";
					$lid=$pen1['id'];
					echo "<div class='gdetails'><div class='members'>Members:<ul class='mname'>";
					$mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$lid' AND (team.status='la' OR team.status='ma') AND member!='$lid' ");
          			while($me1=mysql_fetch_array($mem)) 
         			{
            			echo "<li>".$me1["name"]."</li>";
          			}
          			echo "</ul></div></div>";
				}while($pen1=mysql_fetch_array($pen));
				echo "</ul>";
			}
			//approved groups
			$pen=mysql_query("SELECT tid,id,tname,name FROM teaminfo JOIN student ON teaminfo.leader=student.id WHERE teaminfo.tstatus='ys' AND student.class='$cls'");
			$pen1=mysql_fetch_array($pen);
			if($pen1){
				echo "<h1>Approved groups:</h1><hr><ul class='gname'>";
				do{
					echo "<li>Group".$pen1['tid']."-".$pen1['tname']."...by...".$pen1['name']."</li>";
					$lid=$pen1['id'];
					echo "<div class='gdetails'><div class='members'>Members:<ul class='mname'>";
					$mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$lid' AND (team.status='la' OR team.status='ma') AND member!='$lid' ");
          			while($me1=mysql_fetch_array($mem)) 
         			{
            			echo "<li>".$me1["name"]."</li>";
          			}
          			echo "</ul></div></div>";
				}while($pen1=mysql_fetch_array($pen));
				echo "</ul>";
			}
			?>
		</div>
	</div>
			<!-- Modal boxes.-->
			<div class="modalbox" id="alert">
				<h2>Alert!!</h2><hr>
				<form class="dat" method="post" action="tteam.php">
				<p>Alert:<br>
					<select name="alertto" required="required">
						<option>Select any</option>
						<option>All students</option>
						<option>Team leaders</option>
					</select>
				</p>
				<p>Title:<br>
					<input type="text" name="title" required="required"/>
				<p>
					Details:<br>
					<textarea name="details" rows="1" id="text" required="required"></textarea>
				</p>
					Attach files:<br>
					<input type="file" name="attached"/>
				</p>
				<p class="button">
			        <input type="submit" value="Send Alert" name="submit"/>
			    </p>

				</form>
			</div>
  
			<div class="modalbox" id="docsub">
				<h2>Document submission</h2><hr>
				<form class="dat" method="post" action="tteam.php">
				<p>Title:<br>
					<input type="text" name="title" required="required"/>
				</p>
				<p>
					Details:<br>
					<textarea name="details" rows="1"  id="text" required="required"></textarea>
				
				<p class="button">
			        <input type="submit" value="Submit" name="submit"/>
			    </p>
				</form>
			</div>

			<div class="modalbox" id="muldoc">
				<h2>Multiple document submission</h2><hr>
				<form class="dat" method="post" action="tteam.php">
				<p>Title:<br>
					<input type="text" name="title" required="required"/>
				</p>
				<p>
					Details:<br>
					<textarea name="details" rows="1" id="text" required="required"></textarea>
				</p>
				<p class="button">
			        <input type="submit" value="Send" name="submit"/>
			    </p>

				</form>
			 </div>

			 <div class="modalbox" id="exam">
				<h2>Exam!!</h2><hr>
				<form class="dat" method="post" action="tteam.php">
				<p>Title:<br>
					<input type="text" name="title" required="required"/>
				</p>
				<p>
					Details:<br>
					<textarea name="details" rows="1" id="text" required="required"></textarea>
				</p>
				<p class="button">
			        <input type="submit" value="Notify" name="submit"/>
			    </p>

				</form>
			 </div>
			 <div class="modalbx" id="result">

			 	<h2>Result</h2>
			 	<?php
			 	echo "<div id=cont>";
			 	echo "<br> In order attendance,knowldge,involvement,presentation,completion,demonstration,report,idea,sum<br>";
			 	$rst=mysql_query("SELECT id,name from STUDENT WHERE class='$cls'");
			 	while($rst1=mysql_fetch_array($rst)){
			 		$sid=$rst1["id"];
			 		$fnl=mysql_query("SELECT * FROM teval JOIN student ON teval.id=student.id WHERE student.class='$cls' AND student.id='$sid'");
			 		$fnl1=mysql_fetch_array($fnl);
			 		$prsnt=$fnl1["presentation"];
			 		$cmplt=$fnl1["complet"];
			 		$dmnst=$fnl1["demonstration"];
			 		$idea=$fnl1["idea"];
			 		$laas=mysql_query("SELECT max( tmark ) AS MARK 
			 			FROM activities
JOIN teaminfo ON activities.tid = teaminfo.tid
JOIN team ON teaminfo.leader = team.leader
JOIN student ON team.member = student.id
WHERE student.class = '$cls'
AND student.id = '$sid'");
			 		$laas1=mysql_fetch_array($laas);
			 		$reprt=$laas1["MARK"];

			 		$last=mysql_query("SELECT sum(knowledge) AS sumknow, sum(involve) AS suminv, count(knowledge) AS countknow, count(involve) AS countinv FROM ceval WHERE id='$sid'");
			 		$last1=mysql_fetch_array($last);
			 		$sumknow=$last1["sumknow"];
			 		$suminv=$last1["suminv"];
			 		$countknow=$last1["countknow"];
			 		$countinv=$last1["countinv"];

			 		$pandaram=mysql_query("SELECT count(*) AS atnd FROM ceval WHERE id='$sid'");
			 		$pandaram1=mysql_fetch_array($pandaram);
			 		$totatndc=$pandaram1["atnd"];
			 		$pandaram=mysql_query("SELECT count(*) AS atndn FROM ceval WHERE id='$sid' AND present='Yes'");
			 		$pandaram1=mysql_fetch_array($pandaram);

			 		$atnc=$pandaram1["atndn"];
			 		$reprt=$reprt*15/100;
			 		$prsnt=$prsnt*10/100;
			 		$cmplt=$cmplt*10/100;
			 		$dmnst=$dmnst*10/100;
			 		$idea=$idea*25/100;
			 		if($countknow!=0)
			 		$know=$sumknow/$countknow*10/100;
			 		else
			 		$know=null;
			 		if($countinv!=0)
			 		$inv=$suminv/$countinv*10/100;
			 		else
			 		$inv=null;
			 		if($totatndc!=0)
			 		$att=$atnc/$totatndc*10;
			 		else
			 		$att=null;
			 		$sum=$att+$know+$inv+$prsnt+$cmplt+$dmnst+$reprt+$idea;
			 		echo $rst1["name"]." ".$att." ".$atnc." ".$totatndc." ".$know." ".$inv." ".$prsnt." ".$cmplt." ".$dmnst." ".$reprt." ".$idea." ".$sum."<hr>";

			 	}
			 	echo "</div>";
			 	?>
			 </div>

			 <?php include("footer.php");?>
</body>
</html>
