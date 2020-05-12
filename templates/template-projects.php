<?php
/**
 *Template Name: Projects Page
 */
get_header()
?>
<?php setup_postdata( $post ); ?>
<div class="grid-container projects">
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

<?php $projects_banner_image = get_the_post_thumbnail_url() ?>
<section class="projects-banner section-banner" <?php echo bg( $projects_banner_image ); ?>>
    <div class="grid-container container-popup">
        <div class="grid-x">
            <div class="cell">
				<?php echo the_content(); ?>
				<?php if ( $video = get_field( 'video' ) ):
					$image_wrapper = get_field( 'image_background' );
					$content_popup = get_field( 'content_popup' );
					?>

                    <div class="images__scale wrapper-video open-popup" id="open-banner-popup">
                        <img src="<?php echo $image_wrapper['url']; ?>" alt="<?php echo $image_wrapper['title']; ?>">
                        <div class="wrapper-video__content">
							<?php echo $content_popup ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
        <!-- Began Video-popup -->

		<?php show_template( 'video-popup' ); ?>

        <!-- End Video-popup -->
    </div>

</section>

<?php wp_reset_postdata(); ?>
<!-- End banner -->

<!-- Began Specializes-->

<section class="specializes">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
				<?php if ( $specialization_title = get_field( 'specialization_title' ) ): ?>

                    <h2 class="specializes__title">
						<?php echo $specialization_title ?>
                    </h2>

				<?php endif; ?>

            </div>
			<?php if ( have_rows( 'specialization_list' ) ): ?>
                <div class="grid-x grid-margin-x">
					<?php while ( have_rows( 'specialization_list' ) ) : the_row();
						$icon  = get_sub_field( 'icon' );
						$title = get_sub_field( 'title' );
						?>
                        <div class="medium-2 small-12 cell">
                            <div class="wrapper">
                                <img class="wrapper__image" src="<?php echo $icon['url'] ?>"
                                     alt="<?php echo $icon['title'] ?>">
                                <h3 class="h5 wrapper__title"><?php echo $title ?></h3>
                            </div>
                        </div>
					<?php endWhile; ?>

                </div>
			<?php endif; ?>
        </div>
    </div>
</section>

<!-- End Specializes-->

<!-- Began Crane Projects -->

<section class="crane-projects">
    <div class="grid-container">
        <div class="grid-x">
			<?php if ( $crane_projects_title = get_field( 'crane_projects_title' ) ): ?>

                <h2 class="crane-projects__title">
					<?php echo $crane_projects_title ?>
                </h2>

			<?php endif; ?>
        </div>


		<?php if ( $posts = get_field( 'projects_posts' ) ):
			?>
            <div class="grid-x grid-margin-x">
				<?php foreach ( $posts as $post ): ?>
					<?php setup_postdata( 'project' ); ?>
					<?php $image_post = get_the_post_thumbnail_url(); ?>
                    <div class="medium-6 small-12 cell">
                        <div class="post">
                            <a class="post__link" href="<?php the_permalink(); ?>">
                                <img class="post__link--image" src="<?php echo $image_post ?>"
                                     alt="<?php echo $image_post['title'] ?>">
								<?php if ( $project_triangle_image = get_field( 'project_triangle_image' ) ) : ?>
                                    <img class="triangle__image" src="<?php echo $project_triangle_image['url']; ?>"
                                         alt="<?php echo $project_triangle_image['title']; ?>">
								<?php endif; ?>

                            </a>
							<?php if ( $images = get_field( 'gallery')): ?>
								<?php foreach ( $images as $image ): ?>
                                    <a class="expand-icon" href="<?php echo $image['url']; ?>" data-fancybox="gallery"
                                       style="background-image: url(<?php blogInfo( 'template_url' ); ?>/images/expand-icon.png)">

                                    </a>
								<?php endforeach; ?>
							<?php endif; ?>
                            <h3 class="post__title"><?php the_title(); ?></h3>
                        </div>
                    </div>

					<?php wp_reset_postdata(); ?>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>

    </div>
</section>

<!-- End Crane Projects -->

<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->

<?php get_footer(); ?>
