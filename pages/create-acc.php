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
        <div class="login-body">
            <div class="login-page">
                <div class="form">

                    <!-- CREARE CONT -->

                    <form class="register-form">
                        <input type="text" placeholder="nume">
                        <input type="text" placeholder="prenume">
                        <input type="text" placeholder="adresa">
                        <input type="email" placeholder="email">
                        <input type="password" placeholder="parola">
                        <button type="submit">creaza cont</button>
                        <p class="message">Ai deja un cont? <a href="./index.php?page=login">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body> 
</html>
