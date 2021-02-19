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
        header('location: index.php?ctrl=6&alert=4');
    }

    // bbd: récupère liste des patients
    $patients_list = Patient::get_patients_list(0, $total_patients);

    if (!$patients_list) {

        // si erreur on renvoi sur liste des appointments
        header('location: index.php?ctrl=6&alert=4');
    }


    // traitement de l'id et idPatients envoyé
    $idA = intval(trim(filter_input($post, 'idA', FILTER_SANITIZE_NUMBER_INT)));
    $idP = intval(trim(filter_input($post, 'idP', FILTER_SANITIZE_NUMBER_INT)));

    $old_appointment = Appointment::get_appointment_data($idA,$idP);
    

    if (!$old_appointment) {

        // si erreur on renvoi sur liste des patients
        header('location: index.php?ctrl=6&alert=9');
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

        // traitement de l'idPatients
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

            // on récupere l'id rdv à mettrre à jour
            $old_id = $old_appointment->idAppointments;

            // on crée le nouvel objet patient
            $update_appointment = new Appointment($dateHour, $idPatients, $old_id);

            // on envoi en BDD
            if ($update_appointment->update_appointment()) {
                
                // affichage rendez-vous et message success !!!
                header('location: index.php?ctrl=7&alert=11&idP='.$idPatients.'&idA='.$old_id.'');
                
            } else {

                // affichage bdd alert error message 
                $alert_type = 'danger';
                $alert_msg ='Un rendez-vous le '.date('d-m-Y', strtotime($dateHour)).' à '.date('H:i', strtotime($dateHour)).' est déjà enregistré en base de données..';

            }
        }
    } 
    

    // -----------------------------------------------------------
    // affichage de la vue modifier-rendez-vous
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page modifier rendez-vous
    include dirname(__FILE__).'/../views/modifier-rendezvous.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue modifier-rendez-vous
    // -----------------------------------------------------------

?>



