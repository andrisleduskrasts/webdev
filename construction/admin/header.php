<?php
include("includes/autentificacion.php");
date_default_timezone_set('Europe/London');


/********DEBUG*************/
/*error_reporting(E_ALL);
ini_set('display_errors', '1');
*/

if (!isset($_POST["action"]) and !isset($_GET["action"])) { // si llega esto no muestro el header para que no me diga headers already sent
include_once("includes/config.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo SITENAME;?> - Site Admin </title>



<link href="js/lytebox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/helpers.css" />
<link rel="stylesheet" href="css/font-awesome.css" />
<link href="css/styles.css" rel="stylesheet" type="text/css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<script type="text/javascript" language="javascript" src="js/interface.js"></script>

<script type="text/javascript" language="javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>

<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script type="text/javascript" src="js/plupload/moxie.min.js"></script>
<script type="text/javascript" src="js/plupload/plupload.dev.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/jquery.gomap-1.3.2.js"></script>

		<script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>

		<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){

				// Datepicker
				$('.datepicker').datepicker({
					inline: true,
					dateFormat: 'yy-mm-dd'
				});


				$('.datepickertime').datetimepicker({
					inline: true,
					dateFormat: 'yy-mm-dd',
					timeFormat: 'HH:mm:ss',
					stepHour: 1,
					stepMinute: 5,
					stepSecond: 10
				});


			});
		</script>

<?php include("includes/tinymce.php"); ?>

</head>

<body>


<div id="wrapper">

<div class="sidebar">

	<div class="inner">

            <div class="logo">
                <a href="/~splitlath/admin/"><img src="img/logo.png" alt="<?php echo SITENAME;?>" /></a>
      	</div>

		<ul>
      		<li class="closed" id='home'>
				<a href="javascript:void(0) "><span>Home</span></a>
				<ul>
					<li>
						<a href="home.php?list=1"><span>Home Slider</span></a>
						<a href="home.php" class='new'>New</a>
					</li>
					<li>
						<a href="about.php?id=59"><span>Introduction</span></a>
					</li>
					<li>
						<a href="projects.php?list=1"><span>Projects</span></a>
						<a href="projects.php" class='new'>New</a>
					</li>
					<li>
						<a href="services.php?id=64"><span>Services</span></a>
					</li>
				</ul>
			</li>

			<li class="closed" id='about'>
				<a href="javascript:void(0) "><span>About Us</span></a>
				<ul>
					<li>
						<a href="about.php?id=59"><span>About Us</span></a>
					</li>
				</ul>
			</li>

			<li class="closed" id='services'>
				<a href="javascript:void(0) "><span>Services</span></a>
				<ul>
					<li>
						<a href="servicesText.php?id=66"><span>Upper Text</span></a>
					</li>
					<li>
						<a href="categories.php?list=1"><span>Categories</span></a>
						<a href="categories.php" class='new'>New</a>
					</li>
					<li>
						<a href="servicesList.php?list=1"><span>List of Services</span></a>
						<a href="servicesList.php" class='new'>New</a>
					</li>
					<li>
						<a href="lowerText.php?id=84"><span>Lower Content</span></a>
					</li>
				</ul>
			</li>

			<li class="closed" id='projects'>
				<a href="javascript:void(0) "><span>Projects</span></a>
				<ul>
					<li>
						<a href="projects.php?list=1"><span>Project List</span></a>
						<a href="projects.php" class='new'>New</a>
					</li>
				</ul>
			</li>

			<li class="closed" id='adminusers'>
				<a href="javascript:void(0) "><span>Users</span></a>
				<ul>
					<li>
						<a href="users.php?list=1"><span>Users</span></a>
						<a href="users.php" class='new'>New</a>
					</li>

				</ul>
			</li>


			<li class="logout"><a href="login.php?out=1" title="Log Out"><span>Log Out</span></a></li>
            </ul>
            <div class="version"><a href="logfile.php"><?php echo SITENAME;?> CMS Version <?php echo $version ?></a></div>
	</div>

</div>



<script type="text/javascript">
			$(document).ready(function () {


				$('.closed a').live('click',function () {
					$('.expanded ul').slideUp(500, function () {
						$(this).parent().removeClass('expanded');
						$(this).parent().addClass('closed');
					});

					$(this).parent().addClass('expanded');
					$(this).parent().removeClass('closed');
					$(this).next().slideDown();
				});

				$('.expanded a').live('click',function () {


					$(this).next().slideUp(500, function () {
						$(this).parent().removeClass('expanded');
						$(this).parent().addClass('closed');
					});

				});


				<?php if (isset($menu_active)) {?>
				$('#<?php echo $menu_active;?>').addClass('expanded active');
				$('#<?php echo $menu_active;?>').removeClass('closed');
				$('ul','#<?php echo $menu_active;?>').show();
				<?php } ?>

			});
			</script>
<?php } ?>
