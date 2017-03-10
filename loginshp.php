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
             <form action="signupshp.php" method="post">
             	<h1>Log In</h1>
             	<p>
                    <label for="username" data-icon="u" > Shop id</label>
                    <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com"/>
                </p>
                <p> 
                    <label for="password" data-icon="p"> Shop password </label>
                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                </p>
                 <p class="login button"> 
                    <input type="submit" name="submit" value="login" /> 
            	</p>
             </form>
             <form  action="signupshp.php" autocomplete="on" method="post"> 
                <h1> Sign up </h1> 
                <p> 
                    <label for="username" data-icon="u">Shop id</label>
                    <input id="username" name="username" required="required" type="text" placeholder="eg:abc@xyz.com" value = "fredy@gmail.com"/>
                </p>
            	<p>
            		<label for="name" data-icon="u"> Shop name</label>
            		<input id="name" name="name" required="required" type="text" placeholder="eg:Johny" value = "Fredy"/>
            </p>
            	<p>
                 <label for="state" data-icon="u"> Shop State </label>
                    <select name="state" value = "kerala">
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
                    <label for="city" data-icon="u"> Shop City </label>
                    <input id="city" name="city" required="required" type="text" placeholder="eg:COCHIN" value = "cochin"/>
            		<label for="address" data-icon="u"> Shop Address </label>
                    <input id="address" name="address" required="required" type="text" placeholder="eg:David villa" value = "chirayil"/>  
            	<p>
            		<label for="mno" data-icon="u">Shop number</label>
            		<input id="mno" name="mno" required="required" type="text" placeholder="eg:0123456789" value = "098765876"/>
            	</p>

                <p>
                    <label for="email" data-icon="u">Shop mail id</label>
                    <input id="email" name="email" required="required" type="text" placeholder="eg:kkk@xyz.com" value = "098765876"/>
                </p>
                <p>
                    <label for="level" data-icon="u">Level</label>
                    <input id="level" name="level" required="required" type="text" placeholder="eg:1 for top level, 2 for next and so on"/>
                </p>
                <p> 
                    <label for="password"  data-icon="p">Shop password </label>
                    <input id="password" name="password" required="required" type="text" placeholder="eg. X8df!90EO" value ="1234"/>
                </p>
                <p> 
                    <label for="passwordsignup_confirm"  data-icon="p">Please confirm  password </label>
                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="text" placeholder="eg. X8df!90EO" value = "1234"/>
                </p>
                <p class="signin button"> 
            		<input type="submit" name ="submit" value="register"/> 
            	</p>
            </form>

            </body>
            </html>