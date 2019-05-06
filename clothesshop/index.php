<?php
include('includes/header.php');
?>
<body class="homepage">
    <div class="wrap">
        <div class="wrap-inner">
            <?php
            include('includes/navigation.php');
            ?>

            <div id="home-center">
            <?php
            $data = new Database();
            $where = 'post_type = "hometext" AND post_state = 1';
            $count  =  $data->select(" * ", " post ", $where);
            $r = $data->getObjectResults();
            ?>
                <div class="home-center-inner">
                    <h1><?php echo $r->post_title;?></h1>
                    <span class="tagline"><?php echo $r->post_content;?></span>

                    <a href="store/" class="button">Piedāvājums</a>
                </div>

            </div>
            <div id="home-social">
            <?php
            include('includes/social.php');
            ?>
            </div>
        </div>
    </div>

    <!-- Background Slider -->
    <div id="background-images">
    <?php
    $where = 'post_type = "slider" AND post_state = 1';
    $count  =  $data->select(" * ", " post ", $where);
    while($r = $data->getObjectResults()){
    ?>
        <div class="image" style="background-image:url(photos/1920_1000_<?php echo $r->post_photo;?>)"></div>
    <?php } ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
