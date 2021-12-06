<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $router->route("auth.register")?>" method="post">
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="password">
        <input type="submit" value="CADASTRAR">
    </form>
</body>
</html>