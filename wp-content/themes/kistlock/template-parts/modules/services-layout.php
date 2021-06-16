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
$display_type = get_sub_field('display_type'); // List, Carousel

// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
} 

// Determine display type
$section_type = '';
if($display_type === 'List'){
    $section_type = 'services-list-section';
} else {
    $section_type = 'services-slider-section';
}

$featured_services = get_sub_field('services');

if( $featured_services ) : 
    ?>
    <section <?= $id; ?> class="section-wrap services-module <?= $section_type; ?> <?= $section_classes; ?> <?= $include_padding; ?>">
        <div class="container">
            <div class="services-module__container">
                <?php 
                foreach($featured_services as $service) :
                    $title = get_the_title($service->ID);
                    $link = get_the_permalink($service->ID);

                    if(has_post_thumbnail($service->ID)){
                        $featured_img = acf_get_attachment(get_post_thumbnail_id($service->ID));
                        if((int)$featured_img['width'] !== 400 || (int)$featured_img['height'] !== 300){
                            $image_url = aq_resize($featured_img['url'], 400, 300, true, true, true);
                        }else {
                            $image_url = $featured_img['url'];
                        }
                    }
                    ?>
                    <div class="service <?php if(has_post_thumbnail($service->ID)) : ?> service--has-thumbnail <?php endif; ?>">
                        <?php if(has_post_thumbnail($service->ID)) : ?>
                            <img src="<?= $image_url; ?>" alt="<?= $featured_image['alt']; ?>">
                        <?php endif; ?>
                        <div class="service__header">
                            <h3><?= $title; ?></h3>
                        </div>
                        <div class="service__content">
                            <?= $service->post_excerpt; ?>
                            <a href="<?= $link; ?>" class="service__button button">Learn More</a>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
            <?php
            if( $display_type === 'Carousel' ) :
                ?>
                <script>
                    jQuery(window).load(function() {
                        jQuery('.services-module .services-module__container').slick({
                            //accessibility: true,
                            //adaptiveHeight: false,
                            //appendArrows: $(element),
                            appendDots: $('.services-module .services-module__container'),
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
                            slide: '.service',
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
                <?php
            endif;
            ?>
        </div>
    </section>	
    <?php 
endif;