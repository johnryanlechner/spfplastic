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
$gallery = get_sub_field('images'); // gallery
$section_title = get_sub_field('section_title'); 

// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
}
 

?>
<section <?= $id; ?> class="section-wrap gallery-carousel <?= $section_classes; ?> <?= $include_padding; ?>">
    <div class="container">
        <?php if($section_title): ?>
            <h2 class="section-title">
                <?= $section_title; ?>
            </h2>
        <?php endif; ?>

        <div class="carousel-wrap slick-slider">
            <?php 
            foreach($gallery as $image) : 
                if(!is_array($image)){
                    $image = acf_get_attachment($image);
                }
                if($image['width'] !== 1240 || $image['height'] !== 820){
                    $img_url = aq_resize( $image['url'], 1240, 820, true, true, true );
                }else {
                    $img_url = $image['url'];
                }
                ?><div class="carousel-item slick-slide">
                    <img src="<?= $img_url; ?>" alt="<?= $image['alt']; ?>">
                </div><?php
            endforeach; 
            ?>
        </div>
        <script>
            jQuery(window).load(function() {
                jQuery(".slick-slider").slick({
                    autoplay: true,
                    rows: 0,
                    slide: '.slick-slide',
                    speed: 500,
                    autoplaySpeed: 4000,
                });
            });
        </script>
    </div>
</section>
