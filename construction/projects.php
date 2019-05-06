<?php
include('includes/header.php');
?>


    <?php
    $page = addslashes($_GET['p']);
    if($page == '') $page = 1;
    $name = addslashes($_GET['name']);

    //If no target project given
    /* Begin*/
    if($name == ''){
        $sectionNr = 0;
        $data = new Database();
        $limit = $page*2-2;
        $where = 'post_type = "projectList" AND post_state = 1';
        $count  =  $data->select(' * ', ' post ', $where, 'post_order DESC LIMIT '.$limit.', 2');
        while($r = $data->getObjectResults()){
            $sectionNr++;
            // section separator
            if($sectionNr == 2) {?>
                <div class="columns large-12">
                    <h3 class="sectiontitle">
                        <span class="none"></span>
                        <div class="left-ornament"></div>
                        <div class="right-ornament"></div>
                    </h3>
                </div>
            <?php } ?>
    <section class="row" id="service-list" style="margin-bottom:20px">

        <div class="columns large-6">
            <div class="gallery">
                    <?php
                    $gallery = json_decode( $r->post_extra2, true ); 
                    $gallery = current($gallery);
                    $currentPic = 1;
                    foreach ($gallery['repeater'] as $g) {
                        if($currentPic == 1){?>
                        <a href="photos/<?php echo $g['image']; ?>" class="colorbox item" style="padding-bottom:1px;margin-top:38px">
                        <img src="photos/450_450_<?php echo $g['image']; ?>" alt="" />
                        </a>
                    
                    <?php } 
                    else{?>
                    <a href="photos/<?php echo $g['image']; ?>" class="colorbox item">
                        <img src="photos/150_150_<?php echo $g['image']; ?>" alt="" />
                    </a>
                    <?php } ?>
                    <?php $currentPic++;
                    } ?>
            </div>
        </div>

        <div class="columns large-6">

            <h3 id="<?php echo $r->post_url; ?>">
                <?php echo $r->post_title;?>
            </h3>

            <?php echo $r->post_content;?>

        </div>
    </section>
    <section class="row" id="projects">
        <div class="columns medium-12">
    <?php } ?>
    <?php 
    // Forward/back buttons
    $limit=$limit+2;
    $where = 'post_type = "projectList" AND post_state = 1';
    $count  =  $data->select(' * ', ' post ', $where, 'post_order DESC LIMIT '.$limit.', 2');
    if($r = $data->getObjectResults()){?>
    <a href="projects/<?php echo $page+1; ?>" class="button">More Projects</a>
    <?php }
    else if($page > 1){?>
        <a href="projects/<?php echo $page-1; ?>" class="button">Previous Projects</a>
    <?php }
    ?>
        </div>
    </section>
    <?php }
    /* END */
    // If target project given
    /* BEGIN */
    else{
        $data = new Database();
        $where = 'post_type = "projectList" AND post_url = "'. $name . '" AND post_state = 1';
        $count  =  $data->select(' * ', ' post ', $where);
        if($r = $data->getObjectResults()){;?>

        <section class="row" id="service-list" style="margin-bottom:20px">

        <div class="columns large-6">
            <div class="gallery">
                    <?php
                    $gallery = json_decode( $r->post_extra2, true ); 
                    $gallery = current($gallery);
                    $currentPic = 1;
                    foreach ($gallery['repeater'] as $g) {
                        if($currentPic == 1){?>
                        <a href="photos/<?php echo $g['image']; ?>" class="colorbox item" style="padding-bottom:1px;margin-top:38px">
                        <img src="photos/450_450_<?php echo $g['image']; ?>" alt="" />
                        </a>
                    
                    <?php } 
                    else{?>
                    <a href="photos/<?php echo $g['image']; ?>" class="colorbox item">
                        <img src="photos/150_150_<?php echo $g['image']; ?>" alt="" />
                    </a>
                    <?php } ?>
                    <?php $currentPic++;
                    } ?>
            </div>
        </div>

        <div class="columns large-6">

            <h3 id="<?php echo $r->post_url; ?>">
                <?php echo $r->post_title;?>
            </h3>

            <?php echo $r->post_content;?>
        </div>
    </section>
    <section class="row" id="projects">
        <div class="columns medium-12">
    <?php } ?>
    <?php 
    // "Other projects" button
    ?>
    <a href="projects/" class="button">Other Projects</a>
        </div>
    </section>
    <?php }
    /* END */ ?>

<?php include('includes/footer.php');?>
