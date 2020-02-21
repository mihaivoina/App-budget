<?php


function filtru($data){

    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;

}

function isConnected(){

    if(
        isset($_SESSION['id']) &&
        isset($_SESSION['email'])
    ){
        return true;
    } else {
        return false;
    }
}

function validateUserInput(){

    GLOBAL $success;

    array_push($success, false);
    
}