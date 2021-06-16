<?php
add_action( 'wp_head', 'blog_index_schema' );
get_header();
?>
<main id="primary-wrap" class="primary_content_wrap" role="main">
	<div class="archive-holder">
    	<div class="container">
			<?php get_template_part( 'template-parts/title' ); ?>
			<div id="posts" class="posts">
				<?php
				if( $wp_query->have_posts() ):
					while( $wp_query->have_posts() ):
						$wp_query->the_post();
						
						get_template_part('template-parts/posts/blog-listing', null, array('id'=>get_the_ID()));

					endwhile; 
					mandr_numeric_posts_nav();
				else:
					?>
					<div class="no-results">
						<p>We're sorry, but there are currently no posts in this area.</p>
					</div>
					<?php
				endif;
				?>
			</div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
