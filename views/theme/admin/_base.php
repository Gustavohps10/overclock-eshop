<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <?= $v->section("head"); ?>
    <link rel="stylesheet" href="<?= asset("/css/nav.css")?>">
    <title><?= $title ?></title>
</head>
<body>
    <div class="sidenav">
        <div class="sidenav-header">
            LOGO
        </div>
        <div class="box-container">
            <div class="box">
                <ul>
                    <li class="title">Main</li>
                    <li><a href="dashboard.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="perfil.php"><i class="far fa-id-card"></i>Perfis</a></li>
                    <li><a href="#"><i class="fas fa-users"></i>Usuários</a></li>
                    <li><a href="#"><i class="fas fa-box-open"></i>Produtos</a></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="title">BOX 2</li>
                    <li><a href="#"><i class="fas fa-home"></i>Item 1</a></li>
                    <li><a href="#"><i class="far fa-id-card"></i>Item 2</a></li>
                    <li><a href="#2"><i class="fas fa-users"></i>Item 3</a></li>
                    <li><a href="#"><i class="fas fa-box-open"></i>Item 4</a></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="title">BOX 3</li>
                    <li><a href="#"><i class="fas fa-home"></i>Item 1</a></li>
                    <li><a href="#"><i class="far fa-id-card"></i>Item 2</a></li>
                    <li><a href="#"><i class="fas fa-users"></i>Item 3</a></li>
                    <li><a href="#"><i class="fas fa-box-open"></i>Item 4</a></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="title">BOX 4</li>
                    <li><a href="#"><i class="fas fa-home"></i>Item 1</a></li>
                    <li><a href="#"><i class="far fa-id-card"></i>Item 2</a></li>
                    <li><a href="#"><i class="fas fa-users"></i>Item 3</a></li>
                    <li><a href="#"><i class="fas fa-box-open"></i>Item 4</a></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="title">BOX 5</li>
                    <li><a href="#"><i class="fas fa-home"></i>Item 1</a></li>
                    <li><a href="#"><i class="far fa-id-card"></i>Item 2</a></li>
                    <li><a href="#"><i class="fas fa-users"></i>Item 3</a></li>
                    <li><a href="#3"><i class="fas fa-box-open"></i>Item 4</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?= $v->section("modal");?>
    
    <div class="padding-container">
        <header>
            <div class="user">
                <a href="#" class="fas fa-bell"></a>
                <img src="../images/pic-1.jpg" alt="">
            </div>
        </header>
        <?= $v->section("content");?>
    </div>

    <?= $v->section("scripts");?>
</body>
</html>