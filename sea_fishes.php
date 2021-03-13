<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT *
                FROM seafishes
                INNER JOIN searecipes ON seafishes.id= searecipes.seafish_id
                ORDER BY name");
                
$query-> execute();

$seafishes= $query-> fetchAll();

$query= $db->prepare("SELECT COUNT(*)AS seafishesnumber
                FROM seafishes");
                
$query-> execute();

$seafishescount = $query-> fetch();

// Dans le layout le fichier seafishes.phtml sera chargé
$template = 'seafishes';

// On inclut le layout
include 'layout.phtml';