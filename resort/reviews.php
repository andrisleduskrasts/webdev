<?php
include('includes/header.php');
?>
<?php
$page = addslashes($_GET['p']);
if($page == '') $page = 1;
?>
        <!--off canvas content start-->
        <div class="off-canvas-content" data-off-canvas-content>
          <!--top content-->
          <section class="top-content">
            <div class="row">
              <div class="medium-12 columns">
                <div class="head-content">
                  <h1 class="title"> 
                  </h1>
                  <span class="sub-heading">
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
                        <h2 class="title">
                        REVIEWS
                        </h2>
                        <?php $data = new Database();
                        $offset = $page*5-5;
                        $test = "post_order DESC LIMIT ".$offset.",5";
                        $where = 'post_type = "review" AND post_state = 1';
                        $count  =  $data->select(" * ", " post ", $where, $test);
                        while($r = $data->getObjectResults()){
                        ?>
                        <h2 class="divider"></h2>
                        <h3 class="title"><?php echo $r->post_title; ?></h3>
                        <p class="rating">
                          <?php $rating = preg_replace('/.*(\d).*/', '$1', $r->post_extra2);
                          $rating = (int)$rating; 
                          for($x=0; $x < $rating; $x++){
                          ?>
                          <i class="fa fa-star"></i>
                          <?php } ?>
                        </p>
                        <?php
                        echo $r->post_content; ?>
                        <?php if($r->post_extra1 != ''){ ?>
                        <p><?php echo $r->post_extra1; ?></p>
                        <?php } ?>
                        <?php }
                        $offset = $page*5;
                        $test = "post_order DESC LIMIT ".$offset.",5";
                        $where = 'post_type = "review" AND post_state = 1';
                        $count  =  $data->select(" * ", " post ", $where, $test);
                        if($r = $data->getObjectResults()){
                          ?>
                          <a href="reviews/<?php echo $page+1;?>" class="read-more">
                            More reviews
                            <i class="fa fa-chevron-right"></i>
                            <i class="fa fa-chevron-right"></i>
                            <i class="fa fa-chevron-right"></i>
                          </a>
                        <?php }
                        else if($page>1){
                        ?>
                        <a href="reviews/<?php echo $page-1;?>" class="read-more">
                            Go back
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-left"></i>
                          </a>
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
