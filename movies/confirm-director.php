<?php
require_once('movie.php');

$movie = new Movie();
$movie->addDirector($_POST['fName'], $_POST['lName']);
?>

Директорът <?php echo $_POST['fName'] . $_POST['lName']; ?> беше добавен успешно!
