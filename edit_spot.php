<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if(empty($_POST)){
    
    $query= $db-> prepare("SELECT id, spot_name, spot_description
                    FROM spots
                    WHERE id= ?");
                    
    $query-> execute([
        $_GET['spotid']
    ]);
    
    $spot= $query-> fetch();
    
        
    // Dans le layout le fichier addspot.phtml sera chargé
    $template = 'editspot';
    
    // On inclut le layout
    include 'layout.phtml';
    
    
} else{
    
    $query= $db-> prepare("UPDATE spots
                    SET spot_name = ?,
                        spot_description = ?
                    WHERE id = ?");
                    
    $query-> execute([
        $_POST['spotname'],
        $_POST['description'],
        $_POST['idspot']
    ]);
    
    // Redirection
    header('Location: index.php');
    exit();

}
