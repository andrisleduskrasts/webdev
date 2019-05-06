            <?php
            $data = new Database();
            $where = 'post_type = "social" AND post_state = 1';
            $count  =  $data->select(" * ", " post ", $where);
            $r = $data->getObjectResults();
            ?>
                <ul class="social">
                    <li>
                        <a href="<?php echo $r->post_title;?>" class="facebook" target="_blank"></a>
                    </li>
                    <li>
                        <a href="<?php echo $r->post_extra1;?>" class="twitter" target="_blank"></a>
                    </li>
                    <li>
                        <a href="<?php echo $r->post_extra3;?>" class="instagram" target="_blank"></a>
                    </li>
                </ul>