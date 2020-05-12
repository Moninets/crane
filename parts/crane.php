<div class="grid-x">
    <div class="medium-6 small-12 cell">
		<?php if ( $title = get_field( 'crane_title' ) ): ?>
            <h2 class="crane__title">
				<?php echo $title ?>
            </h2>
		<?php endif; ?>
    </div>
    <div class="medium-6 small-12 cell">
        <?php $content_front = get_field( 'crane_content') ?>
        <?php $fleet_crane_content = get_field('fleet_crane_content'); ?>
		<?php echo  is_front_page() ? $content_front : $fleet_crane_content ;  ?>
    </div>
</div>

<?php
$terms = get_terms( array(
	'taxonomy'   => 'crane_categories',
	'hide_empty' => false,
) );
?>
<div class="button-group filter-button-group">
    <button data-filter="*" class="hollow isotope-button">
		<?php echo 'All-Terrain Cranes'; ?>
    </button>
	<?php foreach ( $terms as $term ) : ?>
        <button data-filter=".<?php echo $term->slug; ?>" class="hollow isotope-button">
			<?php echo $term->name ?>
        </button>

	<?php endforeach; ?>

</div>

<?php $arg = array(
	'post_type'      => 'crane',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'posts_per_page' => - 1
);
$the_query = new WP_Query( $arg );

if ( $the_query->have_posts() ) : ?>

    <div class="grid grid-x popup-area">


		<?php while ( $the_query->have_posts() ) :
			$the_query->the_post();
			$do_not_duplicate = $post->ID; ?>

			<?php $terms = get_the_terms( $post->ID, 'crane_categories' ); ?>

			<?php if ( is_array( $terms ) ) : ?>
			<?php foreach ( $terms as $term ) : ?>
                <div class="small-12 cell grid-item <?php echo $term->slug . ' ' ?>">
                    <a href="<?php the_permalink() ?>" class="link">
                        <h5 class="link__title"><?php the_title(); ?></h5>
						<?php the_content(); ?>
                    </a>
					<?php $crane_popup_image = get_field( 'crane_popup_image' );
					$video                   = get_field( 'video' );
					?>
                    <div class="grid-item__wrapper" data-img="<?php echo $crane_popup_image['url']; ?>"
                         data-video="<?php echo $video; ?>">
						<?php if ( $button_play = get_field( 'button_play' ) ): ?>
                            <button class="open-popup">
                                <img data-no-lazy="1" src="<?php blogInfo( 'template_url' ); ?>/images/360-icon.png"
                                     alt="360 icon">
                                360 View
                            </button>
						<?php endif; ?>
						<?php
						$file = get_field( 'crane_file' );
						if ( $file ): ?>
                            <a class="load-file" href="<?php echo $file['url']; ?>" target="_blank">
                                <img data-no-lazy="1"
                                     src="<?php blogInfo( 'template_url' ); ?>/images/download-icon.png"
                                     alt="Download icon">
								<?php echo $file['title']; ?>
                            </a>
						<?php endif; ?>

                    </div>
                </div>

			<?php endforeach; ?>
		<?php endif; ?>

		<?php endwhile; ?>


        <div class="video-popup"  data-fancybox id="crane-popup">
<!--            <button class="popup-close"></button>-->
		    <?php if ( $crane_popup_image = get_field( 'crane_popup_image' ) ): ?>
                <img class="video-popup__image" src=""
                     alt="">
		    <?php endif; ?>
		    <?php if ( $crane_button_image = get_field( 'crane_button_image' ) ): ?>
                <button class="play-video" id="play-video">
                    <img class="wrapper__image" src="<?php echo $crane_button_image['url'] ?>"
                         alt="<?php echo $crane_button_image['title'] ?>">
                </button>
		    <?php endif; ?>
	        <?php if ( $video = get_field( 'play_image', 'options' ) ): ?>

                <iframe class="vid " id="yt" src="" frameborder="0" allowfullscreen style="width:100%;height:610px;"></iframe>

	        <?php endif; ?>
        </div>

    </div>

<?php endif;


wp_reset_query();

?>


