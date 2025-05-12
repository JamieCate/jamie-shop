<?php
if (!defined('ABSPATH')) {
    exit;
}

$current_cat = get_queried_object();

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'tax_query' => $current_cat ? array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $current_cat->term_id,
        ),
    ) : array(),
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
            <div class="product-card">
                <a href="<?php the_permalink(); ?>">
                    <?php echo $product->get_image(); ?>
                    <p><?php the_title(); ?></p>
                    <p class="price"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php echo esc_url( '?add-to-cart=' . $product->get_id() ); ?>" class="add-to-cart-btn">Add to cart</a>
                </a>

            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo __('No products found');
    endif;
    ?>
</div>