<?php
/**
 * Featured Brands Template.
 */

$brands = get_field('featured_brands'); // This should be a repeater field
?>

<?php if ($brands): ?>
    <div class="container mx-auto my-5">
        <h2 class="pb-2"><strong>Featured brands</strong></h2>
        <div class="d-flex featured-brands__container">
            <?php foreach ($brands as $brand): ?>
                <?php
                $image = $brand['image'];
                $link = $brand['link'];
                ?>
                <?php if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>" class="">
                    <?php endif; ?>

                    <?php if ($image): ?>
                        <div class="brand-img-container">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                class="object-contain">
                        </div>

                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>