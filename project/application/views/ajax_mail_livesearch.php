<?php 
if($leeg !== "yes"){
    if($gebruikers !== "geen resultaten"){
        foreach($gebruikers as $gebruiker){
            echo '<p><a href="#" onclick="voegOntvangersToe('. $gebruiker->id .', 1);">' . $gebruiker->voornaam . " " . $gebruiker->achternaam .'</a></p>';
            //echo 'er zijn gebruikers gevonden';
            //echo $gebruiker->voornaam . " " . $gebruiker->achternaam;
        }
    }else{
        echo $gebruikers;
    }
    
}
?>