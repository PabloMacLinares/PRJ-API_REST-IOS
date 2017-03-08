<?php 
    get_header();
    get_template_part("inc/nav");
    //get_template_part("inc/slider");
?>
<div class="cabecera" style="background-image:url(<?php bloginfo('template_directory')?>/images/instituto.jpg)">
    <div class="container">
            <div class="row-fluid">
                <div class="span12" >
                    <div class="intro-text">
                        <span class="name">IES Zaidin Vergeles</span>
                        <hr class="frontpage">
                    </div>
                </div>
            </div>
        </div>
</div>

<!--Services-->
<section id="services">
    <div class="container">
        <div class="center gap">
            <h3><?php _e("¿Qué ofrecemos?", "nova");?></h3>
            <p class="lead"><?php _e("Nosotros apostamos por una enseñanza de calidad y por eso:", "nova");?></p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Titulación", "nova");?></h4>
                        <p><?php _e("Nuestras titulaciones están reconocidas en todos los países.Vayas donde vayas tus títulos te acompañaran sin ningun problema o impedimento ", "nova");?></p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-thumbs-up-alt icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Reconocimiento", "nova");?></h4>
                        <p><?php _e("Estamos reconocidos como la mejor escuela secundaria a nivel autonómico, ya sea por la calidad de enseñanza, número de titulaciones disponibles o por el número elevado de graduados con exito e insertados en el mercado laboral", "nova");?></p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-leaf icon-medium icon-rounded"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Comprometidos con lo público", "nova");?></h4>
                        <p><?php _e("Estamos totalmente a favor de la enseñanza pública y por ello queremos demostrar que se puede dar una enseñanza de calidad y accesible para todas las personas que quieran educarse y aprender", "nova");?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-shopping-cart icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Inserción laboral", "nova");?></h4>
                        <p><?php _e("Tenemos la mayor tasa de inserción laboral desde los ciclos formativos a nivel nacional, con un 90% de contratación ya sea dentro del país o en el extranjero", "nova");?></p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Proyectos globales", "nova");?></h4>
                        <p><?php _e("Desarrollamos proyectos no solo a nivel europeo sino a nivel mundial. Estamos en contacto con grandes escuelas de todo el mundo para enriquecer a nuestro alumnado y que aprendar de la mejor forma posible para asi tener un futuro brillante", "nova");?></p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php _e("Más allá de la escuela", "nova");?></h4>
                        <p><?php _e("Además de las clases, impartimos todo tipo de actividades extracurriculares en las que el alumnado podra desarrollar todo tipo de inteligencias y de conocimientos, desde las más físicas hasta las mas psicológicas", "nova");?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/Services-->

<section id="recent-works">
    <div class="container">
        <div class="center">
            <h3><?php _e("Últimas novedades", "nova");?></h3>
            <p class="lead"><?php _e("Echa un vistazo de lo que estamos haciendo:", "nova");?></p>
            <div class="row-fluid">
            <?php 
                $actividades = get_actividades(2);
                while($actividad = @mysqli_fetch_array($actividades)){
					$GLOBALS['actividad'] = $actividad;
					get_template_part('inc/template_parts/content', 'actividad-mini');
				}
            ?>
            <?php
                $args=array( 'post_type'=>array('post'),
                            'posts_per_page'=>2);
                $query = new WP_Query($args);

                // The Loop
                 if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    get_template_part('inc/template_parts/content', 'post-mini');
                    //echo "<hr>";
                    endwhile; 
                else:
                    echo "<p>".__("No se encontraron posts", "nova")."</p>";
                endif;
                wp_reset_postdata();
			?>
            </div>
        </div>  
        <div class="gap"></div>
    </div>

</section>

<section id="clients" class="main">
    <div class="container">
        <div class="row-fluid">
            <ul class="certificado">
                <li class="span4"><img src="<?php bloginfo('template_directory'); ?>/images/juntaDeAndalucia.jpg" ></li>
                <li class="span4"><img src="<?php bloginfo('template_directory'); ?>/images/espanaEducacion.jpg" ></li>
                <li class="span4"><img src="<?php bloginfo('template_directory'); ?>/images/unionEuropea.jpg" ></li>
            </ul>
        </div>
    </div>

</section>

<?php get_footer();?>