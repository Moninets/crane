<?php
/**
 *Template Name: Services Page
 */
get_header()
?>


<?php setup_postdata( $post ); ?>

<div class="grid-container services-page">
    <div class="grid-x">
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
        <div class="small-2 cell lines-wrapper__line"></div>
    </div>
</div>
<!-- Began Banner -->

<?php $fleet_banner_image = get_the_post_thumbnail_url() ?>
<section class="section-banner services-banner " <?php echo bg( $fleet_banner_image ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php the_content(); ?>
				<?php if ( $banner_video_popup = get_field( 'banner_video_popup' ) ): ?>

                    <div class="wrapper-video" <?php bg( $banner_video_popup['banner_image_popup']['url'] ) ?> >
                        <div class="wrapper-video__content">
							<?php echo $banner_video_popup['banner_content_popup'] ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
	<?php if ( $triangle_image_banner = get_field( 'triangle_image_banner', 'options' ) ) : ?>
        <img class="triangle-image-right" src="<?php echo $triangle_image_banner['url'] ?>"
             alt="<?php echo $triangle_image_banner['title']; ?>">
	<?php endif; ?>
</section>

<?php wp_reset_postdata(); ?>

<!-- End Banner -->

<!-- Began Power Services -->

<section class="power-services">
	<?php if ( $section_title = get_field( 'services_section_title' ) ) : ?>
        <h1 class="section-title">
			<?php echo $section_title ?>
        </h1>
	<?php endif; ?>
    <div class="grid-container">
        <div class="grid-x">
            <div class="medium-6 small-12 cell">
				<?php if ( $power_services_title = get_field( 'power_services_title' ) ) : ?>
                    <h2 class="power-services__title">
						<?php echo $power_services_title ?>
                    </h2>
				<?php endif; ?>
            </div>
            <div class="cell auto">
				<?php if ( $power_services_description = get_field( 'power_services_description' ) ) : ?>
					<?php echo $power_services_description ?>
				<?php endif; ?>
            </div>
        </div>
        <div class="grid-x bottom-content">
            <div class="medium-6 small-12 cell">
				<?php if ( $power_services_content = get_field( 'power_services_content' ) ) : ?>
					<?php echo $power_services_content ?>
				<?php endif; ?>
            </div>
            <div class="cell auto">
                <div class="wrapper">
					<?php if ( $power_services_image = get_field( 'power_services_image' ) ) : ?>
                        <img src="<?php echo $power_services_image['url'] ?>"
                             alt="<?php echo $power_services_image['title'] ?>">
					<?php endif; ?>
					<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ) : ?>
                        <img class="wrapper__image" src="<?php echo $triangle_image['url'] ?>"
                             alt="<?php echo $triangle_image['title'] ?>">
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Power Services -->

<!-- Began Sample Plan -->
<?php if ( $services_section_image = get_field( 'services_section_image' ) ): ?>
<section class="sample-plane" <?php bg( $services_section_image ); ?>>
	<?php endif; ?>
    <div class="grid-container">
        <div class="grid-x">
            <div class="medium-4 medium-offset-2 small-12 cell">
				<?php if ( $sample_plan_title = get_field( 'sample_plan_title' ) ): ?>
                    <h1 class="sample-plan__title">
						<?php echo $sample_plan_title ?>
                    </h1>
				<?php endif; ?>
            </div>
            <div class="medium-4 medium-offset-2 sell-12 cell">
				<?php if ( $sample_plan_file = get_field( 'sample_plan_file' ) ): ?>
                    <a href="<?php echo $sample_plan_file['url'] ?>" target="_blank" class="sample-plane__file">
                        Download
                    </a>
				<?php endif; ?>
            </div>
        </div>
    </div>
	<?php if ( $triangle_crane_image = get_field( 'triangle_crane_image', 'options' ) ) : ?>
        <img class="triangle-image-right" src="<?php echo $triangle_crane_image['url'] ?>"
             alt="<?php echo $triangle_crane_image['title'] ?>">
	<?php endif; ?>
</section>

<!-- End Sample Plan -->

<!-- Began Other Services -->

<section class="other-services">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php if ( $other_services_title = get_field( 'other_services_title' ) ): ?>
                    <h2 class="other-services__title">
						<?php echo $other_services_title ?>
                    </h2>
				<?php endif; ?>
            </div>
        </div>
    </div>

	<?php $arg = array(
		'post_type'      => 'service',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'posts_per_page' => - 1
	);
	$the_query = new WP_Query( $arg );
	if ( $the_query->have_posts() ) : ?>
        <div class="container-posts">
            <div class="grid-x grid-margin-x post-list">
				<?php while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$do_not_duplicate = $post->ID; ?>

					<?php $image_post = get_the_post_thumbnail_url() ?>
                    <div class="medium-3 small-12 cell">
                        <a class="post-link" href="<?php the_permalink(); ?>"
                           title="<?php the_title_attribute(); ?>">
                            <div class="post-image" <?php bg( $image_post ) ?>></div>
                            <h2 class="h5 post-title">
								<?php the_title() ?>
                                <i class="fas fa-chevron-right"></i>

                            </h2>
                        </a>
                    </div>
				<?php endwhile; ?>
            </div>
        </div>
	<?php endif;
	wp_reset_query(); ?>

</section>

<!-- End Other Services -->

<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->

<!-- End banner -->


<?php get_footer() ?>
