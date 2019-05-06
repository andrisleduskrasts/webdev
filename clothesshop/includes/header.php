<!doctype html>
<?php
include_once(__DIR__ . '/..' . '/admin/includes/conexion.php');
include_once('stats-online.php');
?>

<?php $path = $_SERVER['REQUEST_URI'];
$page = preg_replace("/^\\/([^\\/\\.]+)?(?:\\.php)?\\/?.*$/", "$1", $path); 

if($page == "index") $page = '';
if($page == "store-single") $page = 'store';
$seo = str_replace("-", " ", $page);
$seo = ucwords($seo);
?>

<html lang="en">
<head>

    <meta charset="utf-8" />
    <title><?php if($seo != '') echo $seo.' | ';?>La Miamoda</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="/"/>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600italic,400italic,500' rel='stylesheet' type='text/css'>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>