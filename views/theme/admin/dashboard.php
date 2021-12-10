<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head");?>
    <link rel="stylesheet" href="<?=asset("/css/dashboard.css"); ?>">
    <link rel="stylesheet" href="<?=asset("/libs/morris.css"); ?>">
<?php $v->end();?>

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

<?php $v->start("scripts");?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?= asset("/libs/morris.min.js");?>"></script>
    <script src="<?= asset("js/dashboard.js");?>"></script>
<?php $v->end();?>