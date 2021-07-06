<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cpr";
$con = mysqli_connect($servername, $username, $password, $database);

$q = $_GET['userId'];

$insertID = "INSERT INTO entete_commande (Num_Commande,Code_Client,Date_Commande,Statut) VALUES (null,'" . $q . "',Sysdate(),'lancé')";
mysqli_query($con, $insertID);

$getNumCommande = "SELECT max(Num_Commande) FROM entete_Commande where Code_Client='" . $q . "'";
$result3 = mysqli_query($con, $getNumCommande);

while ($r = mysqli_fetch_assoc($result3)) {
    $row10=array($r["max(Num_Commande)"]);
}
print json_encode($row10);