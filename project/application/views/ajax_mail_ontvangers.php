<?php 
echo '<p>Selected users</p>
    <textarea class="w-100" rows="5" readonly id="ontvangers" name="ontvangers">';
if(count($gebruikers) <= 1){
    //echo $gebruikers->voornaam . " " . $gebruikers->achternaam;
    echo $gebruikers->email;
}else{
    foreach($gebruikers as $gebruiker){
        //echo $gebruiker->voornaam . " " . $gebruiker->achternaam;
        echo $gebruiker->email . " &#13;&#10;";
    }
}
echo '</textarea>';
?>