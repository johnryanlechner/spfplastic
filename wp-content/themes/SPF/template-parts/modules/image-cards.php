<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
?>
<section class="section-wrap image-cards <?= $include_padding; ?>"> 
    <div class="inner">
        <?php
            if (have_rows('cards')) :
                while (have_rows('cards')) : the_row();
                    $background_image = get_sub_field('background_image');
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
        ?>
                    <div class="image-card">
                        <a href="<?= $link ?>">
                            <div class="image">
                                <img src="<?= $background_image['url'] ?>" width="<?= $background_image['width'] ?>" height="<?= $background_image['height'] ?>" alt="<?= $background_image['alt'] ?>"/>
                            </div>
                            <div class="content">
                                <h3><?= $title ?></h3>
                                <div class="pseudo-button">Learn More</div> 
                            </div>
                        </a>
                    </div>
        <?php
                endwhile;
            endif;
        ?>
    </div>
</section>