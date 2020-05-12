<?php
/**
 * Template Name: About Page
 */
get_header() ?>
<div class="grid-container">
    <div class="grid-x">
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
    </div>
</div>
<?php setup_postdata( $post ); ?>
<?php $about_banner_image = get_the_post_thumbnail_url() ?>

<!-- Began Banner -->
<section class="section-banner" <?php bg( $about_banner_image ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php echo the_content(); ?>
            </div>
        </div>
    </div>
	<?php if ( $triangle_image_banner = get_field( 'triangle_image_banner', 'options' ) ): ?>
        <img class="triangle-image-right" src="<?php echo $triangle_image_banner['url'] ?>"
             alt="<?php echo $triangle_image_banner['title'] ?>">
	<?php endif; ?>
</section>
<?php ?>
<!-- End Banner -->

<!-- Began Providing -->

<section class="providing">
    <div class="grid-container">
        <div class="grid-x">
            <div class="medium-6 small-12 cell">
				<?php if ( $providing_title = get_field( 'providing_title' ) ): ?>
                    <h2 class="providing__title">
						<?php echo $providing_title ?>
                    </h2>
				<?php endif; ?>
            </div>
            <div class="medium-6 small-12 cell">
				<?php if ( $providing_description = get_field( 'providing_description' ) ): ?>
					<?php echo $providing_description ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
	<?php if ( have_rows( 'innovative_solutions' ) ): ?>
        <ul class="list">
			<?php while ( have_rows( 'innovative_solutions' ) ) : the_row();
				$image   = get_sub_field( 'image' );
				$content = get_sub_field( 'content' );
				?>
                <li class="item">
                    <div class="item__image" <?php bg( $image ) ?>>
						<?php echo $content ?>

                    </div>
                </li>
			<?php endwhile; ?>

        </ul>
	<?php endif; ?>

	<?php if ( $providing_image = get_field( 'providing_image' ) ): ?>

        <img class="providing__image" src="<?php echo $providing_image['url'] ?>"
             alt="<?php echo $providing_image['title'] ?>">

	<?php endif; ?>
</section>

<!-- End Providing -->

<!-- Began Mission -->

<?php $mission_section_image = get_field( 'mission_section_image' ) ?>
<section class="mission" <?php bg( $mission_section_image ) ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="medium-6 small-12 cell">
				<?php if ( $mission_title = get_field( 'mission_title' ) ): ?>
					<?php echo $mission_title ?>
				<?php endif; ?>
            </div>
            <div class="cell auto">
                <div class="mission__content">
                    <?php if ( $mission_content = get_field( 'mission_content' ) ): ?>
                        <?php echo $mission_content ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
	<?php if ( $mission_triangle_image = get_field( 'triangle_image', 'options' ) ): ?>
        <img class="triangle-image-right mission__triangle--image" src="<?php echo $mission_triangle_image['url']; ?>" alt="<?php echo $mission_triangle_image['title'] ?>">

	<?php endif; ?>
</section>

<!-- End Mission -->

<!-- Began Services -->
<?php $services_section_image = get_field( 'services_section_image' ); ?>
<section class="services" <?php bg( $services_section_image ) ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php if ( $services_title = get_field( 'services_title' ) ): ?>
                    <h2 class="services__title">
						<?php echo $services_title ?>
                    </h2>
				<?php endif ?>
                <div class="services__list--city">
	                <?php if ( $сities = get_field( 'сities' ) ): ?>
		                <?php echo $сities ?>
	                <?php endif ?>

                </div>
            </div>
        </div>
    </div>
	<?php if ( $services_triangle_image = get_field( 'services_triangle_image' ) ): ?>
        <img class="triangle-image-left" src="<?php echo $services_triangle_image['url']; ?>" alt="<?php echo $services_triangle_image['title'] ?>">

	<?php endif; ?>
</section>

<!-- End Services -->

<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
