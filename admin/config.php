<?php
define('url_upload_site', '/controlx/uploads');
define('url_upload_admin', '/controlx/admin/uploads');
define("URL_SITE", "http://localhost/controlx");
define("URL_ADMIN", "http://localhost/controlx/admin");

$_SESSION['url_site'] = "http://localhost/controlx";
$_SESSION['url_admin'] = "http://localhost/controlx/admin";
$_SESSION['nome_administrador'] = "Thiago Fernandes";

include('xcrud/xcrud.php');
require_once "functions.php";
require_once "medoo.php";
require_once("login_admin/config/db.php");
require_once("login_admin/classes/Login.php");
