<?php
include('includes/header.php');
$tag = addslashes($_GET['tag']);
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
                    <li>
                        <a href="store/">Visas Preces</a>
                    </li>
                    <?php
                    $data = new Database();
                    $where = 'cat_type = "portfolio"';
                    $count  =  $data->select(" * ", " categories ", $where, " cat_order ASC LIMIT 0,4 ");
                    while($r = $data->getObjectResults()){
                    ?>
                    <li>
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
                    <li>
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
                $where = 'post_type = "galleryPic" AND post_state = 1 AND post_extra3 LIKE "%'. $tag .'%"';
                $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 0,6 ");
                while($r = $data->getObjectResults()){
                ?>
                    <div class="columns large-4">
                        <div class="item">
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
                            <img src="photos/<?php echo $r->post_photo;?>" alt="" class="image" style="height:303px;opacity:1;transition: opacity .4s ease-in">
                        </div>
                    </div>
                    <?php } ?>

                <?php
                $where = 'post_type = "galleryPic" AND post_state = 1 AND post_extra3 LIKE "%'. $tag .'%"';
                $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 6,99999 ");
                if($r = $data->getObjectResults()){
                    $count  =  $data->select(" * ", " post ", $where, " post_date DESC LIMIT 6,50 ");
                    while($r = $data->getObjectResults()){?>
                    <div class="columns large-4">
                        <div class="item">
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
                            <img src="photos/<?php echo $r->post_photo;?>" alt="" class="image" style="height:303px;opacity:1;transition: opacity .4s ease-in">
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