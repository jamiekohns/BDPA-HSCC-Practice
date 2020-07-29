<?php
namespace Flights\Database;
use PDO;
class User{
    public function login(PDO $db, string $first_name, string $last_name, string $password){

        $query = $db->prepare('SELECT * from `users` join `user_type` on (`user_type`.`id` = `users`.`user_type_id`)
        WHERE `users`.`first_name` = :firstname and `users` . `last_name` = :lastname');

        $query -> execute([
        ':firstname' => $first_name,
        ':lastname' => $last_name,]);
        $login = $query->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $login['password_hash'])){
            return true;
        } else {
            return false;
        }
    }
}

 ?>
