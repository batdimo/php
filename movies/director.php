<?php

require_once('movie.php');


$movie  = new Movie();

?>

<table border="1">
    <tr>
        <td>ID</td>
        <td>First name</td>
        <td>Last name</td>
    </tr>
    <?php $movie->printAllDirectors(); ?>
</table>