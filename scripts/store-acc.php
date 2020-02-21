<?php

    $success = [];
    $eroare = null;

    $email_post = null;
    $first_name_post = null;
    $last_name_post = null;
    $password_post = null;
    $adress_post = null;

    if(isset($_POST['register'])){
        // colectare date din formular
        $email_post = filtru($_POST['email']);
        $first_name_post = filtru($_POST['first_name']);
        $last_name_post = filtru($_POST['last_name']);
        $password_post = filtru($_POST['password']);
        $adress_post = filtru($_POST['adress']);

        if(in_array(false, $success) === false){
            //se verifica daca userul exista in baza de date
            
            $user = User::check($email_post);
            
            if($user !== false){
                $user = new User;
        
                $user->email = $email_post;
                $user->first_name = $first_name_post;
                $user->last_name = $last_name_post;
                $user->password = $password_post;
                $user->adress = $adress_post;
        
                $user->save();

                $user_log = User::all($email_post, $password_post);


                //se creaza variabilele de sesiune

                $_SESSION['id'] = $user_log->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['first_name'] = $user_log->first_name;
                $_SESSION['last_name'] = $user_log->last_name;
                $_SESSION['password'] = $user_log->password;
                $_SESSION['adress'] = $user_log->adress;

                header('location: index.php');

            }
            else {
                $eroare = '<div class="eroare">Acest email este utilizat, alege altul.</div>';
            }
        }

    }

?>