<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 
    
    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;

    $background_color = get_sub_field('background_color');

    $image_one = get_sub_field('image_one');
    $image_two = get_sub_field('image_two');
    $image_three = get_sub_field('image_three');
?>
<section class="section-wrap three-column-images <?= $include_padding ?> <?= $background_color ?>">
    <div class="container">
        <div class="inner">
            <div class="image-cell one">
                <img src="<?= $image_one['url'] ?>" width="<?= $image_one['width'] ?>"  height="<?= $image_one['height'] ?>" alt="<?= $image_one['alt'] ?>"/> 
            </div>
            <div class="image-cell two">
                <img src="<?= $image_two['url'] ?>" width="<?= $image_two['width'] ?>"  height="<?= $image_two['height'] ?>" alt="<?= $image_two['alt'] ?>"/> 
            </div>
            <div class="image-cell three">
                <img src="<?= $image_three['url'] ?>" width="<?= $image_three['width'] ?>"  height="<?= $image_three['height'] ?>" alt="<?= $image_three['alt'] ?>"/> 
            </div>
        </div>    
    </div>
</section>