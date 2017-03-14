
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/navs.css">
<link rel="stylesheet" type="text/css" href="css/sp.css">
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="welcome.php">Home</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div class="main">
 <div class="alert">
  <strong>Success!</strong> Your complaint has been registered.
 </div>
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
</script>

</body>

</html>

