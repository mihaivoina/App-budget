<!DOCTYPE html>
<html lang="ro">
    <head>
        
        <meta charset="UTF-8">
        <title>Budget App</title>
        <link rel="shortcut icon" href="../storage/icon.png" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="./css/account-style.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            body{
            background-image: url('./storage/background.png');
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale; 
        }
        </style>
    </head>
    <body>    
        <?php
            if(isConnected() == false){ 
                require 'scripts/store-acc.php';
        ?>

        <div class="login-body">
            <div class="login-page">
                <div class="form">

                    <!-- CREARE CONT -->

                    <form class="register-form" action="" method="POST">
                        <input type="text" placeholder="nume" name="first_name" required>
                        <input type="text" placeholder="prenume" name="last_name" required>
                        <input type="text" placeholder="adresa" name="adress" required>
                        <input type="email" placeholder="email" name="email" required>
                        <input type="password" placeholder="parola" name="password" required>
                        <button type="submit" name="register">creaza cont</button>
                        <p class="message">Ai deja un cont? <a href="./index.php?page=login">Login</a></p>
                    </form>
                    <?php echo $eroare; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </body> 
</html>
