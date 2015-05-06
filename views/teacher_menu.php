<?php 
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: teacher_menu.php
Description: Creates teacher page
*/

	include 'header.php'; 
	
	// log into server
	$conn = mysql_connect("localhost", "admin", "password");

	if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
	}

	if (!mysql_select_db("class_scheduler")) {
    echo "Unable to select class_scheduler: " . mysql_error();
    exit;
	}
	
	// creates user's classes
	$sql = "Select cs_classes.class_id, cs_classes.class_name, cs_classes.class_code, cs_classes.class_start_time, cs_classes.class_end_time
    FROM cs_classes
	INNER JOIN cs_teachers
	on cs_classes.teacher_id = cs_teachers.teacher_id 
    INNER JOIN cs_users
    on cs_users.user_id = cs_teachers.teacher_id
	Where cs_users.user_name = '$user_name' ";
	$teacher_classes = mysql_query($sql);
	
?>
	<h1>Teacher Menu</h1>
	
	<p>Welcome <?php echo $user_name; ?> <a href="index.php?action=logout" class="ui-btn-right">Logout</a></p>

	<div id='calendar'></div>
	
	<div data-role="collapsible">
	<h3>Classes</h3>
	<table>
	<?php while ($rows = mysql_fetch_assoc($teacher_classes)) { ?>
	<tr>
		<td><?php echo $rows['class_id']; ?></td>
		<td><?php echo $rows['class_name']; ?></td>
		<td><?php echo $rows['class_code']; ?></td>
		<td><?php echo $rows['class_start_time']; ?></td>
		<td><?php echo $rows['class_end_time']; ?></td>
	</tr>
	<?php } ?>
	</table>
	</div>

<?php include 'footer.php'; ?>