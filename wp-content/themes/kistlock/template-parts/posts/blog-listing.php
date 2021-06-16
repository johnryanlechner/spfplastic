<?php
$id = $args['id'];

if(!$id){
    return;
}

$title = get_the_title($id);
$link = get_the_permalink($id);  
$excerpt = get_the_advanced_acf_excerpt($id);

if(has_post_thumbnail($id)){
    $featured_img = acf_get_attachment(get_post_thumbnail_id($id));
    if((int)$featured_img['width'] !== 600 || (int)$featured_img['height'] !== 600){
        $image_url = aq_resize($featured_img['url'], 600, 600, true, true, true);
    }else {
        $image_url = $featured_img['url'];
    }
}
?>
<article class="section-wrap blog-listing include-padding <?php if(has_post_thumbnail($id)) : ?> blog-listing--has-thumbnail <?php endif; ?>">
    <?php if(has_post_thumbnail($id)) : ?>
        <img class="blog-listing__image" src="<?= $image_url; ?>" alt="<?= $featured_image['alt']; ?>">
    <?php endif; ?>
    <h2 class="blog-listing__title"><?= $title; ?></h2>
    <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?></time>
    <?= blog_categories($id); ?>
    <?= blog_tags($id); ?>
    <div class="blog-listing__excerpt">
        <?= get_the_advanced_acf_excerpt($id); ?>
    </div>
    <a href="<?= $link; ?>" class="blog-listing__button button">Read More</a>
</article>