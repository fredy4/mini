<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> MSI </title>
      </head>
    <body>
    
	<header> <h1> MachineServiceInc </h1></header>
	
			<li><a href=index.php>&laquo; Home</a></li> <!-- &laquo is used to provide "<<" sign before Home -->
	
	
			<li><a href=login.php>Log in</a></li>

			
	
                            <form  action="resetpw.php" autocomplete="on" method="post"> 							
                                <h1>Forgot your password?</h1> <font color="red">
								 </font>
								 <?php

								
								  if(isset($_SESSION["vemail"]))
							     if($_SESSION["vemail"]==0)
							     {
							      echo "<p>No user exist in this mail id </p>";
							      	$_SESSION["vemail"]=2;
							  	}
								 ?>
							    <p>
                                    <label for="username" > Your email address </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="email address"/>
                                </p>
                               
                              
                                <p class="send button"> 
                                    <input type="submit" name="submit" value="send" /> 
								</p>
								</p>
                               
                            </form>
                        
                        </body>
          </html>-
     <?php
     		if(isset($_POST["submit"])){
			if($_POST['submit']=="send")
			{
				$email=$_POST['username'];
				mysql_connect('localhost','root','root123') or die(mysql_error);
				mysql_select_db('msi');
				$query="select * from customer where id='$email'";
				$result=mysql_query($query) or die(error);
				if(mysql_num_rows($result))
				{
					
						
						$_SESSION["vemail"]=1;
											
						$row=mysql_fetch_array($result);
						header("location:login.php");
						
				}
				else
				{
					
					$_SESSION["vemail"]=0;
					
					
				header("location:resetpw.php");
				}
			}	
		 }
	?>  