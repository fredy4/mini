<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/demo.css"/>
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
	<link rel="stylesheet" type="text/css" href="css/styleteam.css"/>
  <script src="jquery.js"></script>
	<title>Team</title>
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

  <script>

    $(document).ready(function(){
      $("#task li").click(function(){
        var name=$(this).text();
        $.get("sactiv.php?name="+name,function(data,status){
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
<?php include("sheader.php");
?>
  <div id="contents">
    <div id="head">
  	<?php
  	   $sql=mysql_connect("localhost","root","");
       if(!$sql)
  	     {
	      die("Couldn't connect".mysql_error());
	     }
       mysql_select_db("project",$sql);
       $id=$_SESSION["id"];


       if(isset($_POST["submitg"])){
        $ttd=$_POST["gid"];
          mysql_query("UPDATE teaminfo SET tstatus='pn' WHERE tid='$ttd'");
        
       }
       
//adding team,member and joining team
       if(isset($_POST["submit"])){
        if($_POST["submit"]=="Make team"){
          $nm=$_POST["tname"];
          $claas=mysql_query("SELECT class FROM STUDENT WHERE id='$id'");
          $claas1=mysql_fetch_array($claas);
          $cls=$claas1["class"];
          $cl=mysql_query("SELECT count(tname) AS num FROM teaminfo JOIN student on teaminfo.leader=student.id WHERE student.class='$cls'");
          $cl1=mysql_fetch_array($cl);
          $td=$cl1["num"]+1;
          $ckk=mysql_query("SELECT tid from teaminfo WHERE tname='$nm' AND leader='$id'");
          $ckkk=mysql_fetch_array($ckk);
          if(!$ckkk){
          mysql_query("INSERT INTO teaminfo (tid,tname,leader,tstatus) VALUES ('$td','$nm','$id','nt')");
          mysql_query("INSERT INTO team VALUES ('$td','$id','$id','la')");
          } 
        }
        elseif($_POST["submit"]=='Add'){
          $nm=mysql_query("SELECT tid FROM teaminfo where leader='$id'");
          $nm1=mysql_fetch_array($nm);
          $td=$nm1["tid"];
          $rid=$_POST['rid'];
          $ckk=mysql_query("SELECT * FROM team where tid='$td' AND leader='$id' AND member='$rid' AND (status='lr' OR status='ma' OR status='la')");
          $ckkk=mysql_fetch_array($ckk);
          if(!$ckkk){
           $chk=mysql_query("SELECT * FROM team where tid='$td' AND leader='$id' AND member='$rid' AND status='mr'"); 
           $chkk=mysql_fetch_array($chk);
           if($chkk){
            $ct=mysql_query("SELECT count(tid) AS count FROM team where tid='$td' AND leader='$id' AND (status='la' OR status='ma')");
            $ctt=mysql_fetch_array($ct);
            if($ctt["count"]<4){
              mysql_query("UPDATE team SET status='ma' WHERE leader='$id' AND member='$rid'");
              mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$rid','tla','$id','team.php')");
            }
           }
            
          else{
            mysql_query("INSERT INTO team VALUES ('$td','$id','$rid','lr')");
            mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES('$rid','tlr','$id','team.php')");
          }
          }
       }
       elseif ($_POST["submit"]=="Join") {
          $td=$_POST["tid"];
          $lid=$_POST["ld"];
          $ckk=mysql_query("SELECT * FROM team where tid='$td' and leader='$lid' and member='$id' and (status='mr' OR status='la' or status='ma')");
          $ckkk=mysql_fetch_array($ckk);
          if(!$ckkk){
           $chk=mysql_query("SELECT * FROM team where tid='$td' AND leader='$lid' AND member='$id' AND status='lr'"); 
           $chkk=mysql_fetch_array($chk);
           if($chkk){
            $ct=mysql_query("SELECT count(tid) AS count FROM team where tid='$td' AND leader='$lid' AND (status='la' OR status='ma')");
            $ctt=mysql_fetch_array($ct);
            if($ctt["count"]<4){
              mysql_query("UPDATE team SET status='la' WHERE leader='$lid' AND member='$id'");
              mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$lid','tma','$id','team.php')");
            }
           }
          else{
            mysql_query("INSERT INTO team VALUES ('$td','$lid','$id','mr')");
            mysql_query("INSERT INTO notifications (id,type,fid,link) VALUES ('$lid','tmr','$id','team.php')");

          }
        }
      }
    }   

//submitting activities

      if(isset($_POST["submit"])) {
        if($_POST["submit"]=="submit"){
  
          $allowedExts = array("pdf");
          $temp = explode(".", $_FILES["file"]["name"]);
          $extension = end($temp);
          if ((($_FILES["file"]["type"] == "application/pdf"))
          && ($_FILES["file"]["size"] < 20000000))
          {
            if ($_FILES["file"]["error"] > 0)
              {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
              }
            else
              {
                /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/
                $folder = "./uploads/"; 
                if(!is_dir($folder)) mkdir($folder);

                if (file_exists($folder . $_FILES["file"]["name"]))
                  {
                    echo "<span style='color:red; font-size:18px; background:yellow; font-family:Arial'>Rename your file and submit again<br></span>";
                  }
                else
                  {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    $folder. $_FILES["file"]["name"]);
                    $td=$_POST["group"];
                    $akt=$_POST["actv"];
                    $type=$_POST["type"];
                    $cls=$_POST["clas"];
                    $batch=$_POST["batch"];
                    $nam=$_FILES["file"]["name"];
                    
                    echo "<span style='color:red; font-size:18px; background:yellow; font-family:Arial'>File uploaded successfully</span><br>";
                    mysql_query("INSERT INTO activities (name,tid,type,dept,batch,value) VALUES ('$akt','$td','$type','$cls','$batch','$nam') ");
                  }
               }
         }
          else
            {
                echo "Invalid file";
                  
            }          
          
        }
        elseif($_POST["submit"]=="Send"){
          $td=$_POST["group"];
                  $akt=$_POST["actv"];
                  $type=$_POST["type"];
                  $cls=$_POST["clas"];
                  $batch=$_POST["batch"];
                  $nam=$_POST["content"];
                  $title=$_POST["title"];
                  echo $cls;
                  echo "<span style='color:red; font-size:18px; background:yellow; font-family:Arial'>Sent successfully</span><br>";
                  mysql_query("INSERT INTO activities (name,tid,type,dept,batch,value,title) VALUES ('$akt','$td','$type','$cls','$batch','$nam','$title') ");

        }
      }

       $con=mysql_query("SELECT * FROM team JOIN teaminfo ON team.leader=teaminfo.leader WHERE team.leader='$id'");
       $cka=mysql_fetch_array($con);
       $cont=mysql_query("SELECT * FROM team RIGHT JOIN teaminfo ON team.leader=teaminfo.leader WHERE team.member='$id' AND (team.status='la' OR team.status='ma')" );
       $ckt=mysql_fetch_array($cont);
       if($cka){
        $tid=$cka["tid"];
        echo $cka["tname"];
        if($cka["tstatus"]=='nt')
        echo "<br><br><form method='post' action='team.php'> <input type='hidden' name='gid' value='$tid'><input name='submitg' type='submit' value=Submit group></form>";
       }
       elseif ($ckt) {
        echo $ckt["tname"];
        $ld=$ckt["leader"];
       }
       else{
        echo "You haven't formed team yet!";
       }
      ?>
      
    </div>
    <div id="members"> 
      <?php
        if($cka){
          echo "<span id='h'>Members<br></span>";
          echo "<div class='memb'>";
          echo "<ul>";
          $mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$id' AND (team.status='la' OR team.status='ma') AND member!='$id' ");
          while($me1=mysql_fetch_array($mem)) 
          {
            echo "<li>".$me1["name"]."</li>";
          }
          echo "</ul></div>";
          echo "<div class='memb'><h2>Request sent</h2>";
          echo "<ul>";
          $mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$id' AND team.status='lr'");
          while($me1=mysql_fetch_array($mem))
          {
            echo "<li>".$me1["name"]."</li>";
          }
          echo "</ul></div>";
          echo "<div class='memb'<h2> Request recieved</h2>";
          $mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$id' AND team.status='mr'");
          while($me1=mysql_fetch_array($mem)){
            echo "<li>".$me1["name"]."</li>";
          }
          echo "<ul></div>";
          echo "<div class='membe'><h2>Add more members</h2>";
          echo "<form method='post' action='searchf.php'><input type='text' placeholder='Enter name' name='add'/>";
          echo "<span class='button'><input type='submit' value='Find friend' name='submit'/></span></form></div>";
        }
        elseif ($ckt) {
          echo "<span id='h'>Members<br></span>";
          echo "<div class='memb'>";
          echo "<ul>";
          $mem=mysql_query("SELECT * FROM team JOIN student ON team.member=student.id WHERE leader='$ld' AND (team.status='la' OR team.status='ma') AND team.member!='$id'");
          while($me1=mysql_fetch_array($mem))
          {
            echo "<li>".$me1["name"]."</li>";
          }
          echo "</ul></div>";
        }
        else
        {         
          echo "<span id='h'>Team formation<br></span>";
          echo "<div class='membe'>";
          echo "<form action='team.php' method='post'/><input type='text' name='tname' required='required' placeholder='Team name'>";
          echo "<span class='button'><input type='submit' value='Make team' name='submit'/></span>";
          echo "</form></div>";
          echo "<div class='membe'>";
          echo "<form action='searchf.php' method='post'><input type='text' name='findg' placeholder='Team name'/>";
          echo "<span class='button'><input type='submit' value='Find team' name='submit'/></span><form></div>";
          
        }
      ?>
    </div>
    <div id="task">
      <?php
       
       echo "<div class='activ'><span id='h'>Activities</span>";
       $cls=mysql_query("SELECT class FROM student where id='$id'");
       $cls1=mysql_fetch_array($cls);
       $class=$cls1["class"];
       $tsk=mysql_query("SELECT * FROM actlist WHERE class='$class'");
       echo "<ul>";
       while($tsk1=mysql_fetch_array($tsk)){
        $act=$tsk1["actname"];
        echo "<li class='modal' rel='#modals'>".$act."</li>";
       }
       echo "</ul></div>  ";
       
       ?>

    </div>
  </div>
  <?php include("footer.php"); ?>
  <div class="modalbox" id="modals">
   <div> </div>
  </div>
</body>
</html>
