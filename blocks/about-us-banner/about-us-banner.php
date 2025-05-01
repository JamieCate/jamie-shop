<?php
/**
 * About Us Banner Block Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */

$background = get_field('background_image'); 
$title = get_field('title');
$description = get_field('description'); 
$link = get_field('link');
?>

<div class="about-us-banner-container d-flex" style="background-image: url('<?php echo esc_url($background['url']); ?>');">
    <div class="container">
    <div class="about-us-box half-col">
        <h4><strong><?php echo($title) ?></strong></h4>
        <p><?php echo($description) ?></p>
        <a href="<?php echo $link['url']?>"><?php echo($link['title']) ?></a>
    </div>
<div class="half-col"></div>
    </div>
</div>