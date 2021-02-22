<?php

    // élément requis
    require_once dirname(__FILE__).'/../models/Appointment.php';


    // ---------------------- suppression du patient ----------------------------//

    // traitement du rendez-vous à supprimer
    $delA = intval(trim(filter_input(INPUT_GET, 'del_idA', FILTER_SANITIZE_NUMBER_INT)));

    if ($delA !== 0) {

        // demande de suppression
        $del_appointment = Appointment::del_appointment($delA);

        if (!$del_appointment) {

           // affichage liste de rdv et message erreur 
            header('location: index.php?ctrl=6&alert=14');
        }

        // affichage liste de rdv et message confirmation
        header('location: index.php?ctrl=6&alert=15');

    }

    // ---------------------- suppression du patient ----------------------------//


    // récupère le nombre total de patient
    $total_appointments = Appointment::get_total_appointments();

    // traitement de limit pour gérer l'affichage
    $sql_limit = intval(trim(filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_NUMBER_INT)));
    if ($sql_limit <= 10) {
        $sql_limit = 10;
    } else {
        $sql_limit = 10;
    }

    // traitement de offset pour gérer l'affichage
    $sql_offset = intval(trim(filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_NUMBER_INT)));
    if($sql_offset <= 0) {
        $sql_offset = 0;
    } else if ($sql_offset >= ($total_appointments)) {
        $sql_offset = $sql_offset - $sql_limit;
    } 


    // bbd: récupère liste des rendez-vous
    $appointments_list = Appointment::get_appointments_list($sql_offset, $sql_limit);

    if (!$appointments_list || !is_array($appointments_list)) {

        // affichage accueil et message d'erreur
        header('location: index.php?alert=10');
    }

    // incrémentation du numéro de liste
    $a = $sql_offset + 1;


    // -----------------------------------------------------------
    // affichage de la vue liste des rendez-vous
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page ajouter patient
    include dirname(__FILE__).'/../views/liste-rendezvous.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue liste des rendez-vous
    // -----------------------------------------------------------

?>



