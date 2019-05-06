<?php

if (isset($_POST['action']) AND $_POST['action'] == 'send') {

	$_GET['debug'] = 1;
    
    foreach($_POST as $nombre_campo => $valor){ if (!is_array($valor)) $asignacion = "\$" . $nombre_campo . "='" . addslashes(htmlspecialchars($valor)) . "';"; eval($asignacion); }//end foreach
        $msj = 'From: '.$name.' '.$lastname.'&lt;'.$email.'&gt; <br><br> Phone: '.$telephone.'<br> Message: '.$message;
    $msgSub  = 'Message from Harvest Moon Barn form';

    $msgTo = 'recipient@domain.com';
    include("admin/notify/index.php");
    echo 1;
    exit;
}

include('includes/header.php');
?>
        <div class="off-canvas-content" data-off-canvas-content>
          <!--top content-->
          <section class="top-content">
            <div class="row">
              <div class="medium-12 columns">
                <div class="head-content">
                </div>
              </div>
            </div>
          </section>
          <section class="content">
            <div class="row custom-row">
             <div class="medium-1 columns">&nbsp;</div>  
              <div class="medium-10 columns">
                  <div class="page-content">
                    <div class="boxed-content">
                        <h2 class="title divider">
                          Contact Us
                        </h2>
                        	<p>
                        		For any further information please contact us <br>
								Coed Mawr Farm, Hundred House, Powys LD1 5RP <br>
								Telephone: +44 (0)1982 570491    <br>
								Fax: +44 (0)1982 570492 <br>
								Email: <a href="mailto:chris@harvestmoonbarn.co.uk">chris@harvestmoonbarn.co.uk</a>
							</p>
                      </div>
                    <div>
                    <form action="" class="custom" data-abide='ajax'  id='contactform' method='POST'>
				
						<div class="row">
							<div class="medium-6 columns">
								<div class="field">
									<label for="name">Name</label>
									<input type="text" name='name' required id='name'  >
								</div>
							</div>
							<div class="medium-6 columns">
								<div class="field">
									<label for="lastname">Last Name</label>
									<input type="text" name='lastname' id='lastname'>
								</div>
							</div>
							<div class="medium-6 columns">
								<div class="field">
									<label for="email">Email</label>
									<input type="email" name='email' required id='email'  >
								</div>
							</div>
							<div class="medium-6 columns">
								<div class="field">
									<label for="telephone">Telephone</label>
									<input type="text" name='telephone' id='telephone'>
								</div>
							</div>
							<div class="columns medium-12">
								<label for="Message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10" required></textarea>
							</div>
							<input type="hidden" name='action' value='send'>
							<button>Send</button>
							<input type="hidden" value='send' name='action'>

							<div data-alert class="alert-box success" style='display: none; margin: 20px 0' id="alert">
								<a href="#" class="close">&times;</a>
							</div>
							
						</form>

                      </div>
                  </div>
              </div>
             <div class="medium-1 columns">&nbsp;</div>  
            </div>
          </section>
           <a class="exit-off-canvas"></a>
          <!--off canvas content end-->
        </div>

    
<?php include('includes/footer.php');?>
  <script src="js/vendor/jquery.min.js"></script>
  <script src="js/vendor/what-input.min.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/app.js"></script>
  <script type="text/javascript">

  $(document).foundation();

  $('.off-canvas-wrap').foundation('offcanvas', 'show', 'move-right');
  $('.off-canvas-wrap').foundation('offcanvas', 'hide', 'move-right');
  $('.off-canvas-wrap').foundation('offcanvas', 'toggle', 'move-right');

    function sideNav() {
      if ($(window).width() < 960) {
        $('.off-canvas-wrap').removeClass('move-right');
      } else {
        $('.off-canvas-wrap').addClass('move-right');
      }  
    }

    $(window).resize(function() {
      sideNav();
    });
  </script>
  </body>
</html>