<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if(!empty($_GET)){
    
    $query= $db-> prepare("SELECT region.name, spot_name, spots.id AS id_spot
                FROM region
                INNER JOIN spots ON region.id= spots.region_id
                WHERE region.name= ?");
                
    $query-> execute([
        $_GET['region']
    ]);

    $regionspots= $query-> fetchAll();
    
    include 'regionspots.phtml';
    
}