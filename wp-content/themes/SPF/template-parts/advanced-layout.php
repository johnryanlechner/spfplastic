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


        endif; // end if switching statement over layout types
    endwhile; // end while(layouts) loop
endif; // end have(layouts) check