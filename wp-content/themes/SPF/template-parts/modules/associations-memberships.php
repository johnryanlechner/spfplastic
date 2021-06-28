<?php
    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
?>
<section class="section-wrap associations-memberships fade-in-able <?= $include_padding; ?>" >
    <h2>Associations & Memberships</h2>
    <div class="logos">
        <?php
            if (have_rows('logos')) :
                while (have_rows('logos')) : the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
        ?>
                    <div class="box">
                        <?php
                            if ($link) :
                        ?>
                                <a href="<?= $link ?>" target="_blank">
                        <?php
                            endif;
                        ?>
                                    <div class="image">
                                        <img src="<?= $image['url'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $image['alt'] ?>"/>
                                    </div>
                        <?php
                            if ($link) :
                        ?>
                                </a>
                        <?php
                            endif;
                        ?>
                    </div>
        <?php
                endwhile;
            endif;
        ?>
    </div> 
</section>