<?php
$message1 = "Inserisci la password: ";
$message2 = "Riprova.";
$password = readline(prompt: "$message1\n"); 
$errors = [];

//check password
function checkPassword($password){;

    //password almeno 8 caratteri
    if(strlen($password) > 8) {
        echo "La password è lunga abbastanza.\n";
    }else{
        $errors[] = "La password è troppo corta.\n";
    };
    
    //contenere almeno un numero
    for($i = 0; $i < strlen($password); $i++) {
        if(is_numeric($password[$i])) {
            echo "La password contiene almeno un numero.\n";
            break;
        }else{
            $errors[] = "La password non contiene numeri.\n";
        };
    };
    
    //contenere almeno una maiuscola
    for($i = 0; $i < strlen($password); $i++) {
        if(ctype_lower($password[$i])) {
            echo "La password contiene almeno una lettera minuscola.\n";
            break;
        }else{
            $errors[] = "La password non contiene lettere minuscole.\n";
        };
    };
    
    //contenere almeno un carattere speciale
    for($i = 0; $i < strlen($password); $i++) {
        if(!ctype_alnum($password[$i])) {
            echo "La password contiene almeno un carattere speciale.\n";
            break;
        }else{
            $errors[] = "La password non contiene caratteri speciali.\n";
        };
    };
    return $errors;
}

//risultato
if(empty($errors)){
    echo "Password corretta.\n";
}else{
    echo "Password non corretta.\n";
    foreach($errors as $error) {
        echo $error;
        $password = readline(prompt: "$message2\n");
    };
};


?>