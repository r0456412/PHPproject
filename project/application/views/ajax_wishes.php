

<?php
/**
 * @file ajax_wishes.php
 * 
 * View waarin de admin de wishes met het antwoord van de user kan ophalen
 * - krijgt $wishes-object binnen
 */
 ?>

<table class="table table-borderless">
    <tbody>

<?php

foreach ($wishes as $wish) {




echo "<tr>";
echo "<th scope='row'>". $wish->wish ."</th>";
echo '<td>'.$wish->antwoord->antwoord.'</td>';
echo "</tr>";



}
?>
</tbody>
  </table>