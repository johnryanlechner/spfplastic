<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;

    $title = get_sub_field('title');
    $letter_content = get_sub_field('letter_content');
    $bottom_left_image = get_sub_field('bottom_left_image');
    $bottom_right_image = get_sub_field('bottom_right_image');
?>
<section class="section-wrap letter-of-appreciation fade-in-able <?= $include_padding; ?>" >
    <div class="container">
<?php
    if ($title) :
?>
        <h2 class="section-title"><?= $title ?></h2>
<?php
    endif;
?>
        <div class="letter<?php if ($bottom_left_image || $bottom_right_image) { echo ' with-images'; } ?>">
            <?= $letter_content ?>
        </div>
<?php
    if ($bottom_left_image || $bottom_right_image) :
?>
        <div class="bottom-images">
            <div class="image-left">
                <img src="<?= $bottom_left_image['url'] ?>" width="<?= $bottom_left_image['width'] ?>" height="<?= $bottom_left_image['height'] ?>" alt="<?= $bottom_left_image['alt'] ?>"/>
            </div>    
            <div class="image-right">
                <img src="<?= $bottom_right_image['url'] ?>" width="<?= $bottom_right_image['width'] ?>" height="<?= $bottom_right_image['height'] ?>" alt="<?= $bottom_right_image['alt'] ?>"/>
            </div> 
        </div>
<?php
    endif;
?>
    </div>
</section>