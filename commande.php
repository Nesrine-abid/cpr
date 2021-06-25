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
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/commande.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="commande.js"></script>
        <title>CPR</title>
    </head>

    <body>
        <div id="tables">
            <div class="col" id="tab1" style="display:block">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">N°</th>
                            <th scope="col">Code Article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col">Prix TTC</th>
                            <th scope="col">Taux De Remise</th>
                            <th scope="col">Total TTC</th>
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
                                <td>
                                    <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                </td>
                                <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                <td>Taux de remise</td>
                                <td class="priceAndTotal" id="total<?php echo $nombre_de_lignes; ?>"></td>
                            </tr>
                        </tbody>
                    <?php $nombre_de_lignes++;
                    } ?>
                </table>
            </div>

            <div class="col" id="tab2">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">N°</th>
                            <th scope="col">Code Article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col">Prix HT</th>
                            <th scope="col">Taux De Remise</th>
                            <th scope="col">Total HT</th>
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
                                <td>
                                    <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                </td>
                                <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                <td>Taux de remise</td>
                                <td class="priceAndTotal" id="total<?php echo $nombre_de_lignes; ?>"></td>
                            </tr>
                        </tbody>
                        </tbody>
                    <?php $nombre_de_lignes++;
                    } ?>
                </table>
            </div>

            <div class="col" id="tab3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">N°</th>
                            <th scope="col">Code Article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col">Prix HT</th>
                            <th scope="col">Taux De Remise</th>
                            <th scope="col">Total HT</th>
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
                                <td>
                                    <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                </td>
                                <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                <td>Taux de remise</td>
                                <td class="priceAndTotal" id="total<?php echo $nombre_de_lignes; ?>"></td>
                            </tr>
                        </tbody>
                    <?php $nombre_de_lignes++;
                    } ?>
                </table>
            </div>

            <div class="col" id="tab4">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">N°</th>
                            <th scope="col">Code Article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col">Prix HT</th>
                            <th scope="col">Taux De Remise</th>
                            <th scope="col">Total HT</th>
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
                                <td>
                                    <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                </td>
                                <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                <td>Taux de remise</td>
                                <td class="priceAndTotal" id="total<?php echo $nombre_de_lignes; ?>"></td>
                            </tr>
                        </tbody>
                    <?php $nombre_de_lignes++;
                    } ?>
                </table>
            </div>
        </div>

        <h4 class="card-title" id="total-TTC">Total TTC</h4>
        <ul class="list-group" id="total-TTC-Output">
            <li class="list-group-item" id="totalCommande">0</li>
        </ul>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" onclick=Previous() aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" onclick=showTab1()>1</a></li>
                <li class="page-item"><a class="page-link" onclick=showTab2()>2</a></li>
                <li class="page-item"><a class="page-link" onclick=showTab3()>3</a></li>
                <li class="page-item"><a class="page-link" onclick=showTab4()>4</a></li>
                <li class="page-item">
                    <a class="page-link" onclick=next() aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="modal" tabindex="-1" role="dialog" id="modalArticleSubstitution">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">EQUIVALENCE</h3>
                    </div>
                    <form action="commande.php" method="$_POST">
                        <div class="modal-body">
                            <table class="table table-bordered" id="tableArtSubst">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col">N°</th>
                                        <th scope="col">Code Article</th>
                                        <th scope="col">Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="AjoutArticle()">Remplacer l'article</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="AjoutArticle()" style="display:none;" id="replace">Ajouter à la commande</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fermer()">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        function fermer() {
            $('#modalArticleSubstitution').modal("hide");
        }

        var stockArtSaisie = []; // le stock de l'article ajouté dans le tableau
        var qteArtSaisie = [];
        var prixArtSaisie = [];

        var nbreArtSub = 0; //contient le nombre d'article de subst de l'article ajouté dand le tableau
        var codArtSubst = []; //contient tous les code article de subst de l'article ajouté dand le tableau
        var prixArtSubst = []; //contient tous les prix article de subst de l'article ajouté dand le tableau

        var codeArticle = '';
        var price = '';
        var total = '';
        var rowNumber = '';
        var pasArtSubst = true; // si l'article posséde des articles de substitition elle prend false 
        var totalCommande = 0;
        for (let i = 0; i < 20; i++) {
            qteArtSaisie[i] = 0;
        }

        function ajax(codeArticle, price, total, rowNumber) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var AjaxResult = JSON.parse(this.responseText);
                    if (AjaxResult.prix_unitaire != undefined) {
                        pasArtSubst = true;
                        document.getElementById(price).innerHTML = AjaxResult.prix_unitaire;
                        stockArtSaisie[rowNumber - 1] = AjaxResult.stock;
                    } else {
                        pasArtSubst = false;
                        document.getElementById(price).innerHTML = AjaxResult[0].prix_unitaire;
                        stockArtSaisie[rowNumber - 1] = AjaxResult[0].stock;
                        nbreArtSub = AjaxResult.length;
                        for (let i = 0; i < nbreArtSub; i++) {
                            codArtSubst[i] = AjaxResult[i].Num_Sub;
                            prixArtSubst[i] = AjaxResult[i].prix_Sub;
                        }
                    }
                }
            };
            xmlhttp.open(
                "GET",
                "ajax.php?q=" + document.getElementById(codeArticle).value,
                true
            );
            xmlhttp.send();
        }

        function showHint(event) {
            var rowNumber;
            if (event.target.id.includes("codeArticle")) {
                rowNumber = event.target.id.substring(event.target.id.indexOf("codeArticle") + 11, event.target.id.length);
            } else {
                rowNumber = event.target.parentNode.id.substring(
                    event.target.parentNode.id.indexOf("codeArticle") + 11,
                    event.target.parentNode.id.indexOf("autocomplete-list")
                );
            }
            var codeArticle = "codeArticle" + rowNumber;
            var price = "price" + rowNumber;
            var total = "total" + rowNumber;
            if (document.getElementById(codeArticle).value.length == 0) {
                document.getElementById(price).innerHTML = "0";
                document.getElementById(total).innerHTML = "0";
                return;
            } else {
                ajax(codeArticle, price, total, rowNumber);
            }
        }
        //quantité entée par l'utilisateur
        function showHint1(event) {
            var rowNumber = event.target.id.substring(event.target.id.indexOf("quantité") + 8, event.target.id.length)
            var codeArticle = "codeArticle" + rowNumber;
            var price = "price" + rowNumber;
            var total = "total" + rowNumber;
            var disponibility = "disponibility" + rowNumber;
            if (document.getElementById(codeArticle).value.length == 0) {
                document.getElementById(price).innerHTML = "0";
                document.getElementById(total).innerHTML = "0";
                return;
            } else {
                ajax(codeArticle, price, total, rowNumber);

                document.getElementById(total).innerHTML = document.getElementById(price).textContent * event.target.value;
                //calcul du Total TTC
                prixArtSaisie[rowNumber - 1] = document.getElementById(price).textContent;
                if (event.target.value > qteArtSaisie[rowNumber - 1]) {
                    totalCommande += parseInt(prixArtSaisie[rowNumber - 1]);
                } else {
                    if (event.target.value < qteArtSaisie[rowNumber - 1]) {
                        totalCommande -= parseInt(prixArtSaisie[rowNumber - 1]);
                    }
                }
                qteArtSaisie[rowNumber - 1] = event.target.value;
                document.getElementById("totalCommande").innerHTML = totalCommande;
                //Disponibilité
                if (parseInt(stockArtSaisie[rowNumber - 1]) >= parseInt(event.target.value)) {
                    document.getElementById(disponibility).innerHTML = "article disponible";
                    document.getElementById(disponibility).style.color = "green";
                    document.getElementById(disponibility).style.padding = 10;
                } else {
                    if ((parseInt(stockArtSaisie[rowNumber - 1]) < parseInt(event.target.value)) && (parseInt(stockArtSaisie[rowNumber - 1]) != 0)) {
                        document.getElementById(disponibility).innerHTML = "Stock insuffisant";
                        document.getElementById(disponibility).style.color = "orange";
                        document.getElementById(disponibility).style.padding = 10;
                        document.getElementById("replace").style.display = "block";
                    } else {
                        if (parseInt(stockArtSaisie[rowNumber - 1]) == 0) {
                            document.getElementById(disponibility).innerHTML = "Pièce non disponible";
                            document.getElementById(disponibility).style.color = "red";
                            document.getElementById(disponibility).style.padding = 10;
                            document.getElementById("replace").style.display = "none";
                        }
                    }
                    if (!pasArtSubst) {
                        $('#modalArticleSubstitution').modal({
                            show: false
                        })
                        $('#modalArticleSubstitution').modal('show')
                        var table = document.getElementById("tableArtSubst");
                        while (table.rows.length > 1) {
                            table.deleteRow(1);
                        }
                        for (let i = 1; i <= nbreArtSub; i++) {
                            var row = table.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            cell1.innerHTML = "<input type='radio' name='subProduct'><label for='subProduct'>" + "Article" + i + "</label><br>";
                            cell2.innerHTML = codArtSubst[i - 1];
                            cell3.innerHTML = prixArtSubst[i - 1];
                        }
                    }
                }
            };
        }
    </script>

    <?php
    $q = "SELECT num FROM article";
    $results = mysqli_query($con, $q);
    $data = array();
    while ($row = mysqli_fetch_array($results)) {
        $data[] = $row['num'];
    }
    ?>
    <script>
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
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
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

    </html>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<?php
} else {
    header('Location: login.php');
    exit();
} ?>