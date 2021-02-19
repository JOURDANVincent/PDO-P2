<?php

    // élément requis
    require_once dirname(__FILE__).'/../models/Patient.php';
    require_once dirname(__FILE__).'/../models/Appointment.php';

    
    // traitement de l'id envoyé
    $id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
    $lastctrl = intval(trim(filter_input(INPUT_GET, 'lastctrl', FILTER_SANITIZE_NUMBER_INT)));


    // bdd : récupère le profil du patient en fonction de l'id envoyé
    $patient_profil = Patient::get_patient_profil($id);

    if (!$patient_profil || !is_object($patient_profil)) {

        // on renvoi sur liste des patients et affichage error !
        header('location: index.php?ctrl=2&alert=3');
    }

    // bdd : récupère les rendez-vous du patient
    $patient_appointment = Appointment::get_patient_appointment($id);


    if (!$patient_appointment) {

        // on renvoi sur liste des patients et affichage error !
        header('location: index.php?ctrl=2&alert=13');
    }


    // on réécrit la date pour le value d'input date
    $patient_profil->birthdate = date('d/m/Y', strtotime($patient_profil->birthdate));
    

    // -----------------------------------------------------------
    // affichage de la vue profil-patient
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page profil patient
    include dirname(__FILE__).'/../views/profil-patient.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue profil-patient
    // -----------------------------------------------------------

?>



