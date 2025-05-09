<?php
$message1 = "Inserisci la password: ";
$message2 = "Riprova.";
$password = readline(prompt: "$message1\n");
$containsNumber = false;
$containsLowercase = false;
$containsSpecial = false;

//check password
function checkPassword($password){; 
    $errors = [];

    //password almeno 8 caratteri
    if(strlen($password) > 8) {
        echo "La password è lunga abbastanza.\n";
    }else{
        $errors[] = "La password è troppo corta.\n";
    };
    
    //contenere almeno un numero
    for($i = 0; $i < strlen($password); $i++) {
        if(is_numeric($password[$i])) {
           $containsNumber = true;
           break;
        };
    };
    if ($containsNumber){
        echo "La password contiene almeno un numero.\n";
    }else{
        $errors[] = "La password non contiene numeri.\n";
    }

    //contenere almeno una maiuscola
    for($i = 0; $i < strlen($password); $i++) {
        if(ctype_lower($password[$i])) {
            $containsLowercase = true;
            break;
        };
    };
    if($containsLowercase){
        echo "La password contiene almeno una lettera minuscola.\n";
        }else{
            $errors[] = "La password non contiene lettere minuscole.\n";
    }
    
    //contenere almeno un carattere speciale
    for($i = 0; $i < strlen($password); $i++) {
        if(!ctype_alnum($password[$i])) {
            $containsSpecial = true;
            break;
        }
    };
    if($containsSpecial){
        echo "La password contiene almeno un carattere speciale.\n";
    }else{
        $errors[] = "La password non contiene caratteri speciali.\n";
    };

    return $errors;
}

//risultato
$errors = checkPassword($password);

if(empty($errors)){
    echo "Password corretta.\n";
}else{
    echo "Password non corretta.\n";
    foreach($errors as $error) {
        echo $error;
    };
    
    $password = readline(prompt: "$message2\n");
    $errors = checkPassword($password);
};


?>
