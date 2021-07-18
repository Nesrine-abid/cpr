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
    <div id="table" style="margin:4em;">
      <table class="table table-bordered">
        <thead>
          <tr class="table-active">
            <th scope="col">N° Commande</th>
            <th scope="col">Date Commande</th>
            <th scope="col">Totale Commande</th>
            <th scope="col">Statue</th>
            <th scope="col">Entierement Expédié</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $idUtilisateur = $_SESSION["userId"];
          $select = "SELECT Num_Commande , Date_Commande from entete_commande where Code_Client='$idUtilisateur'";
          $result1 = mysqli_query($con, $select);
          while ($r = mysqli_fetch_assoc($result1)) {
          ?>
            <tr>
              <td>
                <p id="numCommande">Commande N° <?php echo json_encode((int)$r["Num_Commande"]); ?></p>
              </td>
              <td>
                <p id="date"><?php echo json_encode($r["Date_Commande"]); ?></p>
              </td>
              <td>
                <p id="totale"></p>
              </td>
              <td>
                <p id="Statue">Ouvert</p>
              </td>
              <td id="Expedie">non</td>
            </tr>
          <?php
          } ?>
        </tbody>
      </table>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  </html>
<?php
} else {
  header('Location: login.php');
  exit();
} ?>