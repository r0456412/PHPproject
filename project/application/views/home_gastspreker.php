<?php
if ($gebruiker != null) {
    echo '<h2> Welcome ' . $gebruiker->voornaam . '!</h2><br><p>On this page you can send your proposal of your session that you would like to give.'
            . '<br>Also you can sumbit the wishes that you have while you are at Thomas More Geel.</p><br>';
}
?>

<div class="row">
    <div class="col-md-3 mx-auto">
        <a href="../gastspreker/voorstel_indienen">
            <div class="card admin">
                <div class="card-header"><h6>Submit a session proposal</h6></div>
                <div class="card-body">
                    <i class="fas fa-check fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="../gastspreker/wishesDoorgeven">
            <div class="card admin">
                <div class="card-header"><h6>Submit wishes</h6></div>
                <div class="card-body">
                    <i class="fas fa-hands fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="../admin/datums_wijzigen">
            <div class="card admin">
                <div class="card-header"><h6>Change wishes</h6></div>
                <div class="card-body">
                    <i class="fas fa-cogs fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
</div>

