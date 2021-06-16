</div>
<footer id="footer" role="contentinfo">
    <div class="address-cell cell">
        <?php
            $address = get_field( 'mandr_address', 'options' );
            $address_link = get_option( 'options_mandr_address_link' );
        ?>
        <div class="inner">
            <a href="<?= $address_link ?>" newtab="true"><?= $address ?></a>
        </div>
    </div>
    <div class="logo-cell cell">
        <div class="inner">
            <a href="<?php bloginfo('url'); ?>/">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/footer-logo.svg" alt="<?php echo bloginfo('name'); ?> logo" />
            </a>
            <div id="footer-copyright">
                <?= do_shortcode( get_option( 'options_contact_info' ) ); ?>
            </div>
        </div>
    </div>
    <div class="phone-fax-email-cell cell">
        <?php
            $phone = get_option( 'options_mandr_phone' );
            $fax = get_option( 'options_mandr_fax' );
            $email = get_option( 'options_mandr_email' );
        ?> 
        <div class="inner">
            <div class="contact">
                <?php if( $phone ) : ?>
                    <a href="tel:<?= $phone ?>" class="phone">P: <?= $phone ?></a>
                <?php endif; ?>
                <?php if( $fax ) : ?>
                    <a href="<?= $fax ?>" class="fax">F: <?= $fax ?></a>
                <?php endif; ?>
                <?php if( $email ) : ?>
                    <a href="mailto:<?= $email ?>" class="email"><?= $email ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="footer-copyright-mobile">
        <?= do_shortcode( get_option( 'options_contact_info' ) ); ?>
    </div>
</footer>

<span class="navigation-overlay" title="Close navigation menu"></span>
<?php wp_footer(); ?>
</body>
</html>
		
