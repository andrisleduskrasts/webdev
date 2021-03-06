<?php
include('includes/header.php');
?>
        <!--off canvas content start-->
        <div class="off-canvas-content" data-off-canvas-content>
          <!--top content-->
          <section class="top-content">
            <div class="row">
              <div class="medium-12 columns">
                <div class="head-content">
                  <?php
                  $data = new Database();
                  $where = 'post_type = "aboutPage" AND post_state = 1';
                  $count  =  $data->select(" * ", " post ", $where);
                  $r = $data->getObjectResults();
                  ?>
                  <h1 class="title"> 
                    <?php echo $r->post_title; ?>
                  </h1>
                  <span class="sub-heading">
                    <?php echo $r->post_extra1; ?>
                  </span>
                </div>
              </div>
            </div>
          </section>
          <!--content-->
          <section class="content">
            <div class="row custom-row">
             <div class="medium-1 columns">&nbsp;</div>  
              <div class="medium-10 columns">
                  <div class="page-content">
                    <div class="boxed-content">
                        <h2 class="title divider">
                          <?php echo $r->post_extra2; ?>
                        </h2>
                        <?php echo $r->post_content; ?>
                        <h3 class="title">
                          Harvest Moon Barn Access Statement
                        </h3>
                        <a href="" class="button btt-green">DOWNLOAD STATEMENT</a>
                        <?php if($r->post_photo != ''){ ?>
                        <img src="photos/<?php echo $r->post_photo; ?>" class="photo-gal" />
                        <?php } ?>
                      </div>
                  </div>
              </div>
             <div class="medium-1 columns">&nbsp;</div>  
            </div>
          </section>
           <a class="exit-off-canvas"></a>
          <!--off canvas content end-->
        </div>
         <!--off canvas inner wrap end-->
      </div>
       <!--off canvas wrap end-->
    </div>

<?php include('includes/footer.php');?>

  <script src="js/vendor/jquery.min.js"></script>
  <script src="js/vendor/what-input.min.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/app.js"></script>
  <script type="text/javascript">

  $(document).foundation();

/*  $('.off-canvas-wrap').foundation('offcanvas', 'show');
  $('.off-canvas-wrap').foundation('offcanvas', 'hide');*/
  $('.off-canvas-wrap').foundation('offcanvas', 'toggle', 'move-right');

/*  $('.off-canvas-wrap').foundation('offcanvas', 'show', 'move-right');
  $('.off-canvas-wrap').foundation('offcanvas', 'hide', 'move-right');
  $('.off-canvas-wrap').foundation('offcanvas', 'toggle', 'move-right');*/

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
