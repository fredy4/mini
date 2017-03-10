<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title> Project Management </title>
 <link rel="stylesheet" type="text/css" href="css/styleforum5.css" /> 
 <link rel="stylesheet" type="text/css" href="css/styleforum.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
 <link rel="stylesheet" type="text/css" href="css/stylewels.css" />

  </head>
  <body>
  
<?php
//category.php
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
//first select the category based on $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
			echo '<div id=head>Topics in &prime;' . $row['cat_name'] . '&prime; category<br/></div>';
		}
	
		//do a query for the topics
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The topics could not be displayed, please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'There are no topics in this category yet.';
			}
			else
			{ ?>
						<div id="wrap">
			<div id="page-body">
			<div class="forabg">
    		<span class="corners-top"></span>
    		<ul class="topiclist">
    		<li class="header">
        	<dl class="icon">
            <dt>      

                    Topic
                
            </dt>		
				<dd class="lastpost">
    		<span>
        	Created at
    		</span>
			</dd>
			</dl>
			</li>
			</ul>
				</div>


				
				<table border="0">					  
				<?php	
				while($row = mysql_fetch_assoc($result))
				{	?>	
					<th>		
					<tr style="border-top: 1px solid #FFFFFF;border-bottom: 1px solid #8f8f8f">
						<td class="leftpart">
							<?php echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br /><h3>';?>
						</td>
						<td class="rightparta">
							<?php echo date('d-m-Y', strtotime($row['topic_date']));?>
						</td>
					</tr><?php
				}
			}
		}
	}
}
?>
</div>
</body>
</html>
