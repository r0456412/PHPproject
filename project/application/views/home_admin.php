<?php
/**
 * @file home_admin.php
 * 
 * View die de administrator te zien krijgt nadat hij/zij is ingelogd
 * - Krijgt $gebruiker-object binnen (gebruikt voor persoonlijke begroeting)
 * - Op deze pagina wordt er gebruik gemaakt van tooltips
 * - Gebruikt Boodstrap cards om alle functionaliteiten van de admin duidelijk weer te geven
 */
?>

<?php
if ($gebruiker != null) {
    echo '<b>' . $gebruiker->voornaam . ', make all nesecary changes with the links below.</b>';
}
?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<div class="row">
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Here you can make the agenda">
        <a href="../Planning/planning" >
            <div class="card admin">
                <div class="card-header"><h6>Create agenda</h6></div>
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Here you can mail to every user in the system">
        <a href="../Mail/mail">
            <div class="card admin">
                <div class="card-header"><h6>Mail</h6></div>
                <div class="card-body">
                    <i class="fas fa-envelope fa-5x"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mx-auto" data-toggle="tooltip" data-placement="bottom" title="Here you can see all users, the submitted wishes, ...">
        <a href="../Admin/usersBeheren">
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
        <a href="../mailsjabloon/mailsjabloon">
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

