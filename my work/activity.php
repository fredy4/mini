<?php session_start(); ?>
<html>
<head>
	<title>Activity evaluation</title>
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
	<link rel="stylesheet" type="text/css" href="css/styleactivity.css">
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
     		 $(".mname li").click(function(){
        		var name=$(this).text();
        		var nam1=$(this).parents(".gname").text();
        		var nam2=nam1.charAt(5);
        		var nam3=nam1.charAt(6);
        		var nam4;
        		if(nam3<10&&nam3>=0)
        			nam4=nam2.concat(nam3);
           		else nam4=nam2;
        		$.get("activ.php?name="+name+"&id="+nam4,function(data,status){
          	 $("#modals div").html(data);
         });
       
        
      });

       $(".modal").overlay({
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
<body>
	<?php include("theader.php");?>
	<div id="contents">
		<div id="head">

			<?php
				if(isset($_GET["act"])){
					echo $_GET["act"];
					}
				else{
					header("Location:index.php");
				}
			?>

	</div>
	<div id="content">
		<?php
		$akt=$_GET["act"];
		$chek=mysql_query("SELECT type from activities WHERE name='$akt'");
		$chek1=mysql_fetch_array($chek);
		$type=$chek1["type"];

		if($type=="mulfile"){

			$cls=mysql_query("SELECT tclass from TEACHER where id='$id'");
			$cls1=mysql_fetch_array($cls);
			$cls=$cls1['tclass'];
			$pen=mysql_query("SELECT tid,id,tname,name FROM teaminfo JOIN student ON teaminfo.leader=student.id WHERE teaminfo.tstatus='ys' AND student.class='$cls' ORDER BY tid");
			$pen1=mysql_fetch_array($pen);
			if($pen1){
				echo "<h1>GROUPS</h1><hr><ul class='gname'>";
				do{
					echo "<li>Group".$pen1['tid']."-".$pen1['tname']."...by...".$pen1['name']."</li>";
					$lid=$pen1['id'];
					$tmd=$pen1["tid"];
					echo "<div class='gdetails'>Entries:<ul class='mname'>";
					$mem=mysql_query("SELECT * FROM activities WHERE tid='$tmd' AND name='$akt'");
          			while($me1=mysql_fetch_array($mem)) 
         			{
            		 echo "<li class='modal' rel='#modals'>".$me1["title"]."</li>";
          			}
          			echo "</ul></div>";
				}while($pen1=mysql_fetch_array($pen));
				echo "</ul>";
			}
		  }
		elseif ($type=="docsub") 
		{
			$cls=mysql_query("SELECT tclass from TEACHER where id='$id'");
			$cls1=mysql_fetch_array($cls);
			$cls=$cls1['tclass'];
			$pen=mysql_query("SELECT tid,id,tname,name FROM teaminfo JOIN student ON teaminfo.leader=student.id WHERE teaminfo.tstatus='ys' AND student.class='$cls' ORDER BY tid");
			$pen1=mysql_fetch_array($pen);
			if($pen1){
				echo "<h1>GROUPS</h1><hr><ul class='gname'>";
				do{ 
					echo "<li>Group".$pen1['tid']."-".$pen1['tname']."...by...".$pen1['name']."</li>";
					$lid=$pen1['id'];
					$tmd=$pen1["tid"];
					echo "<div class='gdetails'>Download:";
					$mem=mysql_query("SELECT * FROM activities WHERE tid='$tmd' AND name='$akt'");
          			$me1=mysql_fetch_array($mem);
					$nam=$me1["value"];
					$gid=$me1["tid"];
					$nm=$me1["name"];
         			echo "<a href='uploads/".$nam."'>".$nam."</a>";
         			echo "<form class='link' action='welcomet.php' method='post'><input type='hidden' name='gid' value='$gid'><input type='hidden' name='nam' value='$nm'><p><input type='text' placeholder='Enter marks' name='mrk'><input id='button' type='submit' name='submit' value='send'></p></form>";
				}while($pen1=mysql_fetch_array($pen));
				
			
		   }
		}
	
		?>
	</div>

</div>

</body>

<div class='modalbox' id='modals'>
	<div> hi
	</div>
</div>
</html>
