<?php 
/**
 * Template Name: Testimonials Page
 */
get_header(); ?>
<main id="primary-wrap" class="primary_content_wrap" role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('page post-holder'); ?>>
            <div class="container"> 
                <?php get_template_part( 'templates/title' ); ?>
			</div>
			<?php 
				if(get_field('testimonials_page_testimonials')) : $featured_testimonials = get_field('testimonials_page_testimonials');
			?>
				<section class="testimonials">
					<div class="container">
						<h2 class="section-title">Testimonials</h2>
						<div class="slider-wrap">
							<div class="testimonial-slider">
								<?php 
									foreach($featured_testimonials as $post) : setup_postdata( $post );
										$id = $post->ID;
										$title = get_the_title($id);
										$content = get_the_content($id); 
								?>
										<div class="testimonial-slide">
											<div class="title-wrap">
												<h3><?= $title ?></h3>
											</div>
											<div class="content-wrap">
												<?= $content ?>
											</div>
										</div>
								<?php
									endforeach;
								?>
							</div>
							<script>
								jQuery(window).load(function() {
									jQuery(".testimonial-slider").slick({
										//accessibility: true,
										//adaptiveHeight: false,
										//appendArrows: $(element),
										appendDots: $('.slider-wrap'),
										arrows: false,
										//asNavFor: null,
										//prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="previous">Previous</button>',
										//nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="next">Next</button>',
										autoplay: true,
										autoplaySpeed: 5000,
										centerMode: false,
										//centerPadding: '50px',
										//cssEase: 'ease', 
										//customPaging: function(slider, i) {
										//    return '<button type="button" data-role="none">' + (i + 1) + '</button>';
										//},
										dots: true,
										//dotsClass: 'slick-dots',
										draggable: true,
										//easing: 'linear',
										//edgeFriction: 0.35,
										//fade: false,
										//focusOnSelect: false,
										infinite: true,
										rows: 0,
										//initialSlide: 0,
										//lazyLoad: 'ondemand',
										//mobileFirst: false,
										//pauseOnHover: true,
										//pauseOnDotsHover: false,
										//respondTo: 'window', 
										//rtl: false,
										slide: '.testimonial-slide',
										slidesToShow: 1,
										slidesToScroll: 1,
										//speed: 500,
										//swipe: true,
										//swipeToSlide: false,
										//touchMove: true,
										//touchThreshold: 5,
										//useCSS: true,
										//variableWidth: false,
										//vertical: false,
										//waitForAnimate: true	
									});
								});
							</script>
						</div>	
					</div>
				</section>	
			<?php 
				endif; 
			?> 
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>