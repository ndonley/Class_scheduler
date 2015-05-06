<?php 
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: student_menu.php
Description: Creates student page
*/
	
	include 'header.php'; 
	
	//log in
	$conn = mysql_connect("localhost", "admin", "password");

	if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
	}

	if (!mysql_select_db("class_scheduler")) {
    echo "Unable to select class_scheduler: " . mysql_error();
    exit;
	}
	
	// finding classes for user
	$sql = "Select cs_classes.class_id, cs_classes.class_name, cs_classes.class_code, cs_classes.class_start_time, cs_classes.class_end_time
    FROM cs_classes
	INNER JOIN cs_student_enrollment
	on cs_classes.class_id = cs_student_enrollment.class_id 
	Inner join cs_students
    on cs_students.student_id = cs_student_enrollment.student_id
    inner join cs_users
    on cs_students.student_id = cs_users.user_id
    where cs_users.user_name = '$user_name'";
	$student_classes = mysql_query($sql);
	
?>
	
		<h1>Student Menu</h1>
	
		<p>Welcome <?php echo $user_name; ?> <a href="index.php?action=logout" class="ui-btn-right">Logout</a></p>

	
	<div id='calendar'></div>
	
	<div data-role="collapsible">
	<h3>Classes</h3>
	<table>
	<?php while ($rows = mysql_fetch_assoc($student_classes)) { ?>
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