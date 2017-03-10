<?php
session_start();?>
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
//create_topic.php
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

?>
<div id="contents">
<?php
echo '<div id=head>Create a topic</div>';
echo '<h2>';
if(!isset($_SESSION['log']))
{
	//the user is not signed in
	echo 'Sorry, you have to be <a style="color:blue;" href="login.php">signed in</a> to create a topic.';
}
else
{
	//the user is signed in
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{	
		//the form hasn't been posted yet, display it
	
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			//the query failed, uh-oh :-(
			echo 'Error while selecting from database. Please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				//there are no categories, so a topic can't be posted
				if($_SESSION['user_level'] == 1)
				{
					echo 'You have not created categories yet.';
				}
				else
				{
					echo '';
				}
			}
			else
			{
		
				echo '<div style=" margin-top:30px; margin-left:30px; padding-left:150px;">';
				echo '<h2><form  method="post" action="">
					Subject: <input type="text" required="required" name="topic_subject" /><br />
					Category:</h2>'; 

				
				
				echo '<select name="topic_cat">';
					while($row = mysql_fetch_assoc($result))
					{
						echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
					}
				echo '</select><br />';	
						
				echo 'Message: </style><br /><textarea id="reply2" name="post_content" required="required" /></textarea><br /><br />
					<input style="margin-left:450px; top:30px;" type="submit"  value="Create topic" /> </style>
				 </form>';
				 echo'</div>';
			}
		}
	}
	else
	{
		//start the transaction
		$query  = "BEGIN WORK;";
		$result = mysql_query($query);
		
		if(!$result)
		{
			//Damn! the query failed, quit
			echo 'An error occured while creating your topic. Please try again later.';
		}
		else
		{
	
			//the form has been posted, so save it
			//insert the topic into the topics table first, then we'll save the post into the posts table
			$sql = "INSERT INTO 
						topics(topic_subject,
							   topic_date,
							   topic_cat,
							   topic_by)
				   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
							   NOW(),
							   '" . mysql_real_escape_string($_POST['topic_cat']) . "',
							   '" . $_SESSION['id'] . "'
							   )";
					 
			$result = mysql_query($sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'An error occured while inserting your data. Please try again later.<br /><br />' . mysql_error();
				$sql = "ROLLBACK;";
				$result = mysql_query($sql);
			}
			else
			{
				//the first query worked, now start the second, posts query
				//retrieve the id of the freshly created topic for usage in the posts query
				$topicid = mysql_insert_id();
				
				$sql = "INSERT INTO
							posts(post_content,
								  post_date,
								  post_topic,
								  post_by)
						VALUES
							('" . mysql_real_escape_string($_POST['post_content']) . "',
								  NOW(),
								  '" . $topicid . "',
								  '" . $_SESSION['id'] . "'
							)";
				$result = mysql_query($sql);
				
				if(!$result)
				{
					//something went wrong, display the error
					echo 'An error occured while inserting your post. Please try again later.<br /><br />' . mysql_error();
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					
					//after a lot of work, the query succeeded!
					echo 'You have succesfully created <a style="color:blue;"href="topic.php?id='. $topicid . '">your new topic</a>.';
				}
			}
		}
	}
}
?>
</div>
</div>
</body>
</html>
