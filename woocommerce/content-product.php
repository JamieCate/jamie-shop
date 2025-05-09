<?php
if (!defined('ABSPATH')) {
    exit;
}

$current_cat = get_queried_object();

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $current_cat->term_id,
        ),
    ),
);

$loop = new WP_Query($args);
?>
<div class="sub-category-grid">
    <?php
    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post();
            global $product;
            ?>

            <a href="<?php the_permalink(); ?>">
                <?php echo $product->get_image(); ?>
                <h2><?php the_title(); ?></h2>
                <span class="price"><?php echo $product->get_price_html(); ?></span>
            </a>

            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo __('No products found');
    endif;
    ?>
</div>