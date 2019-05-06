<!doctype html>
<?php
include('includes/header.php');
?>
        <!--off canvas content start-->
        <div class="off-canvas-content" data-off-canvas-content>
          <!--top content-->
          <section class="top-content">
            <div class="row">
              <div class="medium-3 columns">
               &nbsp;
              </div>
              <?php
$data = new Database();
$where = 'post_type = "titleText" AND post_state = 1';
$count  =  $data->select(" * ", " post ", $where);
$r = $data->getObjectResults();
?>
              <div class="medium-9 columns custom-row">
                <div class="head-content">
                  <h1 class="title"> 
                    <?php echo $r->post_title;?>
                  </h1>
                  <span class="sub-heading">
                    <?php echo $r->post_content;?>
                  </span>
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
    <?php
	$where = 'post_type = "intro" AND post_state = 1';
	$count  =  $data->select(" * ", " post ", $where);
	$r = $data->getObjectResults();
    ?>
          <!--content-->
          <section class="content">
            <div class="welcome-section">
              <div class="row">
                <div class="medium-2 columns">&nbsp;</div> 
                <div class="medium-8 columns">
                    <h2 class="title bold"><?php echo $r->post_title;?></h2>
                    <span class="sub-heading divider"><?php echo $r->post_extra1;?></span>
                    <?php echo $r->post_content;?>
                </div> 
                <div class="medium-2 columns">&nbsp;</div> 
              </div>
            </div>

            <div class="post-section">
    <?php
    $where = 'post_type = "barn" AND post_state = 1';
	$count  =  $data->select(" * ", " post ", $where, "post_order DESC");
	while($r = $data->getObjectResults()){
    ?>
              <div class="row">
                <div class="medium-6 columns">
                  <div class="post-container">
                    <h2 class="title"><?php echo $r->post_title;?></h2>
                    <img src="photos/<?php echo $r->post_photo; ?>"/>
                    <?php echo $r->post_content;?>
                    <a href="barn.php?id=<?php echo $r->post_id; ?>" class="read-more">
                      Read more
                      <i class="fa fa-chevron-right"></i>
                      <i class="fa fa-chevron-right"></i>
                      <i class="fa fa-chevron-right"></i>
                    </a>
                  </div>
                </div> 
    <?php } ?>
              </div>
            </div>

            <div class="video-section">
    <?php
    $where = 'post_type = "videoLink" AND post_state = 1';
	$count  =  $data->select(" * ", " post ", $where);
	while($r = $data->getObjectResults()){
    ?>
              <div class="row">
                <div class="medium-2 columns">&nbsp;</div> 
                <div class="medium-8 columns">
                  <div class="video-container">
                   <iframe src="<?php echo $r->post_content;?>" frameborder="0" allowfullscreen></iframe> 
                  </div>
                </div> 
                <div class="medium-2 columns">&nbsp;</div> 
              </div>
            </div>
     <?php } ?>

			<div class="testimonial-section">
				<div class="row">
				    <?php
				    $where = 'post_type = "reviewTitle" AND post_state = 1';
					$count  =  $data->select(" * ", " post ", $where);
					$r = $data->getObjectResults();
				    ?>
					<div class="medium-12 columns">
						<h2 class="title bold divider"><?php echo $r->post_title; ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="testimonial-post">
					<!--tab content-->
						<div class="testimonial-carousel">
						<?php
					   $where = 'post_type = "review" AND post_state = 1';
						$count  =  $data->select(" * ", " post ", $where, 'post_order DESC LIMIT 0,9');
						while($r = $data->getObjectResults()){
					    ?>
							<div class="medium-4 columns">
								<div class="box">
									<h3 class="title"><?php echo $r->post_title; ?></h3>
									<ul class="rating">
									<?php $rating = preg_replace('/.*(\d).*/', '$1', $r->post_extra2);
									$rating = (int)$rating; 
									for($x=0; $x < $rating; $x++){
									?>
										<li class="star active"><i class="fa fa-star"></i></li>
									<?php } ?>
									<?php 
									for ($x=0; $x < 5-$rating; $x++){ ?>
										<li class="star"><i class="fa fa-star"></i></li>
									<?php } ?>
									</ul>
									<?php if( strlen($r->post_content) > 330){
									$content = substr($r->post_content, 0, 325) . "..."; 
									}
									else {
									$content = $r->post_content;
									}
									echo $content; ?>
									<a href="reviews.php" class="read-more">
										Read more
										<i class="fa fa-chevron-right"></i>
										<i class="fa fa-chevron-right"></i>
										<i class="fa fa-chevron-right"></i>
									</a>
									<?php if($r->extra1 != ''){ ?>
									<span class="date"><?php echo $r->post_extra2; ?></span>
									<?php } ?>
								</div>
								<div class="caret-holder"><i class="fa fa-caret-down"></i></div>
								<div class="visitor-ico">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>  
				</div>  
			</div>

            <div class="location-section">
              <div class="row expanded medium-collapse large-collapse">
                <div class="medium-12 large-6 columns">
                  <div class="well">
                  <!--map-->
                   <div id="map" class="map"></div>
                   <div class="caption">
                     <h2 class="title bold">LOCAL AREA, PLACES OF INTEREST</h2>
                   </div>  
                  </div>
                </div>
                <div class="medium-12 large-6 columns">
                  <div class="booking-reservation">
                    <div class="row">
                      <div class="medium-12 columns">
                        <h2 class="title">BOOK NOW</h2>
                      </div>
                      <div class="medium-4 columns">
                       <img src="img/tripadvisor.png"/>
                      </div>
                      <div class="medium-8 columns">
                        <p>
                            Demand for the barn is high, so please contact us well 
                            in advance to book your stay!
                        </p>
                        <a href="contact.php" class="button btt-green">BOOK NOW</a>
                      </div>
                    </div>
                    <div class="row no-margin">
                      <div class="medium-12 columns">
                        <h2 class="title">LOCAL LINKS</h2>
                      </div>
                      <div class="medium-4 columns">
                        <img src="img/local.png"/>
                      </div>
                      <div class="medium-8 columns">
                       <p>
                          There's lots to do in the local area. From Motorsport
                          to long walks, we have it all!
                        </p>
                        <a href="things_to_do.php" class="button btt-white">FIND OUT MORE</a>
                      </div>
                  </div>
                  </div>
                </div>
               </div>
            </div>
          </section>

<?php include('includes/footer.php');?>

  <script src="js/vendor/jquery.min.js"></script>
  <script src="js/vendor/what-input.min.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/app.js"></script>
	<script src="js/slick.js"></script>

  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
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

  
  <script type="text/javascript">
    $(document).ready(function(){
      $('.testimonial-carousel').slick({
		arrows:false,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		dots: true,
		autoplaySpeed: 5000,
		  responsive: [
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
      });
    });
  </script>
  <script type="text/javascript">
    var locations = [
      ['Claydon', 51.921706, -0.955113],
      ['Claydon Estate', 51.921849, -0.954074],
      ['National Trust - Claydon', 51.924584, -0.955854],
      ['Dickins Auctioners', 51.917718, -0.943268],
      [' ', 51.917070, -0.969481]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(51.921153, -0.955959),
      mapTypeId: google.maps.MapTypeId.HYBRID,
      zoomControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_TOP
       },
       mapTypeControl: false,
       streetViewControl: true,
       streetViewControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
       }
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
  </body>
</html>
