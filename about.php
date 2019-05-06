<?php
include('includes/header.php');
?>

<?php
            $data = new Database();
            $where = 'post_type = "aboutPage" AND post_state = 1';
            $count  =  $data->select(" * ", " post ", $where);
            $r = $data->getObjectResults();
        ?>

    <section class="row medium-collapse" id="about-text">
        <div class="columns large-12">
            <div class="image"></div>
            <div class="text">
                <h2><?php echo $r->post_title;?></h2>

                <?php echo $r->post_extra2;?>

            </div>
        </div>
    </section>


    <!-- Intro -->
    <section class="row abouttext">
        <div class="columns medium-8 medium-offset-2">
        
            <?php if($r->post_photo != ''){?>
            <div class="image">
                <img src="photos/400_400_<?php echo $r->post_photo; ?>"/>
            </div>
            <?php } ?>
            
        
            <?php echo $r->post_content; ?>
            
        </div>
    </section>
    


<script>
$(document).ready(function () {

$('.abouttext .image').insertAfter('.abouttext p:eq(0)');

});
</script>

    

<?php include('includes/footer.php');?>