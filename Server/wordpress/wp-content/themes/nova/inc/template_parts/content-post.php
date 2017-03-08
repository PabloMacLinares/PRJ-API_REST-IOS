<div class="blog-item well">
    <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
    <div class="blog-meta clearfix">
        <p class="pull-left">
            <i class="icon-user "></i> by <a href="#"><?php the_author();?></a> | <i class="icon-folder-close"></i> Category <a href="#"><?php the_category(", ");?></a> | <i class="icon-calendar"></i> <?php echo get_the_date("j / m / Y");?>
        </p>
        <p class="pull-right"><i class="icon-comment pull"></i> <a href="blog-item.html#comments"><?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?></a></p>
    </div>
    <?php
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'thumb');
		if(isset($thumb[0])){
    ?>
    <div class="col-lg-3">
		<div class="imagen_post" style="background-image:url(<?php echo $thumb[0]?>)"></div>
	</div>
    <?php
		}
    ?>
    <p><?php the_excerpt();?></p>
    <!--<a class="btn btn-link" href="#">Read More <i class="icon-angle-right"></i></a>-->
</div>