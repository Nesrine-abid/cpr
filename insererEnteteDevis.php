<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cpr";
$con = mysqli_connect($servername, $username, $password, $database);
$date = date('h:i:s');

$in = file_get_contents('php://input');
$decoded = json_decode($in, true);

$insertID = "INSERT INTO entete_commande (Num_Commande,Code_Client,Date_Commande,Heure_Commande,Statut,type_document) VALUES (null,'" . $decoded['userId']. "',Sysdate(),'" . $date . "','Lancé','Devis')";
mysqli_query($con, $insertID);

$getNumCommande = "SELECT max(Num_Commande) FROM entete_Commande where Code_Client='" . $decoded['userId']. "'";
$result3 = mysqli_query($con, $getNumCommande);

while ($r = mysqli_fetch_assoc($result3)) {
    $row1=array($r["max(Num_Commande)"]);
}
print json_encode($row1);