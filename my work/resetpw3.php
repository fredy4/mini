<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> MSI </title>
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
  <link rel="stylesheet" type="text/css" href="css/stylewels.css" />
   <link rel="stylesheet" type="text/css" href="css/stylehome.css"/>
   <link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
    </head>
    <body>
    <div class="topbar">
	<header> <h1> MACHINE SERVICE INC </h1></header>
	<div id ="cssmenu" style="float:left">
	<ul>
			<li><a href=index.php>&laquo; Home</a></li>
	</ul>
	</div>
	<div id="cssmenu" style="float:right"> 
	<ul>
			<li><a href=login.php>Log in</a></li>
	</ul>
	 </div>
    </div><!--topbar-->
    <div class="container">            
    <section>				
                <div id="container_demo" >
                     <!-- hidden link -->
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="resetpw3.php" autocomplete="on" method="post"> 							
                                <h1>Forgot your password?</h1> <font color="red">
								 </font>
								 <?php

								 //echo $_SESSION["vemail"];
								  if(isset($_SESSION["vemail"]))
							     if($_SESSION["vemail"]==0)
							     {
							      echo "<p>No user exist in this mail id </p>";
							      	$_SESSION["vemail"]=2;
							  	}
								 ?>
							    <p>
                                    <label for="email" data-icon="u" > Your email address </label>
                                    <input id="email" name="email" required="required" type="text" placeholder="email address"/>
                                </p>
                               
                               <!--  <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p> -->
                                <p class="send button"> 
                                    <input type="submit" name="submit" value="send" /> 
								</p>
								</p>
                                <p class="change_link"></p>
                            </form>
                        </div>
                        </div>
                        </div>
                        </section>
                        </div>
          </html>-
     <?php
     		if(isset($_POST["submit"])){
			if($_POST['submit']=="send")
			{
				$email=$_POST['email'];
				mysql_connect('localhost','root','') or die(mysql_error);
				mysql_select_db('project');
				$query="select * from student where email='$email'";
				$result=mysql_query($query) or die(error);
				if(mysql_num_rows($result))
				{
					//echo "User exist";
						
						$_SESSION["vemail"]=1;
						//echo $_SESSION["vemail"];
						//echo "string";						
						$row=mysql_fetch_array($result);
						header("location:login.php");
						//echo $row['password'];	
					//	mail($email,"reset password","hghjhghj")*/
				}
				else
				{
					
					$_SESSION["vemail"]=0;
					//echo $_SESSION["vemail"];
					
				header("location:resetpw3.php");
				}
			}	
		 }
	?>  