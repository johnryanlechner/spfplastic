<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;

    $background_image = get_sub_field('background_image');
    $content = get_sub_field('content');
?>
<section class="section-wrap header-image <?= $include_padding; ?>">
    <div class="inner">
        <div class="image-content" style="background-image: url('<?= $background_image['url'] ?>')">
            <div class="image">
                <img src="<?= $background_image['url'] ?>" width="<?= $background_image['width'] ?>" height="<?= $background_image['height'] ?>" alt="<?= $background_image['alt'] ?>"/>
            </div>
            <div class="content">
                <?= $content ?>
            </div>
        </div>
    </div>
</section>