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
<section class="section-wrap specs-table <?= $include_padding ?>">
    <div class="container">
        <h2><?= get_sub_field('title') ?></h2>
        <div class="pseudo-table">
            <?php
                if (have_rows('rows')) : $count = 0;
                    while (have_rows('rows')) : the_row();
                        $name = get_sub_field('name');
                        $specification = get_sub_field('specification');
            ?>   
                        <div class="row <?php if ($count % 2 == 0) { echo 'white'; } ?>">
                            <div class="name cell">
                                <?= $name ?>
                            </div>
                            <div class="specification cell">
                                <?= $specification ?>
                            </div>
                        </div>     
            <?php
                        $count++;
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>