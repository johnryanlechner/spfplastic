<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 
    
    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
 
    $table_title = get_sub_field('table_title');
    $column_1_title = get_sub_field('column_1_title');
    $column_2_title = get_sub_field('column_2_title');
    $column_3_title = get_sub_field('column_3_title');
?>
<section class="section-wrap specs-table <?= $include_padding ?>"> 
    <div class="container">
        <h2><?= $table_title ?></h2>
        <div class="pseudo-table">
            <div class="row header">
                <div class="cell one"><?= $column_1_title ?></div>
                <div class="cell two"><?= $column_2_title ?></div>
                <div class="cell three"><?= $column_3_title ?></div>
            </div> 
            <?php 
                if (have_rows('rows')) : $count = 0;
                    while (have_rows('rows')) : the_row();
                        $column_1_cell = get_sub_field('column_1_cell');
                        $column_2_cell = get_sub_field('column_2_cell');
                        $column_3_cell = get_sub_field('column_3_cell');                        
            ?>   
                        <div class="row <?php if ($count % 2 == 0) { echo 'white'; } ?>">
                            <div class="cell left">
                                <?= $column_1_cell ?>
                            </div>
                            <div class="cell middle">
                                <?= $column_2_cell ?>
                            </div>
                            <div class="cell right">
                                <?= $column_3_cell ?>
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