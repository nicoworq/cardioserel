<?php

/*
  Template Name: Template Contacto
 */
get_header();
?>

<section class="contacto">

    <div class="contacto-back">
        <div class="contacto-bg"></div>
        <div class="contacto-mapa">
            <div id="map_canvas"></div>
        </div>
    </div>

    <div class="contacto-contenido">


        <div class="container">
            <div class="col-md-6">
                <h1>Contactános</h1>
                <div class="contenido-contacto">
                    <form id="form-contacto">
                        <input type="hidden" name="action" value="contacto">
                        <div class="linea-form">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="linea-form">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="linea-form">
                            <label for="telefono">Tel&eacute;fono</label>
                            <input id="telefono" type="text" name="telefono" placeholder="Tel&eacute;fono">
                        </div>
                        <div class="linea-form last">
                            <textarea name="mensaje" placeholder="Mensaje"></textarea>
                        </div>

                        <input type="submit" value="Enviar">
                    </form>
                    <ul class="datos-contacto">
                        <li>Datos de contacto</li>
                        <li><i class="contacto-icon contacto-icon-mail"></i>info@cardioserel.com</li>
                        <li><i class="contacto-icon contacto-icon-tel"></i>+54 03414827001</li>
                        <li><i class="contacto-icon contacto-icon-dir"></i>Uruguay 2018, CP 2000. Rosario, Santa Fe, Argentina</li>
                    </ul>

                </div>


            </div>

        </div>


    </div>





</section>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo&sensor=false"></script>

<?php get_footer(); ?>