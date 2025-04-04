<?php
/**
 * Banner Block Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */

$banner = get_field('banner');
?>

<?php if ($banner && have_rows('banner')): ?>
    <div class="banner-background">
        <div class="banner-item container">
            <?php while (have_rows('banner')):
                the_row();
                $image = get_sub_field('image');
                $description = get_sub_field('description');
                $link = get_sub_field('link');
                ?>
                <div class="items-container">
                    <?php if ($link && isset($link['url'])): ?>
                        <a class="banner-link" href="<?php echo esc_url($link['url']); ?>">
                        <?php else: ?>
                            <a class="banner-link" href="#">
                            <?php endif; ?>

                            <img src="<?php echo $image['url'] ?>" alt="">
                            <p><?php echo esc_html($description) ?></p>
                        </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif ?>