<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT *
                FROM region
                WHERE country='Mexique'");
                
$query-> execute();

$countryspots= $query-> fetchAll();

// Dans le layout le fichier mexique.phtml sera chargé
$template = 'mexique';

// On inclut le layout
include 'layout.phtml';