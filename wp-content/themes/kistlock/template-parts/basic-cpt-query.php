<?php
// if doing only 1 query with no paging use 'no_found_rows = true'
$args =  array ( 
	'posts_per_page' 	=> -1, 
    'post_type' 		=> 'mandr_service',
    'no_found_rows' => true,
);

$wp_query = new WP_Query($args);

if( $wp_query->have_posts() ) :
	$cx = 0;
	?>
	<div class="services">
        <?php
        while( $wp_query->have_posts() ) :
            $wp_query->the_post(); 		
            $cx++;
            $title = get_the_title();
            $link = get_the_permalink();
            
            // grab featured image if available, get all meta info for it using acf function, resize only if needed
            if(has_post_thumbnail()){
                $featured_img = acf_get_attachment(get_post_thumbnail_id());
                if((int)$featured_img['width'] !== 600 || (int)$featured_img['height'] !== 400){
                    $image_url = aq_resize($featured_img['url'], 600, 400, true, true, true);
                }else {
                    $image_url = $featured_img['url'];
                }
            }

            if($cx % 4 === 1){
                $first = 'first';
            } else {
                $first = '';
            }
            ?>
            <div class="service one-fourth <?= $first; ?> <?php if(has_post_thumbnail()) : ?> service--has-thumbnail <?php endif; ?>">
                <?php if(has_post_thumbnail()) : ?>
                    <img class="service__image" src="<?= $image_url; ?>" alt="<?= $featured_image['alt']; ?>">
                <?php endif; ?>
                <h2 class="service__title"><?= $title; ?></h2>
                <div class="service__excerpt">
                    <?= get_the_advanced_acf_excerpt(); ?>
                </div>
                <a href="<?= $link; ?>" class="service__button button">Learn More</a>
            </div>
            <?php
        endwhile;
        ?>
	</div>
    <?php
endif;
wp_reset_postdata();
?>