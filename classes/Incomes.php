<?php

class Income {
    
    public $id;
    public $users_id;
    public $description;
    public $value;
    public $created_at;
    public $user_first_name;
    public $user_last_name;
    public $total_income;

    public static function all()
    {
        $incomes_user = [];

        $date = strval(date('m'));


        $sql = "
            SELECT  `incomes`.`id`, 
                    `incomes`.`description`, 
                    `incomes`.`value`, 
                    `incomes`.`created_at`, 
                    `users`.`first_name` AS user_first_name,
                    `users`.`last_name` AS user_last_name
            FROM `incomes`, `users`
            WHERE `incomes`.`users_id`=`users`.`id`;";

        $list = Database::connect()->select($sql);

        if($list === false){
            return $incomes_user;
        }

        foreach($list as $item){
            $income_user = new Income;
            $income_user->id = $item['id'];
            $income_user->description = $item['description'];
            $income_user->value = $item['value'];
            $income_user->user_first_name = $item['user_first_name'];
            $income_user->user_last_name = $item['user_last_name'];
            $income_user->created_at = $item['created_at'];

            array_push($incomes_user, $income_user);
        }

        return $incomes_user;
    }


    public function save()
    {
        $sql = "INSERT INTO `incomes` (`users_id`, `description`, `value`) VALUES ('1','". $this->description ."', '". $this->value ."');";

        Database::connect()->insert($sql);
    }

    public static function delete($id)
    {
        return Database::connect()->delete("DELETE FROM `incomes` WHERE `id`=". $id ." ;");
    }


    public static function sum(){

        $sql = "SELECT `incomes`.`value`
        FROM `incomes`, `users`
        WHERE `incomes`.`users_id` = `users`.`id`;";

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
