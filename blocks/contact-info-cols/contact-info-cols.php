<?php
/**
 * Contact info columns Block Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */

$image = get_field('image'); 
$info_text = get_field('info_text');
?>

<div class="container contact-info-cols py-5">
        <img src="<?php echo($image['url']) ?>" alt="">
    <div class="info-text">
        <p><?php echo($info_text) ?></p>
    </div>
</div>


