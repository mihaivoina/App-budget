<?php

$success = [];
$eroare = null;

$email_post = null;
$password_post = null;

// verifica daca uitlizatorul a trimis date catre server prin post

if(isset($_POST['login'])){

    //se colecteaza datele din formular

    $email_post = filtru($_POST['email']);
    $password_post = filtru($_POST['password']);

    if(in_array(false,$success) === false){

        //se face select in daza de date acolo unde emailul utilizatorului si parola se potrivesc cu ce s-a retinut din formulare
    
        $user = User::All($email_post, $password_post);

        if($user !== false){
            
            //se creaza variabilele de sesiune

            $_SESSION['id'] = $user->id;
            $_SESSION['email'] = $user->email;
            $_SESSION['first_name'] = $user->first_name;
            $_SESSION['last_name'] = $user->last_name;
            $_SESSION['password'] = $user->password;
            $_SESSION['adress'] = $user->adress;

                header('location: index.php');

        } 
        else{
            $eroare = '<div class="eroare">Acest utilizator nu exista in baza de date, mai incearca o data.</div>';
        }
    
    }


}

// Database::$connexion->close();



?>
