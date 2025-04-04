<?php
/**
 * Promos Block Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */

$promo_cols = get_field('promo_cols'); 
?>

<div class="container">
    <?php if ($promo_cols && have_rows('promo_cols')) : ?>
        <div class="promo-container">
            <div class="promo-cols">
                <?php while (have_rows('promo_cols')) : the_row(); 
                    $image = get_sub_field('image');
                    $header = get_sub_field('promo_header');
                    $description = get_sub_field('promo_description');
                ?>
                    <div class="promo-col col-6">
                        <a href="#">
                            <?php if (!empty($image)) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                            <div class="promo-text">
                                <h3><?php echo esc_html($header); ?></h3>
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php else : ?>
        <?php if ($is_preview) : ?>
            <p style="text-align: center; color: #666;">No promo content available. Add some in ACF.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>
