<?php

session_start();

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if (empty($_POST)) {
	
	$template = 'login';
	include 'layout.phtml';
	
} else {

	$query = $db->prepare("SELECT email, password, first_name, last_name, birthdate
							FROM users
							WHERE email = ?");

	$query->execute([
		$_POST['mail']
	]);

	$user = $query->fetch();

	if (empty($user)) {

		header('Location: login.php');
		exit();
	} else {
		if (password_verify($_POST['password'], $user['password'])) {
			
			$_SESSION['user'] = [
				'email' => $user['email'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name']
			];
			
			header('Location: index.php');
		    exit();    
			
		} else {
			
			header('Location: login.php');
			exit();
		}
	}

}