<?php
ob_start();
session_start();
require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());
$router->namespace("Source\Controllers");

/**
 * App
 */
$router->group(null);
$router->get("/", "App:home", "app.home");
$router->get("/conta", "App:account", "app.account");
$router->get("/conta/editar", "App:editAccount", "app.editAccount");
$router->get("/sair", "App:logoff", "app.logoff");
$router->get("/busca", "App:search", "app.search");
$router->get("/produto/{id}", "App:productDetail", "app.productDetail");
$router->get("/carrinho", "App:order", "app.order");
$router->get("/MeusPedidos", "App:listOrders", "app.listOrders");
$router->get("/MeusPedidos/{id}", "App:detailOrder", "app.detailOrder");

/**
 * Address
 */
$router->group("/enderecos");
$router->get("/", "Address:listAddresses", "address.listAddresses");
$router->get("/cadastrar", "Address:register", "address.register");
$router->get("/editar", "Address:edit", "address.edit");

/**
 * Web Address
 */

$router->post("/read", "WebAddress:read", "webAddress.read");
$router->get("/register", "WebAddress:register", "webAddress.register");
$router->get("/edit", "WebAddress:edit", "webAddress.edit");
$router->get("/delete", "WebAddress:delete", "webAddress.delete");

/**
 * Cart
 */
$router->group("/cart");
$router->post("/", "WebCart:cart", "cart.cart");
$router->post("/add/{id}", "WebCart:add", "cart.add");
$router->post("/remove/{id}", "WebCart:remove", "cart.remove");
$router->post("/clear", "WebCart:clear", "cart.clear");
$router->get("/registerOrder", "WebCart:registerOrder", "cart.registerOrder");

/*
 *Web
 */
$router->group(null);
$router->get("/login", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");

/**
 * Auth
 */
$router->group(null);
$router->post("/auth", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/edit", "Auth:edit", "auth.edit");

/**
 * Admin
 */
$router->group("admin");
$router->get("/dashboard", "Admin:dashboard", "admin.dashboard");

//---Perfis
$router->get("/perfil", "Admin:profiles",  "admin.profiles");
$router->get("/perfil/cadastrar", "Admin:addProfile",  "admin.addProfile");
$router->get("/perfil/editar/{id}", "Admin:editProfile",  "admin.editProfile");

//---Usuarios
$router->get("/usuario", "Admin:users",  "admin.users");

//---Produtos
$router->get("/produto", "Admin:products",  "admin.products");
$router->get("/produto/cadastrar", "Admin:addProduct",  "admin.addProduct");
$router->get("/produto/editar/{id}", "Admin:editProduct",  "admin.editProduct");

/**
 * Admin - Crud 
 */

//---Perfis
$router->post("/perfil/addProfile", "Crud:addProfile", "crud.addProfile");
$router->post("/perfil/editProfile", "Crud:editProfile", "crud.editProfile");
$router->post("/perfil/deleteProfile", "Crud:deleteProfile", "crud.deleteProfile");

//---Produtos
$router->post("/produto/addProduct", "Crud:addProduct", "crud.addProduct");
$router->post("/produto/editProduct", "Crud:editProduct", "crud.editProduct");
$router->post("/produto/deleteProduct", "Crud:deleteProduct", "crud.deleteProduct");

/*
 *Errors
 */

$router->group("ooops");
$router->get("/{errcode}", "App:error", "app.error");
$router->get("/denied", "App:denied", "app.denied");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}

ob_end_flush();