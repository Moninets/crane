<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>


    <!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
    <!--END of HOME PAGE SLIDER-->
    <!-- BEGIN of main content -->

    <!-- Began About -->
<?php setup_postdata( $post ); ?>
    <section class="cr-about">
		<?php if ( $image_bg = get_field( 'image' ) ): ?>

            <div class="cr-about__bg" <?php bg( $image_bg ) ?>></div>

		<?php endif; ?>

        <div class="cr-about__triangle">
            <img src="<?php blogInfo( 'template_url' ); ?>/images/home-fin-right1.png" alt="Triangle">
        </div>
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
					<?php

					$projects = get_field( 'slider_projects' );

					if ( $projects ): ?>
                        <div class="gradient">

                            <div class="slider" id="projects-slider">
								<?php foreach ( $projects as $post ): ?>
									<?php $image = get_the_post_thumbnail_url(); ?>
									<?php setup_postdata( $post ); ?>
                                    <div class="slide" <?php bg( $image ) ?>>
                                        <div class="slide__content">
                                            <h2 class="slide__content--title">
												<?php the_title(); ?>
                                            </h2>
											<?php the_excerpt(); ?>
                                        </div>
										<?php if ( $link = get_field( 'button' ) ): ?>
                                            <a class="slide__button button" href="<?php echo $link['url'] ;?>">
												<?php echo $link['title'] ?>
                                            </a>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- End About -->

    <div class="grid-container home">
        <div class="grid-x">
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
            <div class="small-2 cell lines-wrapper__line"></div>
        </div>

    </div>

    <!-- Began Services -->
<?php $section_image = get_field( 'image_section'  ); ?>
    <section class="section-services" <?php bg( $section_image ); ?>>
		<?php if ( $section_title = get_field( 'section_text' ) ) : ?>
            <h1 class="section-title">
				<?php echo $section_title ?>
            </h1>
		<?php endif; ?>
        <div class="grid-container">
            <div class="grid-x section-top-content">
                <div class="medium-6 small-12 cell">
					<?php if ( $services_title = get_field( 'services_title' ) ): ?>
                        <h2 class="title">
							<?php echo $services_title ?>
                        </h2>
					<?php endif; ?>
					<?php if ( $services_button = get_field( 'services_button' ) ): ?>
                        <a class="button show-for-medium hide-for-small" href="<?php echo $services_button['url'] ?>">
							<?php echo $services_button['title'] ?>
                        </a>
					<?php endif; ?>

                </div>
                <div class="medium-6 small-12 cell">
					<?php if ( $services_content = get_field( 'services_content' ) ): ?>
						<?php echo $services_content ?>
					<?php endif; ?>
	                <?php if ( $services_button = get_field( 'services_button' ) ): ?>
                        <a class="show-for-small hide-for-medium  button" href="<?php echo $services_button['url'] ?>">
			                <?php echo $services_button['title'] ?>
                        </a>
	                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container-posts">
		    <?php

		    $services = get_field( 'services_posts' );
		    if ( $services ): ?>

                <div class="grid-x grid-margin-x post-list">
				    <?php foreach ( $services as $post ): ?>
					    <?php setup_postdata( $post ); ?>

					    <?php $image_post = get_the_post_thumbnail_url() ?>
                        <div class="xlarge-3 large-4 medium-6 small-12 cell">
                            <a class="post-link" href="<?php the_permalink(); ?>"
                               title="<?php the_title_attribute(); ?>">
                                <div class="post-image" <?php bg( $image_post ) ?>></div>
                                <h2 class="h5 post-title">
								    <?php the_title() ?>
                                    <i class="fas fa-chevron-right"></i>

                                </h2>
                            </a>
                        </div>
				    <?php endforeach; ?>
                </div>
			    <?php wp_reset_postdata(); ?>
		    <?php endif; ?>
        </div>
    </section>

    <!-- END Services -->

    <!-- Began Crane-->
<?php if ( $crane_section_image = get_field( 'section_image' ) ): ?>
    <section class="crane" <?php bg( $crane_section_image ) ?>>
<?php endif; ?>
<?php if ( $crane_section_title = get_field( 'crane_section_title' ) ) : ?>
    <h1 class="section-title">
		<?php echo $crane_section_title ?>
    </h1>
<?php endif; ?>
    <div class="grid-container">
		<?php show_template( 'crane' ) ?>

    </div>
<?php if ( $triangle_image = get_field( 'triangle_image', 'options' ) ): ?>
    <img class="triangle-image" src="<?php echo $triangle_image['url']; ?>" alt="<?php $triangle_image['alt']; ?>">
<?php endif; ?>
    </section>

    <!-- End Crane -->


    <!-- Began About Team -->

    <section class="about-team">
		<?php if ( $title_section = get_field( 'about_title_section' ) ): ?>
            <h1 class="section-title">
				<?php echo $title_section ?>
            </h1>
		<?php endif; ?>
        <div class="grid-container">
            <div class="grid-x section-top-content">
                <div class="medium-6 small-12 cell ">
					<?php if ( $title = get_field( 'about_title' ) ): ?>
                        <h2 class="title"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ( $button = get_field( 'about_button' ) ): ?>
                        <a class="button" href="<?php echo $button['url'] ?>">
							<?php echo $button['title'] ?>
                        </a>
					<?php endif; ?>
                </div>
                <div class="medium-6 small-12 cell">
					<?php if ( $description = get_field( 'about_description' ) ): ?>
						<?php echo $description ?>
					<?php endif; ?>
                </div>
            </div>
            <div class="grid-x wrapper">
                <div class="medium-6 small-12 cell">
					<?php if ( $image = get_field( 'about_image' ) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">

					<?php endif; ?>
                </div>
                <div class="medium-6 small-12 cell">
					<?php if ( $content = get_field( 'about_content' ) ): ?>
						<?php echo $content ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- End About Team -->

    <!-- Began Safety -->

    <section class="safety">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="medium-6 small-12 cell">
					<?php if ( $title = get_field( 'safety_title' ) ): ?>
                        <h2 class="safety__title">
							<?php echo $title ?>
                        </h2>
					<?php endif; ?>

					<?php if ( $safety_content = get_field( 'safety_content' ) ): ?>
						<?php echo $safety_content ?>
					<?php endif; ?>

                </div>
                <div class="medium-6 small-12 cell section-image">
					<?php if ( $safety_image = get_field( 'safety_image' ) ): ?>
                        <img src="<?php echo $safety_image['url'] ?>" alt="<?php echo $safety_image['title'] ?>">
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- And Safety -->


    <!-- Began Testimonials -->
<?php $image_bg = get_field( 'image_bg' ); ?>
    <section class="testimonials" <?php bg( $image_bg['url'] ); ?>>
		<?php if ( $testimonials_title = get_field( 'testimonials_title' ) ): ?>
            <h2 class="testimonials__section--title section-title">
				<?php echo $testimonials_title ?>
            </h2>
		<?php endif; ?>
        <div class="grid-container">
            <div class="grid-x">
                <div class="medium-10 small-12 cell">
					<?php if ( $testimonials_title = get_field( 'testimonials_title' ) ): ?>
                        <h2 class="testimonials__title">
							<?php echo $testimonials_title ?>
                        </h2>
					<?php endif; ?>
                </div>
            </div>
			<?php if ( have_rows( 'testimonials_slider' ) ): ?>
                <div class="slider" id="testimonials-slider">
					<?php while ( have_rows( 'testimonials_slider' ) ) : the_row();
						$image       = get_sub_field( 'image' );
						$description = get_sub_field( 'description' );
						$name        = get_sub_field( 'name' );
						$position    = get_sub_field( 'position' );
						?>
                        <div class="slide">
                            <div class="grid-x grid-margin-x">
                                <div class="medium-6 small-12 cell">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php $name['title'] ?>">
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <div class="slide-content">
										<?php echo $description ?>
                                        <h3 class="h4 slide-content__name">
											<?php echo $name ?>
                                        </h3>
                                        <p class="slide-content__position">
											<?php echo $position ?>
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>

					<?php endwhile; ?>
                </div>
			<?php endif; ?>
        </div>
    </section>

    <!-- End Testimonials -->


    <!-- Began Quote -->

<?php show_template( 'quote' ); ?>

    <!-- End Quote -->

    <!-- END of main content -->
<?php get_footer(); ?>