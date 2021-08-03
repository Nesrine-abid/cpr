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
    <link rel="stylesheet" href="./css/devis.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CPR</title>
  </head>

  <body style="overflow-x: hidden !important;">
    <?php $idUtilisateur = $_SESSION["userId"]; ?>

    <div class="row g-0" id="tables">
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

    <div class="row g-0" id="devisTable" >
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
    <div style="padding-bottom: 1em;">
      <button type="button" class="btn btn-danger" onclick="envoyerDevis()">Envoyer</button>
    </div>
  </body>

  <script>
    var codeArticle = ''; //dynamic id 
    var rowNumber = 0;
    var qteArtSaisie = [];
    var insertedCode = [];
    var c = 0;
    var test = false;
    var numeroDevis;
    
    //code article entée par l'utilisateur
    function showHint(event) {
      if (event.target.id.includes("codeArticle")) {
        rowNumber = event.target.id.substring(event.target.id.indexOf("codeArticle") + 11, event.target.id.length);
      } else {
        rowNumber = event.target.parentNode.id.substring(
          event.target.parentNode.id.indexOf("codeArticle") + 11,
          event.target.parentNode.id.indexOf("autocomplete-list")
        );
      }
      var codeArticle = "codeArticle" + rowNumber;
    }

    //quantité entée par l'utilisateur
    function showHint1(event) {
      var nouvelleQteSaisie = parseInt(event.target.value);
      var rowNumber = event.target.id.substring(event.target.id.indexOf("quantité") + 8, event.target.id.length);
      qteArtSaisie[rowNumber - 1] = nouvelleQteSaisie;
    }

    function initialisation(rowNumber) {
      var quantité = "quantité" + rowNumber;
      document.getElementById(quantité).value = 0;
    }

    function envoyerDevis() {
      var quantité = "quantité" + rowNumber;
      if (rowNumber >= 1 && document.getElementById(quantité).value != 0) {
        insererEnteteDevis();
      }
    }

    function insererEnteteDevis() {
      var userId = '<?php echo $idUtilisateur; ?>';
      var userId1 = parseInt(userId);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "insererEnteteDevis.php", true);
      xmlhttp.setRequestHeader("Content-Type", "application/json");
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var ajaxResult = JSON.parse(this.responseText);
          numeroDevis = parseInt(ajaxResult[0]);
          for (let k = 1; k <= rowNumber; k++) {
            insererLigneDevis(k);
          }
        }
      };
      var data = {
        "userId": userId1
      };
      xmlhttp.send(JSON.stringify(data));
    }

    function insererLigneDevis(k) {

      var codeArticle = insertedCode[k - 1];
      var quantite = qteArtSaisie[k - 1];

      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "insererLignesDevid.php", true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          refrechPage();
        }
      };
      var data = {
        "numero_Commande": numeroDevis,
        "numero_Ligne": k,
        "code_Article": codeArticle,
        "quantite": quantite,
        "prix_Unitaire": 0
      };
      xhttp.send(JSON.stringify(data));
    }

    function refrechPage() {
      location.reload();
    }

    <?php
    $q = "SELECT num FROM article";
    $results = mysqli_query($con, $q);
    $data = array();
    while ($row = mysqli_fetch_array($results)) {
      $data[] = $row['num'];
    }
    ?>

    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
          return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          var pos = arr[i].toUpperCase().indexOf(val.toUpperCase());
          /*check if the item starts with the same letters as the text field value:*/
          if (pos > -1) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = arr[i].substr(0, pos);
            b.innerHTML += "<strong>" + arr[i].substr(pos, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(pos + val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
              initialisation(rowNumber);
              /*insert the value for the autocomplete text field:*/
              if (insertedCode.includes(this.getElementsByTagName("input")[0].value)) {
                inp.value = "";
                alert("Cet article est deja ajouté à la commande");
              } else {
                inp.value = this.getElementsByTagName("input")[0].value;
                insertedCode[c] = this.getElementsByTagName("input")[0].value;
                c++;
                test = true;
              }
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              showHint(e);
              closeAllLists();
            });
            a.appendChild(b);
          }
        }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
      });

      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }

      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }

      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function(e) {
        closeAllLists(e.target);
      });
    }
    var T = ["codeArticle1", "codeArticle2", "codeArticle3", "codeArticle4", "codeArticle5", "codeArticle6", "codeArticle7", "codeArticle8", "codeArticle9", "codeArticle10", "codeArticle11", "codeArticle12", "codeArticle13", "codeArticle14", "codeArticle15", "codeArticle16", "codeArticle17", "codeArticle18", "codeArticle19", "codeArticle20"];
    for (let i = 0; i < T.length; i++) {
      autocomplete(document.getElementById(T[i]), <?php echo json_encode($data); ?>);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  </html>
<?php
} else {
  header('Location: login.php');
  exit();
} ?>