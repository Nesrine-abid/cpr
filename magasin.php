<?php
  include("navbar.php");
  session_start();
  if ($_SESSION['user'] == True) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CPR</title>
</head>

<body>

<div class="card-deck" style="margin: 1em;margin-top:3em;">

  <div class="card">
    <div style="background-color:#d9152e;">
        <h5 class="card-title"style="padding:0.4em;text-align: center;color:white;font-size: 1.5em;">CPR Mohamed Jamoussi</h5>
    </div>
    <img src="img/citroen.png" class="card-img-top">
    <div class="card-body">
    <p class="card-text"><b>Adresse:               </b>route gabes</p>
      <p class="card-text"><b>Tel:                   </b>75123456</p>
      <p class="card-text"><b>Horaire De Travail:        </b>Du lundi au Samedi 8H30 à 15H30</p>
    </div>
  </div>

  <div class="card">
    <div style="background-color:#d9152e;">
        <h5 class="card-title" style="padding:0.4em;text-align: center;color:white;font-size: 1.5em;">CPR Farhat Hached</h5>
    </div>
    <img src="img/citroen.png" class="card-img-top">
    <div class="card-body">
    <p class="card-text"><b>Adresse:               </b>route gabes</p>
      <p class="card-text"><b>Tel:                   </b>75123456</p>
      <p class="card-text"><b>Horaire De Travail:        </b>Du lundi au Samedi 8H30 à 15H30</p>
    </div>
  </div>

  <div class="card">
    <div style="background-color:#d9152e;">
        <h5 class="card-title"style="padding:0.4em;text-align: center;color:white;font-size: 1.5em;">Dépot Centrale</h5>
    </div>
    <img src="img/citroen.png" class="card-img-top">
    <div class="card-body">
      <p class="card-text"><b>Adresse:               </b>route gabes</p>
      <p class="card-text"><b>Tel:                   </b>75123456</p>
      <p class="card-text"><b>Horaire De Travail:        </b>Du lundi au Samedi 8H30 à 15H30</p>
    </div>
  </div>
</div>

</body>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
    crossorigin="anonymous"
  ></script>
</html>
<?php
 } else {
  header('Location: login.php');
  exit();
}?>