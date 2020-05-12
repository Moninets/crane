<?php
/**
 *Template Name: Contact Page
 */
get_header()
?>
<?php setup_postdata( $post ); ?>


    <!-- Began Banner -->

<?php $contact_banner_image = get_the_post_thumbnail_url() ?>
    <section class=" section-banner contact-banner" <?php echo bg( $contact_banner_image ); ?>>
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
					<?php echo the_content(); ?>
					<?php if ( $video = get_field( 'video' ) ):
						$image_wrapper = get_field( 'image_popup' );
						$content_popup = get_field( 'content_popup' );
						?>

                        <div class="wrapper-video" <?php bg( $image_wrapper ) ?> >
                            <div class="wrapper-video__content">
								<?php echo $content_popup ?>
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
    <!-- End banner -->

    <div class="grid-container contact">
        <div class="grid-x">
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
        </div>

    </div>

    <!-- Began Contact -->

    <section class="cr-contact">
        <div class="grid-container">
            <div class="grid-x xlarge-margin-collapse">
                <div class="small-12 cell">

					<?php if ( $contact_title = get_field( 'contact_title' ) ) : ?>
						<?php echo $contact_title ?>
					<?php endif; ?>

                </div>
                <div class="medium-6 small-12 cell">
					<?php if ( $left_content = get_field( 'left_content' ) ) : ?>
						<?php echo $left_content ?>
					<?php endif; ?>
                </div>
                <div class="medium-6 small-12 cell wrapper">
					<?php if ( $right_content = get_field( 'right_content' ) ) : ?>
						<?php echo $right_content; ?>
					<?php endif; ?>
                </div>
            </div>
            <div class="grid-x xlarge-margin-collapse location">
                <div class="medium-6 small-12 cell">
					<?php if ( $office_location_title = get_field( 'office_location_title' ) ) : ?>
                        <h3 class="location__title">
							<?php echo $office_location_title; ?>
                        </h3>
					<?php endif; ?>
					<?php if ( $office_address = get_field( 'office_address' ) ) : ?>
						<?php echo $office_address; ?>
					<?php endif; ?>
                </div>
                <div class="medium-6 small-12 cell">
                    <div class="wrapper__images">
						<?php if ( $image_location = get_field( 'location' ) ): ?>
                            <img src="<?php echo $image_location['url'] ?>" alt="<?php $image_location['title'] ?>">
						<?php endif; ?>
						<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ) : ?>
                            <img class="wrapper__triangle triangle-image-right" src="<?php echo $triangle_image['url'] ?>"
                                 alt="<?php echo $triangle_image['title']; ?>">
						<?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- End Contact -->

    <!-- Began Team -->

    <section class="team">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
					<?php if ( $team_title = get_field( 'team_title' ) ): ?>

                        <h2 class="team__title"><?php echo $team_title ?></h2>

					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="cr-container">
			<?php if ( have_rows( 'our_team' ) ): ?>
                <div class="slider" id="team-slider">
					<?php while ( have_rows( 'our_team' ) ): the_row();
						$image    = get_sub_field( 'image' );
						$title    = get_sub_field( 'title' );
						$position = get_sub_field( 'position' );
						$phone    = get_sub_field( 'phone' );
						?>
                        <div class="slide">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?> "
                                 data-no-lazy="1">
                            <div class="slide__content">
                                <h3 class="h5 slide__title"><?php echo $title; ?></h3>
                                <p class="slide__position"><?php echo $position; ?></p>
                                <a class="slide__phone" href="<?php echo $phone['url']; ?>"><?php echo $phone['title']; ?></a>
                            </div>
                        </div>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>
        </div>
    </section>

    <!-- End Team -->

    <!-- Began Joining -->
<?php $section_image = get_field( 'section_image' ); ?>
    <section class="joining" <?php bg( $section_image['url'] ); ?>>
		<?php if ( $title_section = get_field( 'title_section' ) ): ?>
            <h1 class="section-title">
				<?php echo $title_section ?>
            </h1>
		<?php endif; ?>
        <div class="grid-container">
            <div class="grid-x">
                <div class="medium-8 small-12 cell">

					<?php if ( $joining_title = get_field( 'joining_title' ) ) : ?>
						<?php echo $joining_title ?>
					<?php endif; ?>
					<?php if ( have_rows( 'managers' ) ) : ?>
						<?php while ( have_rows( 'managers' ) ) : the_row();
							$content = get_sub_field( 'content' );
							$button  = get_sub_field( 'button' );
							?>
                            <div class="joining__content">
	                            <div class="joining__title">
									<?php echo $content; ?>
	                            </div>
                                <a class="joining__button button" href="<?php echo $button['url']; ?>">
									<?php echo $button['title']; ?>
                                </a>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ) : ?>
            <img class="triangle-image-right" src="<?php echo $triangle_image['url'] ?>"
                 alt="<?php echo $triangle_image['title']; ?>">
		<?php endif; ?>
    </section>

    <!-- End Joining -->

    <!-- Began Quote -->

<?php show_template( 'quote' ); ?>

    <!-- End Quote -->

<?php get_footer(); ?>