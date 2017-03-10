<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
		<link rel="stylesheet" type="text/css" href="css/styleteam.css">
		<title>Find</title>
	    <?php 
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
	?>
	</head>
	<body>
		<?php
			include("sheader.php");
		?>	
		<div id="contents">
			<?php
				$sql=mysql_connect("localhost","root","");
       			if(!$sql)
  	     		{
	     		 die("Couldn't connect".mysql_error());
	     		}
       			mysql_select_db("project",$sql);
       			//selecting id and batch of logged student
       			$sid=$_SESSION["id"];
       			$slct=mysql_query("SELECT class FROM student WHERE id='$sid'");
				$slcta=mysql_fetch_array($slct);
				$cls=$slcta["class"];
				//to find team
				if($_POST["submit"]=="Find team"){
					echo "<form method='post' action='searchf.php'><input type='text' name='findg' placeholder='Team name'/>";
					echo "<span class='button'><input type='submit' value='Find team' name='submit'/></form><br>";
					$tnam=$_POST["findg"];
					$teams=mysql_query("SELECT tid,tname, leader,class FROM teaminfo JOIN STUDENT ON teaminfo.leader=student.id  WHERE tname LIKE '%$tnam%' AND class='$cls'");
					while ($team=mysql_fetch_array($teams)) {
						$tid=$team["tid"];
						$ld=$team["leader"];
						echo "<div id='list'><span id='check'>".$team["tname"]."</span><form action='team.php' method='post'><input type='hidden' value='$tid' name='tid'/><input type='hidden' value='$ld' name='ld'/><span class='button'><input type='submit' value='Join' name='submit'/></span></form></div>";
					}

				}
				else if ($_POST["submit"]=="Find friend"){
					echo "<form method='post' action='searchf.php'><input type='text' name='add' placeholder='Enter name'>";
					echo "<span class='button'><input type='submit' value='Find friend' name='submit'/></span></form> <br>";
					$nam=$_POST["add"];
 					//selecting each student from student table and then checking team table to find their team status
					$namss=mysql_query("SELECT id,name,class FROM student WHERE (student.name like '%$nam%' or student.id like '%$nam%') AND class='$cls'");
					while ($nams=mysql_fetch_array($namss)) {
						$id=$nams["id"];
						$fl=0;
						$nm=mysql_query("SELECT * FROM team WHERE member='$id' AND (status='la' OR status='ma') ");
						while ($nmf=mysql_fetch_array($nm)) {
							$fl++;
						}
						if($fl==0)
						echo "<div id='list'><span id='check'>".$nams["name"]."</span><form action='team.php' method='post'><input type='hidden' value='$id' name='rid'/><span class='button'><input type='submit' value='Add' name='submit'/></span> 	</form></div>";
					}
				}
				else{
					header("Location:welcomes.php");
				}
			 ?>
		</div>
	</body>
</html>