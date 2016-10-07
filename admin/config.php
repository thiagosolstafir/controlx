<?php
define('url_upload_site', '/projeto/uploads');
define('url_upload_admin', '/projeto/admin/uploads');
define("URL_SITE", "http://localhost/projeto");
define("URL_ADMIN", "http://localhost/projeto/admin");

$_SESSION['url_site'] = "http://localhost/projeto";
$_SESSION['url_admin'] = "http://localhost/projeto/admin";
$_SESSION['nome_administrador'] = "Thiago Fernandes";

include('xcrud/xcrud.php');
require_once "functions.php";
require_once "medoo.php";
require_once("login_admin/config/db.php");
require_once("login_admin/classes/Login.php");
