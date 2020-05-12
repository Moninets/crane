<?php
/**
 *Template Name: Safety Page
 */
get_header();
?>

<?php setup_postdata( $post ); ?>

<div class="grid-container safety-page">
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

<?php $safety_banner_image = get_the_post_thumbnail_url() ?>
<section class="section-banner safety-banner " <?php echo bg( $safety_banner_image ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php wp_reset_postdata(); ?>

<!-- End Banner -->

<!-- Began Industry -->

<section class="industry">
    <div class="grid-container">
        <div class="grid-x xlarge-margin-collapse content-top">
            <div class="medium-6 small-12 cell">
				<?php if ( $industry_title = get_field( 'industry_title' ) ) : ?>
                    <h2 class="content-top__title">
						<?php echo $industry_title ?>
                    </h2>
				<?php endif; ?>
            </div>
            <div class="medium-6 small-12 cell">
				<?php if ( $industry_description = get_field( 'industry_description' ) ) : ?>
					<?php echo $industry_description ?>
				<?php endif ?>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        <div class="wrapper__images">
            <div class="images__scale">

				<?php if ( $industry_image = get_field( 'industry_image' ) ) : ?>
                    <img src="<?php echo $industry_image['url'] ?>"
                         alt="<?php echo $industry_image['title'] ?>">
				<?php endif; ?>

            </div>
			<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ) : ?>
                <img class="triangle-image-right"
                     src="<?php echo $triangle_image['url'] ?>"
                     alt="<?php echo $triangle_image['title']; ?>">
			<?php endif; ?>

        </div>
		<?php if ( have_rows( 'list_info' ) ) : ?>
            <div class="info">
				<?php while ( have_rows( 'list_info' ) ) : the_row();
					$counter = get_sub_field( 'counter' );
					$date    = get_sub_field( 'date' );
					$title   = get_sub_field( 'title' );
					?>
                    <div class="wrapper">
                        <p class="wrapper__counter"><?php echo $counter; ?></p>
                        <p class="wrapper__date"><?php echo $date; ?></p>
                        <h3 class=" h5 wrapper__title"><?php echo $title; ?></h3>
                    </div>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
    </div>
</section>

<!-- End Industry -->

<!-- Began Awards -->

<section class="awards">
    <div class="grid-container">
        <div class="awards__bg">
            <div class="grid-x">
                <div class="cell">
					<?php if ( $award_title = get_field( 'award_title' ) ) : ?>

                        <h2 class="awards__title">
							<?php echo $award_title ?>
                        </h2>

					<?php endif; ?>

                </div>
            </div>
            <div class="container-awards">
				<?php if ( have_rows( 'award_list' ) ): ?>
                    <div class="grid-x grid-margin-x">
						<?php while ( have_rows( 'award_list' ) ) : the_row();
							$icon  = get_sub_field( 'icon' );
							$title = get_sub_field( 'title' );
							?>
                            <div class="medium-4 small-12 cell">
                                <div class="wrapper">
                                    <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['title'] ?>">
                                    <p class="wrapper__text">
										<?php echo $title; ?>
                                    </p>

                                </div>
                            </div>

						<?php endwhile; ?>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </div>
	<?php if ( $triangle_crane_image = get_field( 'triangle_crane_image', 'options' ) ): ?>
        <img class="triangle-image" src="<?php echo $triangle_crane_image['url']; ?>"
             alt="<?php $triangle_crane_image['title']; ?>">
	<?php endif; ?>
</section>

<!-- End Awards -->


<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->

<?php get_footer(); ?>
