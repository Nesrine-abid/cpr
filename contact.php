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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <title>CPR</title>
</head>

<body>

<form  action="" method="post"style="width:60%; margin:auto;padding-top: 2.5em;">
<div class="card">

  <div class="card-header"style="background-color:#d9152e;color:white;">
    <h4>Service Client - Contactez-nous</h4>
  </div>

  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <div class="card mb-3" style="max-width: 1000px;">
    <div class="row g-0">

        <div class="col-md-4">
        <form>
        <div class="form-group">
            <div class="form-group">
            <label for="exampleFormControlSelect1"style="margin:1em;"><b>Objet</b></label>
            <select class="form-select" aria-label="Default select example" style="margin-left:0.5em;" required>
                <option selected>Choisissez</option>
                <option value="reclamation">Réclamation</option>
                <option value="service client">Service Client</option>
            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"style="margin:1em;"><b>Adresse e-mail</b></label>
            <input type="text" class="form-control" id="email_input" onblur="validate()" placeholder="Entrez adresse e-mail" style="margin-left:0.5em;">
            <div class="status22" id="status22" style="color: red; margin-left: 20px;"></div>
        </div>
        </form>
        </div>

        <div class="col-md-8">
          <div class="form-group"style="margin:1em;">
            <label for="exampleInputPassword1"><b>Message</b></label>
            <textarea name="message" class="form-control" cols="30" rows="10" required></textarea>
          </div>
        </div> 
    </div>
    </div>
      <div style="float:right;">
        <button type="submit" class="btn btn-secondary" onclick="validateReclamation()">Envoyer</button>  
      </div>
    </blockquote>
  </div>
</div>
</form>
<script>
    function verifMail()
    {
      var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
      var email = document.getElementById("email_input").value;
      return regMail.test(email)  
    }
    function validateReclamation() 
    { if(!verifMail())
        {alert("Email non valide!");}
      else{
          alert("Email bien envoyée!");
          }
    }
    function validate() 
    {if(!verifMail())
      {document.getElementById("status22").innerHTML= "<span class='warning'>Adresse mail non valide.</span>";}
     else{
          document.getElementById("status22").innerHTML= "";
         }
    }
</script>

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