<?php get_header(); ?>
<main id="primary-wrap" class="primary_content_wrap" role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('page post-holder'); ?>> 
            <?php get_template_part( 'template-parts/title' ); ?> 
            <?php get_template_part( 'template-parts/advanced-layout' ); ?>
            <?php
                if (is_page(358)) {
                    echo get_template_part( 'template-parts/testimonial-page' );
                }
            ?>
        </article> 
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>