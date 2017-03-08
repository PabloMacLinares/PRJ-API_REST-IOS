<?php 
    /* Template Name: about */
	get_header();
	get_template_part("inc/nav");
	get_template_part("inc/title");
?>

<body>
    <section class="no-margin">
        <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.6352154165!2d-3.593647084798472!3d37.16137247987569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fca6107464e5%3A0x5cc395f96e47c0d9!2sInstituto+de+Educaci%C3%B3n+Secundaria+Zaid%C3%ADn+Vergeles!5e0!3m2!1ses!2ses!4v1488791851676"></iframe>
    </section>
    <section id="about-us" class="container main">
        <div class="row-fluid">
            <div class="span6">
                <h2><?php _e("El centro", "nova"); ?></h2>
                <p>
                    <?php _e("El equipo directivo del I.E.S. ZAIDÍN-VERGELES les da la bienvenida a nuestra página Web. En ella hemos querido mostrarles a grandes rasgos algunas informaciones sobre nuestro Centro, pero nos gustaría que nos visitase personalmente para poder conocer in situ lo que somos y cómo funcionamos. Somos un centro público y nuestro objetivo es conseguir y asegurar la calidad del servicio que prestamos a la sociedad. Nos apasiona nuestro trabajo y la igualdad, la solidaridad y la libertad son algunos de los ejes de nuestro Proyecto Educativo. ¿Cómo funcionamos? Queremos formar personas de ahí que, además de los conocimientos, consideremos fundamentales la relaciones humanas en el marco de la convivencia de nuestra Comunidad Educativa. La participación activa en nuestro proyecto de todos los componentes de la Comunidad Escolar sigue siendo nuestra bandera. Tu voz con nosotros siempre será tenida en cuenta.", "nova");?>
                </p>
            </div>
            <div class="span6">
                <h2><?php _e("Matriculaciones", "nova"); ?></h2>
                <div>
                    <div class="progress"><div class="bar" style="width: 70%; text-align:left; padding-left:10px;"><?php _e("ESO", "nova");?></div></div>
                    <div class="progress progress-warning"><div class="bar" style="width: 60%; text-align:left; padding-left:10px;"><?php _e("FBP", "nova");?></div></div>
                    <div class="progress progress-info"><div class="bar" style="width: 80%; text-align:left; padding-left:10px;"><?php _e("BACHILLERATO", "nova");?></div></div>
                    <div class="progress progress-danger"><div class="bar" style="width: 90%; text-align:left; padding-left:10px;"><?php _e("CICLO FORMATIVO", "nova");?></div></div>
                    <div class="progress progress-adult"><div class="bar" style="width: 50%; text-align:left; padding-left:10px;"><?php _e("ADULTOS", "nova");?></div></div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Meet the team -->
        <h1 class="center"><?php _e("DIRECCIÓN", "nova");?></h1>

        <hr>

        <div class="row-fluid">
            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/Director.png" alt="" ></p>
                    <h5>Manuel Rodríguez Garzón</h5>
                    <p><?php _e("Director", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/Vicedireccion.jpg" alt="" ></p>
                    <h5>Pilar Fernández Herráiz</h5>
                    <p><?php _e("Vicedirección", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

           <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/JefaDeEstudios.jpg" alt="" ></p>
                    <h5>María Ángeles Sánchez Guadix</h5>
                    <p><?php _e("Jefa de Estudios", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/Secretaria.jpg" alt="" ></p>
                    <h5>Ana Isabel Bautista Navares </h5>
                    <p><?php _e("Secretaria", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>
        
        </div>
        <p>&nbsp;</p>
        <p></p>
        <div class="row-fluid">
            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/Administradora.jpg" alt="" ></p>
                    <h5>María Ángeles Zaragoza Pérez</h5>
                    <p><?php _e("Administradora", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/JefeDeEstudiosAdultos.jpg" alt="" ></p>
                    <h5>Luis Baena Fernández</h5>
                    <p><?php _e("Jefe de Estudios de Adultos", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

           <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/JefeDeEstudiosAdjunto.jpg" alt="" ></p>
                    <h5>José Luis Navarro Galindo</h5>
                    <p><?php _e("Jefe de Estudios Adjunto", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="<?php bloginfo('template_directory');?>/images/sample/JefaDeEstudiosAdjunta.jpg" alt="" ></p>
                    <h5>María Encarnación Garrido Vegara</h5>
                    <p><?php _e("Jefa de Estudios de Adjunta", "nova");?></p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>
        
        </div>
        
        <hr>
        
        <h1 class="center"><?php _e("CONSEJO ESCOLAR", "nova");?></h1>
        
        <div class="row-fluid">
            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/presidente.svg" alt="" width="50" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("PRESIDENTE", "nova");?></b></p>
                <p class="center">Rodríguez Garzón, Manuel Jesús</p>
            </div>

            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/jefeDeEstudios.svg" alt="" width="45" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("JEFA DE ESTUDIOS", "nova");?></b></p>
                <p class="center">Sánchez Guadix, María Ángeles </p>
            </div>

           <div class="span3 box">
               <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/secretaria.svg" alt="" width="32" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("SECRETARIA", "nova");?></b></p>
                <p class="center">Bautista Navares, Ana Isabel </p>
            </div>

            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/entornoempresarial.svg" alt="" width="47" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("DEL ENTORNO EMPRESARIAL", "nova");?></b></p>
                <p class="center">Muñoz Megías, Manuel</p>
            </div>
        
        </div>
        
        <hr>
        
        <h1 class="center"><?php _e("REPRESENTANTES", "nova");?></h1>
        
        <div class="row-fluid">
            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/profesorado.svg" alt="" width="50" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("DEL PROFESORADO", "nova");?></b></p>
                <p class="center">De la Rosa Sánchez, Lucía</p>
                <p class="center">Extremera López, Urbano</p>
                <p class="center">Fernández Ortega, Jaime</p>
                <p class="center">Rodríguez Espejo, Francisca</p>
                <p class="center">Rodríguez Fernández, Jorge</p>
                <p class="center">Sánchez del Río, Inmaculada</p>
                <p class="center">Taboada Rodríguez, María Rosario</p>
                <p class="center">Zafra Barranco, Manuel </p>
            </div>

            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/padres.svg" alt="" width="50" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("DE PADRES Y MADRES O TUTORES", "nova");?></b></p>
                <p class="center">De la Torre Martínez, José María</p>
                <p class="center">Ortega Ramírez, Luís</p>
                <p class="center">Ostos Rey, María Sol</p>
                <p class="center">Otero Piñero, María Dulcinea</p>
                <p class="center">Rachidi Buhasni, Jamila </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>

           <div class="span3 box">
               <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/alumnado.svg" alt="" width="50" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("DEL ALUMNADO", "nova");?></b></p>
                <p class="center">Beato Gutiérrez, Javier</p>
                <p class="center">Martín García, Félix</p>
                <p class="center">Morales Martín, Jesús</p>
                <p class="center">Otero Galadí, Bruno</p>
                <p class="center">Ramos Linde, Pablo</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            
            <div class="span3 box">
                <div class="center">
                    <img src="<?php bloginfo('template_directory');?>/images/sample/administration.svg" alt="" width="50" >
                </div>
                <p></p>
                <p class="center"><b><?php _e("DE ADMON. Y SERVICIOS", "nova");?></b></p>
                <p class="center">Villaverde Aguado, Dolores</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        
        </div>
        
</div>
</div>
</div>
</div>
</div>
</section>

<?php
	get_footer();
?>

