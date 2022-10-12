<?php
    
    //NE PAS CHANGER
    $input = file_get_contents($argv[1]);
    //-----------------------------------
    
    //TODO faire les modifications pour nettoyer l'input
    $xssSafe=htmlspecialchars($input);
    
    //NE PAS CHANGER
    echo $xssSafe;
    //-----------------------------------
?>