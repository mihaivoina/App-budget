<?php

    if(isset($_GET['id'])){

        Cost::delete($_GET['id']);
    }

    header('Location: ./index.php?page=show-all');

