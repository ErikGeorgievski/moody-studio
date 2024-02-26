<footer>
    <div class="footer-wrapper"></div>

    <div class="footer-container">
        <div class="footer-left">
            <div class="store-info">
                <div class="store-footer">
                    <h3 class="store-h3">URBAN OUTFITTERS</h3>
                    <p class="store-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>

                </div>


                <p>


                    <?php echo get_option('woocommerce_store_address') . get_option('woocommerce_store_city') . ", " . get_option('woocommerce_store_postcode') . " " . get_option('woocommerce_default_country'); ?> <br>
                    <?php echo get_option('company_mobile'); ?> <br>
                    <?php echo get_option('company_hotline'); ?> <br>


                </p>
                <div class="store-footer-media">
                    <?php
                    

                    $menu_header = array(
                        'theme_location' => 'socialamedierikoner',
                        'menu_id' => 'header-menu',
                        'container' => 'nav',
                        'container_class' => 'menu'
                    );
                    wp_nav_menu($menu_header);
                    ?>



                </div>



            </div>


        </div>
        <div class="footer-center1">
            <?php
            echo "<div class='footerheader1'>SHOPPING</div>";

            $menu_header = array(
                'theme_location' => 'footer_meny',
                'menu_id' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu_header);
            ?>



        </div>

        <div class="footer-center2">
            <?php


            echo "<div class='footerheader2'>MORE LINK</div>";
            $menu_header = array(
                'theme_location' => 'footer_meny2',
                'menu_id' => 'footer-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu_header);
            ?>

        </div>
        <div class="footer-right">
            <h3 class="footer-blog">FROM THE BLOG</h3>

            <div class="blog1">
                <p class="blog1-1">26 <span class="span-blog1-1">May</span></p>
                <p class="blog1-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="blog1-3">3 comments</p>
            </div>
            <div class="line"></div>
            <div class="blog2">
                <p class="blog2-1">27 <span class="span-blog2-1">May</span></p>
                <p class="blog2-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="blog1-3">3 comments</p>
            </div>



        </div>




    </div>
    <div class="linje">
        <div></div>
    </div>

    <div class="copyright"><?= date('Y') . " " .   get_bloginfo('name')  ?>. &copy;All rights reserved.</div>

</footer>
<?php wp_footer(); ?>
</body>

</html>