<div class="span3">
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
    <div class="desc">
       <h4><a href="<?php the_permalink();?>"><i class="icon-file-text-alt"></i> <?php the_title();?></h4></a>
       <h5><?php the_excerpt();?></h5>
    </div>
</div>