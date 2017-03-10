<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
<?php
	unset($_SESSION["log"]);
	unset($_SESSION["id"]);
	unset($_SESSION["name"]);
	unset($_SESSION["type"]);
	header("Location: index.php");
?>
</body>
</html>