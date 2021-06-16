<?php
    $section_classes = get_sub_field('section_classes');
    //$include_padding = get_sub_field('padding_between_sections');

    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
?>
<section class="section-wrap featured-testimonials <?= $include_padding ?>">
    <div class="container">
        <div class="inner">
            <div class="title-button-cell">
                <h2>Testimonials</h2>
                <a class="button" href="/testimonials/">Read All</a>
            </div>
            <div class="testimonials-cell">
                <div class="testimonials-slider">
                    <?php
                        if (have_rows('KIST_Testimonials',358)) :
                            while (have_rows('KIST_Testimonials',358)) : the_row();
                                $testimonial = get_sub_field('testimonial');
                                $name = get_sub_field('name');
                                $title = get_sub_field('title');
                                $employer = get_sub_field('employer');
                    ?>
                                <div class="testimonial-slide">
                                    <div class="testimonial">
                                        <?= $testimonial ?>
                                    </div>
                                    <?php
                                        if ($name) :                                            
                                    ?>
                                            <div class="name">
                                                <?= $name ?>
                                            </div>
                                    <?php
                                        endif;
                                    ?>
                                    <?php
                                        if ($title) :                                            
                                    ?>
                                            <div class="title">
                                                <?= $title ?>
                                            </div>
                                    <?php
                                        endif;
                                    ?>
                                    <?php
                                        if ($employer) :                                            
                                    ?>
                                            <div class="employer">
                                                <?= $employer ?>
                                            </div>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <script>
                    jQuery(window).load(function() {
                        jQuery(".testimonials-slider").slick({
                            //accessibility: true,
                            //adaptiveHeight: false,
                            //appendArrows: $(element),
                            appendDots: $('.testimonials-cell'),
                            arrows: false,
                            //asNavFor: $(element)
                            autoplay: true,
                            //autoplay: 3000,
                            //centerMode: false,
                            //centerPadding: '50px',
                            //cssEase: 'ease',
                            //customPaging: function(slider, i) {
                            //    return '<button type="button" data-role="none">' + (i + 1) + '</button>';
                            //},
                            dots: true,
                            //dotsClass: 'slick-dots',
                            //draggable: true,
                            //easing: 'linear',
                            //edgeFriction: 0.15,
                            //fade: false,
                            //focusOnSelect: false,
                            //focusOnChange: false,
                            //infinite: true,
                            //initialSlide: 0,
                            //lazyLoad: 'ondemand',
                            //mobileFirst: false,
                            //nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="next">Next</button>',
                            //pauseOnDotsHover: false,
                            //pauseOnFocus: true,
                            //pauseOnHover: true,
                            //prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="previous">Previous</button>',
                            //respondTo: 'window',
                            //responsive: [
                            //	{
                            //	  breakpoint: 767,
                            //	  settings: {
                            //		arrows: false
                            //	  }
                            //	}
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                            //  ],
                            rows: 0, //Setting this to 1 adds more divs that will require style changes, and setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.
                            //rtl: false,
                            slide: '.testimonial-slide',
                            //slidesPerRow: 1,
                            //slidesToScroll: 1,
                            //slidesToShow: 1,
                            //speed: 300,
                            //swipe: true,
                            //swipeToSlide: false,
                            //touchMove: true,
                            //touchThreshold: 5,
                            //useCSS: true,
                            //useTransform: true,
                            //variableWidth: false,
                            //vertical: false,
                            //verticalSwiping: false,
                            //waitForAnimate: true
                            //zIndex: 1000
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</section>