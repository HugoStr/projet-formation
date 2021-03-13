<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT *
                FROM region
                WHERE country='France'");
                
$query-> execute();

$countryspots= $query-> fetchAll();

// Dans le layout le fichier france.phtml sera chargé
$template = 'france';

// On inclut le layout
include 'layout.phtml';