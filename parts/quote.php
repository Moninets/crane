<?php $quote_image = get_field( 'quote_image', 'options' ); ?>
<section class="quote" id="quote-scroll" <?php bg( $quote_image ); ?>>
	<?php if ( $quote_section_title = get_field( 'quote_section_title','options' ) ): ?>
        <h2 class="quote-section-title section-title">
			<?php echo $quote_section_title ?>
        </h2>
	<?php endif; ?>
    <div class="grid-container">
        <div class="grid-x wrapper-content">
            <div class="medium-6 small-12 cell">
				<?php if ( $title = get_field( 'quote_title', 'options' ) ): ?>
                    <h2 class="wrapper-content__title">
						<?php echo $title ?>
                    </h2>
				<?php endif; ?>
            </div>
            <div class="medium-6 small-12 cell">
				<?php if ( $content = get_field( 'quote_content', 'options' ) ): ?>
					<?php echo $content ?>
				<?php endif; ?>
            </div>
        </div>
        <div class="grid-x">
            <div class="small-12 cell">
				<?php if ( $quote_form = get_field( 'quote_form', 'options' ) ): ?>
					<?php gravity_form( $quote_form['id'], false, true, false, '', true, 1 ); ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>