<?php
    $columDataPoints = $data['top_products_sale'];
    $lineDataPoints = $data['orders_weekly'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
        var columnChart = new CanvasJS.Chart('column-chart', {
            title: {
                text: 'Top products sales',
            },
            axisY: {
                title: 'Numbers',
            },
            data: [{
                    type: 'column',
                    dataPoints: <?php echo json_encode($columDataPoints, JSON_NUMERIC_CHECK); ?>,
            }],
        });

        var lineChart = new CanvasJS.Chart('line-chart', {
            title: {
                text: 'Number of orders weekly',
            },
            axisY: {
                title: 'Numbers',
            },
            data: [{
                    type: 'line',
                    dataPoints: <?php echo json_encode($lineDataPoints, JSON_NUMERIC_CHECK); ?>
            }],
        });

        columnChart.render();
        lineChart.render()
    };

    </script>
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php print_r($data['num_user_active']['0'])?></h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <i class="bx bxs-user"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1> <?php print_r($data['num_products']['0'])?></h1>
                        <span>Products</span>
                    </div>
                    <div>
                        <i class="bx bxs-data"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php print_r($data['num_orders_today']['0'])?></h1>
                        <span>Orders Today</span>
                    </div>
                    <div>
                        <i class="bx bx-shopping-bag"></i>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php 
                                $num = (int)($data['num_income_today']['0'])/1000;
                                echo (string)$num;
                            ?>K
                        </h1>
                        <span>Income Today</span>
                    </div>
                    <div>
                        <i class="bx bxs-bank"></i>
                    </div>
                </div>
            </div>
        </div>
        <div id="column-chart"></div>
        <div id="line-chart"></div>
    </main>
</body>
</html>