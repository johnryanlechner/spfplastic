<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom; 
?>
<section class="section-wrap descriptive-icons <?= $include_padding ?>">
    <div class="container">
        <h2><?= get_sub_field('title') ?></h2>
        <div class="inner"> 
            <?php
                if (have_rows('icons')) :
                    while (have_rows('icons')) : the_row();
                        $title = get_sub_field('title');
                        $icon = get_sub_field('icon');
                        $description = get_sub_field('description');
            ?>
                        <div class="icon-cell">
                            <div class="icon-title">
                                <div class="icon">
                                    <img src="<?= $icon['url'] ?>" width="<?= $icon['width'] ?>"  height="<?= $icon['height'] ?>" alt="<?= $icon['alt'] ?>"/> 
                                </div>
                                <div class="title">
                                    <h3><?= $title ?></h3>
                                </div>
                            </div>
                            <div class="description">
                                <?= $description ?>
                            </div>
                        </div>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>