<?php
if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
    ?>
    <div class="custom-product">
      <h2><?php the_title(); ?></h2>
      <div class="product-image">
        <?php the_post_thumbnail('thumbnail'); ?>
      </div>
      <div class="product-price">
        <?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?>
      </div>
      <div class="product-rating">
        <?php echo wc_get_rating_html(get_post_meta(get_the_ID(), '_wc_average_rating', true)); ?>
      </div>
    </div>
    <?php
  endwhile;
  wp_reset_postdata();
else :
  echo '<p>No products found</p>';
endif;
?>
