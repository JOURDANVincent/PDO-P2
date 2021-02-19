<?php

    // Donnée de connexion
    session_start();

    // déclaration des variables
    $form_error = [];
    $bdd_error = [];

    // tableau titre de page
    $title_page = [
        'Accueil',
        'Ajouter patient',
        'Liste des patients',
        'Profil du patient',
        'Mise à jour du patient',
        'Ajouter rendez-vous',
        'Liste des rendez-vous',
        'Informations du rendez-vous',
        'Mise à jour du rendez-vous'

    ];

    // détection méthode
    $post = ($_SERVER['REQUEST_METHOD'] == 'POST') ? INPUT_POST : INPUT_GET;
