<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cpr";
$con = mysqli_connect($servername, $username, $password, $database);

$q = $_GET['q'];

$query = "SELECT stock,prix_unitaire FROM article where num = '" . $q . "'";
$result = mysqli_query($con, $query);
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
    $rows = array("stock" => $r["stock"], "prix_unitaire" => $r["prix_unitaire"]);
}

print json_encode($rows);
