<?php
include("navbar.php");
session_start();
if ($_SESSION['user'] == True) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleDisponibility.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CPR</title>
  </head>

  <body>

  </body>

  <div id="table">
      <table class="table table-bordered">
        <thead>
          <tr class="table-active">
            <th scope="col">Code Article</th>
            <th scope="col">Disponibilité</th>
            <th scope="col">Prix TTC</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <div class="form-group col-md-12">
                <form autocomplete="off">
                  <div class="autocomplete">
                    <input type="text" class="form-control" id="codeArticle" onfocus="showHint(event)" onkeyup="showHint(event)">
                  </div>
                </form>
              </div>
            </td>
            <td>
              <p id="disponibility"></p>
            </td>
            <td class="price" id="price"></td>
          </tr>
        </tbody>
      </table>
  </div>

  <script>
    var test = false;
    var stock;
    //code article entée par l'utilisateur
    function showHint(event) {
      initialisation();
      if (document.getElementById("codeArticle").value.length == 0) {
        document.getElementById("price").innerHTML = "0";
        return;
      } else {
        if (test == true) {
          ajax();
        }
      }
    }

    function ajax() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var AjaxResult = JSON.parse(this.responseText);
          document.getElementById("price").innerHTML = AjaxResult.prix_unitaire;
          stock = AjaxResult.stock;
          disponibility();
        }
      };
      xmlhttp.open(
        "GET",
        "verifieDisponibilite.php?q=" + document.getElementById("codeArticle").value,
        true
      );
      xmlhttp.send();
    }

    function disponibility() {
      if (stock != 0) {
        document.getElementById("disponibility").innerHTML = "Article Disponible";
        document.getElementById("disponibility").style.color = "green";
        document.getElementById("disponibility").style.padding = 10;
      } else {
        document.getElementById("disponibility").innerHTML = "Article Non Disponible";
        document.getElementById("disponibility").style.color = "red";
        document.getElementById("disponibility").style.padding = 10;
      }
    }

    function initialisation() {
      document.getElementById("disponibility").innerHTML = "";
      document.getElementById("price").innerHTML = "0";
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
              initialisation();
              /*insert the value for the autocomplete text field:*/

              inp.value = this.getElementsByTagName("input")[0].value;
              test = true;

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
    autocomplete(document.getElementById("codeArticle"), <?php echo json_encode($data); ?>);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  </html>
<?php
} else {
  header('Location: login.php');
  exit();
} ?>