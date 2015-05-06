<?php 
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: login.php
Description: Login File
*/

include 'views/header.php'; 
?> 
 
            <form action="." method="post" id="login_form" data-ajax="false">
                <input type="hidden" name="action" value="login">

                <label>User Name:</label>
                <input type="text" class="text" name="user_name" required>
                <br />

                <label>Password:</label>
                <input type="password" class="text" name="password" required>
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Login">
            </form>
            
			<p><?php echo $login_message; ?></p>
			
			<h2>Testing Logins</h2>
			<p>Admin: User Name - TimMeadows, Password - adminPassword</p>
			<p>Teacher: User Name - DaveRiley, Password - teacherPassword</p>
			<p>Student: User Name - BobSmith, Password - studentPassword</p>
			

<?php include 'views/footer.php'; ?>