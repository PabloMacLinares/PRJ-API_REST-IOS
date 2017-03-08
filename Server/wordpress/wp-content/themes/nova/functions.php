 <?php

	// Make the theme translation ready
	load_theme_textdomain('nova', get_template_directory() . '/languages');
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	  require_once($locale_file);

    /*function textdomain_jquery_enqueue(){

        wp_deregister_script('jquery');

        wp_register_script('jquery',"http".($_SERVER['SERVER_PORT'] == 443 ? "s":"")."://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js",false,null);

        wp_enqueue_script('jquery');
    }
    if(!is_admin()){
        add_action('wp_enqueue_scripts','textdomain_jquery_enqueue');
    }*/

    add_theme_support('post-thumbnails');

    add_filter('excerpt_more','new_excerpt_more');
    function new_excerpt_more($more){
        global $post;
        return '<a class="more" href="'.get_permalink($post->ID).'" > ...[+]</a>';
    }

    function get_my_category($categorias){
        $string="";
        if(count($categorias)==1){
            return $string=$categorias[0];
        }else if(count($categorias)>=2){
            return $string=$categorias[0]." & ".$categorias[1];
        }
    }

    function add_responsive_class($content){
        //convertimos el contenido a una codificacion html en utf8
        $content= mb_convert_encoding($content,'HTML-ENTITIES','UTF8');
        $document= new DOMDocument(); // Respresenta el documento html
        //Deshabilitamos los errores libxml y habilita el manejo por parte del usuario -true-
        libxml_use_internal_errors(true);
        //cargamos el contenido del post en el objeto DOMDocument
        $document->loadHTML(utf8_decode($content));
        $html=$document->saveHTML();
        //recogemos en el array $imgs todos los tags img que tenga el documento
        $imgs = $document->getElementsByTagName('img');       
        //Los recorremos y a cada uno le asignamos el atributo class con el valor img-responsive
        foreach($imgs as $img){
            $img->setAttribute('class','img-responsive');
        }
        //Salvamos los cambios
        $html=$document->saveHTML();
        $bquotes= $document->getElementsByTagName('blockquote');
        foreach($bquotes as $bquote){
            $bquote->setAttribute('class','bquote-responsive');
        }
        $html=$document->saveHTML();

        return $html;
    }
    add_action('the_content','add_responsive_class');

     function custom_get_pages($pages){
            if(!is_admin()){
                foreach($pages as $page){
                    if($page->post_title=="Noticias"){
                        echo "<li><a href='".esc_url(home_url())."#portfolio'>".$page->post_title."</a></li>"; 
                    }
                    else{
                        if($page->post_title!="archives"){
                            echo "<li><a href='".get_page_link($page->ID)."'>".$page->post_title."</a></li>"; 
                        }
                    }
                       
                }
            }
        return $pages;
    }
    
    add_filter('get_pages','custom_get_pages');
    
    function short_excerpt($length){
    	if(is_front_page()){
    		return 5;
    	}
        if(is_home() && !is_archive()){
            return 20;
        }else{
            return $length;
        }
    }
    add_filter('excerpt_length','short_excerpt',999);
    
    function has_gravatar($email){
        //ciframos la cuenta de email
        $hash = md5(strtolower(trim($email)));
        //recuperamos la uri si supiestamente existe
        $uri = 'http://www.gravatar.com/avatar/'.$hash.'?d=404';
        //Recuperamos todas las cabeceras enviadas por el servidor en respuesta a una peticion html
        $headers = @get_headers($uri);
        //si tiene gravatar debe de aparecer un 200 en la uri
        if(!preg_match("|200|", $headers[0])){
            $hash_valid_avatar = FALSE;
        }
        else{
            $hash_valid_avatar = TRUE;
        }
        return $hash_valid_avatar;
    }
    
    function get_user_role($id){
        $user_info = get_userdata($id);      
      echo 'User roles: ' . implode(', ', $user_info->roles) . "\n";
    }

    add_theme_support('post-formats',array('image','quote','video','audio','link','gallery'));
    
    function get_paginate_page_links($type = 'plain', $endSize = 1, $midSize = 1){
		global $wp_query, $wp_rewrite; // wp_rewrite permite reescribir la url
		/*
			Obtenemos el numero actual de pagina -> en una plantilla
			tipo index. Si queremos obtener el numero de pagina de una pagina estatica
			tipo front page, tenemos que cambiar 'paged' por 'page'
		*/
		$current = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
		
		//Saneamos los valores de los argumentos de entrada
		if(!in_array($type, array('plain', 'list', 'array')))$type = 'plain';
		//absint es una funcion de WP que convierte un numero a su entero no negativo, hace los mismo que abs(intval($num))
		$endSize = absint($endSize);
		$midSize = absint($midSize);
		
		//establecemos los valores de los argumentos de la funcion paginate_links()
		$pagination = array(
			'base'		=> @add_query_arg('paged', '%#%'),
			'format'	=> '',
			'total'		=> $wp_query->max_num_pages,
			'current'	=> $current,
			'show_all'	=> false,
			'end_size'	=> $endSize,
			'mid_size'	=> $midSize,
			'type'		=> $type,
			'prev_text' => '&lt;&lt;',
			'next_text' => '&gt;&gt;'
		);
		if($wp_rewrite->using_permalinks()){
			$pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%/', 'paged');
		}
		
		if(! empty($wp_query->query_vars['s'])){
			$pagination['add_args'] = array('s' => get_query_var('s'));
		}
		
		return paginate_links($pagination);
	}
    
    function custom_breadcrumbs() {
		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = '/'; // delimiter between crumbs
		$home = 'Home'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb

		global $post;
		$homeLink = get_bloginfo('url');

		if (is_front_page()) {
			if ($showOnHome == 1) 
				echo '<a href="' . $homeLink . '">' . $home . '</a></div>';
		}elseif (is_home()){
		        $title = wp_title("", false);
                echo '<a href="' . $homeLink . '">' . $home . ' </a>' . $delimiter . $title .'</div>';
        } else {

			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

            if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
				echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

			} elseif ( is_search() ) {
			  echo $before . 'Search results for "' . get_search_query() . '"' . $after;

			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1)
					echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) 
					echo $before . get_the_title() . $after;
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1)
						echo ' ' . $delimiter . ' ';
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Articles posted by ' . $userdata->display_name . $after;

			} elseif ( is_404() ) {
				echo $before . 'Error 404' . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ' (';
				echo __('Page') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ')';
			}
		}
	}
	
	/*CONEXIÓN A LA BASE DE DATOS*/
	function get_actividades($limit = -1){
	    $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'actividades';
        
	    $cdb = mysqli_connect($host,$user,$pass,$database) or die('No se puede conectar a la base de datos' . mysql_error());
	    $query = 
	    		"SELECT id, titulo, descripcion, fecha, lugar, hora_inicio, hora_fin, imagen,
				(SELECT nombre FROM profesor P
				    WHERE A.idProfesor = P.id
				) as profesor,
				(SELECT nombre FROM grupo G
				    WHERE A.idGrupo = G.id
				) as grupo
				FROM actividad A
				ORDER BY DATE( fecha ) DESC";
		if($limit > 0){
			$query .= " LIMIT $limit";
		}
	    return mysqli_query($cdb, $query);
	}
	
	function get_actividades_with_profesor($profesor){
	    $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'actividades';
        
	    $cdb = mysqli_connect($host,$user,$pass,$database) or die('No se puede conectar a la base de datos' . mysql_error());
	    $query = 
	    		"SELECT id, titulo, descripcion, fecha, lugar, hora_inicio, hora_fin, imagen,
				(SELECT nombre FROM profesor P
				    WHERE A.idProfesor = P.id
				) as profesor,
				(SELECT nombre FROM grupo G
				    WHERE A.idGrupo = G.id
				) as grupo
				FROM actividad A
				HAVING profesor LIKE '%$profesor%'
				ORDER BY DATE( fecha ) DESC";
		if($limit > 0){
			$query .= " LIMIT $limit";
		}
	    return mysqli_query($cdb, $query);
	}
	
	function get_actividades_with_fecha($fecha){
	    $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'actividades';
        
	    $cdb = mysqli_connect($host,$user,$pass,$database) or die('No se puede conectar a la base de datos' . mysql_error());
	    $query = 
	    		"SELECT id, titulo, descripcion, fecha, lugar, hora_inicio, hora_fin, imagen,
				(SELECT nombre FROM profesor P
				    WHERE A.idProfesor = P.id
				) as profesor,
				(SELECT nombre FROM grupo G
				    WHERE A.idGrupo = G.id
				) as grupo
				FROM actividad A
				WHERE date(fecha) >= date '$fecha'
				ORDER BY DATE( fecha ) DESC";
		if($limit > 0){
			$query .= " LIMIT $limit";
		}
	    return mysqli_query($cdb, $query);
	}
	
	function get_actividad_with_id($id){
	    $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'actividades';
        
	    $cdb = mysqli_connect($host,$user,$pass,$database) or die('No se puede conectar a la base de datos' . mysql_error());
	    $query = 
	    		"SELECT id, titulo, descripcion, fecha, lugar, hora_inicio, hora_fin, imagen,
				(SELECT nombre FROM profesor P
				    WHERE A.idProfesor = P.id
				) as profesor,
				(SELECT nombre FROM grupo G
				    WHERE A.idGrupo = G.id
				) as grupo
				FROM actividad A
				WHERE A.id = $id";
	    return mysqli_query($cdb, $query);
	}
	
	
	/*---------------------------*/
?>