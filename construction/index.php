<?php
include('includes/header.php');
?>

    <!-- Home Slider -->
    <section id="homeslider" class="screenheight">
        <div class="slides">
                <?php
                $data = new Database();
                $where = 'post_type = "slider" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                while($r = $data->getObjectResults()){
                ?>
                    <div class="slide">
                        <div class="bg" style="background-image: url(photos/<?php echo $r->post_photo;?>)"></div>
                        <div class="caption">
                            <h2><?php echo $r->post_title;?></h2>
                            <?php echo $r->post_content;?>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </section>

    <!-- About -->
    <?php
    $where = 'post_type = "aboutPage" AND post_state = 1';
    $count  =  $data->select(" * ", " post ", $where);
    $r = $data->getObjectResults();
    ?>
    <section class="row medium-collapse" id="about-text">
        <div class="columns large-12">
            <div class="image"></div>
            <div class="text">
                <h2><?php echo $r->post_extra1;?></h2>

                <?php echo $r->post_extra2;?>

                <a href="about/" class="button">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="row" id="projects">

        <div class="columns medium-12">
            <h3 class="sectiontitle">
                <span class="text">Projects</span>
                <div class="left-ornament"></div>
                <div class="right-ornament"></div>
            </h3>
            <div class="row projects-grid medium-collapse">
                <?php
                    $where = 'post_type = "projectList" AND post_state = 1';
                    $count  =  $data->select(" * ", " post ", $where, "post_order DESC LIMIT 0,3");
                    while($r = $data->getObjectResults()){
                ?>
                <a href="projects/<?php echo $r->post_url; ?>" class="columns medium-4 project">
                    <?php $gallery = json_decode( $r->post_extra2, true );
                    $gallery = current($gallery);
                    foreach ($gallery['repeater'] as $g) {?>
                    <div class="image">
                        <img src="photos/400_400_<?php echo $g['image']; ?>" alt="" />
                    </div>
                    <?php break;
                    } ?>
                    <div class="caption">
                        <span class="text"><?php echo $r->post_title; ?></span>
                    </div>
                </a>
                <?php } ?>
            </div>

            <a href="projects/" class="button">More Projects</a>
        </div>

    </section>

    <!-- Services -->
    <section class="alt" id="services">

        <div class="row">
            <div class="columns large-8">
                <?php
                    $where = 'post_type = "abstract" AND post_state = 1';
                    $count  =  $data->select(" * ", " post ", $where);
                    $r = $data->getObjectResults();
                ?>
                <h3><?php echo $r->post_title; ?></h3>

                <?php echo $r->post_content; ?>

                <div class="row service-icons">

                    <div class="columns medium-4">
                        <div class="icon icon-resto"></div>

                        <span class="text">
                            Restoration and conservation
                        </span>
                    </div>

                    <div class="columns medium-4">
                        <div class="icon icon-reno"></div>

                        <span class="text">
                            Renovation and refurbishment
                        </span>
                    </div>

                    <div class="columns medium-4">
                        <div class="icon icon-energy"></div>

                        <span class="text">
                            Energy saving
                        </span>
                    </div>

                </div>

                <a href="services/" class="button">Learn More</a>

            </div>

            <div class="columns large-4 facebook">
                <div class="fb-page" data-href="https://www.facebook.com/Splitlath-Building-Conservation-Ltd-615260388515614/" data-tabs="timeline" data-height="397" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
            </div>

        </div>

    </section>
<?php include('includes/footer.php');?>
