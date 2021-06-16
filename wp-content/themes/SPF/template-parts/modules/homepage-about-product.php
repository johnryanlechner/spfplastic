<?php
    $callout = get_sub_field('callout'); 
    
    $image_icons = get_sub_field('image_icons'); 
    $image = $image_icons['image'];
    $icons = $image_icons['icons'];

    //$include_padding = get_sub_field('padding_between_sections');

    $padding = get_sub_field('spacing_between_sections');
    $padding_top = $padding['top'];
    $padding_bottom = $padding['bottom']; 

    $include_padding = ''; 
    $include_padding .= $padding_top; 
    $include_padding .= ' ';
    $include_padding .= $padding_bottom;
?>
<section class="section-wrap homepage-about-product <?= $include_padding ?>">
    <div class="top">
        <div class="container">
            <div class="inner">
                <div class="left">
                    <?= $callout['title'] ?>
                </div>
                <div class="right">
                    <?= $callout['content'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="inner">
                <div class="image">
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" />
                </div>
                <div class="text">
                    <h3 class="h2"><?= $image_icons['title'] ?></h3>
                    <div class="icons">
                        <?php 
                            
                            if ($icons) :
                                foreach ($icons as $icon) : 
                                    $icon = $icon['icon'];
                                    $title = $icon['title']; 
                                    $title = str_replace('-',' ',$title);
                        ?>
                                    <div class="icon">
                                        <div class="icon-image">
                                            <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>" width="<?= $icon['width'] ?>" height="<?= $icon['height'] ?>" />
                                        </div>
                                        <div class="title">
                                            <?= $title ?>
                                        </div>
                                    </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>