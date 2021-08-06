
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        <script src="//www.amcharts.com/lib/4/themes/animated.js"></script>

        <script type="text/javascript">
            am4core.useTheme(am4themes_animated);
            var chartMin = 0;
            var chartMax = 300000;

            var data = {
                score: 52.7,
                gradingData: [{
                        title: " Bad",
                        advice: "Market is disappearing",
                        color: "#E53935",
                        lowScore: 0,
                        highScore: 50000
                    },
                    {
                        title: "Warning",
                        advice: "Warning - underdelivering",
                        color: "#FB8C00",
                        lowScore: 50000,
                        highScore: 120000
                    },
                    {
                        title: "OK",
                        advice: "Well done",
                        color: "#43A047",
                        lowScore: 120000,
                        highScore: 300000
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
            axis2.numberFormatter.numberFormat = "'$'#a";

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
             * Metric Value
             */

            var labelMetricValue = chart.radarContainer.createChild(am4core.Label);
            labelMetricValue.isMeasured = false;
            labelMetricValue.fontSize = "4em"; //el valeur el 7amra
            labelMetricValue.x = am4core.percent(50);
            labelMetricValue.paddingBottom = 15;
            labelMetricValue.horizontalCenter = "middle";
            labelMetricValue.verticalCenter = "bottom";
            //labelMetricValue.dataItem = data;
            labelMetricValue.text = data.score.toFixed(1);
            //labelMetricValue.text = "{score}";
            labelMetricValue.fill = am4core.color(matchingGrade.color);

            /**
             * Hand
             */
            var hand = chart.hands.push(new am4charts.ClockHand());
            hand.axis = axis2;
            hand.radius = am4core.percent(85);
            hand.innerRadius = am4core.percent(50);
            hand.startWidth = 10;
            hand.pixelHeight = 10;
            hand.pin.disabled = true;
            hand.value = data.score;
            hand.fill = am4core.color("#444"); //lebra lekbira
            hand.stroke = am4core.color("#000");

            var handTarget = chart.hands.push(new am4charts.ClockHand());
            handTarget.axis = axis2;
            handTarget.radius = am4core.percent(100);
            handTarget.innerRadius = am4core.percent(105);
            handTarget.fill = axis2.renderer.line.stroke;
            handTarget.stroke = axis2.renderer.line.stroke;
            handTarget.pin.disabled = true;
            handTarget.pin.radius = 10;
            handTarget.startWidth = 10;
            handTarget.fill = am4core.color("#444"); //lebra s8ira
            handTarget.stroke = am4core.color("#000");

            hand.events.on("positionchanged", function() {
                var t = axis2.positionToValue(hand.currentPosition).toFixed(0);
                var formattedValue = chart.numberFormatter.format(t, "'$'#.#a");
                labelMetricValue.text = formattedValue;

                var value2 = axis.positionToValue(hand.currentPosition);
                var matchingGrade = lookUpGrade(axis.positionToValue(hand.currentPosition), data.gradingData);
                labelAdvice.text = matchingGrade.advice.toUpperCase();
                labelAdvice.fill = am4core.color(matchingGrade.color);
                labelAdvice.stroke = am4core.color(matchingGrade.color);
                labelMetricValue.fill = am4core.color(matchingGrade.color);
            })

            setInterval(function() {
                var value = chartMin + Math.random() * (chartMax - chartMin);
                var value = 85000; // 2020 12500, 2019 80000, 2017 20000
                hand.showValue(value, 1000, am4core.ease.cubicOut);

                value = 145000;
                handTarget.showValue(value, 1000, am4core.ease.cubicOut);
                axis2.axisRanges.values[1].axisFill.fillOpacity = 0.2;
                axis2.axisRanges.values[2].axisFill.fillOpacity = 0.2;
            }, 3000);
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