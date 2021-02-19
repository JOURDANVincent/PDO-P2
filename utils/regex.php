<?php

    // déclaration des constantes REGEX
    define('R_STR', "/^[a-zA-Z \sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ-]{2,20}$/");
    define('R_BREW', "/^[a-zA-Z \_]{2,20}$/");
    define('R_INT', "/^[0-9]{1,2}$/");
    define('R_PASSWD', "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/");
    define('R_MAIL', "/^[\w-\.]+@([\w-]+\.)+\.[\w-]{2,6}$/");
    define('R_DATE', "/^\d{4}-\d{2}-\d{1,2}$/");
    define('R_DATETIME', "/^\d{4}-\d{2}-\d{1,2}T[0-2][0-9]:[0-5][0-9]$/");
    define('R_PHONE', "/^(0|\+33)[1-9]( *[0-9]{2}){4}$/");
    
?> 