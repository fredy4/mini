<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> Project Management </title>
 <link rel="stylesheet" type="text/css" href="css/styleforum3.css" /> 
 <link rel="stylesheet" type="text/css" href="css/styleforum.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
 <link rel="stylesheet" type="text/css" href="css/stylewels.css" />

  </head>
  <body>
  
<?php
//create_cat.php
include 'connect.php';
if (isset($_SESSION['type'])) 
{
	if($_SESSION['type']=='t')
	include 'theader.php';
	if($_SESSION['type']=='s')
	include 'sheader.php';
}
else
include 'iheader.php';


$_SESSION['cnt']=1;

?>
<div id="contents">
<div id="head">
<?php

$sql = "SELECT
			topic_id,
			topic_subject
		FROM
			topics
		WHERE
			topics.topic_id = " . mysql_real_escape_string($_GET['id']);			
$result = mysql_query($sql);



if(!$result)
{
	echo 'The topic could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This topic doesn&prime;t exist.';
	}
	else
	{
		while($row = mysql_fetch_assoc($result))
		{
			
			//display post data			
				
						echo $row['topic_subject'];
						?>


</div>


			<?php
		
			//fetch the posts from the database
			$posts_sql = "SELECT
						posts.post_topic,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						student.id,
						student.name
					FROM
						posts
					LEFT JOIN
						student
						
												
					ON
						posts.post_by = student.id 
						

					WHERE
						posts.post_topic = " . mysql_real_escape_string($_GET['id']);
						
			$posts_result = mysql_query($posts_sql);
			
			if(!$posts_result)
			{
				echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
			}
			else
			{
							
				while($posts_row = mysql_fetch_assoc($posts_result))
				{	    $tchr=$posts_row['name'];
						if($_SESSION['cnt']==1){
					?>		<div id="ftopic">
							<li>
							<div class="egg_Body">
							<h3 class="egg_Message" >
							<div id="name">  

								<?php //if(is_null($posts_row['name'])) echo "teacher"; ?>

								<?php if($tchr === NULL) echo "teacher"; ?>

								<?php echo $posts_row['name'];?>
								<br></div>
							<img src="<?php //echo $posts_row['pic'];?>" /><span><?php echo htmlentities(stripslashes($posts_row['post_content'])),'<br>',
								date('d-m-Y H:i', strtotime($posts_row['post_date'])); ?></span></h3></div></li></div>
								
			  				
			  				
						
							 <!--echo $posts_row['name'], date('d-m-Y H:i', strtotime($posts_row['post_date'])),
							 htmlenti	ties(stripslashes($posts_row['post_content'])) -->
					<?php	
					$_SESSION['cnt']++;
				}
					else
					{?>
						<ol >
							<li class="egg" style="bottom:20px;">
							<div class="egg_Body">
							<h3 class="egg_Message" >
							<div id="name"><?php  if( $posts_row['name'] === NULL) echo "Teacher"; 
							 echo $posts_row['name'];?><br></div>
							<img src="<?//php echo $posts_row['pic'];?>" /><span><?php echo htmlentities(stripslashes($posts_row['post_content'])),'<br>',
								date('d-m-Y H:i', strtotime($posts_row['post_date'])); ?></span></h3></div></li>
								<?php //echo $posts_row['name'];
						echo '</ol>';
					}
				 
						  
				}
				//echo '</table>';
			}
			
			//if(!$_SESSION['log'])
			if(!isset($_SESSION['log']))
			{
				echo 'You must be <a  style="color:blue;" href="login.php">signed in</a> to reply..';
			}
			else
			{
				?>
					<ol>
					<form method="post" action="reply.php?id=<?php echo $row['topic_id'];?>">
						<textarea id ="reply" name="reply-content" required="required"></textarea><br /><br />
					 	<input type="submit" value="reply" /> 
					</form></ol>

						<?php
			}
			
			
		}
	}
}

?>
</div>
</body>
</html>