<?php
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: valid_admin.php
Description: validating login
*/

    // make sure the user is logged in as a valid administrator
    if (!isset($_SESSION['is_valid_admin'])) {
        header("Location: ." );
    }
?>
