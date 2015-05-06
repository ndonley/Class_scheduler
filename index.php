<?php
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: Index.php
Description: Starts login page
*/

// Start session management and include necessary functions
session_start();
require('model/database.php');
require('model/login_db.php');
require('model/admin_db.php');

// Get the action to perform
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_admin_menu';
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
}

// Perform the specified action
switch($action) {
    case 'login':
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
		$salt = 'f23g5h7d1k';
		$password = ($salt.$password);
			
    $user_permission = is_valid_login($user_name, $password);
		
			if ($user_permission == 'A') {
				include('views/admin_menu.php');
				
			}
			else if ($user_permission == 'T') {
				include('views/teacher_menu.php');
			}
			else if ($user_permission == 'S') {
				include('views/student_menu.php');
			}
			else {
            $login_message = 'You must login to view this page.';
            include('views/login.php');
			}	
	
    break;

    case 'logout':
        $_SESSION = array();   // Clear all session data from memory
        session_destroy();     // Clean up the session ID
        $login_message = 'You have been logged out.';
        include('views/login.php');
        break;
}
?>