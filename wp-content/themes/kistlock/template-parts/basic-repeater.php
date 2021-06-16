<?php
if( have_rows('REPEATERNAME') ) :
	?>
	<div class="PLURALNAME">
        <?php
        while( have_rows('REPEATERNAME') ) :
            the_row();	
            
            $title = get_sub_field('title');
            $image = get_sub_field('image');
            $content = get_sub_field('content');
            $button_link = get_sub_field('button_link');
            $button_text = get_sub_field('button_text');
            
            if($image){
                // make sure it's in array format
                if(!is_array($image)){
                    $image = acf_get_attachment($image);
                }
                
                // resize if needed
                if((int)$image['width'] !== 600 || (int)$image['height'] !== 400){
                    $image_url = aq_resize($image['url'], 600, 400, true, true, true);
                }else {
                    $image_url = $image['url'];
                }
            }
            ?>
            <div class="SINGULARNAME <?php if($image) : ?> SINGULARNAME--has-thumbnail <?php endif; ?>">
                <?php if($image) : ?>
                    <img class="SINGULARNAME__image" src="<?= $image_url; ?>" alt="<?= $image['alt']; ?>">
                <?php endif; ?>
                <h2 class="SINGULARNAME__title"><?= $title; ?></h2>
                <div class="SINGULARNAME__excerpt">
                    <?= $content; ?>
                </div>
                <a href="<?= $button_link; ?>" class="SINGULARNAME__button button"><?= $button_text; ?></a>
            </div>
            <?php
        endwhile;
        ?>
	</div>
    <?php
endif;
?>