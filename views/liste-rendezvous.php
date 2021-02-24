
<!-- Start Main Row -->
<div id='mainContent' class="row h-100 justify-content-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/patientRDV.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div class="col-12 col-lg-7 justify-content-center bg22 bdc1 bl8 sha1 mb-5">

        <h4 class="txtW text-center my-3">Liste des rendez-vous</h4>

        <table class="table table-hover text-center">

            <thead>
                <tr class="txt1">
                <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($appointments_list as $appointment) :

                    // on déclare une variable $date et une $hour
                    $date = date('d/m/Y', strtotime($appointment->dateHour));
                    $hour = date('H:i', strtotime($appointment->dateHour)); ?>
                    
                    <tr>
                        <td onclick="location.href='index.php?ctrl=7&idP=<?= $appointment->idPatients ?>&idA=<?= $appointment->idAppointments ?>'">
                            <img src="assets/icon/setPatientProfil.svg" style="max-height:20px;" alt="icone modifier">
                        </td>
                        <td><?= $a ?></td>
                        <td><?= $date ?></td>
                        <td><?= $hour ?></td>
                        <td><?= $appointment->lastname ?></td>
                        <td><?= $appointment->firstname ?></td>
                        <td><?= $appointment->mail ?></td>
                        
                        <!-- <td> -->
                            <!-- <button data-id="<?= $appointment->idAppointments ?>" class="delAppointmentBtn" type="button" data-toggle="modal" data-target="#delAppointmentModal"> -->
                        <td data-id="<?= $appointment->idAppointments ?>" class="delAppointmentBtn">
                        <!-- <td onclick="location.href='index.php?ctrl=6&del_idA=<?= $appointment->idAppointments ?>'"> -->
                            <img src="assets/icon/delete.svg" style="max-height:20px;" alt="icone supprimer">
                            <!-- </button> -->
                        </td>
                        
                    </tr>

                <?php $a++; endforeach ?>
            </tbody>

        </table>

        <div class="text-center mb-3 txt1">
            <?php if (($sql_offset - 10) >= 0) : ?>
                <a href="index.php?ctrl=6&limit=10&offset=<?= ($sql_offset - 10) ?>"><span class="mx-2">précédent</span></a>
            <?php endif ?>
            <?php if (($sql_offset + 10) < $total_appointments) : ?>
                <a href="index.php?ctrl=6&limit=10&offset=<?= ($sql_offset + 10) ?>"><span class="mx-2">suivant</span></a>
            <?php endif ?>
                <span class="mx-2"><?= $total_appointments.' rendez-vous' ?></span>
        </div>

    </div>


    <!-- MODAL CONFIRM DELETE -->

    <!-- Modal -->
    <div class="modal fade bg22 bl8" id="delAppointmentModal" tabindex="-1" aria-labelledby="delAppointmentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg22 bl8 bdc1 sha1">
        <div class="modal-header">
            <h5 class="modal-title txtW" id="delAppointmentModal">Suppression de rendez-vous</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body txtW">
            Confirmez-vous la suppression rendez-vous ?!
        </div>
        <div class="modal-footer">
            <button id="delConfirm" type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button class="btn bg1">Confirmer</button>
        </div>
        </div>
    </div>
    </div>

    <!-- MODAL CONFIRM DELETE -->

</div>










