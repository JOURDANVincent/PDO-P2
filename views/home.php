<?php

    // éléments requis
    require_once dirname(__FILE__).'/../utils/alert.php';

?>

<!-- Start Main Row -->
<div class="row h-100 justify-content-center align-items-center">

    <img id="wall" class="img-fluid " src="assets/img/generalHospital.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div id="homeMessage" class="col-12 bl8 bdcup1 py-3 text-center align-self-end">
        <h1 class="txt1">HOSPITALE 2N</h1>
    </div>

</div>

