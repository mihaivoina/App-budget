<?php

    if(isConnected()){

        session_unset();
        session_destroy();

        header("location: index.php");
    }

?>