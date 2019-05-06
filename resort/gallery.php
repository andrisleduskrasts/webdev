<?php
include('includes/header.php');
?>
<?php
$page = addslashes($_GET['p']);
if($page == '') $page = 1;
$startNumber = $page*6-5;
$endNumber = $startNumber+6;
$data = new Database();
$where = 'post_type = "gallerypost" AND post_state = 1';
$count  =  $data->select(" * ", " post ", $where);
$r = $data->getObjectResults();
?>
        <!--off canvas content start-->
        <div class="off-canvas-content" data-off-canvas-content>
          <!--top content-->
          <section class="top-content">
            <div class="row">
              <div class="medium-12 columns">
                <div class="head-content">
                  <h1 class="title"> 
                    Gallery
                  </h1>
                  <span class="sub-heading">
                    <?php echo $r->post_content; ?>
                  </span>
                </div>
              </div>
            </div>
          </section>

          <!--content-->
          <section class="content">
            <div class="row custom-row">
              <div class="medium-12 columns">
              <?php
              $gallery = json_decode( $r->post_extra2, true ); 
              $currentPic = 0;?>
                  <div class="page-content">
                  <?php
                    $gallery = current($gallery);
                    foreach ($gallery['repeater'] as $g) {
                    $currentPic++;
                    if($currentPic>=$startNumber AND $currentPic < $endNumber){?>
                    <div class="medium-6 columns">
                      <img src="photos/<?php echo $g['image']; ?>">
                    </div>
                    <?php } 
                    }?>
                    <?php
                    if($currentPic > $page*6){
                    ?>
                    <center>
                    <a href="gallery/<?php echo $page+1;?>" class="read-more">LOAD MORE IMAGES</a>
                      <i class="fa fa-chevron-right"></i>
                      <i class="fa fa-chevron-right"></i>
                      <i class="fa fa-chevron-right"></i>
                    </center>
                    <?php } 
                    else if($page>1){ ?>
                    <center>
                    <a href="gallery/<?php echo $page-1;?>" class="read-more">PREVIOUS IMAGES</a>
                      <i class="fa fa-chevron-left"></i>
                      <i class="fa fa-chevron-left"></i>
                      <i class="fa fa-chevron-left"></i>
                    </center>
                    <?php } ?>

                  </div>
              </div>
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
