<?php

/**
 * @file ajax_user.php
 * 
 * View waarin de admin de verschillende voorstellen ophaalt per user
 * - Krijgt $voorstellen-object binnen
 */


foreach($voorstellen as $voorstel){
    echo '<option value="'.$voorstel->id.'">'.$voorstel->titel.'</option>';
}
?>