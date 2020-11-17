function addQuestionAjax() {
    validarFormulario();
    if (validarFormulario()) {
        $.ajax({
            type: $('#fquestion').attr('method'),
            url: $('#fquestion').attr('action'),
            data: $('#fquestion').serialize(),
            cache: false,
            success: function (data) {
                $("#respuesta").append("<p>Pregunta guardada en la BD y XML</p>");
            }
        });
    }else{
        $("#respuesta").append("<p>No se ha podido insertar la pregunta</p>");
    }
}