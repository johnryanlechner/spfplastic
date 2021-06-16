<?php
    $square = get_sub_field('square');
    $circle = get_sub_field('circle'); 

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
<section class="section-wrap square-circle <?= $include_padding ?>">
    <div class="container">
        <div class="inner">
            <div class="square">
                <div class="title">
                    <h3 class="h2"><?= $square['title'] ?></h3>
                </div>
                <div class="description">
                    <?= $square['description'] ?>
                </div>
                <?php
                    if ($square['button_link']) :
                ?>
                <div class="button-wrap">
                    <a href="<?= $square['button_link'] ?>" class="button"><?= $square['button_text'] ?></a>
                </div>
                <?php
                    endif;
                ?>
            </div>
            <div class="circle">
                <div class="title">
                    <h3 class="h2"><?= $circle['title'] ?></h3>
                </div>
                <div class="description">
                    <?= $circle['description'] ?>
                </div>
                <?php
                    if ($circle['button_link'] ) :
                ?>
                <div class="button-wrap">
                    <a href="<?= $circle['button_link'] ?>" class="button"><?= $circle['button_text'] ?></a>
                </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>