            <!-- Header -->
            <header id="header">
                <a href=""><h2 class="headline hl" style="font-style:italic">La Miamoda</h2></a>

                <nav id="navigation">
                    <a href="#" class="nav-toggle"></a>
                    <ul>
                        <li>
                            <a href="">La Miamoda</a>
                        </li>
                        <li>
                            <a href="about/">Par Mums</a>
                        </li>
                        <?php $path = $_SERVER['REQUEST_URI'];
                        $page = preg_replace("/^\\/([^\\/\\.]+)?(?:\\.php)?\\/?.*$/", "$1", $path); 

                        if($page == "index") $page = '';
                        if($page == "store-single") $page = 'store';
                        ?>
                        <li <?php if($page == 'store') echo 'class="active"';?>>
                            <a href="store/">Piedāvājums</a>
                        </li>
                        <li <?php if($page == 'contact') echo 'class="active"';?>>
                            <a href="contact/">Jautājumiem</a>
                        </li>
                    </ul>
                </nav>
            </header>