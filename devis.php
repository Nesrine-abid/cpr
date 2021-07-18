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
    <div id="tables">
      <div class="row g-0">
        <div class="col-md-6">
          <div class="col" id="tab1">
            <table class="table table-bordered">
              <thead>
                <tr class="table-active">
                  <th scope="col">N°</th>
                  <th scope="col">Code Article</th>
                  <th scope="col">Quantité</th>
                </tr>
              </thead>
              <?php
              $nombre_de_lignes = 1;
              while ($nombre_de_lignes <= 5) {
              ?>
                <tbody>
                  <tr>
                    <th scope="row">Pièce<?php echo $nombre_de_lignes; ?></th>
                    <td>
                      <div class="form-group col-md-12">
                        <form autocomplete="off">
                          <div class="autocomplete">
                            <input type="text" class="form-control" id="codeArticle<?php echo $nombre_de_lignes; ?>" onfocus="showHint(event)" onkeyup="showHint(event)">
                          </div>
                        </form>
                      </div>
                    </td>
                    <td>
                      <div class="form-group col-md-8">
                        <input id="quantité<?php echo $nombre_de_lignes; ?>" type="number" class="form-control" value="0" min="0" onchange="showHint1(event)">
                      </div>
                    </td>
                  </tr>
                </tbody>
              <?php $nombre_de_lignes++;
              } ?>
            </table>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col" id="tab2">
            <table class="table table-bordered">
              <thead>
                <tr class="table-active">
                  <th scope="col">N°</th>
                  <th scope="col">Code Article</th>
                  <th scope="col">Quantité</th>
                </tr>
              </thead>
              <?php
              while ($nombre_de_lignes <= 10) {
              ?>

                <tbody>
                  <tr>
                    <th scope="row">Pièce<?php echo $nombre_de_lignes; ?></th>
                    <td>
                      <div class="form-group col-md-12">
                        <form autocomplete="off">
                          <div class="autocomplete">
                            <input type="text" class="form-control" id="codeArticle<?php echo $nombre_de_lignes; ?>" onfocus="showHint(event)" onkeyup="showHint(event)">
                          </div>
                        </form>
                      </div>
                    </td>
                    <td>
                      <div class="form-group col-md-8">
                        <input id="quantité<?php echo $nombre_de_lignes; ?>" type="number" class="form-control" value="0" min="0" onchange="showHint1(event)">
                      </div>
                    </td>
                  </tr>
                </tbody>
                </tbody>
              <?php $nombre_de_lignes++;
              } ?>
            </table>
          </div>
        </div>

      </div>

      <div class="row g-0">
        <div class="col-md-6">
          <div class="col" id="tab3">
            <table class="table table-bordered">
              <thead>
                <tr class="table-active">
                  <th scope="col">N°</th>
                  <th scope="col">Code Article</th>
                  <th scope="col">Quantité</th>
                </tr>
              </thead>
              <?php
              while ($nombre_de_lignes <= 15) {
              ?>
                <tbody>
                  <tr>
                    <th scope="row">Pièce<?php echo $nombre_de_lignes; ?></th>
                    <td>
                      <div class="form-group col-md-12">
                        <form autocomplete="off">
                          <div class="autocomplete">
                            <input type="text" class="form-control" id="codeArticle<?php echo $nombre_de_lignes; ?>" onfocus="showHint(event)" onkeyup="showHint(event)">
                          </div>
                        </form>
                      </div>
                    </td>
                    <td>
                      <div class="form-group col-md-8">
                        <input id="quantité<?php echo $nombre_de_lignes; ?>" type="number" class="form-control" value="0" min="0" onchange="showHint1(event)">
                      </div>
                    </td>
                </tbody>
              <?php $nombre_de_lignes++;
              } ?>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col" id="tab4">
            <table class="table table-bordered">
              <thead>
                <tr class="table-active">
                  <th scope="col">N°</th>
                  <th scope="col">Code Article</th>
                  <th scope="col">Quantité</th>
                </tr>
              </thead>
              <?php
              while ($nombre_de_lignes <= 20) {
              ?>
                <tbody>
                  <tr>
                    <th scope="row">Pièce<?php echo $nombre_de_lignes; ?></th>
                    <td>
                      <div class="form-group col-md-12">
                        <form autocomplete="off">
                          <div class="autocomplete">
                            <input type="text" class="form-control" id="codeArticle<?php echo $nombre_de_lignes; ?>" onfocus="showHint(event)" onkeyup="showHint(event)">
                          </div>
                        </form>
                      </div>
                    </td>
                    <td>
                      <div class="form-group col-md-8">
                        <input id="quantité<?php echo $nombre_de_lignes; ?>" type="number" class="form-control" value="0" min="0" onchange="showHint1(event)">
                      </div>
                    </td>
                  </tr>
                </tbody>
              <?php $nombre_de_lignes++;
              } ?>
            </table>
          </div>
        </div>

      </div>



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