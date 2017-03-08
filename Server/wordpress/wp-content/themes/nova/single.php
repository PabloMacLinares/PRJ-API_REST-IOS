<?php 
    get_header(); 
    get_template_part("inc/nav");
    get_template_part("inc/title");
?>

        
<!-- Page Content -->
<?php 
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large'); 
?>

<section id="single" class="container main">
    
    <div class="row-fluid">
            <div class="span8">
                <div class="single" style="background-image: url('<?php echo $thumb[0];?>')"></div>
                <?php the_post(); ?>
                
                <?php the_content(); ?>
                <span class="fa fa-comment"></span><?php comments_number(__("No hay comentarios", "nova"),__(" 1 comentario", "nova"),__(" % comentarios", "nova")); ?>
                <br>
                <span class="fa fa-tags"></span>
                <?php the_tags("",",",""); ?>
                <?php comments_template(); ?>
            </div>    
                <?php get_sidebar();?>
    </div>
</section>
<?php get_footer(); ?>