<?php 
	/*Template Name:template-actividades*/
	get_header();
	get_template_part("inc/nav");
	get_template_part("inc/title");
	
	$profesor = $_GET['profesor'];
	$fecha = $_GET['fecha'];

    if(isset($profesor) && $_GET['filtroProfesor'] == 'Buscar'){
	    $actividades = get_actividades_with_profesor($profesor);
    }else if(isset($fecha) && $_GET['filtroFecha'] == 'Buscar'){
	    $actividades = get_actividades_with_fecha($fecha);
    }else{
	    $actividades = get_actividades();
    }
?>

<body>
    <section id="novedades" class="container main">
        <div class="row-fluid">
        	 <div class="span8">
            	<div class="blog-item well">
                <form class="formFiltro">
                	<legend><?php _e("Busqueda de actividades", "nova");?></legend>
                	<table>
                		<tr>
                			<td>
                				<label><?php _e("Fecha de la actividad:", "nova");?></label>
                			</td>
                			<td>
                				<input type="date" name="fecha">
                			</td>
                			<td>
                				<input type="submit" name="filtroFecha" value="<?php _e("Buscar", "nova");?>">
                			</td>
                		</tr>
                		<tr>
                			<td>
                				<label><?php _e("Profesor encargado:", "nova"); ?></label>
                			</td>
                			<td>
                				<input type="text" name="profesor">
                			</td>
                			<td>
                				<input type="submit" name="filtroProfesor" value="<?php _e("Buscar", "nova");?>">
                			</td>
                		</tr>
                	</table>
                </form>
                </div>

                <div class="blog">
                    <?php
                        $rows = $actividades->num_rows;
                        if($_GET['filtroProfesor'] || $_GET['filtroFecha']){
                            if($rows == 0){
                                echo "<h2>" . __("No se han encontrado actividades", "nova") . "</h2>";
                            }else if($rows == 1){
                                echo "<h2>" . __("1 Actividad encontrada", "nova") . "</h2>";
                            }else{
                                echo "<h2>" . $rows . __(" Actividades encontradas", "nova") . "</h2>";
                            }
                        }
    					while($actividad = @mysqli_fetch_array($actividades)){
							$GLOBALS['actividad'] = $actividad;
							get_template_part('inc/template_parts/content', 'actividad');
						}
    				?>
              		<div class="gap"></div>
        		</div>
   			</div>
   			
    		<?php get_sidebar();?>
    		
		</div>
	</section>
<?php get_footer(); ?>