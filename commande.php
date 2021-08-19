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
        <link rel="stylesheet" href="./css/styleCommande.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="commande.js"></script>
        <title>CPR</title>
    </head>

    <body>
        <?php $idUtilisateur = $_SESSION["userId"];
        $nomUtilisateur = $_SESSION["username"];
        $select = "SELECT taux_Remise from promo where nom_Utilisateur='$nomUtilisateur' ";
        $result1 = mysqli_query($con, $select);
        $r = mysqli_fetch_assoc($result1) ?>

        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        <script src="//www.amcharts.com/lib/4/themes/animated.js"></script>

        <?php
        $select2 = "SELECT encours_Autorise,solde from utilisateurs where nom='$nomUtilisateur' ";
        $result2 = mysqli_query($con, $select2);
        $r2 = mysqli_fetch_assoc($result2) ?>
        <script type="text/javascript">
            am4core.useTheme(am4themes_animated);
            var chartMin = 0;
            var chartMax = '<?php echo json_encode((int)$r2["encours_Autorise"]); ?>' * 1;
            var data = {
                score: 52.7,
                gradingData: [{
                        title: " Bad",
                        advice: "Market is disappearing",
                        color: "#43A047",
                        lowScore: 0,
                        highScore: parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>') * 0.4
                    },
                    {
                        title: "Warning",
                        advice: "Warning - underdelivering",
                        color: "#FB8C00",
                        lowScore: parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>') * 0.4,
                        highScore: parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>') * 0.8
                    },
                    {
                        title: "OK",
                        advice: "Well done",
                        color: "#E53935",
                        lowScore: parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>') * 0.8,
                        highScore: parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>') * 1
                    }
                ]
            };

            /**
            Grading Lookup
             */
            function lookUpGrade(lookupScore, grades) {
                // Only change code below this line
                for (var i = 0; i < grades.length; i++) {
                    if (
                        grades[i].lowScore < lookupScore &&
                        grades[i].highScore >= lookupScore
                    ) {
                        return grades[i];
                    }
                }
                return null;
            }

            // create chart
            var chart = am4core.create("chartdiv", am4charts.GaugeChart);
            chart.hiddenState.properties.opacity = 0;
            chart.fontSize = 11;
            chart.innerRadius = am4core.percent(80);
            chart.resizable = true;

            /**
             * Normal axis
             */
            var axis = chart.xAxes.push(new am4charts.ValueAxis());
            axis.min = chartMin;
            axis.max = chartMax;
            axis.strictMinMax = true;
            axis.renderer.radius = am4core.percent(80);
            axis.renderer.inside = true;
            axis.renderer.line.strokeOpacity = 0;
            axis.renderer.ticks.template.disabled = false;
            axis.renderer.ticks.template.strokeOpacity = 0;
            axis.renderer.ticks.template.strokeWidth = 0.5;
            axis.renderer.ticks.template.length = 5;
            axis.renderer.grid.template.disabled = true;
            axis.renderer.labels.template.radius = am4core.percent(15);
            axis.renderer.labels.template.fontSize = "0.9em";
            axis.renderer.labels.template.fill = am4core.color("#757575");

            /**
             * Axis for ranges
             */
            var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
            axis2.min = chartMin;
            axis2.max = chartMax;
            axis2.renderer.radius = am4core.percent(105); // figure out how to move labels instead
            axis2.strictMinMax = true;
            axis2.renderer.labels.template.disabled = true;
            axis2.renderer.ticks.template.disabled = true;
            axis2.renderer.grid.template.disabled = false;
            axis2.renderer.grid.template.opacity = 0;
            axis2.renderer.labels.template.bent = true;
            axis2.renderer.labels.template.fill = am4core.color("#000");
            axis2.renderer.labels.template.fontWeight = "bold";
            axis2.renderer.labels.template.fillOpacity = 0; //hide

            /**
            Ranges
            */

            for (let grading of data.gradingData) {
                var range = axis2.axisRanges.create();
                range.axisFill.fill = am4core.color(grading.color);
                range.axisFill.fillOpacity = 1;
                range.axisFill.zIndex = -1;
                range.value = grading.lowScore > chartMin ? grading.lowScore : chartMin;
                range.endValue = grading.highScore < chartMax ? grading.highScore : chartMax;
                range.grid.strokeOpacity = 0;
                range.stroke = am4core.color(grading.color).lighten(-0.1);
                range.label.inside = true;
                range.label.text = grading.title.toUpperCase();
                range.label.inside = true;
                range.label.location = 0.5;
                range.label.inside = true;
                range.label.radius = am4core.percent(10);
                range.label.paddingBottom = -5; // ~half font size
                range.label.fontSize = "0.9em";
            }
            var matchingGrade = lookUpGrade(data.score, data.gradingData);


            /**
             * Metric Value       valeur hamra
             */

            var labelMetricValue = chart.radarContainer.createChild(am4core.Label);
            var metricValue = parseFloat('<?php echo json_encode((int)$r2["solde"]); ?>');
            labelMetricValue.isMeasured = false;
            labelMetricValue.fontSize = "4em";
            labelMetricValue.x = am4core.percent(50);
            labelMetricValue.paddingBottom = 15;
            labelMetricValue.horizontalCenter = "middle";
            labelMetricValue.verticalCenter = "bottom";
            labelMetricValue.text = metricValue;
            labelMetricValue.fill = am4core.color(matchingGrade.color);

            /**
             * Advice
             */

            //var label2 = chart.radarContainer.createChild(am4core.Label);
            var labelAdvice = chart.createChild(am4core.Label);
            labelAdvice.isMeasured = false;
            labelAdvice.fontSize = "1em";
            //labelAdvice.paddingTop = 150;
            labelAdvice.horizontalCenter = "middle";
            labelAdvice.verticalCenter = "bottom";
            //labelAdvice.text = matchingGrade.title.toUpperCase();
            labelAdvice.text = "hello";
            labelAdvice.fill = am4core.color(matchingGrade.color);
            labelAdvice.dx = 280;
            labelAdvice.dy = 340;

            /**
             * Hand      lebra
             */
            var hand = chart.hands.push(new am4charts.ClockHand());
            hand.axis = axis2;
            hand.radius = am4core.percent(85);
            hand.innerRadius = am4core.percent(50);
            hand.startWidth = 10;
            hand.pixelHeight = 10;
            hand.pin.disabled = true;
            hand.value = data.score;
            hand.fill = am4core.color("#444");
            hand.stroke = am4core.color("#000");

            hand.events.on("positionchanged", function() {
                // var t = axis2.positionToValue(hand.currentPosition).toFixed(0);

                var value2 = axis.positionToValue(hand.currentPosition);

                var matchingGrade = lookUpGrade(axis.positionToValue(hand.currentPosition), data.gradingData);
                labelAdvice.text = matchingGrade.advice.toUpperCase();
                labelAdvice.fill = am4core.color(matchingGrade.color);
                labelAdvice.stroke = am4core.color(matchingGrade.color);
                labelMetricValue.fill = am4core.color(matchingGrade.color);

            })

            hand.showValue(metricValue, 10, am4core.ease.cubicOut); //tbedel valeur elebra
            axis2.axisRanges.values[0].axisFill.fillOpacity = 0.8;
            axis2.axisRanges.values[1].axisFill.fillOpacity = 0.6;
            axis2.axisRanges.values[2].axisFill.fillOpacity = 0.4;
        </script>

        <style type="text/css">
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            }

            #chartdiv {
                width: 400px;
                height: 250px;
            }
        </style>
        <div class="container-fluid">
            <div class="row">
                <div id="chartdiv" class="col-md-6"> </div>
                <div class="col-md-2">
                    <h4 id="depassement">Depassement</h4>
                    <ul class="list-group">
                        <li class="list-group-item" style="text-align: right;" id="depassementValue">0</li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="card-title" id="total-TTC">Total TTC</h4>
                    <ul class="list-group" id="total-TTC-Output">
                        <li class="list-group-item" id="totalCommande">0</li>
                    </ul>
                </div>
            </div>
            <div class="row" id="tables">
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
                                        <div id="bloquage<?php echo $nombre_de_lignes; ?>"></div>
                                    </td>
                                    <td>
                                        <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                    </td>
                                    <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                    <td id="taux"><?php echo json_encode((int)$r["taux_Remise"]); ?>%</td>
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
                                            <div id="bloquage<?php echo $nombre_de_lignes; ?>"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                    </td>
                                    <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                    <td><?php echo json_encode((int)$r["taux_Remise"]); ?>%</td>
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
                                            <div id="bloquage<?php echo $nombre_de_lignes; ?>"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                    </td>
                                    <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                    <td><?php echo json_encode((int)$r["taux_Remise"]); ?>%</td>
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
                                            <div id="bloquage<?php echo $nombre_de_lignes; ?>"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="disponibility<?php echo $nombre_de_lignes; ?>"></p>
                                    </td>
                                    <td class="priceAndTotal" id="price<?php echo $nombre_de_lignes; ?>"></td>
                                    <td><?php echo json_encode((int)$r["taux_Remise"]); ?>%</td>
                                    <td class="priceAndTotal" id="total<?php echo $nombre_de_lignes; ?>"></td>
                                </tr>
                            </tbody>
                        <?php $nombre_de_lignes++;
                        } ?>
                    </table>
                </div>
            </div>

            <div class="row" id="bottonEnvoyer">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-danger" onclick="envoyerCommande()">Envoyer</button>
                </div>
                <div class="col-sm">
                </div>
            </div>

            <div class="row" style="text-align: center;">
                <div class="col-sm">
                </div>
                <div class="col-sm">
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
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>

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
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="RemplacerArticle()">Remplacer l'article</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="AjoutArticle()" style="display:none;" id="replace">Ajouter à la commande</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fermer()">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        var codeArticle = ''; //dynamic id 
        var disponibility = '';
        var price = ''; //dynamic id
        var total = ''; //dynamic id 
        var rowNumber = 0;
        var maxRowNumber = 0;
        var nouvelleQteSaisie = 0;
        var stockArtSaisie = []; //tableau contenant les stock des articles ajoutés à la commande
        var qteArtSaisie = [];
        var prixArtSaisie = [];
        for (let i = 0; i < 20; i++) {
            qteArtSaisie[i] = 0;
        }
        var nbreArtSub = 0; //nombre d'article de subst de l'article ajouté dand le tableau
        var codArtSubst = []; //les code des article de subst de l'article ajouté dand le tableau
        var prixArtSubst = []; //les prix des article de subst de l'article ajouté dand le tableau
        var stockArtSubt = []; //les stock des article de subst de l'article ajouté dand le tableau

        var pasArtSubst = true; // si l'article posséde des articles de substitition elle prend false 
        var totalCommande = 0;
        var insertedCode = [];
        var c = 0;
        var isCodeArticle = false;
        var numeroCommande;
        var tauxDeRemise = '<?php echo $r["taux_Remise"]; ?>';

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
            if (maxRowNumber < rowNumber) {
                maxRowNumber = rowNumber;
            }
            codeArticle = "codeArticle" + rowNumber;
            price = "price" + rowNumber;
            total = "total" + rowNumber;

            if (document.getElementById(codeArticle).value.length == 0) {
                document.getElementById(price).innerHTML = "0";
                document.getElementById(total).innerHTML = "0";
                return;
            } else {
                if (isCodeArticle == true) {
                    ajax(codeArticle, price, total, rowNumber);
                }
                isCodeArticle = false;
            }
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
                        prixArtSaisie[rowNumber - 1] = AjaxResult.prix_unitaire;
                        stock = AjaxResult.stock;
                        testDisponibility(rowNumber);
                    } else {
                        pasArtSubst = false;
                        document.getElementById(price).innerHTML = AjaxResult[0].prix_unitaire;
                        stockArtSaisie[rowNumber - 1] = AjaxResult[0].stock;
                        prixArtSaisie[rowNumber - 1] = AjaxResult[0].prix_unitaire;
                        nbreArtSub = AjaxResult.length;
                        stock = AjaxResult[0].stock;
                        testDisponibility(rowNumber);
                        for (let i = 0; i < nbreArtSub; i++) {
                            codArtSubst[i] = AjaxResult[i].Num_Sub;
                            prixArtSubst[i] = AjaxResult[i].prix_Sub;
                            stockArtSubt[i] = AjaxResult[i].Stock_Sub;
                        }
                        if (nouvelleQteSaisie>stock) {
                        $('#modalArticleSubstitution').modal({
                            show: false
                        })
                        $('#modalArticleSubstitution').modal('show')
                        var table = document.getElementById("tableArtSubst");
                        while (table.rows.length > 1) {
                            table.deleteRow(1);
                        }

                        for (let i = 1; i <= nbreArtSub; i++) {
                            if (parseInt(stockArtSubt[i - 1]) != 0) {
                                var row = table.insertRow(i);
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                cell1.innerHTML = "<input type='radio'id='" + i + "' name='subProduct'><label for='subProduct'>" + "Article" + i + "</label><br>";
                                cell2.innerHTML = codArtSubst[i - 1];
                                cell3.innerHTML = prixArtSubst[i - 1];
                            }
                        }
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

        function testDisponibility() {
            disponibility = "disponibility" + rowNumber;
            if (stock != 0) {
                document.getElementById(disponibility).innerHTML = "Article Disponible";
                document.getElementById(disponibility).style.color = "green";
                document.getElementById(disponibility).style.padding = 10;
            } else {
                document.getElementById(disponibility).innerHTML = "Article Non Disponible";
                document.getElementById(disponibility).style.color = "red";
                document.getElementById(disponibility).style.padding = 10;
            }
        }

        //quantité entée par l'utilisateur
        function showHint1(event) {
            nouvelleQteSaisie = parseInt(event.target.value);

            rowNumber = event.target.id.substring(event.target.id.indexOf("quantité") + 8, event.target.id.length);
            if (maxRowNumber < rowNumber) {
                maxRowNumber = rowNumber;
            }
            qteArtSaisie[rowNumber - 1] = nouvelleQteSaisie;
            codeArticle = "codeArticle" + rowNumber;
            price = "price" + rowNumber;
            total = "total" + rowNumber;
            disponibility = "disponibility" + rowNumber;
            var quantité = "quantité" + rowNumber;
            var bloquage = "bloquage" + rowNumber;

            ajax(codeArticle, price, total, rowNumber);
            if (document.getElementById(codeArticle).value.length == 0) {
                document.getElementById(price).innerHTML = "0";
                document.getElementById(total).innerHTML = "0";
                return;
            } else {
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
                        if (pasArtSubst) {
                            document.getElementById(bloquage).innerHTML = "C'est la quantité maximale que vous pouvez commander";
                            document.getElementById(bloquage).style.color = "red";
                            document.getElementById(quantité).value = parseInt(stockArtSaisie[rowNumber - 1]);
                            nouvelleQteSaisie = parseInt(stockArtSaisie[rowNumber - 1]);
                            document.getElementById(disponibility).innerHTML = "article disponible";
                            document.getElementById(disponibility).style.color = "green";
                            //document.getElementById(total).innerHTML = (document.getElementById(price).textContent * (100 - tauxDeRemise) / 100)* parseInt(stockArtSaisie[rowNumber - 1]);
                            //calculTotalCommande();
                        }
                    }
                    if (parseInt(stockArtSaisie[rowNumber - 1]) == 0) {
                        document.getElementById(disponibility).innerHTML = "Pièce non disponible";
                        document.getElementById(disponibility).style.color = "red";
                        document.getElementById(disponibility).style.padding = 10;
                        document.getElementById("replace").style.display = "none";
                        if (pasArtSubst) {
                            document.getElementById(bloquage).innerHTML = "Pièce non disponible";
                            document.getElementById(bloquage).style.color = "red";
                            document.getElementById(quantité).value = 0;
                            nouvelleQteSaisie = 0;
                            //document.getElementById(total).innerHTML = 0;
                            //calculTotalCommande();
                        }
                    }

                }
                document.getElementById(total).innerHTML = (parseFloat(document.getElementById(price).textContent) * (100 - tauxDeRemise) / 100) * parseInt(nouvelleQteSaisie);
                calculTotalCommande();
            }
        }

        function calculTotalCommande() {
            totalCommande = 0;
            for (let i = 1; i <= maxRowNumber; i++) {
                var total = "total" + i;
                totalCommande += parseFloat(document.getElementById(total).innerText);
            }
            document.getElementById("totalCommande").innerHTML = totalCommande;
            document.getElementById("totalCommande").style.color = "green";
            document.getElementById("totalCommande").style.fontSize = 20;
            labelMetricValue.text = metricValue + totalCommande;
            hand.showValue(metricValue + totalCommande, 10, am4core.ease.cubicOut);

            if (labelMetricValue.text > parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>')) {
                hand.showValue(parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>'), 10, am4core.ease.cubicOut);
                document.getElementById('depassementValue').innerHTML = labelMetricValue.text - parseFloat('<?php echo json_encode((int)$r2["encours_Autorise"]); ?>');
                document.getElementById("depassementValue").style.color = "red";
                document.getElementById("depassementValue").style.fontSize = 20;
            }
        }

        function AjoutArticle() {

            var nextRow = parseInt(maxRowNumber) + 1;
            var codeArticleSubst = "codeArticle" + nextRow;
            var price = "price" + nextRow;
            var total = "total" + nextRow;
            var priceOrigin = "price" + rowNumber;
            var totalOrigin = "total" + rowNumber;
            var quantitéOrigin = "quantité" + rowNumber;
            var disponibilityOrigin = "disponibility" + rowNumber;

            for (let i = 1; i <= nbreArtSub; i++) {
                if (document.getElementById(i).checked && insertedCode.includes(codArtSubst[i - 1])) {
                    alert("Cet article est deja ajouté à la commande");
                } else {
                    if (document.getElementById(i).checked) {
                        document.getElementById(quantitéOrigin).value = parseInt(stockArtSaisie[rowNumber - 1]);
                        document.getElementById(disponibilityOrigin).innerHTML = "article disponible";
                        document.getElementById(disponibilityOrigin).style.color = "green";
                        document.getElementById(totalOrigin).innerHTML = (document.getElementById(priceOrigin).textContent * (100 - tauxDeRemise) / 100) * parseInt(stockArtSaisie[0]);
                        calculTotalCommande();

                        document.getElementById(codeArticleSubst).value = codArtSubst[i - 1];
                        insertedCode[c] = codArtSubst[i - 1];
                        c++;
                        ajax(codeArticleSubst, price, total, nextRow);
                        hideModal();
                        break;
                    }
                }
            }
        }

        function RemplacerArticle() {
            var codeArticle = "codeArticle" + rowNumber;
            var quantité = "quantité" + rowNumber;
            var disponibility = "disponibility" + rowNumber;
            var price = "price" + rowNumber;
            var total = "total" + rowNumber;

            for (let i = 1; i <= nbreArtSub; i++) {
                if (document.getElementById(i).checked && insertedCode.includes(codArtSubst[i - 1])) {
                    alert("Cet article est deja ajouté à la commande");
                } else {
                    if (document.getElementById(i).checked) {
                        insertedCode.splice(insertedCode.indexOf(document.getElementById(codeArticle).value), 1);
                        c--;
                        document.getElementById(codeArticle).value = codArtSubst[i - 1];
                        document.getElementById(quantité).value = 0;
                        document.getElementById(disponibility).innerHTML = "";
                        document.getElementById(total).innerHTML = 0;
                        calculTotalCommande();
                        insertedCode[c] = codArtSubst[i - 1];
                        c++;
                        ajax(codeArticle, price, total, rowNumber);
                        hideModal();
                        break;
                    }
                }
            }
        }

        function fermer() {
            var quantité = "quantité" + rowNumber;
            var price = "price" + rowNumber;
            var disponibility = "disponibility" + rowNumber;
            var total = "total" + rowNumber;

            $('#modalArticleSubstitution').modal("hide");
            document.getElementById(quantité).value = parseInt(stockArtSaisie[rowNumber-1]);
            document.getElementById(disponibility).innerHTML = "article disponible";
            document.getElementById(disponibility).style.color = "green";
            document.getElementById(total).innerHTML = (document.getElementById(price).textContent * (100 - tauxDeRemise) / 100) * parseInt(stockArtSaisie[rowNumber-1]);
            calculTotalCommande();
        }

        function hideModal() {
            $('#modalArticleSubstitution').modal("hide");
        }

        function initialisation(rowNumber) {
            var codeArticle = "codeArticle" + rowNumber;
            var quantité = "quantité" + rowNumber;
            var disponibility = "disponibility" + rowNumber;
            var price = "price" + rowNumber;
            var total = "total" + rowNumber;
            var bloquage = "bloquage" + rowNumber;

            document.getElementById(quantité).value = 0;
            document.getElementById(disponibility).innerHTML = "";
            document.getElementById(price).innerHTML = "0";
            document.getElementById(total).innerHTML = "0";
            document.getElementById(bloquage).innerHTML = "";
        }

        function verifierDisponibilite() {
            for (let g = 1; g <= maxRowNumber; g++) {
                var quantité = "quantité" + g;
                if (parseInt(stockArtSaisie[g - 1]) >= parseInt(quantité)) {
                    valide = true;
                }
            }
        }

        function envoyerCommande() {
            var quantité = "quantité" + rowNumber;
            if (rowNumber >= 1 && document.getElementById(quantité).value != 0) {
                insererEnteteCommande();
            }
        }

        function insererEnteteCommande() {
            var userId = '<?php echo $idUtilisateur; ?>';
            var userId1 = parseInt(userId);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "insererEnteteCommande.php", true);
            xmlhttp.setRequestHeader("Content-Type", "application/json");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var ajaxResult = JSON.parse(this.responseText);
                    numeroCommande = parseInt(ajaxResult[0]);
                    for (let k = 1; k <= maxRowNumber; k++) {
                        insererLigneCommande(k);
                    }
                }
            };
            var data = {
                "userId": userId1,
                "totalCommande": totalCommande
            };
            xmlhttp.send(JSON.stringify(data));
        }

        function insererLigneCommande(k) {

            var codeArticle = insertedCode[k - 1];
            var quantite = qteArtSaisie[k - 1];
            var prixUnitaire = prixArtSaisie[k - 1];

            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "insererLignesCommande.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    refrechPage();
                }
            };
            var data = {
                "numero_Commande": numeroCommande,
                "numero_Ligne": k,
                "code_Article": codeArticle,
                "quantite": quantite,
                "prix_Unitaire": prixUnitaire
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
                            calculTotalCommande();
                            /*insert the value for the autocomplete text field:*/
                            if (insertedCode.includes(this.getElementsByTagName("input")[0].value)) {
                                inp.value = "";
                                alert("Cet article est deja ajouté à la commande");
                            } else {
                                inp.value = this.getElementsByTagName("input")[0].value;
                                insertedCode[c] = this.getElementsByTagName("input")[0].value;
                                c++;
                                isCodeArticle = true;
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

    </html>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<?php
} else {
    header('Location: login.php');
    exit();
} ?>