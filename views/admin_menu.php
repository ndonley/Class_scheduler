<?php
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: admin_menu.php
Description: admin menu 
*/

	include 'header.php'; 
	
	// connect to database
	$conn = mysql_connect("localhost", "admin", "password");

	if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
	}

	if (!mysql_select_db("class_scheduler")) {
    echo "Unable to select class_scheduler: " . mysql_error();
    exit;
	}
	
	// find all data for tables
	$sql = "SELECT * FROM cs_students";
	$student_result = mysql_query($sql);

	$sql = "SELECT * FROM cs_teachers";
	$teacher_result = mysql_query($sql);
	
	$sql = "SELECT * FROM cs_classes";
	$class_result = mysql_query($sql);
	?>

	<h1>Administration Menu</h1>
	
	<p>Welcome <?php echo $user_name; ?> <a href="index.php?action=logout" class="ui-btn-right">Logout</a></p>
	
	<div data-role="collapsible">
	<h3>Search</h3>
	<form action="" method="post"> 
	Search by student's name: 
	<input type="text" name="term" required><br /> 
	<input type="submit" value="Search" > 
	</form> 
	
	</div>
	
	<?php
	
	//search function
	if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $name=$_POST['name']; 
	  //connect  to the database 
	  $db=mysql_connect  ("localhost", "admin",  "password") or die ('I cannot connect to the database  because: ' . 		mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("class_scheduler"); 
	  //-query  the database table 
	  $sql="SELECT student_id, student_firstname, student_lastname FROM cs_students WHERE student_firstname LIKE '%" . $name .  "%' OR student_lastname LIKE '%" . $name ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
	  //-create  while loop and loop through result set 
	  while($row=mysql_fetch_array($result)){ 
	        $FirstName  = $row['student_firstname']; 
			$LastName= $row['student_lastname']; 
	        $ID= $row['student_id']; 
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n"; 
	  echo "</ul>"; 
	  } 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  } 
	
	?>
	
	<div data-role="collapsible">
	<h3>Students</h3>
	<table>
	<?php while ($rows = mysql_fetch_assoc($student_result)) { ?>
	<tr>
		<td><?php echo $rows['student_id']; ?></td>
		<td><?php echo $rows['student_firstname']; ?></td>
		<td><?php echo $rows['student_lastname']; ?></td>
		<td><?php echo $rows['student_email']; ?></td>
		<td><?php echo $rows['student_date_of_birth']; ?></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	
	<div data-role="collapsible">
	<h3>Teachers</h3>
	<table>
	<?php while ($rows = mysql_fetch_assoc($teacher_result)) { ?>
	<tr>
		<td><?php echo $rows['teacher_id']; ?></td>
		<td><?php echo $rows['teacher_firstname']; ?></td>
		<td><?php echo $rows['teacher_lastname']; ?></td>
		<td><?php echo $rows['teacher_email']; ?></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	
	<div data-role="collapsible">
	<h3>Classes</h3>
	<table>
	<?php while ($rows = mysql_fetch_assoc($class_result)) { ?>
	<tr>
		<td><?php echo $rows['class_id']; ?></td>
		<td><?php echo $rows['class_name']; ?></td>
		<td><?php echo $rows['class_code']; ?></td>
		<td><?php echo $rows['class_start_time']; ?></td>
		<td><?php echo $rows['class_end_time']; ?></td>
		<td><?php echo $rows['teacher_id']; ?></td>

	</tr>
	<?php } ?>
	</table>
	</div>
	
	
	<div data-role="collapsible">
	<h3>Additions</h3>
	<form action="" method="post">
	<p>Add a new Student:</p>
	First Name
	<input type="text" name="student_firstname" required>
	Last Name
	<input type="text" name="student_lastname" required>
	Student Email
	<input type="text" name="student_email" required>
	Student Date of Birth
	<input type="date" name="student_date_of_birth" required>
	Student ID Number
	<input type="number" name="student_id" required>
	
	<div class="g-recaptcha" data-sitekey="6LefaQYTAAAAAAwFwi4UBU8lBOpbG7X_41eihEey"></div>
	<input type="submit" value="submit">
	</div>
	
	
<?php include 'footer.php'; ?>