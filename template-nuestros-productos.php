<?php
/*
  Template Name: Template Productos
 */
get_header();
?>

<section class="productos">
    <div class="productos-intro">
        <h1>Productos de alta gama</h1>
        <h3>En Cardioserel vas a encontrar la calidad, y seriedad de las marcas lideres junto con el mejor servicio tecnico y postventa de la region.
            Somos representantes certificados por Philips y Neumovent en Santa Fé, Entre Rios y alrededores.</h3>
    </div>

    <div class="container">
        <div class="col-md-10 col-md-offset-1">

            <div class=" productos-contenido">

                <?php get_template_part('template-parts/productos', 'action-bar'); ?>


                <div class="productos-categorias">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="categoria-1">

                                <div class="col-md-6 col-md-offset-6">
                                    <div class="categoria-1-contenido">
                                        <h2>Monitores Multiparametricos</h2>
                                        <p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered.
                                        </p>
                                        <h5>Philips</h5>

                                        <a href="<?php echo get_term_link(get_category_by_slug('monitores-multiparametricos')) ?>">Ver todos</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="categoria-2">
                                <div class="categoria-2-contenido">
                                    <h2>Ventiladores
                                        neonatales</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                    </p>
                                    <h5>Philips</h5>
                                    <a href="">Ver todos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="categoria-3">
                                <div class="categoria-3-contenido">
                                    <h2>Cardiolog&iacute;a</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                    </p>
                                    <h5>Philips</h5>
                                    <a href="">Ver todos</a>
                                </div>
                            </div>
                            <div class="categoria-4">
                                <div class="categoria-4-contenido">
                                    <h2>Mamografos</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                    </p>
                                    <h5>Philips</h5>
                                    <a href="">Ver todos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="categoria-5">
                                <div class="categoria-5-contenido">
                                    <h2>Ventiladores neonatales</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                    </p>
                                    <h5>Philips</h5>
                                    <a href="">Ver todos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="categoria-6">
                                        <h2>Mam&oacute;grafos</h2>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </p>
                                        <h5>Philips</h5>
                                        <a href="">Ver todos</a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="categoria-7">
                                        <h2>Monitores multiparamétricos</h2>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </p>
                                        <h5>Philips</h5>
                                        <a href="">Ver todos</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="categoria-otra">
                                        <h2>M&aacute;s de 1000 productos</h2>
                                        <p>Si aquí no esta lo que busca contactenos, podemos conseguirlo.</p>

                                        <a href="">Cont&aacute;tanos</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>




</section>

<?php get_template_part('template-parts/productos', 'recomendados'); ?>

<?php get_footer(); ?>