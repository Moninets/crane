<div class="video-popup " data-fancybox="gallery" id="banner-popup">
<!--	<button class="popup-close"></button>-->
	<?php if ( $image_popup = get_field( 'image_popup' ) ): ?>
		<img class="video-image" src="<?php echo $image_popup['url']; ?>"
		     alt="<?php echo $image_popup['title']; ?>">
	<?php endif; ?>
	<?php if ( $crane_button_image = get_field( 'play_image', 'options' ) ): ?>
		<button class="play-video" id="play-video">
			<img class="wrapper__image" src="<?php echo $crane_button_image['url'] ?>"
			     alt="<?php echo $crane_button_image['title'] ?>">
		</button>
	<?php endif; ?>
	<?php if ( $video = get_field( 'video_main', 'options' ) ): ?>

		<iframe class="vid " id="yt" src="<?php echo $video ?>" frameborder="0" allowfullscreen style="width:100%;height:610px;"></iframe>

	<?php endif; ?>
</div>