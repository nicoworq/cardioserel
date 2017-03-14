<?php
/*
  Template Name: Template Clientes
 */
get_header();
?>

<div class="clientes-header">
    <h1>Más de 50 instituciones medicas<br/>
        confian en nuestro trabajo</h1>
    <h2>"Nos esforzamos por crear vínculos perdurables con nuestros clientes<br/>
        basados en la confianza que contruimos con respuesta, servicio y responsabilidad"</h2>
    <h3>Sergio D. Ranciari</h3>
</div>


<div class="clientes-testimonios">
    <h1>¿Qué piensan nuestro clientes?</h1>

    <div class="testimonio">
        <div class="testimonio-img">
            <img src="<?php echo get_template_directory_uri() ?>/img/testimonio-persona.jpg"/>
        </div>
        <div class="testimonio-texto">
            <span>“</span>
            <h3>Cardioserel siempre resolvio mis problemas, servicio postventa constantemente supera mis expectativas.</h3>
            <h4>DR JUAN PEREZ | Representante del Area de Compras del Sanatorio Parque</h4>
        </div>
    </div>

</div>

<div class="clientes-listado">

    <h2>Comprometidos con el servicio</h2>
    <h3>Nos esforzamos por ofrecer el mejor servicio, a través de  un equipo formado por profesionales que <br/>
        comparten nuestros mismos valores, responsabilidad, transparencia y calidad.</h3>
    <h4>Ya confian en nosotros las siguientes instituciones</h4>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="cliente-item">
                    <h3>» Instituto Cardiovascular de Rosario</h3>
                    <h4>Sanatorio de Rosario</h4>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>

</div>

<div class="clientes-cta">
    <h1>Un servicio en el que puede confiar</h1>
    <h2>Le ofrecemos equipos de calidad internacional y el mejor servicio técnico</h2>
    <a href="<?php echo get_permalink(get_page_by_title("Contacto")); ?>" class="bt-site">Contáctenos</a>
</div>
<?php get_footer(); ?>