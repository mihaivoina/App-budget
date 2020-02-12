<?php

$item = array_map('trim', $_POST);

if(empty($_POST['description']) || empty($_POST['value'])){
    header('Location: ./index.php?page=show-all');
    return;
} elseif ($_POST['select'] == '+'){
    $income = new Income;
    $income->description = $item['description'];
    $income->value = $item['value'];

    $income->save();
    header('Location: ./index.php?page=show-all');

} else {
    $cost = new Cost;
    $cost->description = $item['description'];
    $cost->value = $item['value'];

    $cost->save();
    header('Location: ./index.php?page=show-all');
}

