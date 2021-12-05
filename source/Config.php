<?php

define("SITE", [
    "name" => "GHPS",
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
    "dbname" => "lanchonete",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * SITE MINIFY
 */

if($_SERVER["SERVER_NAME"] == "localhost"){
    require __DIR__."/Minify.php";
}

/**
 * MAIL CONNECT
 */

define("MAIL", [
    
]);