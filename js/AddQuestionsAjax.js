$(document).ready(function () {
    $("#enviar").click(function () {
        $.ajax({
            type: $('#fquestion').attr('method'),
            url: $('#fquestion').attr('action'),
            data: $('#fquestion').serialize(),
            cache: false,
            success: function (data) { $("#respuesta").append("<p>Pregunta guardada en la BD y XML</p>");
             },
            error: function (data) {
                //Aqui va el error a tratar.
            }
        });
    });
});