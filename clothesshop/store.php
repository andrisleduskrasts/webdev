<?php
include('includes/header.php');
$cat = addslashes($_GET['cat']);
?>
<body class="portfolio-page inner-page">

    <?php
    include('includes/navigation.php');
    ?>
    <section id="content">
        <div class="row">
            <div class="columns large-12">
                <h2 class="headline">Mūsu <span class="hl">Piedāvājums</span></h2>

                <ul class="category-select">
                    <li <?php if($cat == ''){?> class="active"<?php } ?>>
                        <a href="store/">Visas preces</a>
                    </li>
                    <!--<li>
                        <a href="portfolio/albums/">Albums</a>
                    </li>-->
                    <?php
                    $data = new Database();
                    $where = 'cat_type = "portfolio"';
                    $count  =  $data->select(" * ", " categories ", $where, " cat_order ASC LIMIT 0,4 ");
                    while($r = $data->getObjectResults()){
                    ?>
                    <li <?php if($r->cat_url == $cat){?> class="active" <?php } ?>>
                        <a href="store/<?php echo $r->cat_url;?>/"><?php echo $r->cat_name;?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php
                $number = 4;
                while($number != 0){
                $count  =  $data->select(" * ", " categories ", $where, " cat_order ASC LIMIT ". $number . ",999999 ");
                if($r = $data->getObjectResults()){?>
                <ul class="category-select" style="margin-top:-50px">
                    <?php 
                    $count  =  $data->select(" * ", " categories ", $where, " cat_order ASC LIMIT ". $number . ",6 ");
                    while($r = $data->getObjectResults()){
                    ?>
                    <?php $number++; ?>
                    <li <?php if($r->cat_url == $cat){?> class="active" <?php } ?>>
                        <a href="store/<?php echo $r->cat_url;?>"><?php echo $r->cat_name;?></a>
                    </li>
                    <?php
                     } ?>
                </ul> 
                <?php } 
                else $number = 0;
                } ?>

                <div class="row portfolio">
                <?php
                if($cat == ''){ 
                    $where = 'post_type = "galleryPic" AND post_state = 1';
                }
                else {
                    $where = 'post_type = "galleryPic" AND post_state = 1 AND post_extra1 LIKE "%'. $cat .'%"';
                }
                $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 0,6 ");
                while($r = $data->getObjectResults()){
                ?>
                    <div class="columns large-4">
                        <div class="item" style="height:303px">
                            <a href="store/item/<?php echo $r->post_url;?>" class="link"></a>
                            <div class="overlay">
                                <span class="date">Cena: <?php echo $r->post_extra2;?></span>

                                <div class="title">
                                    <h3><?php echo $r->post_title;?></h3>
                                </div>

                                <div class="tags">
                                <?php 
                                $tags = preg_split("/[\s,]+/", $r->post_extra3);
                                ?>
                                    <span class="label">Tagi:</span>
                                    <ul class="tag-list">
                                    <?php foreach($tags as $tag){?>
                                        <li>
                                            <a href="store/tag/<?php echo $tag?>"><?php echo $tag?></a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <img src="photos/<?php echo $r->post_photo;?>" data-src="photos/<?php echo $r->post_photo;?>" alt="" class="image" style="height:303px;opacity:1;transition: opacity .4s ease-in">
                        </div>
                    </div>
                    <?php } ?>

                <?php
                if($cat == ''){ 
                    $where = 'post_type = "galleryPic" AND post_state = 1';
                }
                else {
                    $where = 'post_type = "galleryPic" AND post_state = 1 AND post_extra1 LIKE "%'. $cat .'%"';
                }
                $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 6,99999 ");
                if($r = $data->getObjectResults()){
                    $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 6,50 ");
                    while($r = $data->getObjectResults()){?>
                    <div class="columns large-4">
                        <div class="item" style="height:303px">
                            <a href="store/item/<?php echo $r->post_url;?>" class="link"></a>
                            <div class="overlay">
                                <span class="date">Taken on <?php echo date('F j, Y', strtotime($r->post_date));?></span>

                                <div class="title">
                                    <h3><?php echo $r->post_title;?></h3>
                                </div>

                                <div class="tags">
                                <?php 
                                $tags = preg_split("/[\s,]+/", $r->post_extra3);
                                ?>
                                    <span class="label">Tags:</span>
                                    <ul class="tag-list">
                                    <?php foreach($tags as $tag){?>
                                        <li>
                                            <a href="store/tag/<?php echo $tag?>"><?php echo $tag?></a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <img src="photos/<?php echo $r->post_photo;?>" alt="" class="image" style="height:209px;opacity:0;transition: opacity .4s ease-in">
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>

                    <div class="columns medium-12">
                        <div class="loading-more"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#header">No sākuma</a></div>
                    </div>
                </div>
              </div>
        </div>
    </section>

<?php
include('includes/footer.php');
?>
<script>
$(document).ready(function() {
    $("img").unveil(200, function() {
      $(this).load(function() {
        this.style.opacity = 1;
      });
    });
});
</script>