<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if(!empty($_POST)){

    $query= $db->prepare("INSERT INTO users( email, first_name, last_name, birthdate, password)
                    VALUES (?, ?, ?, ?, ?)");
                    
    $query->execute([
        $_POST['mail'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['birthdate'],
        password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
    
    header('Location: index.php');
    exit();
    
} else {

// Dans le layout le fichier index.phtml sera chargé
$template = 'register';

// On inclut le layout
include 'layout.phtml';

}