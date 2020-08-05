<?php
namespace Flights\Database;
use PDO;

class User extends Database {
    public function login(string $first_name, string $last_name, string $email, string $password){
        $query = $this->db->prepare('SELECT * from `users` join `user_type` on (`user_type`.`id` = `users`.`user_type_id`)
        WHERE `users`.`first_name` = :firstname and `users` . `last_name` = :lastname and `users` . `email_address` = :email');

        $query -> execute([
        ':firstname' => $first_name,
        ':lastname' => $last_name,
        ':email' => $email]);
        $login = $query->fetch(PDO::FETCH_ASSOC);
    if($login['confirmed'] == 1){
        if(password_verify($password, $login['password_hash'] ?? 'default')){
            $_SESSION['type'] = $login['user_type_id'];
            setcookie('type', $login['user_type_id'], time()+(10 * 365 * 24 * 60 * 60));
            return true;
        }
         else {
            return false;
        }
    } else {
        $_SESSION['confirmed'] = '0';
        $_SESSION['user_info'] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ];
        header('location: sign_in_info.php');
    }
    }
    public function create_user (string $first_name,
        string $last_name,
        string $password_hash,
        string $title,
        string $middle_name = NULL,
        string $suffix = NULL,
        string $dob  = NULL,
        string $gender  = NULL,
        int $phone_number  = NULL,
        string $email_address,
        string $security_question_1  = NULL,
        string $security_question_2  = NULL,
        string $security_question_3  = NULL,
        string $security_answer_1  = NULL,
        string $security_answer_2  = NULL,
        string $security_answer_3  = NULL,
        int $user_type_id,
        string $address  = NULL,
        string $city  = NULL,
        string $state  = NULL,
        int $zip  = NULL,
        string $country  = NULL,
        int $confirmed) {

        if($confirmed == 1){
        $address_query = $this->db->prepare('INSERT INTO `addresses` (address, city, state, zip, country) VALUES
        (:address, :city, :state, :zip, :country)');

        $address_query->execute([
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':zip' => $zip,
            ':country' => $country,
        ]);
    }



        if($confirmed == 1){
        $address_id = $this->db->lastInsertId();
    } else {
        $address_id = NULL;
    }

        $insert_user = $this->db->prepare('INSERT INTO `users`(
            first_name,
            last_name,
            password_hash,
            title,
            middle_name,
            suffix,
            dob,
            gender,
            phone_number,
            email_address,
            security_question_1,
            security_question_2,
            security_question_3,
            security_answer_1,
            security_answer_2,
            security_answer_3,
            user_type_id,
            address_id,
            confirmed) VALUES
            (:first_name,
            :last_name,
            :password_hash,
            :title,
            :middle_name,
            :suffix,
            :dob,
            :gender,
            :phone_number,
            :email_address,
            :security_question_1,
            :security_question_2,
            :security_question_3,
            :security_answer_1,
            :security_answer_2,
            :security_answer_3,
            :user_type_id,
            :address_id,
            :confirmed)');

        $insert_user->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':password_hash' => $password_hash,
            ':title' => $title,
            ':middle_name' => $middle_name,
            ':suffix' => $suffix,
            ':dob' => $dob,
            ':gender' => $gender,
            ':phone_number' => $phone_number,
            ':email_address' => $email_address,
            ':security_question_1' => $security_question_1,
            ':security_question_2' => $security_question_2,
            ':security_question_3' => $security_question_3,
            ':security_answer_1' => $security_answer_1,
            ':security_answer_2' => $security_answer_2,
            ':security_answer_3' => $security_answer_3,
            ':user_type_id' => $user_type_id,
            ':address_id' => $address_id,
            ':confirmed' => $confirmed
        ]);


        }



    public function confirmed(string $first_name, string $last_name, string $email, string $password_hash, string $title, string $suffix = NULL, string $dob, string $gender,
    int $phone_number, string $security_question_1,
    string $security_question_2, string $security_question_3, string $security_answer_1,
    string $security_answer_2, string $security_answer_3,
    string $address, string $city, string $state, int $zip, string $country){
        $address_query = $this->db->prepare('INSERT INTO `addresses` (address, city, state, zip, country) VALUES
        (:address, :city, :state, :zip, :country)');

        $address_query->execute([
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':zip' => $zip,
            ':country' => $country,
        ]);

        $address_id = $this->db->lastInsertId();
        $query = $this->db->prepare('UPDATE `users` set password_hash = :password_hash,
            title = :title, suffix = :suffix, dob = :dob, gender = :gender,
            phone_number = :phone_number, security_question_1 = :security_question_1,
            security_question_2 = :security_question_2, security_question_3 = :security_question_3,
            security_answer_1 = :security_answer_1, security_answer_2 = :security_answer_2,
            security_answer_3 = :security_answer_3, address_id = :address_id, confirmed = :confirmed WHERE first_name = :first_name and last_name = :last_name and email_address = :email');

        $query->execute([
            ':password_hash' => $password_hash,
            ':title' => $title,
            ':suffix' => $suffix,
            ':dob' => $dob,
            ':gender' => $gender,
            ':phone_number' => $phone_number,
            ':security_question_1' => $security_question_1,
            ':security_question_2' => $security_question_2,
            ':security_question_3' => $security_question_3,
            ':security_answer_1' => $security_answer_1,
            ':security_answer_2' => $security_answer_2,
            ':security_answer_3' => $security_answer_3,
            ':address_id' => $address_id,
            ':confirmed' => 1,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
        ]);



    }

    public function get_questions(string $first_name, string $last_name, string $email){

        $query = $this->db->prepare('SELECT * from `users` join `user_type` on (`user_type`.`id` = `users`.`user_type_id`)
        WHERE `users`.`first_name` = :firstname and `users` . `last_name` = :lastname and `users` . `email_address` = :email');

        $query->execute([
            ':firstname' => $first_name,
            ':lastname' => $last_name,
            ':email' => $email
        ]);

        $forgot = $query->fetch(PDO::FETCH_ASSOC);

        $_SESSION['forgot_password'] = [
            'security_question_1' => $forgot['security_question_1'],
            'security_question_2' => $forgot['security_question_2'],
            'security_question_3' => $forgot['security_question_3'],
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,

        ];

    }

    public function verify_answers(string $first_name, string $last_name, string $email, string $answer1, string $answer2, string $answer3){
        $query = $this->db->prepare('SELECT * from `users` join `user_type` on (`user_type`.`id` = `users`.`user_type_id`)
        WHERE `users`.`first_name` = :firstname and `users` . `last_name` = :lastname and `users` . `email_address` = :email');

        $query->execute([
            ':firstname' => $first_name,
            ':lastname' => $last_name,
            ':email' => $email
        ]);

        $forgot = $query->fetch(PDO::FETCH_ASSOC);

        if($forgot['security_answer_1'] == $answer1 && $forgot['security_answer_2'] == $answer3 && $forgot['security_answer_3'] == $answer3){

            return true;
        } else {

            return false;
        }


    }

    public function change_password(string $first_name, string $last_name, string $email, string $password_hash){
        if(!$query = $this->db->prepare('UPDATE `users` SET `password_hash` = :password_hash WHERE `first_name` = :first_name and `last_name` = :last_name and `email_address` = :email')){
            echo '';
        }

        $query->execute([
            ':password_hash' => $password_hash,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
        ]);
    }

}