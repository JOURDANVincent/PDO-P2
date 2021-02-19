<?php

    // élément requis
    require dirname(__FILE__).'/../models/Patient.php';
    require dirname(__FILE__).'/../utils/regex.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {


        // appel du formulaire patient
        require dirname(__FILE__).'/../functions/form_traitment.php';
        

        // ---------------------------------------------- envoie info vers DB ----------------------------------------------------//

        if (empty($form_error)) {

            // on crée le nouvel objet patient
            $new_patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);

            // on envoi en BDD
            if ($new_patient->add_new_patient()) {

                // affichage profil et message success !
                $last_id = Patient::get_last_id();
                header('location: index.php?ctrl=3&id='.$last_id->id.'&lastctrl=1&alert=1');
                
            } else {

                // bdd alert message
                $alert_type = 'danger';
                $alert_msg = 'L\'adresse email '.$mail.' est déjà enregistré en base de données..';
            }
            
        } 

    } 

    // -----------------------------------------------------------
    // affichage de la vue ajout-patient
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page ajouter patient
    include dirname(__FILE__).'/../views/ajout-patient.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue ajout-patient
    // -----------------------------------------------------------

?>



