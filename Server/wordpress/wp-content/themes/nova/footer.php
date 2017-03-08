
<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <div class="span3">
                <img alt=" " src="<?php bloginfo('template_directory'); ?>/images/logo_grande.png" width="200px">
            </div>

            <!--Important Links-->
            <div id="tweets" class="span3">
                <h4><?php _e("NUESTRA COMPAÑÍA", "nova");?></h4>
                <div>
                    <ul class="arrow">
                        <li><a href="<?php echo get_page_link(get_page_by_title('Acerca de') -> ID);?>"><?php _e("Acerca de", "nova");?></a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('Contacto') -> ID);?>"><?php _e("Contacto", "nova");?></a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('Novedades') -> ID);?>"><?php _e("Blog", "nova");?></a></li>
                    </ul>
                </div>  
            </div>
            <!--Important Links-->

            <!--Archives-->
            <div id="archives" class="span3">
                <h4><?php _e("ARCHIVOS", "nova");?></h4>
                <div>
                    <ul>
                        <?php wp_get_archives('show_post_count=true');?>
                    </ul>
                </div>
            </div>
            <!--End Archives-->
            <!--Contact Form-->
            <div class="span3">
                <h4><?php _e("DIRECCIÓN", "nova");?></h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong><?php _e("Dirección", "nova");?>:<a href="https://www.google.es/maps/place/Calle+Primavera,+26,+18008+Granada/data=!4m2!3m1!1s0xd71fca8a6a23e09:0xbd2353be22dec616?sa=X&ved=0ahUKEwiG7cDH3MLSAhXL7RQKHU0DCo8Q8gEIGzAA" target="_blank"></strong> <?php _e("Calle", "nova");?> Primavera, 26-28, 18008 Granada,<?php _e("España", "nova");?></a>
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong><?php _e("Email", "nova");?>: </strong> <a href="mailto:secretaria.ieszaidinvergeles@gmail.com">secretaria.ieszaidinvergeles@gmail.com</a>
                    </li>
                    <li>
                        <i class="icon-globe"></i>
                        <strong><?php _e("Web", "nova");?>:<a href="http://www.ieszaidinvergeles.es" target="_blank"></strong> www.ieszaidinvergeles.es</a>
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong><?php _e("Teléfono", "nova");?>:</strong> <a href="tel:+34 958 89 38 50">+34 958 89 38 50</a>
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->
            
        </div>

    </div>
    <!--/row-fluid-->
</div>
<!--/container-->

</section>
<!--/bottom-->
<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                       
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                        
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>                   
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<script src="<?php bloginfo("teplate_directory");?>/js/vendor/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo("teplate_directory");?>/js/vendor/bootstrap.min.js"></script>
<script src="<?php bloginfo("teplate_directory");?>/js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="<?php bloginfo("teplate_directory");?>/js/jquery.ba-cond.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->


</body>
</html>