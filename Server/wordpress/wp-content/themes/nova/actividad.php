<?php 
    /* Template Name: actividad */
    get_header(); 
    get_template_part("inc/nav");
    get_template_part("inc/title");
    
    if(isset($_GET["id"])){
        @$actividad = mysqli_fetch_array(get_actividad_with_id($_GET["id"]));
        if($actividad == null){
            echo "<h2>" . __("No se ha encontrado la actividad solicitada", "nova") . "</h2>";
        }else{
            $fecha = new DateTime($actividad['fecha']);
            $fecha = $fecha->format('d/m/Y');
            
            $hora_inicio = new DateTime($actividad['hora_inicio']);
            $hora_inicio = $hora_inicio->format('H:i');
            
            $hora_fin = new DateTime($actividad['hora_fin']);
            $hora_fin = $hora_fin->format('H:i');
?>
    <section id="actividad" class="container main">
        <div class="row-fluid">
            <div class="span8">
                <div class="blog-item well">
                    <h2><?php echo $actividad['titulo']?></h2>
                    <hr/>
                    <h4><?php _e("Información de la Actividad", "nova");?></h4>
                    <ul class="unstyled">
                        <li>
                            <i class="icon-map-marker"></i>
                            <strong><?php _e("Lugar", "nova");?>:</strong> <?php echo $actividad['lugar'];?>
                        </li>
                        <li>
                            <i class="icon-calendar"></i>
                            <strong><?php _e("Fecha", "nova");?>:</strong> <?php echo $fecha?>
                        </li>
                        <li>
                            <i class="icon-time"></i>
                            <strong><?php _e("Hora", "nova");?>:</strong> <?php echo $hora_inicio;?> a <?php echo $hora_fin;?>
                        </li>
                        <li>
                            <i class="icon-user"></i>
                            <strong><?php _e("Profesor", "nova");?>:</strong> <?php echo $actividad['profesor'];?>
                        </li>
                        <li>
                            <i class="icon-group"></i>
                            <strong><?php _e("Grupo", "nova");?>:</strong> <?php echo $actividad['grupo'];?>
                        </li>
                    </ul>
                <?php
            		if($actividad['imagen'] !== ""){
            		    file_put_contents(get_template_directory() . "/images/temp_img_" . $actividad["id"] .".png", base64_decode($actividad['imagen']));
                ?>
                <div class="single" style="background-image:url(<?php echo(get_template_directory_uri() . "/images/temp_img_" . $actividad["id"] .".png");?>)"></div>
                <?php
            		}
            		
                ?>
                    <h4><?php _e("Descripción: ", "nova");?></h4>
                    <p><?php echo $actividad['descripcion']?></p>
                </div>
            </div>    
            <?php get_sidebar();?>
        </div>
    </section>
<?php
        }
    }else{
        echo "<h2>" . __("No se ha encontrado la actividad solicitada", "nova") . "</h2>";
    }

    get_footer(); 
?>