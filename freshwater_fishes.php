<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT *
                FROM freshwaterfishes
                INNER JOIN freshwaterrecipes ON freshwaterfishes.id= freshwaterrecipes.freshwaterfish_id
                ORDER BY name");
                
$query-> execute();

$freshwaterfishes= $query-> fetchAll();

$query= $db->prepare("SELECT COUNT(*)AS freshwaterfishesnumber
                FROM freshwaterfishes");
                
$query-> execute();

$freshwaterfishescount = $query-> fetch();

// Dans le layout le fichier seafishes.phtml sera chargé
$template = 'freshwaterfishes';

// On inclut le layout
include 'layout.phtml';