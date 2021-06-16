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


$column_count = get_sub_field('column_count');
$column_heading = get_sub_field('column_heading');

// Can't just print an empty id and have id="", so build printout here instead
if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
} 

// If array, get that value
if(is_array($column_count)) {
    $column_count = $column_count['value'];
}

$column_count = (int) $column_count;

/* Select column specific wrapping class */
switch($column_count) :
    case 1 :
        $section_classes .= ' columns__single';
        break;
    case 2 :
        $section_classes .= ' columns__two';
        break;
    case 3 :
        $section_classes .= ' columns__three';
        break;
    case 4 :
        $section_classes .= ' columns__four';
        break;
    case 5 :
        $section_classes .= ' columns__five';
        break;
    case 6 :
        $section_classes .= ' columns__six';
        break;
    case 7 :
        $section_classes .= ' columns__variable';
        break;
endswitch;
?>
<section <?= $id; ?> class="section-wrap standard-layout columns <?= $include_padding; ?> <?= $section_classes; ?>">
    <div class="columns__container container">
        <?php
        if( valid_element($column_heading) && $column_count !== 1 ) :
            ?>
            <h2 class="columns__heading"><?= $column_heading; ?></h2>
            <?php
        endif;
        ?>

        <div class="columns__wrap">
        <?php
        // Iterate through loop and dynamically create columns
        for( $i = 0; $i < $column_count; $i++ ) :
            $index = $i+1;
            $string = ($i > -1) ? "column_{$index}" : "column";
            $field = get_sub_field($string);

            // If variable
            if( $column_count === 7 & $i > 1) {
                continue;
            }
            ?>
            <div class="column <?php module_get_column_width($i, $column_count); ?>">
                <?= $field; ?>
            </div>
            <?php
        endfor;
        ?>
        </div>
    </div>
</section>