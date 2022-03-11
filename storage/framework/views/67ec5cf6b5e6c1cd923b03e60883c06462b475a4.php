<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Chart</title>
    <style>
        @import  url(https://fonts.googleapis.com/css?family=Roboto);

        body {
        font-family: Roboto, sans-serif;
        }

        #chart {
        max-width: 650px;
        margin: 35px auto;
        }
    </style>
</head>
<body>
    <div id="chart">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
       var options = {
            // colors:['#F44336'],

            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 100],
                    colorStops: []
                }
            },

            series: [{
                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
            }],

            chart: {
                type: 'bar',
                height: 350
            },

            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },

            dataLabels: {
                enabled: false
            },

            xaxis: {
                categories: ['Ben', 'rahul', 'manish', 'ravi', 'jaydeep', 'viral', 'arjun'],
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\opus8\resources\views/Charts/sign-up-chart.blade.php ENDPATH**/ ?>