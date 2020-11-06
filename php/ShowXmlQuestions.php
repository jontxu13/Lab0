<?php
ob_start();
?>
<?php
session_start();
if (!isset($_SESSION["session_username"])) {
  header("location:LogIn.php");
} else {
?>
<?php
$questions = simplexml_load_file('../xml/Questions.xml');
foreach ($questions->xpath('//assessmentItem') as $question)
{
echo utf8_decode("<b>$question->Enunciado:</b><br>");
echo "Enunciado:<br>";
echo utf8_decode("$question-><br><br>");
echo "Actores:<br>";
foreach ($pelicula->personajes->personaje as $personaje)
{ echo utf8_decode("$personaje->nombre - ");
echo utf8_decode("$personaje->actor<br>");}
echo "<br>";
}
?>
<?php
}
?>