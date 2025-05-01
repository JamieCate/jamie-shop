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

$map = get_field('google_map');
?>


<?php if ($map): ?>
    <div class="acf-map">
        <iframe
            width="100%"
            height="450"
            frameborder="0"
            style="border:0"
            src="https://www.google.com/maps?q=<?php echo esc_attr($map['lat']); ?>,<?php echo esc_attr($map['lng']); ?>&z=15&output=embed"
            allowfullscreen>
        </iframe>
    </div>
<?php endif; ?>
