<?php
/**
 * @file ajax_voorsteldetail.php
 * 
 * View waarin de admin de details van het voorstel ophaalt waar je op klikt
 * - krijgt $voorstel-object binnen
 */
 ?>
<table class="table table-borderless">
    <tbody>
<?php
echo "<tr>";
echo '<th scope="row">Titel</th>';
echo '<td>'.$voorstel->titel.'</td>';
echo "</tr>";
echo "<tr>";
echo '<th scope="row">Taal</th>';
echo '<td>'.$voorstel->taal.'</td>';
echo "</tr>";
echo "<tr>";
echo '<th scope="row">samenvatting</th>';
echo '<td>'.$voorstel->samenvatting.'</td>';
echo "</tr>";
?>
</tbody>
  </table>