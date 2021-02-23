<?php

    // élément requis
    require_once dirname(__FILE__).'/../models/Patient.php';
    require_once dirname(__FILE__).'/../models/Appointment.php';


    // ---------------------- suppression du patient ----------------------------//

    // traitement du patient à supprimer
    $delP = intval(trim(filter_input(INPUT_GET, 'del_idP', FILTER_SANITIZE_NUMBER_INT)));

    if ($delP !== 0) {

        // rechercher rdv avant suppression
        $rdv = Appointment::get_patient_appointment($delP);

        if(is_array($rdv) && !empty($rdv)) {  // si existe des rdv on supprime

            //suppression des rdv trouvés
            $del_rdv = Appointment::del_patient_appointments($delP);

            if (!$del_rdv) {

                // affichage liste de rdv et message error
                header('location: index.php?ctrl=2&alert=14');
            } 

        } else if ($rdv === false) {

            // affichage liste de rdv et message error
            header('location: index.php?ctrl=2&alert=18');

        } 

        // suppression du client
        $del_patient = Patient::del_patient_data($delP);

        if (!$del_patient) {

            // affichage liste de rdv et message error
            header('location: index.php?ctrl=2&alert=16');

        } else {

            // affichage liste de rdv et message success
            header('location: index.php?ctrl=2&alert=17');
        }
        
    }

    // ---------------------- fin suppression du patient ----------------------------//


    // ---------------------- recherche d'un patient ----------------------------//

    // traitement du patient à supprimer
    $search = trim(filter_input($post, 'search', FILTER_SANITIZE_STRING));

    if (!empty($search)) {

        // requete recherche
        $patient_search = Patient::get_patient_search($search);

        if (empty($patient_search) || !$patient_search) {

            // renvoie sur liste avec message erreur
            header('location: index.php?ctrl=2&alert=19');

        } else {

            // on envoie résultat recherche dans $patient_list
            $patients_list = $patient_search;

            // on récupère le nombre patient de la recherche
            $total_patients = count($patients_list);
        }

    } 

    // ---------------------- fin recherche d'un patient ----------------------------//



    // récupère le nombre total de patient
    $total_patients = Patient::get_total_patients();
    

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
    } else if ($sql_offset >= $total_patients) {
        $sql_offset = $sql_offset - $sql_limit;
    } 


    // bbd: récupère liste de spatients
    $patients_list = Patient::get_patients_list($sql_offset, $sql_limit);
    
    if (!$patients_list || !is_array($patients_list)) {

        // si erreur on renvoi sur page d'accueil avec message erreur
        header('location: index.php?&alert=4');
    }    


    // -----------------------------------------------------------
    // affichage de la vue liste des patients
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page liste patient
    include dirname(__FILE__).'/../views/liste-patients.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue liste des patients
    // -----------------------------------------------------------

?>



