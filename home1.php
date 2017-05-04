<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>MSI</title>
<link rel="stylesheet" type="text/css" href="css/navs.css">
<link rel="stylesheet" type="text/css" href="css/lgn.css">
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
<div class="topnav" id="myTopnav">
  <a href="#home">Home</a>
  <a href="#about">About</a>
  <a style="float:right" href="#contact">Contact</a>
  <a style="float:right;width:auto" onclick="document.getElementById('id02').style.display='block'">Signup</a>
  <a style="float:right;width:auto" onclick="document.getElementById('id01').style.display='block'">Login</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="signup.php" method="post">
   <div class="container">
      <label for="username" data-icon="u"><b>Username</b></label>
      <input id="username" type="text" placeholder="Enter Email" name="username" required="required">

      <label for="password" data-icon="p"><b>Password</b></label>
      <input id="password" type="password" placeholder="Enter Password" name="password" required="required">
      <button type="submit" name="submit" value="login" href="welcome.php">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="width:auto">Cancel</button>
      <span class="psw"><a href="#">Forgot password?</a></span>
    </div>
  </form>
</div>
<!--<div style="padding-left:16px">
  <h2></h2>
  <p></p>
</div>-->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" style="right:35px;top:15px;font-size:40px" title="Close Modal">×</span>
  <form class="modal-content animate" action="signup.php" method="post">
    <div class="container">
      <label for="username" data-icon="u"><b>Email</b></label>
      <input id="username" name="username" required="required" type="text" placeholder="Enter email" />
 
      <label for="name" data-icon="u"><b>Name</b></label>
      <input id="name" name="name" required="required" type="text" placeholder="eg:Johny" />
      
      <label for="state" data-icon="u"><b>State</b></label>
      <select name="state">
               <option>Select your State</option>
                <option>Andhra Pradesh</option>
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
        </select>
        
        <li><label for="city" data-icon="u">City</label>
        <input id="city" name="city" required="required" type="text" placeholder="eg:COCHIN"/></li>
        
        <label for="address" data-icon="u">Address</label>
        <input id="address" name="address" required="required" type="text" placeholder="eg:David villa"/> 
        
        <label for="mno" data-icon="u">Mobile No</label>
        <input id="mno" name="mno" required="required" type="text" placeholder="eg:0123456789"/>
            
        <label for="password"  data-icon="p">Password</label>
        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
         
        <label for="passwordsignup_confirm"  data-icon="p">Confirm Password </label>
        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
      
     <input type="checkbox" checked="checked">Remember me
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="submit" name="submit" value="signup" class="signupbtn" style="float:left;width:50%" href="signup.php">Sign Up</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" style="padding:14px 20px;float:left;width:50%">Cancel</button>
      </div>
    </div>
  </form>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
var modal = document.getElementById('id01,id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
