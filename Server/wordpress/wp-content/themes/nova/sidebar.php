<aside class="span4">
    <div class="widget search">
         <?php
            get_search_form();
        ?>
    </div>
    <!-- /.search -->

    <div class="widget widget-popular">
        <h3><?php _e("Posts Populares", "nova"); ?></h3>
        <div class="widget-blog-items">
            <?php
                $args = array(
    					'post_type' => array('post'),
    					'showposts' => 3,
    					);
    			$custom_query = new WP_Query($args);
    			if($custom_query -> have_posts()):
    				while($custom_query -> have_posts()):
    					$custom_query -> the_post(); ?>
                        <div class="widget-blog-item media">
                            <div class="pull-left">
                                <div class="date">
                                    <span class="month"><?php the_time('M');?></span>
                                    <span class="day"><?php the_time('j');?></span>
                                </div>
                            </div>
                            <div class="media-body">
                                
                                <a href="<?php echo get_permalink();?>"><h5><?php the_title(); ?></h5></a>
                            </div>
                        </div>
            <?php   endwhile; 
                else:
                        
                endif;
                    wp_reset_postdata();
                ?>
        </div>                        
    </div>
    <!-- End Popular Posts -->        
    <div class="widget widget-popular">
        <h3><?php _e("Actividades Populares", "nova"); ?></h3>
        <div class="widget-blog-items">
            <?php $actividades = get_actividades(3); ?>
                        <?php
    					while($actividad = mysqli_fetch_array($actividades)):
    					    $fecha = new DateTime($actividad['fecha']);
                            $mes = $fecha->format('M');
                            $dia = $fecha->format('j')
    			    	?>
                        <div class="widget-blog-item media">
                            <div class="pull-left">
                                <div class="date">
                                    <span class="month"><?php echo $mes;?></span>
                                    <span class="day"><?php echo $dia;?></span>
                                </div>
                            </div>
                            <div class="media-body">
                                
                                <a href="<?php echo get_page_link(get_page_by_title('Actividad') -> ID);?>?id=<?php echo $actividad['id']?>"><h5><?php echo $actividad['titulo']?></h5></a>
                            </div>
                        </div>
            <?php  endwhile; ?>
        </div>                        
    </div>
    <div class="widget">
        <h3>Categorias</h3>
        <div>
            <div class="row-fluid">
                <div class="span12">
                    <ul class="unstyled">
                        <?php
                            wp_list_categories('title_li=');
                    	?>	
                    </ul>
                </div>
            </div>

        </div>                       
    </div>
    <!-- End Category Widget -->

    <div class="widget">
        <h3>Nube de Tags</h3>
        <ul class="tag-cloud">
            <?php
                $args = array(
                	'smallest'                  => 12, 
                	'largest'                   => 30,
                	'unit'                      => 'pt', 
                	'number'                    => 45,  
                	'format'                    => 'flat',
                	'separator'                 => "\n",
                	'orderby'                   => 'name', 
                	'order'                     => 'ASC',
                	'link'                      => 'view', 
                	'taxonomy'                  => 'post_tag', 
                	'echo'                      => true,
                );
                wp_tag_cloud($args);
            ?>
        </ul>
    </div> 
    <!-- End Tag Cloud Widget -->

    <div class="widget">
        <h3>Archivos</h3>
        <ul >
            <?php wp_get_archives();?>
        </ul>
    </div> 
    <!-- End Archive Widget -->   

</aside>