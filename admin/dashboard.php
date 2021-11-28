<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../libs/morris.css">
    <title>Dashboard</title>
</head>
<body>
    <?php include_once 'components/sidenav.php'; ?>
    <div class="padding-container">
        <?php include_once 'components/header.php' ?>
        
        <section class="main-data" id="main-data">
            <h1>Dashboard</h1>
            <div class="box-container">
                <div class="box" id="new-orders">
                    <i class="fas fa-shopping-basket"></i>
                    <div class="info">
                        <span>7.890</span>
                        <h1>Novos Pedidos</h1>
                    </div>
                </div>
                <div class="box" id="new-users">
                    <i class="fas fa-user-plus"></i>
                    <div class="info">
                        <span>7.890</span>
                        <h1>Novos usuarios</h1>
                    </div>
                </div>
                <div class="box" id="total-sales">
                    <i class="fas fa-dollar-sign"></i>
                    <div class="info">
                        <span>$66.900</span>
                        <h1>Novos usuarios</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="statistics" id="statistics">
            <div class="box-container">
                <div class="box" id="bar-chart">
                    <h1>Title Chart</h1>
                    <div id="chart-1"></div>
                </div>
                <div class="box" id="line-chart">
                    <h1>Title Chart</h1>
                    <div id="chart-2"></div>
                </div>
                <div class="box" id="donut-chart">
                    <h1>Title Chart</h1>
                    <div id="chart-3"></div>
                </div>
                <div class="box" id="products-info">
                    <h1>Products Info</h1>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-1.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-2.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-3.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-5.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-5.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                    <div class="product">
                        <div class="image">
                            <img src="../images/dishe-5.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Product Name</h2>
                            <span>Qtd Vendida</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../libs/morris.min.js"></script>
    <script src="../js/dashboard.js"></script>
</body>
</html>