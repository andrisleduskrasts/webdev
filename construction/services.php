<?php
include('includes/header.php');
?>


    <!-- Intro -->
    <?php
        $data = new Database();
        $where = 'post_type = "uppertext" AND post_state = 1';
        $count  =  $data->select(" * ", " post ", $where);
        $r = $data->getObjectResults();
    ?>
    <section class="row" id="service-intro">
        <div class="columns large-12">
            <?php echo $r->post_content; ?>
        </div>
    </section>

    <!-- Services -->
    <section class="row" id="service-list">
    <?php
        $where = 'cat_type = "services"';
        $count  =  $data->select(" * ", " categories ", $where);
        $r1 = $data->getObjectResults();
        $r2 = $data->getObjectResults();
        $r3 = $data->getObjectResults();
    ?>

        <div class="columns large-4">
            <div class="icon icon-resto"></div>

            <h4>
                <?php echo $r1->cat_name; ?>
            </h4>
            <ol>
                <?php
                $where = 'post_type = "listService" AND post_extra1 LIKE "%' . $r1->cat_url . '%" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                while($z = $data->getObjectResults()){?>
                <li><?php echo $z->post_title;?></li>
                <?php } ?>
            </ol>
        </div>

        <div class="columns large-4">
            <div class="icon icon-reno"></div>

            <h4>
                <?php echo $r2->cat_name; ?>
            </h4>
            <ol>
                <?php
                $where = 'post_type = "listService" AND post_extra1 LIKE "%' . $r2->cat_url . '%" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                while($z = $data->getObjectResults()){?>
                <li><?php echo $z->post_title;?></li>
                <?php } ?>
            </ol>
        </div>

        <div class="columns large-4">
            <div class="icon icon-energy"></div>

            <h4>
                <?php echo $r3->cat_name;?>
            </h4>
            <ol>
                <?php
                $where = 'post_type = "listService" AND post_extra1 LIKE "%' . $r3->cat_url . '%" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                while($z = $data->getObjectResults()){?>
                <li><?php echo $z->post_title;?></li>
                <?php } ?>
            </ol>

        </div>

    </section>

    <!-- Gallery -->
    <section class="alt" id="service-images">
        <div class="row">
            <div class="columns large-12 text">
                <?php
                $where = 'post_type = "low" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                $r = $data->getObjectResults();?>

                <h3><?php echo $r->post_title; ?></h3>

                <?php echo $r->post_content; ?>

                <div class="gallery">
                    <?php
                    $gallery = json_decode( $r->post_extra2, true ); 
                    $gallery = current($gallery);
                    foreach ($gallery['repeater'] as $g) {?>
                    <a href="photos/<?php echo $g['image']; ?>" class="colorbox item">
                        <img src="photos/150_150_<?php echo $g['image']; ?>" alt="" />
                    </a>
                    <?php } ?>
                </div>
            </div>

            <div class="drone"></div>

    </section>

<?php include('includes/footer.php');?>
