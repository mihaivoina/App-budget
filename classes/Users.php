<?php

class User {

    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $adress;

    public static function All($email_post, $password_post)
    {

        $sql = "
        SELECT  `id`,
                `email`,
                `first_name`,
                `last_name`,
                `password`,
                `adress`
        FROM `users`
        WHERE `email` = '".$email_post."' AND `password` = '".$password_post."';";

        $list = Database::connect()->select($sql);

        if($list === false){
            $users = false;
            return $users;
        }

        $user = new User;

        $user->id = $list[0]['id'];
        $user->email = $list[0]['email'];
        $user->first_name = $list[0]['first_name'];
        $user->last_name = $list[0]['last_name'];
        $user->password = $list[0]['password'];
        $user->adress = $list[0]['adress'];
       
        return $user;

    }

    public static function check($email_post){
        $sql = "SELECT `email`
                    FROM `users`
                    WHERE `email` = '".$email_post."';";

        $list = Database::connect()->select($sql);

        if($list === false ){
            $user = new User;
    
            $user->email = $email_post;
           
            return $user;
        }
        $user = false;
        return $user;
    }

    public function save(){
        $sql = "INSERT INTO `users` (`email`, `first_name`, `last_name`, `password`, `adress`) 
            VALUES ('".$this->email."', '".$this->first_name."', '".$this->last_name."', '".$this->password."', '".$this->adress."');";

        Database::connect()->insert($sql);
    }

}

?>