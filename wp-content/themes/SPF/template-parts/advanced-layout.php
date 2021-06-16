<?php     
if( have_rows('page_layouts') ):
    while( have_rows('page_layouts') ) :
        the_row();

        /* Standard Section */ 
        if( get_row_layout() == 'standard_layout' ) :
            get_template_part('template-parts/modules/standard-layout');
            
        /* Standard Callout */ 
        elseif( get_row_layout() == 'standard_callout' ) :
            get_template_part('template-parts/modules/standard-callout');
            
        /* Homepage Header Layout */ 
        elseif( get_row_layout() == 'homepage_header_layout' ) :
            get_template_part('template-parts/modules/homepage-header');

        /* Homepage 'About The Product' */ 
        elseif( get_row_layout() == 'homepage_about_the_product_layout' ) :
            get_template_part('template-parts/modules/homepage-about-product');

        /* Homepage Descriptive Icons */ 
        elseif( get_row_layout() == 'homepage_descriptive_icons' ) :
            get_template_part('template-parts/modules/homepage-descriptive-icons');            
        
        /* Square & Circle Columned Content */ 
        elseif( get_row_layout() == 'square_circle_columns' ) :
            get_template_part('template-parts/modules/square-circle-columns'); 

        /* Featured Testimonials */ 
        elseif( get_row_layout() == 'testimonials_section' ) :
            get_template_part('template-parts/modules/testimonials-layout');            

        /* Descriptive Icons */ 
        elseif( get_row_layout() == 'descriptive_icons' ) :
            get_template_part('template-parts/modules/descriptive-icons');

        /* Content & Image Pair */ 
        elseif( get_row_layout() == 'content_image_pair' ) :
            get_template_part('template-parts/modules/content-image-pair'); 
            
        /* 3 Column Image Grid */ 
        elseif( get_row_layout() == 'three_column_image_grid' ) :
            get_template_part('template-parts/modules/three-column-image-grid');   
            
        /* Specs Table */ 
        elseif( get_row_layout() == 'specs_table' ) :
            get_template_part('template-parts/modules/specs-table');         


        endif; // end if switching statement over layout types
    endwhile; // end while(layouts) loop
endif; // end have(layouts) check