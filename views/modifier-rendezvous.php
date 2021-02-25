<!-- Start Main Row -->
<div class="row h-100 justify-content-center align-items-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/patientRDV.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>


    <div id="mainContent" class="form-group col-4 bdc1 bg22 bl8 sha1 bgForm py-3">

        <!------------------------------------------ nouveau patient ------------------------------------------------>

        <form action="" method="POST">

            <fieldset class="mb-2">

                <h1 class="txtW pt-3 text-center">Rendez-vous</h1>

                <label class="txt1 text-center mb-3">Ancien rendez-vous</label>
                <div class="py-2 px-3 bg8 bdc1 bl8">
                    <div>Patient : <?= $old_appointment->lastname.' '.$old_appointment->firstname ?></div>
                    <div>Rendez-vous : <?= $old_appointment->dateHour ?></div>
                </div>

                <label class="txt1 my-3">Modifier patient</label>
                <div id="newPatientSelect" class="form-check mb-4 bg8 bdc1 pl-4 py-3">

                    <?php foreach($patients_list as $patient) : ?>
                        <div class="d-flex">
                            <input required class="form-check-input" type="radio" name="idPatients" value="<?= $patient->id ?>" id="<?= $patient->id ?>">
                            <label class="form-check-label" for="<?= $patient->id ?>">
                                <?= $patient->lastname.' '.$patient->firstname.' | '.$patient->mail ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                    
                </div>
                    
                <label class="txt1 mb-0">Modifier date et/ou heure du rendez-vous</label>
                <input 
                    class="form-control <?= (!empty($form_error['dateHour'])) ? 'bgError' : '' ;?> mb-2" 
                    type="datetime-local" 
                    min="<?= $actual_date ?>" 
                    max=""
                    name="dateHour" 
                    placeholder="date et heure" 
                    value="<?= $dateHour ?? $actual_date ;?>"
                    required 
                >
                <div class="regexAlert mb-2 mt-0 pl-3"><?= $form_error['dateHour'] ?? '' ;?></div>
 
            </fieldset>  

            <!------------------------------------------ submit ------------------------------------------------>
            <div class="text-center my-4">
                <input type="hidden" name="ctrl" value="8">
                <input type="hidden" name="idA" value="<?= $old_appointment->idAppointments ?>">
                <input type="hidden" name="idP" value="<?= $old_appointment->idPatients ?>">
                <a href="index.php?ctrl=7&idA=<?= $old_appointment->idAppointments ?>&idP=<?= $old_appointment->idPatients ?>" class="btn bgW mr-3 px-4">Retour</a>
                <input class="btn bg1 bdc1 px-4" type="submit" value="mise à jour">
            </div>  

        </form>

    </div>

</div>