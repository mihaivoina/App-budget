<?php 
    session_start();

    include './classes/Database.php';
    include './classes/Incomes.php';
    include './classes/Costs.php';
    include './classes/Users.php';
    include './scripts/functions.php';
?>
<!DOCTYPE html>
<html lang="ro">
<head>
        <meta charset="UTF-8">
        <title>Budget App</title>
        <link rel="shortcut icon" href="./storage/icon.png" type="image/x-icon" />
        <!-- <link type="text/css" rel="stylesheet" href="css/account-style.css" /> -->
        <link type="text/css" rel="stylesheet" href="css/index-style.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php

            if(isConnected()){

                switch(true){
                    case isset($_GET['page']) === false:
                        include './pages/show-all.php';
                        break;
                    case $_GET['page'] === 'store':
                        include './pages/store.php';
                        break;
                    case $_GET['page'] === 'delete-income':
                        include './pages/delete-income.php';
                        break;
                    case $_GET['page'] === 'delete-cost':
                        include './pages/delete-cost.php';
                        break;
                    case $_GET['page'] === 'signing-off':
                        include './scripts/signing_off.php';
                        break;
                    default:
                        include './pages/show-all.php';
                        break;
                }
            
            } else {

                switch(true){
                    case isset($_GET['page']) === false:
                        include './pages/login-form.php';
                        break;
                    case $_GET['page'] === 'create-acc';
                        include './pages/create-acc.php';
                        break;
                    default:
                        include './pages/login-form.php';
                        break;
                }
            }
        ?>
    </body>
</html>
