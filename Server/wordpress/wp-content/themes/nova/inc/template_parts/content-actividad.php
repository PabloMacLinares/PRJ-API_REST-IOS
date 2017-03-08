<?php
    $actividad = $GLOBALS['actividad'];
    
    $fecha = new DateTime($actividad['fecha']);
    $fecha = $fecha->format('d/m/Y');
    
    $hora_inicio = new DateTime($actividad['hora_inicio']);
    $hora_inicio = $hora_inicio->format('H:i');
    
    $hora_fin = new DateTime($actividad['hora_fin']);
    $hora_fin = $hora_fin->format('H:i');
?>

<div class="blog-item well">
    <a href="<?php echo get_page_link(get_page_by_title('Actividad') -> ID);?>?id=<?php echo $actividad['id']?>"><h2><?php echo $actividad['titulo']?></h2></a>
    <div class="blog-meta clearfix">
        <p class="pull-left">
            <i class="icon-user"></i> <?php echo $actividad['profesor'];?> |
            <i class="icon-group"></i> <?php echo $actividad['grupo'];?> |
            <i class="icon-map-marker"></i> <?php echo $actividad['lugar'];?> |
            <i class="icon-calendar"></i> <?php echo $fecha?> |
            <i class="icon-time"></i> <?php echo $hora_inicio;?> a <?php echo $hora_fin;?>
        </p>
    </div>
    <?php
		if($actividad['imagen'] !== ""){
		    file_put_contents(get_template_directory() . "/images/temp_img_" . $actividad["id"] .".png", base64_decode($actividad['imagen']));
    ?>
    <div class="col-lg-3">
		<div class="imagen_post" style="background-image:url(<?php echo(get_template_directory_uri() . "/images/temp_img_" . $actividad["id"] .".png");?>)"></div>
	</div>
    <?php
		}
		
    ?>
    <h4><?php _e("Descripción: ", "nova");?></h4>
    <p><?php echo $actividad['descripcion']?></p>
</div>