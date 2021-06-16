<?php
$section_id = get_sub_field('section_id');
$section_classes = get_sub_field('section_classes');
//$include_padding = get_sub_field('padding_between_sections');

$padding = get_sub_field('spacing_between_sections');
$padding_top = $padding['top'];
$padding_bottom = $padding['bottom']; 

$include_padding = ''; 
$include_padding .= $padding_top; 
$include_padding .= ' ';
$include_padding .= $padding_bottom;
// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
} 

// WP_Query arguments
$args = array (
    'post_type'              => 'post',
    'posts_per_page'         => '6',
    'no_found_rows'          => true,
);

// The Query
$post_query = new WP_Query( $args );

// The Loop
if ( $post_query->have_posts() ) :
    ?>
    <section <?= $id; ?> class="section-wrap recent-news <?= $section_classes; ?> <?= $include_padding; ?>">
        <div class="recent-news__container container ">
            <?php
            while($post_query->have_posts()):
                $post_query->the_post();
                if(has_post_thumbnail()){
                    $image = acf_get_attachment(get_post_thumbnail_id(get_the_ID()));
                    if($image){
                        if((int)$image['width'] !== 800 || (int)$image['height'] !== 533){
                            $img_url = aq_resize( $image['url'], 800, 533, true, true, true );
                        }else {
                            $img_url = $image['url'];
                        }
                    }
                }
                ?>
                <div class="news-item <?php if(has_post_thumbnail()) : ?> news-item--has-thumbnail <?php endif; ?>">
                    <?php if(has_post_thumbnail()) : ?>
                        <img class="news-item__image" src="<?= $img_url; ?>" alt="<?= $image['alt']; ?>">
                    <?php endif; ?>
                    <h3 class="news-item__title"><?= get_the_title(); ?></h3>
                    <p class="news-item__excerpt"><?= get_the_advanced_acf_excerpt(); ?></p>
                    <a class="news-item__button button" href="<?= get_the_permalink(); ?>">Read More</a>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();