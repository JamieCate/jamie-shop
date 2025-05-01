<?php
/**
 * Promo Columns Block Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */

$promo_columns = get_field('promo_columns'); 
?>


<?php if($promo_columns): ?>
    <div class="container promo-columns d-flex">
        <?php foreach($promo_columns as $column): ?>
            <?php
                $title = $column['title'];
                $description = $column['description'];
                $link = $column['link'];
                ?>
            <div class="column-container">
                <h4><strong><?php echo($title); ?></strong></h4>
                <p><?php echo($description); ?></p>
                <a href="<?echo($link['url']); ?>" class="column-btn"><?php echo($link['title']) ?></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>