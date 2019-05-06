<?php
//session_cache_limiter('nochache,private'); 
session_start();
$msjerror = 0;

//print_r($_SESSION);

include("includes/config.php");

if (isset($_GET["out"])) {
    session_destroy();
    header ("Location: login.php"); 
    exit;
}
if (isset($_POST["action"])) {

	include("includes/conexion.php");
	

	$usuario = mysql_real_escape_string(trim(($_POST['usuario'])));
	$clave = mysql_real_escape_string(trim($_POST['clave']));
	global $salt;
	$clave = sha1($clave.$salt);
	
	$sql = "SELECT * FROM users WHERE u_user = '$usuario' AND u_pass = '$clave' LIMIT 0,1";
	//echo $sql;
	$query = query($sql,CONNECTION);
	$r = result($query);

	//echo $clave;
	
	//Super1985_Mario
	if (filas($query)) {

			$id = $r["u_id"];
			/*session_register("administrador");
			session_register("idusuario");
			session_register("userusuario");*/
			$_SESSION["administrador"] = true;
			$_SESSION["iduser"] = $r["u_id"];
			$_SESSION["user"] = $r["u_user"];
			$_SESSION["level"] = $r["u_level"];
			$_SESSION["user_admin_name"]  = $r["u_name"];





			cerrar($conexion);
			
			header ("Location: index.php"); 
			exit;

	} else {
		
		mysql_free_result($query);
		cerrar($conexion);
		unset($usuario,$password,$_POST["action"],$dia);
		session_destroy();
                $msjerror = 1;
				
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="login">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php global $sitename; echo $sitename;?></title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="js/lytebox.css" rel="stylesheet" type="text/css">
<script src="js/jquerytools.js" type="text/javascript"></script>
<script src="js/run.js" type="text/javascript"></script>
<script src="js/lytebox.js" type="text/javascript"></script>


</head>

<body class='login'>

<div class="logo">
            	
                <img src="img/logo.png" alt="Berri online" />
                
            </div><!--fin logo-->

<form action="login.php" id="formlogin" name="formlogin" method="post">



<label>User</label>
<div class="clear"></div>
<input type="text" aria-required="true" tabindex="1"  class="txt nombre"  onblur="$(this).removeClass('active');" onfocus="$(this).addClass('active');" name="usuario">

<label>Password</label>
<div class="clear"></div>
<input type="password" aria-required="true" tabindex="1"  class="txt password"  onblur="$(this).removeClass('active');" onfocus="$(this).addClass('active');" name="clave">

<input name="action" value="1" type="hidden">



<input class="btn center"  type="submit" value="Enter">
	
<?php if ($msjerror == 1) {?><p>The user and/or password are incorrect.</p><?php } ?>

</form>


<script type="text/javascript">
function submitform()
{
  document.formlogin.submit();
}
</script> 



</body>
</html>

	