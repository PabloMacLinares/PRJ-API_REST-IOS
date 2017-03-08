<?php 
    get_header();
    get_template_part("inc/nav");
?>

    <!-- 404 error -->
    <section id="error" class="container">
        <h1><?php _e("404, Página no encontrada", "nova");?></h1>
        <p><?php _e("La página que estas buscando no existe o ocurrió algún error.", "nova");?></p>
        <a class="btn btn-success" href="<?php echo get_option("home");?>"><?php _e("VOLVER AL INICIO", "nova");?></a>
    </section>
    <!-- /404 error -->

<?php get_footer();?>