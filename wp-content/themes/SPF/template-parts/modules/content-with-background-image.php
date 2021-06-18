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

    $button_text = get_sub_field('button_text');
    $button_link = get_sub_field('button_link');
?>
<section class="section-wrap content-background-image <?= $include_padding; ?>">
    <div class="inner">
        <div class="image-content" style="background-image: url('<?= $background_image['url'] ?>')"> 
            <div class="content">
                <?= $content ?>
            </div>
        </div>
        <?php
            if ($button_text && $button_link) :
        ?>
                <div class="button-wrap">
                    <a href="<?= $button_link ?>" class="button"><?= $button_text ?></a>
                </div>
        <?php
            endif;
        ?>
    </div>
</section>