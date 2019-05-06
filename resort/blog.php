<?php
include('includes/header.php');
?>
<?php
$page = addslashes($_GET['p']);
if($page == '') $page = 1;
$cat = addslashes($_GET['cat']);
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
                  $limit = $page*3-3;
                  $setting = "post_date DESC LIMIT ". $limit . ",3";
                  if($cat != ''){
                    $where =  'post_type = "blogPost" AND post_extra1 LIKE "%'. $cat .'%" AND post_state = 1';
                  }
                  else{
                  $where = 'post_type = "blogPost" AND post_state = 1';
                  }
                  $count  =  $data->select(" * ", " post ", $where, $setting);
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
                  <?php
                  while($r = $data->getObjectResults()){;
                  ?>
                    <div class="boxed-content">
                        <h2 class="title divider">
                          <?php echo $r->post_title; ?>
                        </h2>
                        <p>Posted on <?php echo date('jS F Y', strtotime($r->post_date));?> in <?php 
                        $category = preg_replace('/\[\"(.*?)\"\]/', '$1', $r->post_extra1); //remove surrounding []
                        $category = preg_replace('/\,/', ', ', preg_replace('/\"/', '', $category)); //remove quotes and add space comma
                        $category2 = preg_replace('/-/', ' ', $category); // add spaces instead of dashes.
                        $category2 = ucwords($category2); // capitalize words function
                        ?><a href = "blog/<?php echo $category; ?>/"><?php echo $category2; ?></a></p>
                        <?php echo $r->post_content; ?>
                      </div>
                    <?php }
                        $offset = $page*3;
                        $test = "post_order DESC LIMIT ".$offset.",3";
                        if($cat != ''){
                        $where =  'post_type = "blogPost" AND post_extra1 LIKE "%'. $cat .'%" AND post_state = 1';
                        }
                        else{
                        $where = 'post_type = "blogPost" AND post_state = 1';
                        }
                        $count  =  $data->select(" * ", " post ", $where, $test);
                        if($r = $data->getObjectResults()){
                          ?>
                          <a href="blog/<?php if($cat!='') {?><?php echo $cat; ?>/<?php } ?><?php echo $page+1;?>" class="read-more">
                            More entries
                            <i class="fa fa-chevron-right"></i>
                            <i class="fa fa-chevron-right"></i>
                            <i class="fa fa-chevron-right"></i>
                          </a>
                        <?php }
                        else if($page>1){
                        ?>
                        <a href="blog/<?php if($cat!='') {?><?php echo $cat; ?>/<?php } ?><?php echo $page-1;?>" class="read-more">
                            Go back
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-left"></i>
                          </a>
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
