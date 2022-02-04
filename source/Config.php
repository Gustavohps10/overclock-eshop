<?php

define("SITE", [
    "name" => "OVERCLOCK E-SHOP",
    "desc" => "lorem ipsum",
    "domain" => "",
    "locale" => "pt_BR",
    "root" => "http://localhost/git-hub/sitema-venda"
]);

/**
 * DATABASE CONN
 */

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "overclock",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

define("TRANSLATION_STATUS_PAY", [
    "created" => "Pendente",
    "expired"  => "Prazo de pagamento expirado",
    "analysis"  => "Analisando anti-fraude",
    "paid" => "Pago",
    "completed" => "Pago",
    "refunded" => "Devolvido",
    "chargeback" => "Pago"
]);

/**
 * SITE MINIFY
 */

if($_SERVER["SERVER_NAME"] == "localhost"){
    require __DIR__."/Minify.php";
}