<?php

    if(isset($_GET['id'])){

        Income::delete($_GET['id']);
    }

    header('Location: ./index.php?page=show-all');

