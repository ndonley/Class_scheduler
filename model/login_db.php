<?php

function is_valid_login($user_name, $password) {
    global $db;
    $query = 'SELECT user_permission FROM cs_users
              WHERE user_name = :user_name AND user_password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user_permission = $statement->fetchColumn();
    $statement->closeCursor();
    return $user_permission;
	
	
}


?>