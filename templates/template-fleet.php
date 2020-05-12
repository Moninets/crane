<?php
/**
 *Template Name: Fleet Page
 */
get_header()
?>

<div class="grid-container fleet">
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
<!-- Began Banner -->

<?php $fleet_banner_image = get_the_post_thumbnail_url() ?>
<section class="section-banner fleet-banner " <?php echo bg( $fleet_banner_image ); ?>>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php if($triangle_image_banner = get_field('triangle_image_banner', 'options')) : ?>
	<img class="triangle-image-right" src="<?php echo $triangle_image_banner['url'] ?>" alt="<?php echo $triangle_image_banner['title']; ?>">
<?php endif; ?>
</section>

<?php wp_reset_postdata(); ?>
<!-- End banner -->

<!-- Began Crane -->

<section class="crane fleet-crane">
	<div class="grid-container">
		<?php show_template( 'crane' ) ?>
	</div>
<?php if ($triangle_image_crane = get_field('triangle_crane_image', 'options')): ?>
	<img class="triangle-image-right" src="<?php echo $triangle_image_crane['url'] ;?>" alt="<?php echo $triangle_image_crane['title'] ;?>">
	<?php endif; ?>
</section>

<!-- End Crane-->

<!-- Began Quote -->

<?php show_template( 'quote' ); ?>

<!-- End Quote -->

<?php get_footer() ?>
