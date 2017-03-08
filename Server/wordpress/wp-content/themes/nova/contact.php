<?php 
    /* Template Name: contact */
	get_header();
	get_template_part("inc/nav");
	get_template_part("inc/title");
?>
<body>

    <section id="contact-page" class="container">
        <div class="row-fluid">

            <div class="span8">
                <h4><?php _e("Formulario de contacto", "nova"); ?></h4>
                <div class="status alert alert-success" style="display: none"></div>

                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                  <div class="row-fluid">
                    <div class="span5">
                        <label><?php _e("Nombre", "nova"); ?></label>
                        <input type="text" class="input-block-level" required="required" placeholder="<?php _e("Tu nombre", "nova"); ?>">
                        <label><?php _e("Apellidos", "nova"); ?></label>
                        <input type="text" class="input-block-level" required="required" placeholder="<?php _e("Tus apellidos", "nova"); ?>">
                        <label><?php _e("Email", "nova"); ?></label>
                        <input type="text" class="input-block-level" required="required" placeholder="<?php _e("Tu correo electronico", "nova"); ?>">
                    </div>
                    <div class="span7">
                        <label><?php _e("Mensaje", "nova"); ?></label>
                        <textarea name="message" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-large pull-right"><?php _e("Enviar", "nova"); ?></button>
                <p> </p>

            </form>
        </div>

        <div class="span3">
            <h4><?php _e("Nuestra direccion", "nova"); ?></h4>
            <p>
                <i class="icon-map-marker pull-left"></i> <?php _e("Calle", "nova");?> Primavera, 26-28, 18008 Granada,<?php _e("España", "nova");?><br>
            </p>
            <p>
                <i class="icon-envelope"></i> &nbsp;secretaria.ieszaidinvergeles@gmail.com
            </p>
            <p>
                <i class="icon-phone"></i> &nbsp;+34 958 89 38 50
            </p>
            <p>
                <i class="icon-globe"></i> &nbsp;http://www.ieszaidinvergeles.es
            </p>
        </div>

    </div>

</section>

<?php get_footer(); ?>
