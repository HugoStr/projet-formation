<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT country, COUNT(*)AS countriesnumber
                FROM region
                GROUP BY country");
                
$query->execute();

$totalcountries= $query-> fetch();

// Dans le layout le fichier index.phtml sera chargé
$template = 'index';

// On inclut le layout
include 'layout.phtml';