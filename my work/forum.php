<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> Project Management </title>
 <link rel="stylesheet" type="text/css" href="css/styleforum5.css" />
 <link rel="stylesheet" type="text/css" href="css/styleforum.css" />
 <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
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
?>
 <div id="contents">
 <div id="head"> welcome to the forum</div>
<a href="create_topic.php"><input id="ctopic" type="submit" value="Create Topic"></a>
<!--<a class="item" href="../17-03-14/create_topic.php">Create a topic</a>-->	 
 <?php

$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id";

$result = mysql_query($sql);

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{?>
		<div id="wrap">
			<div id="page-body">
			<div class="forabg">
    		<span class="corners-top"></span>
    		<ul class="topiclist">
    		<li class="header">
        	<dl class="icon">
            <dt>      

                    Categories
                
            </dt>		
				<dd class="lastpost">
    		<span>
        	Last post
    		</span>
			</dd>
			</dl>
			</li>
			</ul>
				</div>
				<table border="0">
		<?php
		while($row = mysql_fetch_assoc($result))
		{		?>

							
			<th>
			<!--<img src="../19-03-14/images/ficon.gif" />-->
			<tr style="border-top: 1px solid #FFFFFF;border-bottom: 1px solid #8f8f8f">
			
				<td class="leftpart">
				<!--<dl class="icon" style="background-image: url(../19-03-14/images/ficon.gif); background-repeat: no-repeat;">-->
					<?php echo '<h3><a style="fllat:right;"href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];?>
				</td>
				<td class="rightpart">

				<?php
				 	
				//fetch last topic for each cat
					$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . $row['cat_id'] . "
								ORDER BY
									topic_date
								DESC
								LIMIT
									1";
								
					$topicsresult = mysql_query($topicsql);
				
					if(!$topicsresult)
					{
						echo 'Last topic could not be displayed.';
					}
					else
					{
						if(mysql_num_rows($topicsresult) == 0)
						{
							echo 'no topics';
						}
						else
						{
							while($topicrow = mysql_fetch_assoc($topicsresult))
							echo '<a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						}
					}
					?>
				</td>
				</tr>				
						
			
			</th>

					
			<?php
		}

	}
}
?>
</body>
</html>