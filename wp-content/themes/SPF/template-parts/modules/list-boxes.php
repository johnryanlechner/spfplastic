<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;

    $title = get_sub_field('list_title');
?>
<section class="section-wrap listed-boxes <?= $include_padding; ?>" >
    <div class="container">
        <?php
            if ($title) :
        ?>
                <h2 class="section-title"><?= $title ?></h2>
        <?php
            endif;
        ?>
        <div class="boxes">
            <?php
                if (have_rows('boxes')) : $count = 1;
                    while (have_rows('boxes')) : the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
            ?>
                        <div class="box">
                            <div class="number"><?= $count ?></div>
                            <div class="title">
                                <h3><?= $title ?></h3> 
                            </div>
                            <div class="content"><?= $content ?></div>
                        </div>
            <?php
                        $count++;
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>