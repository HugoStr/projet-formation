<?php

$db = new PDO('mysql:host=localhost;dbname=st-22_hstragier_projet;charset=UTF8', 'hstragier', '4d74717aOWRkNjVhMWZjYzMzNmYyOTJkOTc5MDhm3c4092ed', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query= $db->prepare("SELECT country, name, description, img2, map
                FROM region
                WHERE name= ?");
                
$query-> execute([
    $_GET['name']
]);

$region= $query-> fetch();

$query= $db-> prepare("SELECT region.name, spot_name, spot_description, spots.id AS spotid
                FROM region
                INNER JOIN spots ON region.id= spots.region_id
                WHERE region.name= ?");
                
$query-> execute([
    $_GET['name']
]);

$spots= $query-> fetchAll();

$query= $db-> prepare("SELECT country, name, img1
                FROM region
                WHERE name != ? AND country= ?");
                
$query-> execute([
    $_GET['name'],
    $_GET['country']
]);

$otherregions= $query-> fetchAll();

// Dans le layout le fichier region.phtml sera chargé
$template = 'region';

// On inclut le layout
include 'layout.phtml';