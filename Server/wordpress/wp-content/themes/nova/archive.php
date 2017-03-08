<?php 

    get_header(); 
    get_template_part("inc/nav");
    get_template_part("inc/title");
    
?>
    <!-- Page Content -->
    <div class="container">
              <div class="row">
                <div class="span8">
                    <!-- post-->
                    <?php                
                $args=array( 'offset'=>'0',);
                $id=0;
                $query = new WP_Query($args);
                $num_post= $wp_the_query->post_count;
                    if($num_post>1){
                        echo "<h1>".$num_post.__("posts encontrados", "nova")."</h1>";
                    }else if($num_post==1){
                        echo "<h1>".$num_post.__("post encontrado", "nova")."</h1>";
                    }else{
                        echo "<h1>".__("Ningún post encontrado", "nova")."</h1>";
                    }
                if(is_category()){
                    printf(__('···Categoria: %s', "nova"),'<span>'.single_cat_title('',false).' ···</span>');
                }else if(is_tag()){
                    printf(__('···Etiqueta: %s', "nova"),'<span>'.single_cat_title('',false).' ···</span>');
                }else if(is_author()){
                    printf(__('···Autor: %s', "nova"),'<span><a class="autor" href="'.get_author_posts_url(get_the_author_meta("ID")).'" title="'.esc_attr(get_the_author()).'" rel="me" >'.get_the_author().'</a>···</span>');
                }if(is_month()){
                    printf(__('···Mes: %s', "nova"),'<span>'.get_the_date('F Y').' ···</span>');
                }
                // The Loop
                 while (have_posts()) : the_post();
                    get_template_part('inc/template_parts/content', 'post' . get_post_format());                       
                    endwhile;
            wp_reset_postdata();
            ?>
                </div>
                <div class="sidebar col-lg-4">
                    <!--aside-->
                    <?php get_sidebar("sort_column=menu_order"); ?>
                </div>
            </div>
            </div>
            <?php get_footer(); ?>