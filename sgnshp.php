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
     <form action="signup.php"  autocomplete="on" method="post">
        <!--<h1>Log in </h1> <font color="red">-->
     

         <div class="container">
         
                <label for="username" data-icon="u"><b>Shop Id</b></label>
                <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com"/><br>
                
            	<label for="name" data-icon="u"><b>Shop Name</b></label>
            	<input id="name" name="name" required="required" type="text" placeholder="eg:Johny"/><br>
            
                <label for="nationality"><b>Country</b></label>
                <input id="nationality" name="nationality" required="required" type="text" value="India"/><br>
            
            	
                <label for="state" data-icon="u"><b>State</b></label>
                    <select name="state" value="kerala">
                       <option>select your state</option>
                        <option>Andhra Pradesh</option>
                        <option>Arunachal Pradesh</option>
                        <option>Assam </option>
                        <option>Bihar</option>
                        <option>Chattisgarh </option>
                        <option>Goa </option>
                         <option>Gujarat</option>
                         <option>Haryana</option>
                         <option>Himachal Pradesh</option>
                         <option>Jammu and Kashmir</option>
                         <option>Jharkhand</option>
                         <option>Karnataka</option>
                           <option>Kerala</option>
                         <option>Madhya Pradesh</option>
                         <option>Maharashtra</option>
                         <option>Manipur</option>
                         <option>Meghalaya</option>
                         <option>Mizoram</option>
                         <option>Nagaland</option>
                         <option>Orissa</option>
                         <option>Punjab</option>
                         <option>Rajasthan</option>
                         <option>Sikkim</option>
                         <option>Tamil Nadu</option>
                         <option>Telangana</option>
                         <option>Tripura</option>
                         <option>Uttaranchal</option>
                         <option>Uttar Pradesh</option>
                         <option>West Bengal</option>
                    </select><br>
                    
                    <label for="dist" data-icon="u"><b>District</b></label>
                    <select  name="district" value="alappuzha">
                       <option>select your district</option>
                        <option>Alappuzha</option>
                        <option>Ernakulam</option>
                        <option>Idukki </option>
                        <option>Kannur</option>
                        <option>Kasaragod </option>
                        <option>Kollam </option>
                         <option>Kottayam</option>
                         <option>Kozhikode</option>
                         <option>Malappuram</option>
                         <option>Palakkad</option>
                         <option>Pathanamthitta</option>
                         <option>Thiruvananthapuram</option>
                         <option>Thrissur</option>
                         <option>Wayanad</option>
                         </select><br>
                    
            		<label for="address" data-icon="u"><b>Shop Address</b></label>
                    <input id="address" name="address" required="required" type="text" placeholder="eg:David villa"/><br>  
            	
            		<label for="mno" data-icon="u"><b>Shop Contact Number</b></label>
            		<input id="mno" name="mno" required="required" type="text" placeholder="eg:0123456789"/><br>
            	

                <!--<p>
                    <label for="level" data-icon="u">Level</label>
                    <input id="level" name="level" required="required" type="text" placeholder="eg:1 for top level, 2 for next and so on"/>
                </p>-->
                 
                    <label for="password"><b>Shop Password</b></label>
                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/><br>
                
                 
                    <label for="passwordsignup_confirm"><b>Confirm Password</b></label>
        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg.X8df!90EO"/><br>
               
                     <button type="submit" name="submit" value="register">Sign Up</button><br>
            </div>
            </form>

            </body>
            </html>
 