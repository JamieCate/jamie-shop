<nav class="navbar navbar-expand-lg navbar-light navbar-background">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="@asset('images/logo-music.webp')" alt="Music Shop Logo"
                class="header-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <?php
            wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'container'      => 'ul',
                'menu_class'     => 'navbar-nav mr-auto',
                'fallback_cb'    => false, 
            ]);
            ?>
            <form class="form-inline my-2 my-lg-0 d-flex nav-search-area">
                <div class="nav-search-input">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search-bar">
                    <div class="search-results"></div>
                </div>
            </form>
            <li class="menu-item cart-menu">
            <a href="<?php echo wc_get_cart_url(); ?>">
                🛒 <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
            </a>
        </li>
        </div>
    </div>

</nav>