<?php

// traitement input lastname
$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
if (!empty($lastname)) {
    if (!preg_match(R_STR ,$lastname)) {
        $form_error['lastname'] = 'données invalides';
    }
} else {
    $form_error['lastname'] = 'champ obligatoire';
}

// traitement input firstname
$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
if (!empty($firstname)) {
    if (!preg_match(R_STR ,$firstname)) {
        $form_error['firstname'] = 'données invalides';
    }
} else {
    $form_error['firstname'] = 'champ obligatoire';
}

// traitement input birthdate
$birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING));
if (!empty($birthdate)) {
    if (!preg_match(R_DATE ,$birthdate)) {
        $form_error['birthdate'] = 'données invalides';
    }
} else {
    $form_error['birthdate'] = 'champ obligatoire';
}

// traitement input mail //
$mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
if (!empty($mail)) { 
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $form_error['mail'] = '* L\'email n\'est pas valide';
    }
}
else {
    $form_error['mail'] = '* champ obligatoire';
}

// traitement input phone
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
if (!empty($phone)) {
    if (!preg_match(R_PHONE ,$phone)) {
        $form_error['phone'] = 'données invalides';
    }
} else {
    $form_error['phone'] = 'champ obligatoire';
}