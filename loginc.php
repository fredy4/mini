    <?php session_start(); ?>
    <!DOCTYPE html>
    <html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover">
    <head>
    	<title>MSI</title>
        <link rel="stylesheet" type="text/css" href="css/lgnn.css">
    	<?php 
    	if(isset($_SESSION["log"])){
    	 if($_SESSION["log"]==1&&$_SESSION["type"]=="c")
    	   header("Location: welcome.php");
    	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="co")
    	   header("Location: welcomeco.php");
    	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="shp")
    	   header("Location: welcomeshp.php");
    	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="svc")
    	   header("Location: welcomesvc.php");
        
    	}	
    	?>
    </head>
    <body>
     <form action="signupc.php" method="post">
         <?php
         if(isset($_SESSION["log"]))
        if($_SESSION["log"]==0)
            echo "<p>Previous attempt for login has failed</p>";
        if(isset($_SESSION["vemail"]))
        if($_SESSION["vemail"]==1)
         {
             echo "<p>password has been sent to the email address </p>";
             $_SESSION["vemail"]=2;
          }
                              
         ?> 

    <div class="container">
    <label for="username" data-icon="u"><b>Username</b></label>
    <input id="username" type="text" placeholder="eg:abc@xyz.com" name="username" required="required"><br>

    <label for="password" data-icon="p"><b>Password</b></label>
    <input id="password" type="password" placeholder="eg:X8df!90E0" name="password" required="required"><br>
        
    <button type="submit" name="submit" value="login">Login</button><br>
    
  </div> 

   <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="resetpw.php">password?</a></span>
  </div>
 </form>
</body>
</html>