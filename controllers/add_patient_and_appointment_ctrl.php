<?php

    // élément requis
    require_once dirname(__FILE__).'/../models/Patient.php';
    require_once dirname(__FILE__).'/../models/Appointment.php';
    require_once dirname(__FILE__).'/../utils/regex.php';


    // récuper date et heur actuelle
    $actual_date = implode('T',explode(' ', date('Y-m-d H:i')));


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {


        require_once dirname(__FILE__). '/../functions/form_traitment.php';

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
            $new_patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);

            // on crée le nouvel objet patient
            $new_appointment = new Appointment($dateHour, $idPatients);

            // appel méthode statique
            $add_patient_data = Patient::add_patient_and_appointment($new_patient, $new_appointment);

            // on envoi en BDD
            if ($add_patient_data !== false) {

                // affichage profil et message success !
                $last_id = Patient::get_last_id();
                header('location: index.php?ctrl=3&id='.$last_id->id.'&lastctrl=9&alert=1');
                
            } else {

                echo 'error';die;
                if($new_patient == false) {

                    // bdd alert message
                    $alert_type = 'danger';
                    $alert_msg = 'L\'adresse email '.$mail.' est déjà enregistré en base de données..';
                
                } else {

                    // affichage bdd alert error message 
                    $alert_type = 'danger';
                    $alert_msg ='Un rendez-vous le '.$date.' à '.$hour.' est déjà enregistré en base de données..';
                }
                
            }

        } 

    } 



    // -----------------------------------------------------------
    // affichage de la vue modifier-rendez-vous
    // -----------------------------------------------------------

    // appel du header
    require dirname(__FILE__).'/../views/templates/header.php';

    // appel de la page modifier rendez-vous
    include dirname(__FILE__).'/../views/ajout-patient-rendezvous.php';

    // appel du footer
    require dirname(__FILE__).'/../views/templates/footer.php';

    // -----------------------------------------------------------
    // affichage de la vue modifier-rendez-vous
    // -----------------------------------------------------------

?>