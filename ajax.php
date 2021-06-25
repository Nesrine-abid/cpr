<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cpr";
$con = mysqli_connect($servername, $username, $password, $database);

$q = $_GET['q'];
$som = "SELECT * FROM article_substitution WHERE num_Article='" . $q . "'";
$result1 = mysqli_query($con, $som);
$somme=mysqli_num_rows($result1);
if ($somme == 0) {
    $query = "SELECT stock,prix_unitaire FROM article where num = '" . $q . "'";
    $result = mysqli_query($con, $query);
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows=array("stock"=>$r["stock"], "prix_unitaire"=>$r["prix_unitaire"]);
    }
} else {
    $query = "SELECT prix_unitaire,stock,Num_Sub,prix_Sub,Stock_Sub FROM article ar , article_substitution ars where (ar.num='" . $q . "') and (ar.num = ars.num_Article)";
    $result = mysqli_query($con, $query);
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
}

print json_encode($rows);