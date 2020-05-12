<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<?php if ( have_rows( 'footer_menu', 'options' ) ) : ?>
        <div class="grid-container">
            <div class="grid-x">
                <div class="large-3 medium-3 small-12 cell">
					<?php if ( $image = get_field( 'footer_logo', 'options' ) ) : ?>
                        <a class="footer__logo" href="/">
                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image ['title'] ?>">
                        </a>
					<?php endif; ?>
                </div>
				<?php while ( have_rows( 'footer_menu', 'options' ) ) : the_row();
					$type        = get_sub_field( 'content_type' );
					$title       = get_sub_field( 'title' );
					$footer_form = get_sub_field( 'footer_form' );
					$phone       = get_sub_field( 'phone' );
					?>
					<?php if ( $type == 'sitemap' ): ?>
                        <div class="large-2 medium-2 small-12 cell footer__sitemap">
                            <h2 class="h6 title"><?php echo $title; ?></h2>
							<?php if ( 'list_link' ) : ?>
                                <ul class="list vertical menu footer-menu">
									<?php while ( have_rows( 'list_link' ) ) : the_row();
										$link = get_sub_field( 'link' ); ?>
                                        <li class="item">
                                            <a class="link" href="<?php echo $link['url'] ?>">
												<?php echo $link['title'] ?>
                                            </a>
                                        </li>
									<?php endwhile; ?>
                                </ul>
							<?php endif; ?>
                        </div>
					<?php endif; ?>

					<?php if ( $type == 'services' ): ?>
                        <div class="large-4 medium-4 small-12 cell footer__services">
                            <h2 class="h6 title"><?php echo $title; ?></h2>
							<?php if ( 'list_link' ) : ?>
                                <ul class="list vertical menu footer-menu">
									<?php while ( have_rows( 'list_link' ) ) : the_row();
										$link = get_sub_field( 'link' ); ?>
                                        <li class="item">
                                            <a class="link" href="<?php echo $link['url'] ?>">
												<?php echo $link['title'] ?>
                                            </a>
                                        </li>
									<?php endwhile; ?>
                                </ul>
							<?php endif; ?>
                        </div>
					<?php endif; ?>

					<?php if ( $type == 'contact' ): ?>
                        <div class="large-3 medium-3 small-12 cell footer__contact">
                            <h2 class="h6 title"><?php echo $title; ?></h2>
							<?php if ( $footer_form ): ?>
								<?php gravity_form( $footer_form['id'], false, true, false, '', true, 1 ); ?>
							<?php endif; ?>
							<?php if ( $phone ) : ?>
                                <div class="phone">
									<?php echo $phone ?>
                                </div>
							<?php endif; ?>
							<?php if ( have_rows( 'socials' ) ): ?>
                                <ul class="socials__list menu">
									<?php while ( have_rows( 'socials' ) ): the_row();
										$icon = get_sub_field( 'icon' );
										$link = get_sub_field( 'link' );
										?>
                                        <li class="socials__item">
                                            <a href="<?php echo $link ?>" class="socials__link" target="_blank">
                                                <i class="fab fa-<?php echo $icon ?>"></i>
                                            </a>
                                        </li>
									<?php endwhile; ?>
                                </ul>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
				<?php endwhile; ?>
            </div>
        </div>
	<?php endif; ?>
</footer>
<!-- END of footer -->

<!-- Began Copyright -->

<?php if ( $copyright = get_field( 'copyright', 'options' ) ): ?>
	<?php $mail = get_field( 'copyright_mail', 'options' ); ?>
    <div class="copyright">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
                    <div class="wrapper">
						<?php echo $copyright ?>
						<?php echo $mail ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php endif; ?>

<!-- End Copyright-->

<?php wp_footer(); ?>
</body>
</html>
