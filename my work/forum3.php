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
include 'sheader.php';
?>
 <div id="contents">
 <div id="head"> welcome to the forum</div>
<!--<a class="item" href="../19-03-14/create_topic.php">Create a topic</a>-->	 
 <?
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
				

               
			  
		<?
		while($row = mysql_fetch_assoc($result))
		{				
			?>
			<ul> 
			<li style="border-top: 1px solid #FFFFFF;border-bottom: 1px solid #8f8f8f;>"></li>
            <dl class="icon" style="background-image: url(../19-03-14/images/ficon.gif); background-repeat: no-repeat;"></dl></ul>
            
					<!--<dt style="float:left;padding-top:5px;">
					<?echo '<a style="color:#0033CC;" href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a>' ;
					echo $row['cat_description'];?>
					<dd style="padding-top:5px;padding-left:510px">
				

				<?
				
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
							echo '<a style="color:#0033CC;" href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						?>
						</dd>
						</dt>
						
</dl>
</li>
</ul>-->
<?						}
				}	
		}
	}
}
?>

</div>
</div>
</div>
</body>
</html>