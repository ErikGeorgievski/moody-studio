<html>

<head>
    <title><?= get_option("blogname"); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header>
        <div class="upper-header">
            <div class="column-50">
                <a href="/"><span class="logo-text">MOODY STUDIO</span></a>
            </div>
            <div class="column-50">
    <nav class="menu">
        <div id="search-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/search.svg" alt="Search Icon">
        </div>
        
        <div id="search-bar" style="display: none;">
            <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" placeholder="Search products..." id="search-input" name="s">
            </form>
            <div id="search-results"></div>
        </div>
        
        <?php
        $menu_header = array(
            'theme_location' => 'menyikoner',
            'menu_id' => 'header-menu',
            'container' => 'nav',
            'container_class' => 'menu'
        );
        wp_nav_menu($menu_header);
        ?>
        
        <div class="basket-item-count">
            <span class="cart-items-count count">
                <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
        </div>
    </nav>
</div>

        </div>
        <div class="lower-header">
            <?php
            $menu_header = array(
                'theme_location' => 'huvudmeny',
                'menu_id' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );
            wp_nav_menu($menu_header);
            ?>
        </div>
    </header>