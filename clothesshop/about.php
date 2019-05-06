<?php
include('includes/header.php');
?>

<body class="portfolio-page inner-page">

    <?php
    include('includes/navigation.php');
    ?>
<?php
    $data = new Database();
    $where = 'post_type = "aboutPage" AND post_state = 1';
    $count  =  $data->select(" * ", " post ", $where);
    $r = $data->getObjectResults();
?>

    <!-- Content -->
    <section id="after-content">
        <div class="row">
            <div class="columns large-12">
                <h2 class="headline">Par <span class="hl">Mums</span></h2>
            </div>
        </div>
        <div class="row">
            <?php if($r->post_photo != ''){ ?>
            <div class="columns large-12">

                <?php echo $r->post_content;?>
            </div>
            <img src="photos/<?php echo $r->post_photo;?>" alt="" />
            <?php }
            else{ ?>
            <div class="columns large-12">

                <?php echo $r->post_content;?>
            </div>
            <?php }?>
        </div>
    </section>

<?php
include('includes/footer.php');
?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>