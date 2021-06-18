<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;

    $products = get_sub_field('products');
    $initialSlide = $products[0]['image']['url'];
?>
<section class="section-wrap product-slides <?= $include_padding; ?>" >
    <div class="container">
        <div class="inner">
            <div id="image-window" class="image-slider-outer" style="background-image: url(<?= $initialSlide ?>)"> 
                <div class="image-slider">
                    <?php
                        if (have_rows('products')) : 
                            while (have_rows('products')) : the_row();
                                $image = get_sub_field('image');
                    ?>
                                <div class="image-slide" data-image-url="<?= $image['url'] ?>"> 
                                    <img src="<?= $image['url'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $image['alt'] ?>"/>
                                </div>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <script>
                    jQuery(window).load(function() {
                        jQuery(".image-slider").slick({ 
                            arrows: false,
                            asNavFor: $('.text-slider'),
                            autoplay: true, 
                            dots: false, 
                            fade: true, 
                            rows: 0, 
                            slide: '.image-slide', 
                        });
                    });
                </script>
            </div>            
            <div class="text-slider-outer">
                <div class="text-slider">
                    <?php
                        if (have_rows('products')) : reset_rows();
                            while (have_rows('products')) : the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                    ?>
                                <div class="text-slide">
                                    <h3><?= $title ?></h3>
                                    <div class="description">
                                        <?= $description ?>
                                    </div>
                                </div>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <script>
                    jQuery(window).load(function() {
                        jQuery(".text-slider").slick({ 
                            appendArrows: $('#controls'), 
						    appendDots: $('#controls'),
                            arrows: true,
                            asNavFor: $('.image-slider'),
                            autoplay: true, 
                            dots: true, 
                            fade: false, 
                            rows: 0, 
                            slide: '.text-slide', 
                        });
                    });
                </script>
                <div id="controls"></div>
            </div>  
        </div>
    </div>    
</section>
