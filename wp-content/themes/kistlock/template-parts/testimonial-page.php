<section class="section-wrap testimonials-page-testimonials">
    <div class="container">   
        <?php
            if (have_rows('KIST_Testimonials',358)) :
                while (have_rows('KIST_Testimonials',358)) : the_row();
                    $testimonial = get_sub_field('testimonial');
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $employer = get_sub_field('employer');
        ?>
                    <div class="testimonial-outer">
                        <div class="testimonial">
                            <?= $testimonial ?>
                            <?php
                                if ($name) :                                            
                            ?>
                                    <div class="name">
                                        <?= $name ?>
                                    </div>
                            <?php
                                endif;
                            ?>
                            <?php
                                if ($title) :                                            
                            ?>
                                    <div class="title">
                                        <?= $title ?>
                                    </div>
                            <?php
                                endif;
                            ?>
                            <?php
                                if ($employer) :                                            
                            ?>
                                    <div class="employer">
                                        <?= $employer ?>
                                    </div>
                            <?php
                                endif;
                            ?>
                        </div> 
                    </div>
        <?php
                endwhile;
            endif;
        ?> 
    </div>
</section>