</div>
<footer id="footer" role="contentinfo">
    <div class="container">
        <a href="<?php bloginfo('url'); ?>/" class="footer-logo">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo-white.png" alt="<?php echo bloginfo('name'); ?> logo" />
        </a>
        <div class="quicklinks-outer">
            <h3>Quicklinks</h3>
            <nav class="quicklinks">
                <?php 
                    wp_nav_menu( array(
                        'container'       => 'ul', 
                        'menu_class'      => 'sf-menu clearfix', 
                        'menu_id'         => 'quicklinks',
                        'depth'           => 0,
                        'theme_location' => 'quicklinks' 
                    )); 
                ?>
            </nav>
        </div>
        <div class="contact-info">
            <h3>Contact</h3>
            <?= get_template_part('template-parts/contact-info'); ?>
        </div>
        <?= get_template_part('template-parts/social-links'); ?>
        <div id="footer-copyright">
            <?= do_shortcode( get_option( 'options_contact_info' ) ); ?>
        </div>
    </div>
</footer>

<span class="navigation-overlay" title="Close navigation menu"></span>
<?php wp_footer(); ?>
</body>
</html>
		
