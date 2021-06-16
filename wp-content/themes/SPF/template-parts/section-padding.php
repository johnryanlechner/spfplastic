<?php
    $padding = get_sub_field('spacing_between_sections');

    $include_padding = '';

    if ($padding_top != 'none') {
        $include_padding .= $padding_top;
    }
    
    if ($padding_bottom != 'none') {
        $include_padding .= $padding_bottom;
    }
?>