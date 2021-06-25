<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
?>
<section class="section-wrap description-boxes <?= $include_padding; ?>" >
    <div class="container">
        <div class="boxes">
            <?php
                if (have_rows('boxes')) :
                    while (have_rows('boxes')) : the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
            ?>
                        <div class="box">
                            <div class="title">
                                <h3><?= $title ?></h3> 
                            </div>
                            <div class="content"><?= $content ?></div>
                        </div>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>