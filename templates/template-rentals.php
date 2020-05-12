<?php
/**
 *Template Name: Bare Rentals Page
 */
get_header();
?>

<?php setup_postdata( $post ); ?>

<div class="grid-container rentals-page">
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

<?php $rentals_banner_image = get_the_post_thumbnail_url() ?>
<section class="section-banner rentals-banner " <?php echo bg( $rentals_banner_image ); ?>>
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


<!-- Began Security -->

<section class="security">
    <div class="grid-container">
        <div class="grid-x grid-margin-x xlarge-margin-collapse content-top">
            <div class="medium-6 small-12 cell">
				<?php if ( $rentals_title = get_field( 'rentals_title' ) ): ?>
                    <h2 class="security__title">
						<?php echo $rentals_title ?>
                    </h2>
				<?php endif; ?>
            </div>
            <div class="medium-6 small-12 cell">
                <div class="wrapper">
					<?php if ( $rentals_description = get_field( 'rentals_description' ) ): ?>
						<?php echo $rentals_description; ?>
					<?php endif; ?>
					<?php if ( $button_mail = get_field( 'button_mail' ) ): ?>
                        <a class="wrapper__link button"
                           href="<?php echo $button_mail['url'] ?>" <?php echo $button_mail['target'] ?>>
							<?php echo $button_mail['title'] ?>
                        </a>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php if ( have_rows( 'list_provide' ) ): ?>
			<?php $i = 1; ?>
			<?php while ( have_rows( 'list_provide' ) ):
				the_row();
				$image   = get_sub_field( 'image' );
				$title   = get_sub_field( 'title' );
				$content = get_sub_field( 'content' );
				$button  = get_sub_field( 'button' );
				?>


                <div class="provide grid-x grid-margin-x xlarge-margin-collapse">
                    <div class="medium-6 small-12 cell <?php echo $i % 2 == 0 ? 'small-order-1' : ''; ?> ">
                        <div class="wrapper__images">
                            <div class="images__scale">
                                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                            </div>
                                <?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ) : ?>
                                <img class="images__triangle triangle-image-right"
                                     src="<?php echo $triangle_image['url'] ?>"
                                     alt="<?php echo $triangle_image['title']; ?>">
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="medium-6 small-12 cell ">
                        <div class="provide__content <?php echo $i % 2 == 0 ? 'content-left' : ''; ?>">
                            <h3 class="provide__content--title">
								<?php echo $title ?>
                            </h3>

							<?php echo $content ?>

                            <a class="provide__content--button button"
                               href="<?php echo $button['url']; ?>" <?php echo $button['target']; ?>>
								<?php echo $button['title']; ?>
                            </a>
                        </div>
                    </div>
                </div>
				<?php $i ++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</section>

<!-- End Security -->

<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->


<?php get_footer(); ?>
