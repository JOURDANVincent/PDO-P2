<?php

    // élément requis
    require dirname(__FILE__).'/../models/Appointment.php';


    // traitement de l'id et idPatients envoyé
    $id = intval(trim(filter_input($post, 'idA', FILTER_SANITIZE_NUMBER_INT)));
    $idPatients = intval(trim(filter_input($post, 'idP', FILTER_SANITIZE_NUMBER_INT)));
    $lastctrl = intval(trim(filter_input(INPUT_GET, 'lastctrl', FILTER_SANITIZE_NUMBER_INT)));


    // bdd : récupère les données du rdv en fonction de l'id envoyé
    $appointment_data = Appointment::get_appointment_data($id, $idPatients);

    if (!$appointment_data) {

        // si erreur on renvoi sur liste des patients
        header('location: index.php?alert=10');
    }

    // on réécrit la date pour le value d'input date
    $date = date('d-m-Y', strtotime($appointment_data->dateHour));
    $hour = date('H:i', strtotime($appointment_data->dateHour));


    // -----------------------------------------------------------
    // affichage de la vue rendez-vous
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page afficher rendez-vous
    include dirname(__FILE__).'/../views/rendezvous.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue rendez-vous
    // -----------------------------------------------------------


    
?>



