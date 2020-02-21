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
                require 'scripts/login.php';
        ?>
            <div class="login-body">
                <div class="login-page">
                    <div class="form">
                        <?php echo $eroare; ?>
                        <!-- LOGIN -->
                        <form class="login-form" action="" method="POST">
                            <input type="email" placeholder="email" name="email" required>
                            <input type="password" placeholder="parola" name="password" required>
                            <button type="submit" name="login">login</button>
                            <p class="message">Nu ai cont? <a href="./index.php?page=create-acc">Creaza un cont</a></p>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body> 
</html>
