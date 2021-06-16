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

$primary_title = get_sub_field('primary_title');
$columns = get_sub_field('columns');

if(!empty($section_id)){
    $id = 'id="' . $section_id . '"';
} else {
    $id = '';
}
 
// Section styling
$section_style = '';
$apply_text_color = get_sub_field('apply_text_color');
$section_text_color = get_sub_field('section_text_color');

if($apply_text_color && $section_text_color){
    $section_style .= 'color:'.$section_text_color.';';
}

if($columns) :
    ?>
    <section 
        <?= $section_id; ?> 
        class="section-wrap bg-section padding-as-margin <?= $include_padding; ?> <?= $section_classes; ?>"
        style="<?= $section_style; ?>"
    >
    <div class="bg-section__container container">
        <?php
        if( $primary_title ) :
            ?>
            <header class="bg-section__header">
                <h2 class="bg-section-header__title h1"><?= $primary_title; ?></h2>
            </header>
            <?php
        endif;
        ?>
        <div class="bg-section__content">
            <?php
            foreach( $columns as $row ) :
                ?>
                <div class="bg-section__row">
                    <?php
                    $column_count = (int)$row['column_count'];
                    $column1 = $row['column_1'];
                    $column2 = $row['column_2'];
                    $column3 = $row['column_3'];
                    $column4 = $row['column_4'];

                    if( $column_count == 1 ) :

                        echo $column1 ? "<div class=\"bg-section__column \">{$row['column_1']}</div>" : '';

                    elseif( $column_count == 2 ) :

                        echo $column1 ? "<div class=\"bg-section__column one-half first\">{$row['column_1']}</div>" : '';
                        echo $column2 ? "<div class=\"bg-section__column one-half\">{$row['column_2']}</div>" : '';

                    elseif( $column_count == 3 ) :

                        echo $column1 ? "<div class=\"bg-section__column one-third first\">{$row['column_1']}</div>" : '';
                        echo $column2 ? "<div class=\"bg-section__column one-third\">{$row['column_2']}</div>" : '';
                        echo $column3 ? "<div class=\"bg-section__column one-third\">{$row['column_3']}</div>" : '';

                    elseif( $column_count == 4 ) :

                        echo $column1 ? "<div class=\"bg-section__column one-fourth first\">{$row['column_1']}</div>" : '';
                        echo $column2 ? "<div class=\"bg-section__column one-fourth\">{$row['column_2']}</div>" : '';
                        echo $column3 ? "<div class=\"bg-section__column one-fourth\">{$row['column_3']}</div>" : '';
                        echo $column4 ? "<div class=\"bg-section__column one-fourth\">{$row['column_4']}</div>" : '';

                    endif;
                    ?>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
    <span class="bg-section__background abs-cover bg-image" style="<?= get_section_style(); ?>"></span>
    </section> 
    <?php
endif; 
?>