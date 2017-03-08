<?php 
	get_header();
	get_template_part("inc/nav");
	get_template_part("inc/title");
?>

<body>

    <section id="novedades" class="container main">
        <div class="row-fluid">
            <div class="span8">
                <div class="blog">
                    <?php
    					$paged=(get_query_var('paged')) ? get_query_var('paged') :1;
                        $args=array( 'post_type'=>array('post'),
                                    //'post__not_in'=> array($id),
                                    'posts_per_page'=>5,
                                   'paged'=>$paged);
                        $query = new WP_Query($args);

                        // The Loop
                         if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                            get_template_part('inc/template_parts/content', 'post' . get_post_format());
                            //echo "<hr>";
                            endwhile; 
                                                            
                            echo get_paginate_page_links();
                    
                        else:
                                echo "<p>".__("No se encontraron posts", "nova")."</p>";
                        endif;
                        wp_reset_postdata();
    				?>
                    
              <div class="gap"></div>
        </div>
    </div>
    <?php get_sidebar();?>
</div>

</section>
<?php get_footer(); ?>
