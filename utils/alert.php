<?php

    $message_alert = [
        0 => ['type' => 'success', 'msg' => 'Nouveau patient enregistré en base de donnée !'],
        1 => ['type' => 'danger', 'msg' => 'L\'adresse email est déjà enregistrée en base de donnée..'],
        2 => ['type' => 'danger', 'msg' => 'Erreur accès au profil patient..'],
        3 => ['type' => 'danger', 'msg' => 'Erreur accès liste patients..'],
        4 => ['type' => 'success', 'msg' => 'Données du patient misent à jour !'],
        5 => ['type' => 'danger', 'msg' => 'Erreur mise à jour profil du patient'],
        6 => ['type' => 'success', 'msg' => 'Nouveau rendez-vous enregistré en base de données..'],
        7 => ['type' => 'danger', 'msg' => 'Un rendez-vous est déjà enregistré en base de données..'],
        8 => ['type' => 'danger', 'msg' => 'Erreur accès au informations du rendez-vous..'],
        9 => ['type' => 'danger', 'msg' => 'Erreur accès liste rendez-vous..'],
        10 => ['type' => 'success', 'msg' => 'Données du rendez-vous misent à jour !'],
        11 => ['type' => 'danger', 'msg' => 'Erreur mise à jour rendez-vous'],
        12 => ['type' => 'danger', 'msg' => 'Erreur accès au informations du rendez-vous du patient..'],
        13 => ['type' => 'danger', 'msg' => 'Erreur suppression du rendez-vous..'],
        14 => ['type' => 'success', 'msg' => 'Confirmation de suppression de rendez-vous !'],
        15 => ['type' => 'danger', 'msg' => 'Erreur suppression du patient..'],
        16 => ['type' => 'success', 'msg' => 'Confirmation de suppression du patient !'],
        17 => ['type' => 'danger', 'msg' => 'Aucun rendez-vous pour ce patient !'],
        18 => ['type' => 'danger', 'msg' => 'Aucun patient ne correspond à la recherche..']
    ];
    
    $alert = intval(trim(filter_input(INPUT_GET, 'alert', FILTER_SANITIZE_NUMBER_INT)));

    if (!empty($alert)) {

        $alert_msg = $message_alert[$alert-1]['msg'];
        $alert_type = $message_alert[$alert-1]['type'];
    }
