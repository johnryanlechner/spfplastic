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
// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
}
 

?>
<section <?= $id; ?> class="section-wrap standard-callout  <?= $section_classes; ?> <?= $include_padding; ?>">
    <div class="standard-callout__container container">
        <div class="standard-callout__content">
            <?= get_sub_field('content'); ?>
        </div>
    </div>
</section>