<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i&display=swap"
    <link rel="stylesheet" href="https://use.typekit.net/iig5blv.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'no-outline' ); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
	<div class="preloader__icon"></div>
</div> -->



<!-- BEGIN of header -->
<header class="header">
    <div class="header__wrapper">

        <div class="logo text-center medium-text-left">
            <h1><?php show_custom_logo(); ?></h1>
        </div>
        <div class="header__phone">
		    <?php if ( $phone = get_field( 'phone', 'options' ) ): ?>
			    <?php echo $phone ?>
		    <?php endif; ?>
        </div>
	    <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
            <div class="title-bar hide-for-large" data-responsive-toggle="main-menu" data-hide-for="large">
                <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                    <span></span></button>
            </div>
            <nav class="top-bar" id="main-menu">
			    <?php wp_nav_menu( array(
				    'theme_location' => 'header-menu',
				    'menu_class'     => 'menu header-menu',
				    'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
				    'walker'         => new Foundation_Navigation()
			    ) ); ?>
            </nav>
	    <?php endif; ?>
        <a href="#" class="search__icon hide-for-small show-for-large">
            <img src="<?php blogInfo( 'template_url' ); ?>/images/search-header.png" alt="Search">
        </a>
	    <?php if ( $quote_button = get_field( 'quote_button', 'options' ) ): ?>
            <a class="header__quote hide-for-small show-for-large" href="<?php echo $quote_button['url'] ?>">
			    <?php echo $quote_button ['title'] ?>
            </a>
	    <?php endif; ?>
        <!-- END of header -->
    </div>

<div class="cr-services hide-for-small show-for-large">
    <nav class="cr-services__menu">
		<?php wp_nav_menu( array(
			'theme_location' => 'services-menu',
			'menu_class'     => 'menu list-menu',
			'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
			'walker'         => new Foundation_Navigation()
		) ); ?>
    </nav>
</div>
<!-- BEGIN of search form -->
    <form method="get" id="searchform" class="search search__toggle"
          action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" name="s" id="s" class="search__input" placeholder="<?php _e( 'Search Link', 'default' ); ?>"
              />
    </form>
<!-- END of search form -->
</header>

