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

$carousel = get_field('carousel');
?>

<?php if ($carousel && have_rows('carousel')) : ?>
<div class="container home-carousel">
<?php while (have_rows('carousel')) : the_row(); 
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                ?>
  <div>
  <?php if ($link && isset($link['url'])): ?>
    <a href="<?php echo $link['url'] ?>">
    <?php else: ?>
        <a class="banner-link" href="#">
        <?php endif; ?>
        <img src="<?php echo $image['url'] ?>" />
    </a>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>