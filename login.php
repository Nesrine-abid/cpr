<?php
include("connexion.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CPR</title>
</head>

<body>
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/logo.png" class="card-img-top">
            </div>
            <div class="col-md-8">
                <div class="col-md-6">
                    <h5 class="card-title"></h5>
                </div>
                <div class="col-md-12">
                    <div style="float:right;">
                        <img src="img/euro.png" class="card-img-top">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form class="box" action="index.php" method="POST">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>

</html>