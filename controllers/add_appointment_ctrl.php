<?php

    // élément requis
    require_once dirname(__FILE__).'/../models/Patient.php';
    require_once dirname(__FILE__).'/../models/Appointment.php';
    require_once dirname(__FILE__).'/../utils/regex.php';


    // récuper date et heur actuelle
    $actual_date = implode('T',explode(' ', date('Y-m-d H:i')));


    // récupère le nombre total de patient
    $total_patients = Patient::get_total_patients();

    if (!$total_patients) {
        // si erreur on renvoi sur liste des appointments
        header('location: index.php?alert=4');
    }
    

    // bbd: récupère liste des patients
    $patients_list = Patient::get_patients_list(0, $total_patients);

    if (!$patients_list) {
        // si erreur on renvoi sur liste des appointments
        header('location: index.php?alert=4');
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

        // traitement de l'id patient
        $idPatients = intval(trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT)));

        // traitement input datetime
        $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_STRING));
        if (!empty($dateHour)) {
            if (!preg_match(R_DATETIME, $dateHour)) {
                $form_error['dateHour'] = 'données invalides';
            }
        } else {
            $form_error['dateHour'] = 'champ obligatoire';
        }   


        // ---------------------------------------------- envoie info vers DB ----------------------------------------------------//

        if (empty($form_error)) {

            $date = date('d-m-Y', strtotime($dateHour));
            $hour = date('H:i', strtotime($dateHour));

            // on crée le nouvel objet patient
            $new_appointment = new Appointment($dateHour, $idPatients);

            // on envoi en BDD
            if ($new_appointment->add_new_appointment()) {

                // affichage rendez-vous et message success !!!
                $last_id = $new_appointment->get_last_insert_id();
                header('location: index.php?ctrl=6&alert=7&id='.$last_id.'');
                
            } else {

                // affichage bdd alert error message 
                $alert_type = 'danger';
                $alert_msg ='Un rendez-vous le '.$date.' à '.$hour.' est déjà enregistré en base de données..';

            }
            
        } 

    } 

    // -----------------------------------------------------------
    // affichage de la vue ajout-rendez-vous
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page ajouter rendez-vous
    include dirname(__FILE__).'/../views/ajout-rendezvous.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue ajout-rendez-vous
    // -----------------------------------------------------------

?>



