
new WOW().init();

jQuery(document).ready(function ($) {

    if ($(window).width() < 1200) {
        $('.navbar-collapse').addClass('collapse')

    }

    if ($('.galeria-albu').length > 0) {


        imagesLoaded(document.querySelector('#container'), function (instance) {
            $("#container").masonry({"itemSelector": ".item", "columnWidth": ".grid-sizer", })
        });
    }

    if ($('#map_canvas').length > 0) {
        var mapOptions = {center: new google.maps.LatLng(-32.9723409, -60.6599146), zoom: 12, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false};
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);


        var latLngMarker = new google.maps.LatLng(-32.9743913, -60.6584517, 17);
        var marker = new google.maps.Marker({
            position: latLngMarker,
            map: map,
            icon: 'img/pin.png'
        });

        google.maps.event.addListener(marker, 'click', function () {
            map.setZoom(16);
            map.setCenter(marker.getPosition());
        });

    }


    $('.menu-mobile-bt').click(function () {
        $('.menu-menu-1-container').toggleClass('visible');
        $(this).toggleClass('active');
    });


    $(' input[type=text] , textarea').keydown(function () {
        $(this).removeClass('input-error');
    });


    /* -----------
     *  FORM CONTACTO PRODUCTO
     * ----------- */

    $('#form-consulta-producto').submit(function (event) {
        event.preventDefault();

        var form = $(this);

        var formOK = true;

        form.find('input[type=text] , textarea').not('input[name=sex]').each(function () {
            $(this).removeClass('input-error');
            if ($(this).val() === '') {
                formOK = false;
                $(this).addClass('input-error');
            }
        });

        if (!formOK) {
            swal("Ocurrió un problema", "Debe completar todos los campos.", 'error');
            return false;
        }
        if (!validateEmail(form.find('input[name=email]').val())) {
            form.find('input[name=email]').addClass('input-error');

            swal("Oops...", "Debe ingresar un Email Valido.", "error");
            return false;
        }


        $('.ajaxing').fadeIn();
        $.post(CS.ajaxUrl, form.serialize(), function (json) {
            $('.ajaxing').fadeOut();
            if (json.enviado) {
                swal("Gracias por comunicarse", "Te responderemos a la brevedad", 'success');
            } else {
                swal("Ocurrió un problema", "Error al Enviar su consulta", 'error');

            }
        });

    });


    /* -----------
     *  FORM CONTACTO
     * ----------- */

    $('#form-contacto').submit(function (event) {
        event.preventDefault();

        var formOK = true;

        var borderOld = $(this).css('border');
        $('#form-contacto input[type=text] , #form-contacto textarea').each(function () {
            $(this).css('border', borderOld);
            if ($(this).val() === '') {
                formOK = false;
                $(this).css('border', '2px solid #E76F6F');
            }
        });

        if (!formOK) {
            alert("Debe completar todos los campos.");
            return false;
        }

        var url = $(this).attr('action');


        $.post(url, $('#form-contacto').serialize(), function (json) {

            if (json.enviado) {

                $('#form-contacto input ,  #form-contacto textarea').fadeOut(400, function () {
                    $('#contacto-respuesta').fadeIn(1900);
                });

            } else {
                alert('Error al Enviar su consulta.');
            }
        });

    });


    /* -----------
     *  FORM SUSCRIBIR
     * ----------- */

    $('#form-suscribir').submit(function (event) {
        event.preventDefault();

        var formOK = true;

        var borderOld = $(this).css('border');
        $('#form-suscribir input[type=text]').each(function () {
            $(this).css('border', borderOld);
            if ($(this).val() === '') {
                formOK = false;
                $(this).css('border', '2px solid #E76F6F');
            }
        });

        if (!formOK) {
            alert("Debe ingresar un Email.");
            return false;
        }

        $('#form-suscribir input[name=email]').css('border', borderOld);
        if (!validateEmail($('#form-suscribir input[name=email]').val())) {
            $('#form-suscribir input[name=email]').css('border', '2px solid #E76F6F');
            alert("Debe ingresar un Email Valido.");
            return false;
        }

        var url = $(this).attr('action');
        $('#suscribir-progress').fadeIn();
        $.post(url, $('#form-suscribir').serialize(), function (json) {
            $('#suscribir-progress').fadeOut();
            if (json.enviado) {

                alert('Suscripto Correctamente!');

            } else {
                alert('Error al suscribir!');
            }
        });

    });





    $(document).ajaxStart(function () {
        $('#contacto-progress').fadeIn();
    });
    $(document).ajaxStop(function () {
        $('#contacto-progress').fadeOut();
    });





});


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}