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
     <form action="signupsvc.php" method="post">
        
        <div class="container">
            <label for="username" data-icon="u"><b>Center Id</b></label>
            <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com"/><br>
         
            <label for="password" data-icon="p"><b>Password</b></label>
            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/><br> 
        
            <button type="submit" name="submit" value="login">Login</button><br>
        </div>
     </form>
     </body>
     </html>
     