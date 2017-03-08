<?php 
    get_header(); 
    get_template_part("inc/nav");
    get_template_part("inc/title");
    
?>
    <!-- Page Content -->
    <div class="container main">
        <div class="row-fluid">
            <div class="span12">
                    <!-- post-->
                <?php            
                if(have_posts()){
                $num_post= $wp_the_query->post_count;
                    if($num_post>1){
                        echo "<h1>".$num_post.__("correspondencias encontradas", "nova")."</h1>";
                    }else if($num_post==0){
                        echo "<h1>".__("0 correspondencias encontradas", "nova")."</h1>";
                    }else {
                        echo "<h1>".__("1 correspondencia encontrada", "nova")."</h1>";
                    }
                }
                    get_search_form();
                ?>
                    <h2><?php printf(__('···Resultados de la búsqueda: %s', "nova"),'<span>'.esc_html(get_search_query()).'···</span>'); ?></h2>
                    <?php
                // The Loop
                        if(have_posts()){
                    while (have_posts()) : the_post();
                    
                    get_template_part('inc/template_parts/content', 'post' . get_post_format());                     
                    endwhile;
                }else{
                            
                }
                wp_reset_postdata();
                ?>
                </div>
               
        </div>
    </div>
            <?php get_footer(); ?>