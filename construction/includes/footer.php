    <!-- Footer -->
    <footer id="footer">

        <a href="" class="logo"></a>

        <div class="row">

            <div class="columns medium-4 brands">

                <a href="#" class="brand" target="_blank">
                    <div class="aabc-brand"></div>
                    <span class="text">
                        AABC Conservation<br />Award 2015
                    </span>
                </a>

                <a href="#" class="brand" target="_blank">
                    <div class="tehaa-brand"></div>
                    <span class="text">
                        Runners-up 2014
                    </span>
                </a>

            </div>

            <div class="columns medium-4 contact">
                <p>
                    Splitlath Building Conservation<br />
                    1 Greenfield Industrial Estate<br/>
                    Hay On Wye - HR3 5FA<br />
                    +44 (0) 1497 821921<br />
                    <a href="mailto:enquiries@splitlath.com">enquiries@splitlath.com</a>
                </p>
            </div>

            <div class="columns medium-4 right brands">

                <a href="#" class="brand" target="_blank">
                    <div class="voodoochilli-brand"></div>
                </a>

            </div>
        </div>

    </footer>

    <!-- Scripts -->
    <?php $path = $_SERVER['REQUEST_URI'];
    $page = preg_replace("/^\\/(?:\\~splitlath\\/)?([^\\/\\.]+)?(?:\\.php)?\\/?.*$/", "$1", $path); 

    if($page == "index") $page = '';?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/services.js"></script>
    <?php if($page == ''){?>
    <script src="assets/js/home.js"></script>
    <?php } ?>
    <script src="assets/js/jquery.colorbox-min.js"></script>

</body>
</html>