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
$toggles = get_sub_field('toggles'); // repeater

// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
}
 
?>
<section <?= $id; ?> class="section-wrap toggles <?= $section_classes; ?> <?= $include_padding; ?>">
    <div class="toggles__container container">
    <?php 
    foreach($toggles as $toggle) : 
        
        $title = $toggle['toggle_title']; // text
        $content = $toggle['toggled_content']; // WYSIWYG
        ?>
        <div class="toggle">
                <a href="#" class="toggle__trigger" aria-expanded="false">
                    <?php 
                    
                    ?>
                    <span class="toggle__trigger-text" data-show="display" data-hide="collapse">Display</span> 
                    <?= $title; ?>
                    <span class="toggle__trigger-icon" aria-hidden="true"></span>
                </a>
                <div class="toggle__box" aria-hidden="true">
                    <?= do_shortcode($content); ?>
                </div>
            </div>
        <?php
    endforeach; 
    ?>
    </div>
</section>