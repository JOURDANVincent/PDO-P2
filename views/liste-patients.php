
<!-- Start Main Row -->
<div id='mainContent' class="row h-100 justify-content-center">

    <img id="wall" class="img-fluid text-center" src="assets/img/crazyPatient.jpg" alt="Photo du chu d'amiens">

    <?php if(!empty($alert_msg)) : ?>
        <div class="col-12 alert alert-<?= $alert_type ?? 'danger' ?> alert-dismissible align-self-start">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $alert_msg ?>
        </div>
    <?php endif ?>

    <div class="col-12 col-lg-8 justify-content-center bg22 bdc1 bl8 sha1">

        <h4 class="txtW text-center my-3">Liste des patients</h4>

        <table class="table table-hover">

            <thead>
                <tr class="txt1">
                <th scope="col"></th>
                    <th scope="col text-center">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Anniversaire</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $a = !empty($sql_offset) ? ($sql_offset + 1) : 1 ; 
                
                    foreach($patients_list as $patient) :
                        
                    // on réécrit la date (jj-mm-aaaa)
                    $patient->birthdate = date('d/m/Y', strtotime($patient->birthdate)); ?>

                    <tr>
                        <td onclick="location.href='index.php?ctrl=3&id=<?= $patient->id ?>'">
                            <img style="max-width:20px;" src="assets/icon/setPatientProfil.svg" alt="icon modifier">
                        </td>
                        <td class=""><?= $a ?></td>
                        <td><?= $patient->lastname ?></td>
                        <td><?= $patient->firstname ?></td>
                        <td><?= $patient->birthdate ?></td>
                        <td><?= $patient->phone ?></td>
                        <td><?= $patient->mail ?></td>
                        <td data-id="<?= $patient->id ?>" class="delPatientBtn">
                            <img style="max-width:20px;" src="assets/icon/delete.svg" alt="icon supprimer">
                        </td>
                    </tr>

                <?php $a++; endforeach ?>
            </tbody>

        </table>
        
        <?php if (empty($patient_search)) : ?>
        <div class="text-center mb-3 txt1">
            <?php if (($sql_offset - 10) >= 0) : ?>
                <a href="index.php?ctrl=2&limit=10&offset=<?= ($sql_offset - 10) ?>&search=<?= $search ?>"><span class="mx-2">précédent</span></a>
            <?php endif ?>   
            <?php if (($sql_offset + 10) < $total_patients) : ?>
                <a href="index.php?ctrl=2&limit=10&offset=<?= ($sql_offset + 10) ?>&search=<?= $search ?>"><span class="mx-2">suivant</span></a>
            <?php endif ?> 
            <span class="mx-2"><?= $total_patients.' patients' ?></span>
        </div>
        <?php endif ?>

    </div>

</div>








