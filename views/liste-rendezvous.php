
<!-- Start Main Row -->
<div id='mainContent' class="row h-100 justify-content-center align-items-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/addPatient.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div class="col-12 col-lg-7 justify-content-center bg8 bdc1 bl8 sha1 mb-5">

        <h4 class="txt1 text-center my-3">Liste des rendez-vous</h4>

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
                        <td onclick="location.href='index.php?ctrl=6&del_idA=<?= $appointment->idAppointments ?>'">
                            <img src="assets/icon/delete.svg" style="max-height:20px;" alt="icone supprimer">
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

</div>








