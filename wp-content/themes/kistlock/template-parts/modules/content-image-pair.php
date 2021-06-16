<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom; 

    $image = get_sub_field('image');
    $content = get_sub_field('content');
?>
<section class="section-wrap content-image-pair <?= $include_padding ?>">
    <div class="container">
        <div class="inner">
            <div class="content-cell">
                <?= $content ?>
            </div>
            <div class="image-cell">
                <img src="<?= $image['url'] ?>" width="<?= $image['width'] ?>"  height="<?= $image['height'] ?>" alt="<?= $image['alt'] ?>"/>
            </div>
        </div>
    </div>
</section>