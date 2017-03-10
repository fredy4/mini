
<div class="topbar">
	<header><h1>Project Manager</h1></header>
	<div id="cssmenu" style="float:left">
		<ul>
			<li> <a href="welcomes.php">Home</a></li>
			<li> <a href="team.php">Team</a>
			</li>
				
			<li> <a href="forum.php"> Forum </a></li>
		</ul>
	</div>
	<div id="cssmenu" style="float:right;font-size:11px;">
		<ul>
		    <li> <a href="#"><?php echo "Hi, ".$_SESSION["name"];?>
			    <ul>
					<li> <a href="#"> Profile</a></li>
					<li> <a href="#"> Messages</a></li>
					<li> <a href="logout.php">Log out</a></li>
				</ul>
			</li>
		 </ul>
	</div>
</div>		