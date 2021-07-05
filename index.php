<?php
include("connexion.php");
session_start();
unset($_SESSION['user']);
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $name = $_POST["username"];
    $password = $_POST["password"];
    $select = "SELECT id from utilisateurs where nom='$name' and password='$password'";
    $result1 = mysqli_query($con, $select);
    $row = mysqli_fetch_array($result1);

    if (is_array($row)) {
        $_SESSION["username"] = $row["nom"];
        $_SESSION["userId"] = $row["id"];
        $_SESSION['user'] = True;
    }
}
if ($_SESSION['user'] == True) {
    header('Location:magasin.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>