<?php
    $actividad = $GLOBALS['actividad'];
    
    $fecha = new DateTime($actividad['fecha']);
    $fecha = $fecha->format('d/m/Y');
    
    $hora_inicio = new DateTime($actividad['hora_inicio']);
    $hora_inicio = $hora_inicio->format('H:i');
    
    $hora_fin = new DateTime($actividad['hora_fin']);
    $hora_fin = $hora_fin->format('H:i');
?>
<div class="span3">
    <?php
		if($actividad['imagen'] !== ""){
	        file_put_contents(get_template_directory() . "/images/temp_img_" . $actividad["id"] .".png", base64_decode($actividad['imagen']));
    ?>
	<div class="imagen_post" style="background-image:url(<?php echo(get_template_directory_uri() . "/images/temp_img_" . $actividad["id"] .".png");?>)"></div>
    <?php
		}
		
    ?>
    <div class="desc">
        <h4><a href="<?php echo get_page_link(get_page_by_title('Actividad') -> ID);?>?id=<?php echo $actividad['id']?>"><i class="icon-leaf"></i> <?php echo $actividad['titulo']?></h4></a>
        <h5><?php _e("Descripción: ", "nova");?><?php echo $actividad['descripcion']?></h5>
    </div>
</div>