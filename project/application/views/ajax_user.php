<?php

foreach($voorstellen as $voorstel){
    echo '<option value="'.$voorstel->id.'">'.$voorstel->titel.'</option>';
}
?>