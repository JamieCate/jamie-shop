<?php
/**
 * Featured categories carousel Template.
 *
 * @param   array  $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id The post ID the block is rendering content against.
 * @param   array  $context The context provided to the block by the post or its parent block.
 */


?>


<?php
$block_title = get_field('featured_categories_block_title');
$category_sets = get_field('category_sets');
?>

<?php if ($category_sets): ?>
<section class="container featured-categories">
    <?php if ($block_title): ?>
        <h2><strong><?= esc_html($block_title); ?></strong></h2>
    <?php endif; ?>

    <?php foreach ($category_sets as $set): 
        $flip_layout = $set['flip_layout'];
        $cards = $set['featured_categories'];
    ?>
        <?php if ($cards): ?>
            <div class="categories-container <?= $flip_layout ? 'flipped' : ''; ?>">
                <?php foreach ($cards as $index => $card):
                    $image = $card['background_image'];
                    $title = $card['title'];
                    $link = $card['link'];
                    $class = 'small-card';

                    if (!$flip_layout && $index === 0) {
                        $class = 'large-card';
                    }
                    if ($flip_layout && $index === 2) {
                        $class = 'large-card';
                    }
                ?>
                    <div class="category-card <?= $class; ?>" style="background-image: url('<?= esc_url($image['url']); ?>')">
                        <div class="card-overlay">
							<div class="featured-cards-content">
							<h3><?= esc_html($title); ?></h3>
                            <?php if ($link): ?>
                                <a href="<?= esc_url($link['url']); ?>" class="featured-btn"><?= esc_html($link['title']); ?></a>
                            <?php endif; ?>
							</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
<?php endif; ?>

