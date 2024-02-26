<html>

<head>
    <title><?= get_option("blogname"); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <?php if (!empty(get_option('store_message'))) : ?>
        <div class="site-message">
            <span><?= get_option('store_message'); ?> </span>
        </div>
    <?php endif; ?>
    <header>
        <div class="upper-header">
            <div class="column-50">

                <a href="/"><span class="logo-text">MOODY STUDIO</span></a>

            </div>
            <div class="column-50">
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