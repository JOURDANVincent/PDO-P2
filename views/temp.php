<?php

<div class="col-6 list-group"> 

        <h1 class="txt1 text-center">Liste des patients</h1>

        <?php

            foreach($patients_list as $patient) { ?>

            <div class="list-group-item bl8"><?= '#'.$patient->id .' '. $patient->lastname.' '.$patient->firstname ?></div>

        <?php } ?>
        
</div>


// insérer le nouveau patient
$sql = "INSERT INTO `patients` 
(lastname, firstname, birthdate, phone, mail)
VALUES (?, ?, ?, ?, ?)";

// préparation de la requête
$sth = $this->_pdo->prepare($sql);

// association des marqueurs nominatif via méthode bindvalue
$sth->bindValue(1, $this->_lastname, PDO::PARAM_STR);
$sth->bindValue(2, $this->_firstname, PDO::PARAM_STR);
$sth->bindValue(3, $this->_birthdate, PDO::PARAM_STR);
$sth->bindValue(4, $this->_phone, PDO::PARAM_STR);
$sth->bindValue(5, $this->_mail, PDO::PARAM_STR);


return ($sth->execute() ? true : false);
                if($sth->execute()){
                    return true;
                } else {
                    return false;
                }


    // association des paramètres
$sth->bindValue(':m', $this->_mail, PDO::PARAM_STR);   

// envoie de la requête
$sth->execute();