<!doctype html>
<?php
include_once(__DIR__ . '/..' . '/admin/includes/conexion.php');
include_once('stats-online.php');
?>
<?php $path = $_SERVER['REQUEST_URI'];
$page = preg_replace("/^\\/(?:\\~splitlath\\/)?([^\\/\\.]+)?(?:\\.php)?\\/?.*$/", "$1", $path); 

if($page == "index") $page = '';
$seo = str_replace("-", " ", $page);
$seo = ucwords($seo);
?>

<html lang="en">
<head>

    <meta charset="utf-8" />
    <title><?php if($seo != '') echo $seo.' | ';?>Splitlath</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="/~splitlath/">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.min.css" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

</head>
<body<?php if($page != ''){ ?> class="services-page"<?php } ?>>

    <!-- Topnav -->
    <header id="topnav">

        <nav>
            <ul class="nav">
                <li <?php if($page == '') echo 'class = "current"';?>><a href="">Home</a></li>
                <li <?php if($page == 'about') echo 'class = "current"';?>><a href="about/">About</a></li>
                <li <?php if($page == 'services') echo 'class = "current"';?>><a href="services/">Services</a></li>
                <li <?php if($page == 'projects') echo 'class = "current"';?>><a href="projects/">Projects</a></li>
            </ul>
        </nav>

        <a href="" class="logo"></a>

        <a href="" class="right mobilemenu">
            <i class="fa fa-bars"></i>
        </a>

        <div class="right contact">
            +44 (0) 1497 821921 -
            <a href="mailto:enquiries@splitlath.com">enquiries@splitlath.com</a>
            <a href="#" class="fb-icon"></a>
        </div>

    </header>

    <!-- Page Header for non-index pages -->
    <?php
    if($page != ''){?>
    
    <section id="pagehead" style="background-image: url(assets/images/header.jpg)">
        <div class="headline">
            <h2><?php switch($page){
                case "services":
                echo "Our Skills and Services";
                break;
                case "about":
                echo "About Us";
                break;
                case "projects":
                echo "Our Projects";
                break;
                } ?></h2>
        </div>
    </section>
    <?php } ?>