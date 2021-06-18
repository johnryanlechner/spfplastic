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
                        
        /* Specs Table */ 
        elseif( get_row_layout() == 'specs_table' ) :
            get_template_part('template-parts/modules/specs-table');  
                    
        /* Header Image */ 
        elseif( get_row_layout() == 'header_image' ) :
            get_template_part('template-parts/modules/header-image');
            
        /* Image Cards */ 
        elseif( get_row_layout() == 'image_cards' ) :
            get_template_part('template-parts/modules/image-cards');

        /* Products Overview */ 
        elseif( get_row_layout() == 'products_overview' ) :
            get_template_part('template-parts/modules/products-overview');   
                        
        /* Content With Background Image */ 
        elseif( get_row_layout() == 'content_with_background_image' ) :
            get_template_part('template-parts/modules/content-with-background-image'); 
            
        /* Product Slider */ 
        elseif( get_row_layout() == 'product_slider' ) :
            get_template_part('template-parts/modules/product-slider');             


        endif; // end if switching statement over layout types
    endwhile; // end while(layouts) loop
endif; // end have(layouts) check