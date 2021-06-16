<?php
$section_id = get_sub_field('section_id');
$section_classes = get_sub_field('section_classes');
//$include_padding = get_sub_field('padding_between_sections');

$padding = get_sub_field('spacing_between_sections');
$padding_top = $padding['top'];
$padding_bottom = $padding['bottom']; 

$include_padding = ''; 
$include_padding .= $padding_top; 
$include_padding .= ' ';
$include_padding .= $padding_bottom;
$gallery = get_sub_field('images'); // gallery
$section_title = get_sub_field('section_title');
$rand_id = substr(md5(microtime()),rand(0,26),3);

// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
}
 

?>
<section <?= $id; ?> class="section-wrap gallery-layout <?= $section_classes; ?> <?= $include_padding; ?>">
    <div class="container">
        <?php if($section_title): ?>
            <h2 class="section-title">
                <?= $section_title; ?>
            </h2>
        <?php endif; ?>

        <div class="gallery gallery-columns-4">
            <?php 
            foreach($gallery as $image) : 
                if(!is_array($image)){
                    $image = acf_get_attachment($image);
                }
                ?><figure class="gallery-item">
                    <div class="gallery-icon">
                        <a href="<?= $image['url']; ?>" rel="magnificMe" data-group="[<?= $rand_id; ?>]">
                            <img src="<?= $image['sizes']['medium-plus']; ?>" alt="<?= $image['alt']; ?>">
                        </a>
                    </div>
                </figure><?php
            endforeach; 
            ?>
        </div>
    </div>
</section>
