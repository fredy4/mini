    <?php session_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>MSI</title>
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
     <form action="signup.php" method="post">
     	<h1>Log In</h1>
     	<p>
            <label for="username" data-icon="u" > Your username</label>
            <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com" value="fredybaby9@gmail.com" />
        </p>
        <p> 
            <label for="password" data-icon="p"> Your password </label>
            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" value="elshaddai" /> 
        </p>
         <p class="login button"> 
            <input type="submit" name="submit" value="login" /> 
    	</p>
     </form>
     <form  action="signup.php" autocomplete="on" method="post"> 
        <h1> Sign up </h1> 
        <p> 
            <label for="username" data-icon="u">Your email</label>
            <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com" />
        </p>
    	<p>
    		<label for="name" data-icon="u"> Enter your name</label>
    		<input id="name" name="name" required="required" type="text" placeholder="eg:Johny" />
    	<p>
         <label for="state" data-icon="u"> Enter your State </label>
            <select name="state">
               <option>Select your State</option>
                <option>Andra Pradesh</option>
                <option>Arunachal Pradesh</option>
                <option>Assam </option>
                <option>Bihar</option>
                <option>Chhattisgarh </option>
                <option>Goa </option>
                 <option>Gujarat</option>
                 <option>Haryana</option>
                 <option>Himachal Pradesh</option>
                 <option>Jammu and Kashmir</option>
                 <option>Jharkhand</option>
                 <option>Karnataka</option>
                 <option>Kerala</option>
                 <option>Madya Pradesh</option>
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
            </select>
        <p>
            <label for="city" data-icon="u"> Enter your City </label>
            <input id="city" name="city" required="required" type="text" placeholder="eg:COCHIN"/>
        </p>
        <p>
    		<label for="address" data-icon="u"> Enter your Address </label>
            <input id="address" name="address" required="required" type="text" placeholder="eg:David villa"/> 
        </p>
         
    	<p>
    		<label for="mno" data-icon="u">Enter your Mobile No</label>
    		<input id="mno" name="mno" required="required" type="text" placeholder="eg:0123456789"/>
    	</p>

        <p> 
            <label for="password"  data-icon="p">Your password </label>
            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
        </p>
        <p> 
            <label for="passwordsignup_confirm"  data-icon="p">Please confirm your password </label>
            <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
        </p>
        <p class="signin button"> 
    		<input type="submit" name ="submit" value="register"/> 
    	</p>
    </form>

    </body>
    </html>