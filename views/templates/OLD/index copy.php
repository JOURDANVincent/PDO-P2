<?php


    // requis: fichier init.php
    require dirname(__FILE__).'/utils/init.php';
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ctrl'])) {


        $ctrl = intval(trim(filter_input(INPUT_POST, 'ctrl', FILTER_SANITIZE_NUMBER_INT)));

        switch($ctrl) {

            case 1:
                //appel du controller de formulaire pour patient
                require dirname(__FILE__).'/controllers/add_patient_ctrl.php';
                break;

            case 2:
                //appel du controller de formulaire pour patient
                require dirname(__FILE__).'/controllers/update_patient_ctrl.php';
                break;

            case 3:
                //appel du controller de formulaire pour rendez-vous
                require dirname(__FILE__).'/controllers/add_appointment_ctrl.php';
                break;

            case 4:
                //appel du controller de formulaire pour rendez-vous
                require dirname(__FILE__).'/controllers/update_appointment_ctrl.php';
                break;

            default:
                // retour page d'accueil
                header('location: index.php');
                break;
        }
        

    } else {

        //appel du controller gestion de contenu
        require dirname(__FILE__).'/controllers/content_controller.php';

    };

    

    
