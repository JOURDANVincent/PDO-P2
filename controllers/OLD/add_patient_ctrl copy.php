<?php

    // élément requis
    require dirname(__FILE__).'/../models/Patient.php';
    require dirname(__FILE__).'/../utils/regex.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

        
        // type de formualire à contrôler
        if (!empty($_POST['form'])) {
            $form = intval(trim(filter_input(INPUT_POST, 'form', FILTER_SANITIZE_NUMBER_INT)));
        }

        // id du patient en base
        if (!empty($_POST['id'])) {
            $id = intval(trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT)));
        }

        // appel du formulaire patient
        require dirname(__FILE__).'/../functions/form_traitment.php';
        

        // ---------------------------------------------- envoie info vers DB ----------------------------------------------------//

        if (empty($form_error)) {


            switch($form) {

                case 1: // ajout nouveau patient

                    // on crée le nouvel objet patient
                    $new_patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);

                    // on envoi en BDD
                    if ($new_patient->add_new_patient()) {
                        
                        $bdd_alert = 'nouveau patient: '.$lastname.' '.$firstname.', enregistré en base de données..';
                        // retour page d'accueil
                        header('location: index.php?bdd_alert='.$bdd_alert.'');
                        
                    } else {

                        // bdd alert message
                        $form_error['add_patient'] ='L\'adresse email : '.$mail.' est déjà enregistré en base de données..';

                    }
                    break;


                case 2: // mise à jour des données du patient

                    // on instancie un nouvel objet patient pour update
                    $update_patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail, $id);

                    // on envoi en BDD
                    if ($update_patient->update_patient()) {
                        
                        $bdd_alert = 'Mise à jour des données du patient: '.$lastname.' '.$firstname.', réussie !';
                        // retour page d'accueil
                        header('location: index.php?bdd_alert='.$bdd_alert.'');
                        
                    } else {

                        // bdd alert message
                        $form_error['update_patient'] ='Impossible de mettre à jour les données du patient: '.$lastname.' '.$firstname.' ..';

                    }
                    break;
            }
            
        } 
    } 


    if (!empty($form_error)) {


        // appel du header
        require dirname(__FILE__).'/../views/templates/header.php';

        switch($form) {

            case 1:
                // appel de la page ajouter patient
                include dirname(__FILE__).'/../views/ajout-patient.php';
                break;

            case 2:
                // appel de la page ajouter patient
                include dirname(__FILE__).'/../views/modifier-patient.php';
                break;

        }

        // appel du footer
        require dirname(__FILE__).'/../views/templates/footer.php';

    }
    
?>



