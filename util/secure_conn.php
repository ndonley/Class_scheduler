<?php
/*
Author: Nicholas Donley
Revision date: May 6, 2015
File name: secure_conn.php
Description: secure connection file
*/
    // make sure the page uses a secure connection
    if (!isset($_SERVER['HTTPS'])) {
        $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: " . $url);
        exit();
    }
?>