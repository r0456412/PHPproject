<?php
if ($gebruiker != null) {
    echo '<b>' . $gebruiker->voornaam . ', make all nesecary changes with the links below.</b>';
}
?>

<div class="row">
    <div class="col-md-3 mx-auto">
        <a href="../Planning/planning">
            <div class="card admin">
                <div class="card-header"><h6>Create agenda</h6></div>
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Mail</h6></div>
                <div class="card-body">
                    <i class="fas fa-envelope fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Manage users</h6></div>
                <div class="card-body">
                    <i class="fas fa-users fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="../admin/paginaInhoud_wijzigen">
            <div class="card admin">
                <div class="card-header"><h6>Homepage content</h6></div>
                <div class="card-body">
                    <i class="fab fa-safari fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Manage partners</h6></div>
                <div class="card-body">
                    <i class="fas fa-handshake fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Mail templates</h6></div>
                <div class="card-body">
                    <i class="fas fa-at fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="../admin/datums_wijzigen">
            <div class="card admin">
                <div class="card-header"><h6>Set dates</h6></div>
                <div class="card-body">
                    <i class="fas fa-clock fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto">
        <a href="../wishes/beherenWishes">
            <div class="card admin">
                <div class="card-header"><h6>Manage wishes</h6></div>
                <div class="card-body">
                    <i class="fas fa-hands fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
</div>

