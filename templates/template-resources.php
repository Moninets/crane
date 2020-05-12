<?php
/**
 *Template Name: Resources Page
 */
get_header();
?>

<?php setup_postdata( $post ); ?>


    <!-- Began Banner -->

<?php $resources_banner_image = get_the_post_thumbnail_url() ?>
    <section class="section-banner resources-banner " <?php echo bg( $resources_banner_image ); ?>>
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
					<?php the_content(); ?>
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
    <div class="grid-container resources-page">
        <div class="grid-x">
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
        </div>
    </div>

    <!-- Began Advantages -->
<?php $background_image = get_field( 'background_image' ); ?>
    <section class="advantages" <?php bg( $background_image ); ?>>
        <div class="grid-container">
            <div class="grid-x xlarge-margin-collapse">
                <div class="medium-6 small-12 cell">
					<?php if ( $resources_title = get_field( 'resources_title' ) ): ?>

						<?php echo $resources_title ?>

					<?php endif; ?>
                </div>
                <div class="medium-6 small-12 cell">
					<?php if ( $section_image = get_field( 'section_image' ) ): ?>
                        <div class="images__scale">
                            <img src="<?php echo $section_image['url'] ?>"
                                 alt="<?php echo $section_image['title'] ?>">
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php if ( have_rows( 'advantage_list' ) ): ?>
            <div class="advantages-container cr-container">
                <div class="grid-x grid-margin-x">
					<?php while ( have_rows( 'advantage_list' ) ) : the_row();
						$image   = get_sub_field( 'image' );
						$content = get_sub_field( 'content' );
						?>
                        <div class="medium-3 small-12 cell">
                            <div class="advantages__list">
                                <div class="images__scale">
                                    <img src="<?php echo $image ['url'] ?>"
                                         alt="<?php echo $image ['title'] ?>">
                                </div>
                                <div class="content">

									<?php echo $content; ?>

                                </div>

                            </div>

                        </div>
					<?php endwhile; ?>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ): ?>
            <img class="triangle-image" src="<?php echo $triangle_image['url']; ?>"
                 alt="<?php $triangle_image['title']; ?>">
		<?php endif; ?>
    </section>

    <!-- End Advantages -->

    <!-- Began Quote -->

<?php show_template( 'quote' ); ?>

    <!-- End Quote -->

<?php get_footer(); ?>