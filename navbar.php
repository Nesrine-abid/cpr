<?php
include("connexion.php");
?>
<link rel="stylesheet" href="./css/navbar.css" />

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarTop">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="link1" href="magasin.php">Nos Magasins<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="link2" href="quiSommesNous.php">Qui Sommes-Nous?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="link3" href="condition.php">Conditions Générale De Vente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="link4" href="contact.php">Contactez-Nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" id="deconnecter">Déconnecter</a>
      </li>
    </ul>
  </div>
</nav>

<div class="row g-0">
  <div class="col-md-4">
    <img src="img/logo2.png" class="card-img-top">
  </div>
  <div class="col-md-8">
    <div class="col-md-6">
      <h5 class="card-title"></h5>
    </div>
    <div class="col-md-12">
      <div id="euroLogo">
        <img src="img/euro.png" class="card-img-top">
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarBottom">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalogue</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="disponibilité.php">Disponibilité</a></li>
          <li><a class="dropdown-item" href="VentePromo.php">Vente Promo</a></li>
          <li><a class="dropdown-item" href="news.php">News</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Service</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="devis.php">Devis</a></li>
          <li><a class="dropdown-item" href="commande.php">Commande</a></li>
          <li><a class="dropdown-item" href="retour.php">Demande Retour</a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="SuivieCommande.php">Suivie Commande</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Document Client</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="extrait.php">Extrait Client</a></li>
          <li><a class="dropdown-item" href="facture.php">Liste des facture</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>