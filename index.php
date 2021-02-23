<?php


    // requis: fichier init.php / server_ctrl
    require_once dirname(__FILE__).'/utils/init.php';
    require_once dirname(__FILE__).'/utils/alert.php';

    
    if (($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ctrl'])) || ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['ctrl']))) {

        
        $ctrl = intval(trim(filter_input($post, 'ctrl', FILTER_SANITIZE_NUMBER_INT)));

        switch($ctrl) {

            case 1:
                //appel du controller de formulaire pour patient
                require dirname(__FILE__).'/controllers/add_patient_ctrl.php';
                break;

            case 2:
                // appel du formualaire ajout de patient
                require dirname(__FILE__).'/controllers/patients-list_ctrl.php';
                break;

            case 3:
                // appel du formualaire ajout de patient
                require dirname(__FILE__).'/controllers/patient-profil_ctrl.php';
                break;

            case 4:
                //appel du controller de formulaire pour patient
                require dirname(__FILE__).'/controllers/update_patient_ctrl.php';
                break;

            case 5:
                //appel du controller de formulaire pour rendez-vous
                require dirname(__FILE__).'/controllers/add_appointment_ctrl.php';
                break;

            case 6:
                //appel du controller liste des rendez-vous
                require dirname(__FILE__).'/controllers/appointments-list_ctrl.php';
                break;

            case 7:
                //appel du controller afficher fiche rendez-vous
                require dirname(__FILE__).'/controllers/appointment_data_ctrl.php';
                break;

            case 8:
                //appel du controller modifier rendez-vous
                require dirname(__FILE__).'/controllers/update_appointment_ctrl.php';
                break;

            case 9:
                //appel du controller modifier rendez-vous
                require dirname(__FILE__).'/controllers/add_patient_and_appointment_ctrl.php';
                break;

            default:
                // retour page d'accueil
                header('location: index.php');
                break;
        }
        

    } else {

        // appel du header
        require dirname(__FILE__).'/views/templates/header.php';

        // appel de la page d'accueil
        include dirname(__FILE__).'/views/home.php';

        // appel du footer
        require dirname(__FILE__).'/views/templates/footer.php';
    };

    

    
