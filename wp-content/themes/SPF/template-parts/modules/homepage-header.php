<?php
    $background_image = get_sub_field('background_image'); 
    $content = get_sub_field('content'); 
    $acronym_image = get_sub_field('acronym_image');
    $bottom_link = get_sub_field('bottom_link');
    $bottom_link_text = get_sub_field('bottom_link_text');
?>
<section class="section-wrap homepage-header">
    <div class="top" style="background-image:url('<?= $background_image['url'] ?>')"> 
        <div class="container">
            <div class="content"> 
                <?= $content ?>
            </div>
            <div class="acronym">
                <img src="<?= $acronym_image['url'] ?>" alt="<?= $acronym_image['alt'] ?>" width="<?= $acronym_image['width'] ?>" height="<?= $acronym_image['height'] ?>" />
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="not-button">
                <a href="<?= $bottom_link ?>"><?= $bottom_link_text ?></a>
            </div>
        </div>
    </div>
</section>