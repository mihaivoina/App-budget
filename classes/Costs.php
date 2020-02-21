<?php

class Cost {
    
    public $id;
    public $users_id;
    public $description;
    public $value;
    public $created_at;
    public $user_first_name;
    public $user_last_name;

    public static function all()
    {
        $costs_user = [];

        $date = strval(date('m'));
        $edit_LIKE = "%-".$date."-%";
        $user_id_current = $_SESSION['id'];

        $sql = "
            SELECT  `costs`.`id`, 
                    `costs`.`description`, 
                    `costs`.`value`, 
                    `costs`.`created_at`, 
                    `users`.`first_name` AS user_first_name,
                    `users`.`last_name` AS user_last_name
            FROM `costs`, `users`
            WHERE `costs`.`created_at` LIKE '$edit_LIKE' AND 
                `costs`.`users_id` = `users`.`id` AND 
                `costs`.`users_id` = '".$user_id_current."' ;";

        $list = Database::connect()->select($sql);

        if($list === false){
            return $costs_user;
        }

        foreach($list as $item){
            $cost_user = new Cost;
            $cost_user->id = $item['id'];
            $cost_user->description = $item['description'];
            $cost_user->value = $item['value'];
            $cost_user->user_first_name = $item['user_first_name'];
            $cost_user->user_last_name = $item['user_last_name'];
            $cost_user->created_at = $item['created_at'];

            array_push($costs_user, $cost_user);
        }

        return $costs_user;
    }


    public function save()
    {
        $user_id_current = $_SESSION['id'];

        $sql = "INSERT INTO `costs` (`users_id`, `description`, `value`) VALUES ('".$user_id_current."','". $this->description ."', '". $this->value ."');";

        Database::connect()->insert($sql);
    }

    public static function delete($id)
    {
        return Database::connect()->delete("DELETE FROM `costs` WHERE `id`=". $id ." ;");
    }

    public static function sum(){
        $date = strval(date('m'));
        $edit_LIKE = "%-".$date."-%";
        $user_id_current = $_SESSION['id'];

        $sql = "SELECT `costs`.`value`
        FROM `costs`, `users`
        WHERE `costs`.`created_at` LIKE '$edit_LIKE' AND
            `costs`.`users_id` = `users`.`id` AND
            `costs`.`users_id` = ".$user_id_current.";";

       $list = Database::connect()->sum($sql);

       $qty = 0;

       if(!$list){
           return false;
       }
       foreach($list as $item){

        $qty += $item['value'];

    }

        return $qty;

    }
}
