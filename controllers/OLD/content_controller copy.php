<?php

    // élément requis
    require dirname(__FILE__).'/../models/Patient.php';


    // --------------- -------traitement du contenu à afficher ---------------------------//

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['cnt'])) {


        // traitement de la page demandée en fonction de l'id
        $cnt = intval(trim(filter_input(INPUT_GET, 'cnt', FILTER_SANITIZE_NUMBER_INT)));

        if (!empty($_GET['id'])) {

            $id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
        }

        // ###############################" traitement des titres de page à faire ajout utils liste titre + liste erreur, etc ############""

        // appel du header
        require dirname(__FILE__).'/../views/templates/header.php';

        // ######### appel du contenu en fonction id ######### //

        switch ($cnt) {

            case 1:
                // appel du formulaire ajout de patient
                include dirname(__FILE__).'/../views/ajout-patient.php';
                break;

            case 2:
                // bbd: récupère liste de spatients
                $patients_list = Patient::get_patients_list();

                // appel du formualaire ajout de patient
                include dirname(__FILE__).'/../views/liste-patients.php';
                break;

            case 3:
                // bdd : récupère données du patient
                $patient_profil = Patient::get_patient_profil($id);

                // appel du formualaire ajout de patient
                include dirname(__FILE__).'/../views/profil-patient.php';
                break;

            case 4:
                // bdd : récupère données du patient
                $patient_profil = Patient::get_patient_profil($id);
                $patient_profil->birthdate = implode('-', array_reverse(explode('/', $patient_profil->birthdate)));

                // appel du formualaire modifier patient
                include dirname(__FILE__).'/../views/modifier-patient.php';
                break;

            case 5:
                // appel du formulaire ajout de patient
                include dirname(__FILE__).'/../views/ajout-rendezvous.php';
                break;

            default:
                // appel de la page d'accueil
                include dirname(__FILE__).'/index.php';
                break;
    
        }

         // appel du footer
         require dirname(__FILE__).'/../views/templates/footer.php';


    } else {

        // appel du header
        require dirname(__FILE__).'/../views/templates/header.php';

        // appel de la page d'accueil
        include dirname(__FILE__).'/../views/home.php';

        // appel du footer
        require dirname(__FILE__).'/../views/templates/footer.php';
    }

?>



