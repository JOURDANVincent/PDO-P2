<!-- Start Main Row -->
<div class="row h-100 justify-content-center align-items-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/doctor.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div id="mainContent" class="form-group col-12 col-lg-5 bdc1 bl8 sha1 bgForm px-4">

        <!------------------------------------------ nouveau patient ------------------------------------------------>

        <form action="" method="POST">

            <fieldset class="mb-2">

                <legend class="txt1 py-3 text-center">Nouveau patient</legend>

                <div class="form-group mb-3">
                    <label class="txt1">Informations du patient</label>
                    <div class="form-inline">
                        <input 
                            class="col form-control <?= (!empty($form_error['lastname'])) ? 'bgError' : '' ;?> mb-2 mr-3" 
                            type="text" 
                            name="lastname" 
                            placeholder="nom" 
                            value="<?= $lastname ?? '' ;?>"
                            pattern ="^[a-zA-Z\-][^0-9]{2,}$" 
                            title="2 lettres mini / aucun chiffre ou caractères spéciaux"
                        >
                        <input 
                            class="col form-control <?= (!empty($form_error['firstname'])) ? 'bgError' : '' ;?> mb-2" 
                            type="text" 
                            name="firstname" 
                            placeholder="prénom" 
                            value="<?= $_POST['firstname'] ?? '' ;?>"
                            required pattern ="^[a-zA-Z\-][^0-9]{2,}$" title="2 lettres mini / aucun chiffre ou caractères spéciaux"
                        >
                    </div>
                    <div class="form-inline">
                        <div class="col txt1 mb-2 mt-0 pl-3"><?= $form_error['lastname'] ?? '' ;?></div>
                        <div class="col txt1 mb-2 mt-0 pl-3"><?= $form_error['firstname'] ?? '' ;?></div>
                    </div>
                    
                    <div class="form-inline">
                        <input 
                            class="form-control col-4 <?= (!empty($form_error['birthdaybirthdate'])) ? 'bgError' : '' ;?> mb-2 mr-3" 
                            type="date" 
                            name="birthdate" 
                            placeholder="jj-mm-aaaa" 
                            value="<?= $_POST['birthdate'] ?? '' ;?>"
                            required  
                            title="format jj-mm-aaaa (ex: 20/12/1983)"
                        > 
                        <input class="form-control col <?= (!empty($form_error['phone'])) ? 'bgError' : '' ;?> mb-2" 
                            type="phone" 
                            name="phone" 
                            placeholder="téléphone" 
                            value="<?= $_POST['phone'] ?? '' ;?>"
                            pattern="^(0|\+33)[1-9]( *[0-9]{2}){4}$" 
                            title="ex: 06-12-34-56-78"
                        >
                    </div>
                    <div class="form-inline">
                        <div class="txt1 col mb-2 mt-0"><?= $form_error['birthdate'] ?? '' ;?></div>
                        <div class="txt1 col mb-2 mt-0 pl-3"><?= $form_error['phone'] ?? '' ;?></div>
                    </div>
                    
                    <input 
                        class="form-control <?= !empty($alert_msg) ? 'bgError' : '' ;?> mb-2" 
                        type="email" name="mail" 
                        placeholder="email" 
                        value="<?= $_POST['mail'] ?? '' ;?>"
                        required pattern="^[\w-\.]+@([\w-]+\.)+\.[\w-]{2,5}$" 
                        title="ex: contact@moi.fr"
                    >
                    <div class="txt1 mb-2 mt-0 pl-3"><?= $form_error['mail'] ?? '' ;?></div>
                </div>

                <div class="form-group col-6 pl-0">
                    <label class="txt1">Sélection date et heure du rendez-vous</label>
                    <input 
                        class="form-control <?= !empty($alert_msg) ? 'bgError' : '' ;?> mb-2" 
                        type="datetime-local" 
                        min="<?= $actual_date ?>" 
                        max=""
                        name="dateHour" 
                        placeholder="date et heure" 
                        value="<?= $dateHour ?? $actual_date ;?>"
                        required 
                    >
                    <div class="mb-2 mt-0 pl-3"><?= $form_error['dateHour'] ?? '' ;?></div>
                </div>

            </fieldset>  

            <!------------------------------------------ submit ------------------------------------------------>
            <div class="text-center my-4">
                <input type="hidden" name="ctrl" value="9">
                <input class="btn bg1 bdc1 px-5" type="submit" value="ajouter">
            </div>  

        </form>

    </div>

</div>