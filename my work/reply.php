<?php
//create_cat.php
include 'connect.php';
include 'header.php';
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//someone is calling the file directly, which we don't want
	echo 'This file cannot be called directly.';
}

else
{
	//check for sign in status
	if(!$_SESSION['log'])
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						'" . mysql_real_escape_string($_GET['id']) . "',
						'" . $_SESSION['id'] . "')";
						
		$result = mysql_query($sql);
		$id=$_GET['id'];
		header("location:topic.php?id=$id");

						
		/*if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}*/
	}
}

?>