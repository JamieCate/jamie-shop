<nav class="navbar navbar-expand-lg navbar-light navbar-background">
    <div class="container flex flex_space-between flex_align-center">
        <ul class="announcement-bar-nav no-style flex contact">
            <li><a class="flex flex_align-center" href="tel:01273 326981" target="_blank">
                    <svg xmlns="https://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15">
                        <path class="a"
                            d="M14 11.3024C14 10.8024 13.8 10.3023 13.4 9.90235C12.8 9.30235 12.2 8.80235 11.4 8.60235C10.6 8.40235 9.7 8.60235 9.1 9.30235L8.3 9.90235C7.4 9.40235 6.7 8.80235 6 8.10235L5.9 8.00235C5.2 7.30235 4.6 6.60235 4.1 5.70235L4.8 5.00235C5.4 4.40235 5.7 3.50235 5.5 2.70235C5.2 1.90235 4.8 1.20235 4.2 0.70235C3.4 -0.19765 2.1 -0.19765 1.3 0.50235C0.4 1.40235 0 2.60235 0 3.80235C0.2 6.40235 1.4 8.90235 3.3 10.7023C3.7 11.1023 4.1 11.5023 4.6 11.8024C4.9 12.0023 5.2 12.0023 5.4 11.7023C5.6 11.5023 5.5 11.1024 5.3 11.0023C4.9 10.7023 4.5 10.3024 4.1 10.0023C2.4 8.40235 1.3 6.20235 1.1 3.90235C1.1 2.90235 1.4 2.00235 2 1.40235C2.4 1.00235 3 1.00235 3.4 1.40235C4.8 2.90235 4.7 3.60235 4 4.20235L3 5.20235C2.9 5.40235 2.8 5.60235 2.9 5.80235C3.5 6.90235 4.2 7.90235 5.1 8.80235L5.2 8.90235C6.1 9.80235 7.1 10.5023 8.2 11.1024C8.4 11.2024 8.6 11.1024 8.8 11.0023L9.8 10.0023C10.4 9.40235 11.1 9.30235 12.6 10.7023C13 11.1023 13 11.7024 12.7 12.1024C12 12.7024 11.2 13.0023 10.3 13.0023C9.4 13.0023 8.4 12.7023 7.6 12.4023C7.3 12.3023 7 12.5023 6.9 12.7023C6.8 13.0023 6.9 13.2023 7.2 13.4023C8.2 13.9023 9.2 14.1024 10.3 14.1024C11.5 14.1024 12.7 13.7023 13.5 12.9023C13.8 12.3023 14 11.8024 14 11.3024Z">
                        </path>
                    </svg>
                    01273 326981</a></li>
        </ul>
        <div class="flex flex_align-center currency">
            {!! do_shortcode('[woocs]') !!}
        </div>
    </div>
    <div class="second-tier-nav container">
        <div class="nav-img"><a href="<?php echo home_url() ?>"><img
                    src="https://files.ekmcdn.com/autopaints/resources/design/logo.png" alt=""></a></div>
        <div class="nav-search">{!! do_shortcode('[fibosearch]') !!}</div>
        <div class="nav-options">

            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                class="account-link">
                <i class="fa-regular fa-user"></i>
            </a>

            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="basket">
                <i class="fas fa-shopping-cart"></i>
                <span class="basket-total">
                    <?php echo WC()->cart->get_cart_total(); ?>
                </span>
            </a>
        </div>
    </div>


</nav>
<div class="second-nav" style="background-color: #222222;">
    <div class="nav-links container">
        <div class="d-flex list-container">
            <ul class="shop-btn">
                <li class="shop-dropdown">
                    <i class="fa-solid fa-bars"></i>
                    <p>Shop</p>
                </li>
            </ul>
            <ul class="d-flex main-links">
                <li class="webpage_link"><a href="/about">About Us</a></li>
                <li class="webpage_link"><a href="/contact">Contact Us</a></li>
                <li class="webpage_link"><a href="">Find A Car Paint Code</a></li>
                <li class="webpage_link"><a href="/privacy-and-security">Privacy and Security</a></li>
                <li class="webpage_link"><a href="/delivery-collection-info">Delivery/Collection Info</a></li>
                <li class="webpage_link"><a href="/2k-cellulose-paint">2K &amp; Cellulose Paint</a></li>
                <li class="webpage_link"><a href="/trade-account">Trade Account</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="subnav-grid-wrapper-bg">
    <div class="shop-dropdown-menu subnav-grid-wrapper" data-nav-type="sub-cat-nav" data-nav-design-type="main-dropdown">
        <div class="container">
            <ul class="subnav-grid">
                <?php
                    $categories = get_terms([
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'parent' => 0,
                    ]);
                    foreach ($categories as $category) {
                        echo '<li><a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>