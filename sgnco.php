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
     <form action="signupco.php"  autocomplete="on" method="post">
     
     <div class="container">
        <label for="username" data-icon="u"><b>Company Name</b></label>
        <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com"/><br>

        <label for="email" data-icon="u"><b>Company Email Id</b></label>
        <input id="email" name="email" required="required" type="text" placeholder="eg:0123456789"/><br>

        <label for="password"  data-icon="p"><b>Password</b></label>
        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/><br>

        <label for="passwordsignup_confirm"  data-icon="p"><b>Confirm Password</b></label>
        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="text" placeholder="eg. X8df!90EO"/><br>

        <button type="submit" name="submit" value="register">Sign Up</button><br>
     </div>
     </form>
    </body>
</html>
       
        
        



