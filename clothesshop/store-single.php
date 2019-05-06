<?php
if (isset($_POST['action']) AND $_POST['action'] == 'senddelivery') {
 $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/*$captcha;
  */$failedForm="";/*
  if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

    if(!$captcha){
      $failedForm = "miss";
    }
    else {
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf3gR8TAAAAAFpKDCJhc_ThmcbR4bM6PTCCAZ7p&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false){
                $failedForm = "bot";
            }
            else{*/
                $_GET['debug'] = 1;
                
                foreach($_POST as $nombre_campo => $valor){ if (!is_array($valor)) $asignacion = "\$" . $nombre_campo . "='" . addslashes(htmlspecialchars($valor)) . "';"; eval($asignacion); }//end foreach
                $msj = 'From: '.$name.' &lt;'.$email.'&gt; <br><br>Telefons: '.$telephone.'<br><br>Komentārs: '.$comment.'<br><br>Pirkuma adrese: '.$actual_link;
                $msgSub  = 'Pasutijums no La Miamoda';
                /*$data = new Database();
                $where = 'post_type = "email" AND post_state = 1';
                $count  =  $data->select(" * ", " post ", $where);
                $r = $data->getObjectResults();*/
                //$msgTo = $r->post_title; //recipient e-mail
                $msgTo = 'miamodalv@gmail.com'; //recipient e-mail
                include("admin/notify/index.php");
                $msgSent = 1;
            /*}
     }*/
}?>

<?php
include('includes/header.php');
?>
<body class="portfolio-page inner-page">

    <?php
    include('includes/navigation.php');
    $data = new Database();
    $url = addslashes($_GET['url']);
    $where = 'post_type = "galleryPic" AND post_state = 1 AND post_url = "'. $url .'"';
    $count  =  $data->select(" * ", " post ", $where);
    $r = $data->getObjectResults();
    $galleryid = $r->post_id;
    $gallerytitle = $r->post_title;
    ?>

    <!-- Content -->
    <section id="content">
        <div class="row">
            <div class="columns large-12">
                <h2 class="headline"><?php echo $r->post_title;?></span></h2>

                <div class="portfolio-item">
                    <img src="photos/<?php echo $r->post_photo;?>" data-src="" alt="" style="opacity:1;transition: opacity .4s ease-in">
                </div>
                <footer class="image-meta">
                    <div class="row">
                        <div class="columns large-6">
                            <div class="tags">
                                <span class="label">Tagi:</span>
                                <ul class="tag-list">
                                    <?php 
                                    $tags = preg_split("/[\s,]+/", $r->post_extra3);
                                    ?>
                                    <ul class="tag-list">
                                    <?php foreach($tags as $tag){?>
                                        <li>
                                            <a href="store/tag/<?php echo $tag?>"><?php echo $tag?></a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </ul>
                            </div>
                        </div>

                        <div class="columns large-6">
                            <div class="date right">
                                <span class="label">Pievienots:</span>
                                <span class="value"><?php echo date('F j, Y', strtotime($r->post_date));?></span>
                            </div>
                        </div>
                    </div>
                </footer>

                <div class="image-description">
                    <p>
                        <span class="label">Apraksts:</span>
                    </p>
                    <?php echo $r->post_content;?>
                    <p>
                        <span class="label">Cena:</span>
                        <?php echo $r->post_extra2;?>
                    </p>
                </div>

                <div class="more row">
            </div>
        </div>
    </section>

    <section id="after-content">
        <div class="row">
            <div class="columns large-6 commentform">
                <?php
                if($msgSent == 1){?>
                    <div class="form-row"><p class="desc">Sūtījums ir pieteikts!</p>
                <?php }
                /*else if($failedForm == "miss"){?>
                    <div class="form-row"><p class="desc">Please check the reCAPTCHA</p>       
                <?php }*/
                ?>
                <h3>Pasūtīt</h3>
                <form action="" method="post">
                    <div class="form-row">
                        <input type="text" name='name' placeholder="* Name" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name='email' placeholder="* E-pasts" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name='telephone' placeholder="Telefons">
                    </div>                 
                    <div class="form-row">
                        <textarea name="comment" id="" placeholder="* Komentārs - skaits, maksāt saņemot vai ar pārskaitījumu, adrese utml." required></textarea>
                    </div>
                    <?php /*<div class="form-row">
                        <div class="g-recaptcha" data-sitekey="6Lf3gR8TAAAAAOJGL_OtjVR3hLMGqFV0M48zMx2M"></div>
                    </div> */?>
                    <div class="form-row" style="margin-top:12px">
                        <button type="submit" class="button">Pieteikt sūtījumu</button>
                    </div>
                  <input type="hidden" value='<?php echo $galleryid;?>' name='pid'>
                  <input type="hidden" value='<?php echo $gallerytitle;?>' name='pname'>
                  <input type="hidden" value='senddelivery' name='action'>
                </form>
            </div>
        </div>
    </section>
<script type="text/javascript">
$(document).ready(function () {
$('.commentform form').on('valid', function (e) {
  e.stopPropagation();
  e.preventDefault();
  return false;
  });
$('.commentform form').submit(function (e) {
  e.preventDefault();
  });
});
</script>

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

<script type="text/javascript">
$(document).ready(function () {
$('#formselect').on('change',function(){
    <?php foreach($forms as $form){?>
   if ($(this).val() == '<?php echo ucwords($form);?>'){
    <?php        
    $where = 'post_type = "format" AND post_url = "'.$form.'"';
    $count  =  $data->select(" * ", " post ", $where);
    $r = $data->getObjectResults();
    $currentPrice = $r->post_price;?>
      $('#picPrice').each(function(i){
         $(this).attr('value','£<?php echo $currentPrice;?>');
      });
   }
   <?php $i++;
    } ?>
});
});

</script>
<!-- script for paypal link -->
<script type="text/javascript">
var urldesc = "";
var urlrecipient = ""; // change for paypal recipient e-mail
var urlprice = "";


<?php 
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>
$(document).ready(function () {
    $("#formselect").change(function () {
        urldesc = $("#formselect").val();
        urldesc = urldesc + " print of http://<?php echo $url;?>";
        urlprice = $("#picPrice").val();
        urlprice = urlprice.replace(/^£/, "");
        createURL();
    });
});
</script>