function updateQuestions() {
    $.ajax({
        type: "POST",
        url: 'updateQuestionsXML.php',
        cache: false,
        success: function(cuantos) {
            $("#preguntas").html("Mis preguntas/Todas las preguntas:" + cuantos);
        }
    });
}
setInterval(updateQuestions(), 3000)