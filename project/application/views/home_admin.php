<?php
if ($gebruiker != null) {
    echo '<b>' . $gebruiker->voornaam . ', make all nesecary changes with the links below.</b>';
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<div class="row">
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="For making the planning">
        <a href="../Planning/planning" >
            <div class="card admin">
                <div class="card-header"><h6>Create agenda</h6></div>
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Used to mail to guests and lecturers">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Mail</h6></div>
                <div class="card-body">
                    <i class="fas fa-envelope fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Used to see the users and manage them (delete or add)">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Manage users</h6></div>
                <div class="card-body">
                    <i class="fas fa-users fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="To see and ,if needed, change the content of the homepage">
        <a href="../admin/paginaInhoud_wijzigen">
            <div class="card admin">
                <div class="card-header"><h6>Homepage content</h6></div>
                <div class="card-body">
                    <i class="fab fa-safari fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Manage the default partners, delete or add them">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Manage partners</h6></div>
                <div class="card-body">
                    <i class="fas fa-handshake fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Manage the mailtemplates: change, delete or add">
        <a href="#">
            <div class="card admin">
                <div class="card-header"><h6>Mail templates</h6></div>
                <div class="card-body">
                    <i class="fas fa-at fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Set the dates of this years international days">
        <a href="../admin/datums_wijzigen">
            <div class="card admin">
                <div class="card-header"><h6>Set dates</h6></div>
                <div class="card-body">
                    <i class="fas fa-clock fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Manage the wishes you want to give to the guests">
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

