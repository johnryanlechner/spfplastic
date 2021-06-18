<div class="header-title">
    <div class="container">
        <h1>
            <?php
                if (is_home()) {
                    if (get_option('page_for_posts', true)) {
                    echo get_the_title(get_option('page_for_posts', true));
                    } else {
                        echo 'Blog';
                    }
                } elseif (is_archive()) {
                    echo get_the_archive_title();
                } elseif (is_search()) {
                    echo sprintf( 'Search Results for %s', get_search_query() );
                } elseif( valid_element(get_field('secondary_on_page_title')) ) {
                    echo get_field('secondary_on_page_title');
                } else {
                    echo get_the_title();
                }
            ?>
        </h1> 
    </div>
</div>
<?php
    if (get_field('secondary_intro_content')) :
?>
        <section class="intro-content">
            <div class="container">
                <?= get_field('secondary_intro_content') ?>
            </div>
        </section>
<?php
    endif;
?>