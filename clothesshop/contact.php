<?php
include('includes/header.php');
if (isset($_POST['action']) AND $_POST['action'] == 'send') {
  /*$captcha;
  */$failedForm="";/*
  if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

	if(!$captcha){
	  $failedForm = "miss";
	}
	else {
	        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf3gR8TAAAAAFpKDCJhc_ThmcbR4bM6PTCCAZ7p&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
	        if($response['success'] == false){
	            $failedForm = "bot";
	        }
	        else{*/
				$_GET['debug'] = 1;
			    
			    foreach($_POST as $nombre_campo => $valor){ if (!is_array($valor)) $asignacion = "\$" . $nombre_campo . "='" . addslashes(htmlspecialchars($valor)) . "';"; eval($asignacion); }//end foreach
			    $msj = 'From: '.$name.' &lt;'.$email.'&gt; <br><br>Message: '.$message;
			    $msgSub  = 'Jautajums no La Miamoda';
			    /*$data = new Database();
			    $where = 'post_type = "email" AND post_state = 1';
			    $count  =  $data->select(" * ", " post ", $where);
			    $r = $data->getObjectResults();*/
			    //$msgTo = $r->post_title; //recipient e-mail
			    $msgTo = 'miamodalv@gmail.com'; //recipient e-mail
			    include("admin/notify/index.php");
			    $msgSent = 1;
	        /*}
	 }*/
}
?>
<body class="portfolio-page inner-page">

    <?php
    include('includes/navigation.php');
    ?>
    <!-- Content -->
    <section id="after-content">
        <div class="row">
            <div class="columns large-12">
                <h2 class="headline">Jautā Mums<span class="hl"></span></h2>
            </div>
            <?php if($msgSent==1){?>
    		<div class="columns medium-12">
    			<h3 style="text-align:center">Ziņojums nosūtīts!</h3>
    		</div>
    		<?php }
    		/*else if($failedForm=="miss"){?>
       			<h3 style="text-align:center">Please check the reCAPTCHA</h3>
    		<?php } */?>
        </div>
        <div class="row">
        	<!--<form action="" data-abide='ajax' method='post'>-->
        	<form action="" method='post'>
	            <div class="columns large-6">

	                    <div class="form-row">
	                        <input type="text" placeholder="* Vārds" required name='name'/>
	                    </div>

	            </div>
	            <div class="columns large-6">

	                    <div class="form-row">
	                        <input type="text" placeholder="* E-pasts atbildes saņemšanai" required name='email'/>
	                    </div>
	            </div>
	            <div class="columns large-12">
	                    <div class="form-row">
	                        <textarea placeholder="* Jautājums" name='message' required></textarea>
	                    </div>
	                    <input type="hidden" name='action' value='send'>
	                    <?php /*<div class="form-row">
	                        <div class="g-recaptcha" data-sitekey="6Lf3gR8TAAAAAOJGL_OtjVR3hLMGqFV0M48zMx2M"></div>
	                    </div> */?>
	                    <div class="form-row" style="margin-top:12px">
	                        <button type="submit">Nosūtīt</button>
	                    </div>
	            </div>
		    </form>
        </div>
    </section>

<?php
include('includes/footer.php');
?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
