<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cpr";
$con = mysqli_connect($servername, $username, $password, $database);

$in = file_get_contents('php://input');
$decoded = json_decode($in, true);

$insertID = "INSERT INTO detail_Commande (Num_Commande,Num_Ligne,Code_Article,Quantite,Prix_Unitaire) VALUES ('" . $decoded['numero_Commande']. "','" . $decoded['numero_Ligne'] . "','" . $decoded['code_Article'] . "','" . $decoded['quantite'] . "','" . $decoded['prix_Unitaire'] . "') order by Num_Ligne ASC";
mysqli_query($con, $insertID);

$updateStock = "UPDATE article SET stock = stock - '" . $decoded['quantite'] . "' where num = '" . $decoded['code_Article']. "'";
mysqli_query($con, $updateStock);