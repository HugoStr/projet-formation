<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


if(!empty($_POST)){

    $query= $db->prepare("INSERT INTO spots( region_id, spot_name, spot_description)
                    VALUES (?, ?, ?)");
                    
    $query->execute([
        $_POST['region-id'],
        $_POST['spotname'],
        $_POST['description'],
    ]);
    
    // Redirection
    header('Location: index.php');
    exit();
    
} else {

    $query= $db->prepare("SELECT DISTINCT country
                    FROM region
                    ORDER BY country");
                    
    $query->execute();
    
    $countries =$query->fetchAll();

    
    // Dans le layout le fichier addspot.phtml sera chargé
    $template = 'addspot';
    
    // On inclut le layout
    include 'layout.phtml';

}