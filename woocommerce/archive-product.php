<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
<head>
  <meta charset="{{ get_bloginfo('charset') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php echo view('sections.header')->render(); ?>

<main class="woocommerce-archive archive-main-container">
<div class="product-page-block incategory-desc container">
<?php if (is_product_category()) : ?>
  <?php
  $current_cat = get_queried_object();

  // Display current category title and description
  echo '<h1>' . esc_html($current_cat->name) . '</h1>';
  echo '<div>' . wpautop($current_cat->description) . '</div>';

  // Get direct child categories of the current category
  $subcategories = get_terms([
      'taxonomy'   => 'product_cat',
      'parent'     => $current_cat->term_id,
      'hide_empty' => true,
  ]);

  if (!empty($subcategories)) :
  ?>
<div class="sub-category-grid">
    <?php foreach ($subcategories as $subcategory) :
        $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
        $image = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'medium') : wc_placeholder_img_src();
        $is_placeholder = strpos($image, 'woocommerce-placeholder') !== false;
        ?>
        <div class="sub-category-grid-items">
            <a href="<?php echo get_term_link($subcategory); ?>" class="sub-category-grid-item">
                <?php if (!$is_placeholder) : ?>
                    <div class="image-wrapper">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($subcategory->name); ?>" class="cat-img">
                    </div>
                <?php endif; ?>
                
                <p class="<?php echo $is_placeholder ? 'no-image-class' : ''; ?>">
                    <?php echo esc_html($subcategory->name); ?>
                </p>
            </a>
        </div>
    <?php endforeach; ?>
</div>


  <?php else : ?>
    <!-- No subcategories, show products -->
    <?php
    if (woocommerce_product_loop()) {
        woocommerce_product_loop_start();

        if (wc_get_loop_prop('total')) {
            while (have_posts()) {
                the_post();
                wc_get_template_part('content', 'product');
            }
        }

        woocommerce_product_loop_end();
    } else {
        do_action('woocommerce_no_products_found');
    }
    ?>
  <?php endif; ?>
<?php endif; ?>
</div>
</main>

<?php echo view('sections.footer')->render(); ?>

<?php wp_footer(); ?>
</body>
</html>