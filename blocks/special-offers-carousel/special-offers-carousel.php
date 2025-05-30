<?php
/**
 * Special offers carousel Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */


?>

<?php
$args = [
    'post_type' => 'product',
    'posts_per_page' => -1, 
    'tax_query' => [
        [
            'taxonomy' => 'product_tag',
            'field'    => 'slug',
            'terms'    => 'special-offer', 
        ],
    ],
];

$query = new WP_Query($args);

if ($query->have_posts()): ?>
    <div class="carousel-header-container container">
        <div class="carousel-header">
            <h3><strong>Special Offers</strong></h3>
        </div>
        <div class="carousel-arrows">
            <!-- Previous and Next Arrows will be placed here by Slick -->
        </div>
    </div>
    <div class="special-offers-carousel container">
        <?php while ($query->have_posts()): $query->the_post();
            $product = wc_get_product(get_the_ID()); ?>
            
            <div class="product-card">
                <a href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                    <p><?php the_title(); ?></p>
                    <?php             
                    $product = wc_get_product(get_the_ID()); 
                    $rating = $product->get_average_rating();
                    $rating_html = wc_get_rating_html($rating);

                    if ($rating_html) {
                        echo $rating_html;
                    } else {
                        // Manually output 5 empty stars
                        echo '<div class="star-rating">';
                        for ($i = 0; $i < 5; $i++) {
                            echo '<span class="star empty-star">&#9734;</span>'; // Unicode hollow star
                        }
                        echo '</div>';
                    }?>
                    <p class="price"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php echo esc_url( '?add-to-cart=' . $product->get_id() ); ?>" class="button add-to-cart-btn">Add to cart</a>
                </a>
            </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php else: ?>
    <p>No special offer products found.</p>
<?php endif; ?>
