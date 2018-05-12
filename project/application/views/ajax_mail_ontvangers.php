<?php 
echo '<p>Selected users</p>
    <textarea class="w-100" rows="5" readonly>';
if(count($gebruikers) <= 1){
    echo $gebruikers->voornaam . " " . $gebruikers->achternaam;
}else{
    foreach($gebruikers as $gebruiker){
        echo $gebruiker->voornaam . " " . $gebruiker->achternaam;
    }
}
echo '</textarea>';
?>