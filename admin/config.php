<?php
$_SESSION['url_upload_home'] = "/thiago/uploads";
$_SESSION['url_upload_admin'] = "/thiago/admin/uploads";
$_SESSION['url_site'] = "http://localhost/thiago";
$_SESSION['url_admin'] = "http://localhost/thiago/admin";
define("URL_SITE", "http://localhost/thiago");
define("URL_ADMIN", "http://localhost/thiago/admin");
include('xcrud/xcrud.php');
require_once "functions.php";
require_once "medoo.php";

require_once("login_admin/config/db.php");
require_once("login_admin/classes/Login.php");

$_SESSION['nome_administrador'] = "Thiago Fernandes";
