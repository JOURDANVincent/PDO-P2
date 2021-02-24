<!-- Start Main Row -->
<div class="row h-100 justify-content-center align-items-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/patientRDV.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div id="mainContent" class="form-group col-4 bdc1 bg22 bl8 sha1 bgForm ">

        <!------------------------------------------ nouveau patient ------------------------------------------------>

        <form action="index.php" method="POST">

            <fieldset class="mb-2">

                <legend class="txtW py-3 text-center">Nouveau rendez-vous</legend>

                <label class="txt1 mb-3">Sélectionner du patient</label>
                <div id="patientSelect" class="form-check mb-4 bg8 bdc1 pl-4 py-3">

                    <?php foreach($patients_list as $patient) : ?>
                        <div class="d-flex">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                id="id<?= $patient->id ?>"
                                name="idPatients" 
                                value="<?= $patient->id ?>"
                                required>
                            <label 
                                class="form-check-label" 
                                for="id<?= $patient->id ?>">
                                <?= $patient->lastname.' '.$patient->firstname.' | '.$patient->mail ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                    
                </div>
                    
                <label class="txt1">Sélection date et heure du rendez-vous</label>
                <input 
                    class="form-control <?= !empty($alert_msg) ? 'bgError' : '' ?> mb-2" 
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
                <input type="hidden" name="ctrl" value="5">
                <input class="btn bg1 bdc1 px-5" type="submit" value="ajouter">
            </div>  

        </form>

    </div>

</div>