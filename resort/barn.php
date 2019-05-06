<?php
include('includes/header.php');
?>
<?php
$id = addslashes($_GET['id']);
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
                  $where = 'post_type = "barn" AND post_id = '.$id.' AND post_state = 1';
                  $count  =  $data->select(" * ", " post ", $where);
                  $r = $data->getObjectResults();
                  ?>
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
                        <?php echo $r->post_title; ?>
                        </h2>
                        <img src="photos/<?php echo $r->post_photo; ?>"></img>
                        <?php echo $r->post_extra1; ?>
                        <h2 class="title divider">
                        Some more photos
                        </h2>
                        <?php
                        $gallery = json_decode( $r->post_extra2, true ); 
                        $gallery = current($gallery);
                        foreach ($gallery['repeater'] as $g) {
                        ?>
                        <img src="photos/<?php echo $g['image']; ?>">
                        <p></p>
                        <?php } ?>
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
