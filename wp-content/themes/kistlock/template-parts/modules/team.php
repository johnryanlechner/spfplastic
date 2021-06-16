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
 

if( have_rows('team') ):
    ?>
    <section <?= $id; ?> class="section-wrap team-module <?= $section_classes; ?> <?= $include_padding; ?>">
        <div class="container">
            <div class="team__container">
                <?php 
                while ( have_rows('team') ) :
                    the_row();
                    $image = get_sub_field('photo');
                    $name = get_sub_field('name');
                    $title = get_sub_field('position');
                    $bio = get_sub_field('bio');
                    
                    // make sure it's in array format
                    if(!is_array($image)){
                        $image = acf_get_attachment($image);
                    }

                    // resize if needed
                    if((int)$image['width'] !== 400 || (int)$image['height'] !== 400) {
                        $image['url'] = aq_resize($image['url'], 400,400,true,true,true);
                    }

                    $team_array['team-'.sanitize_title($name)] = [
                        'id' => 'team-'.sanitize_title($name),
                        'name' => $name,
                        'title' => $title,
                        'image' => $image['url'],
                        'image_alt' => $image['alt'],
                        'bio' => $bio
                    ];
                    ?>
                    <div class="teammember" id="<?= sanitize_title($name); ?>">
                        <img class="teammember__image" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                        <h2 class="teammember__title">
                            <span class="teammember__title__name"><?= $name; ?></span>
                            <span class="teammember__title__title"><?= $title; ?></span>
                        </h2>
                        <button class="button teammember__popup-button">
                            Read Bio
                        </button>
                    </div>
                <?php endwhile; ?>
            </div>
            <script>
                var mandr_team_data = <?= json_encode($team_array); ?>;
            </script>
        </div>
    </section>
    <?php
endif;
?>
