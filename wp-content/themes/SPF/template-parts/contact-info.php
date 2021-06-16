<?php 
$phone = get_option( 'options_mandr_phone' );
$fax = get_option( 'options_mandr_fax' );
$address = get_field( 'mandr_address', 'options' );
$address_link = get_option( 'options_mandr_address_link' );
$mailing_address = get_option( 'options_mandr_mailing_address' );
$email = get_option( 'options_mandr_email' );

if($phone || $address ):
	?>
	<div class="footer-contact"> 
		<?php if( $address ) : ?>
			<p class="contact-address">
				<?php if($address_link): ?>
					<a href="<?= $address_link; ?>" target="_blank">
				<?php endif; ?>
				<?= $address; ?>
				<?php if($address_link): ?>
					</a>
				<?php endif; ?>
			</p>		
		<?php endif; ?>
        <?php if ( $mailing_address ) : ?>
            <p class="mailing-address"><?= $mailing_address ?></p>
        <?php endif; ?>
        <?php if( $phone ) : ?>
			<p class="contact-email">
				<?= phone_link($phone); ?>
			</p>
		<?php endif; ?> 
	</div>
	<?php
endif;