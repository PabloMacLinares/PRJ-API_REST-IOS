<!--Header-->
<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="logo" class="pull-left" href="index.html"></a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li <?php if(is_front_page()) echo 'class="active"';?>><a href="<?php echo get_option("home");?>"><?php _e("Inicio", "nova");?></a></li>
                    <li <?php if(is_page("Actividades")) echo 'class="active"';?>><a href="<?php echo get_page_link(get_page_by_title('Actividades') -> ID);?>"><?php _e("Actividades", "nova");?></a></li>
                    <li <?php if(is_home()) echo 'class="active"';?>><a href="<?php echo get_page_link(get_page_by_title('Novedades') -> ID);?>"><?php _e("Novedades", "nova");?></a></li> 
                    <li <?php if(is_page("Acerca de")) echo 'class="active"';?>><a href="<?php echo get_page_link(get_page_by_title('Acerca de') -> ID);?>"><?php _e("Acerca de", "nova");?></a></li>
                    <li <?php if(is_page("Contacto")) echo 'class="active"';?>><a href="<?php echo get_page_link(get_page_by_title('Contacto') -> ID);?>"><?php _e("Contacto", "nova");?></a></li>
                    <!--<li class="login">
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                    </li>-->
                </ul>        
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<!-- /header -->