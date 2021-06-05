<?php

namespace Flights\Database;
use PDO;


class Tickets extends Database {
    public function findById($id) {
        $sql = "select * from `tickets` where `id` = :id";
        $sth = $this->db->prepare($sql);
        $sth->execute([':id' => $id]);
        $ticket = $sth->fetch(\PDO::FETCH_ASSOC);

        return $ticket;
    }

    public function findByNameAndConfirmationId(
        $first_name,
        $last_name,
        $confirmation_id) {

            $sql = "SELECT
            *
            FROM
            `tickets`
            WHERE
            `first_name` = :first_name
            AND `last_name` = :last_name
            AND `confirmationid` = :confirmationid";

            $sth = $this->db->prepare($sql);
            $sth->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':conformationid' => $confirmation_id,
            ]);
            $ticket = $sth->fetch(\PDO::FETCH_ASSOC);

            return $ticket;

        }

        public function getSoldSeats($flight_id) {
            $seats = [];
            $sql = "select `seat_assignment` from `tickets` where `flight_id` = :flight_id";
            $sth = $this->db->prepare($sql);
            $sth->execute([':flight_id' => $flight_id]);
            //var_dump($sth);
            $tickets = $sth->fetchAll();
            for($i = 0; $i < count($tickets); $i++){
                array_push($seats, $tickets[$i]['seat_assignment']);
            }

            return $seats;
        }

        public function addTicket($address_payment, $city_payment, $state_payment,
        $zip_payment,$country_payment, $address_ticket, $city_ticket, $state_ticket,
        $zip_ticket,$country_ticket, $card_number, $expiration_date, $cvc,
        $cardholder_name, $user_first_name, $user_last_name, $user_email,
        $ticket_first_name, $ticket_middle_name, $ticket_last_name,
        $gender, $dob, $phone_number, $ticket_email, $seat, $check_in,
        $carry_on, $flight_id, $status){
        //     die($address_payment . "\n" . $city_payment . "\n" . $state_payment. "\n" .
        // $zip_payment . "\n" . $country_payment . "\n" . $address_ticket . "\n" . $city_ticket . "\n" . $state_ticket . "\n" .
        // $zip_ticket. "\n" .$country_ticket. "\n" . $card_number. "\n" . $expiration_date. "\n" . $cvc. "\n" .
        // $cardholder_name. "\n" . $user_first_name. "\n" . $user_last_name. "\n" . $user_email. "\n" .
        // $ticket_first_name. "\n" . $ticket_middle_name. "\n" . $ticket_last_name. "\n" .
        // $gender. "\n" . $dob . "\n" . $phone_number . "\n" . $ticket_email. "\n" . $seat. "\n" . $check_in. "\n" .
        // $carry_on. "\n" . $flight_id. "\n" . $status);
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $confirmation_id = substr(str_shuffle($permitted_chars), 0, 14);
        //die($confirmation_id);

            $payment_address_query = $this->db->prepare('INSERT INTO `addresses` (address, city, state, zip, country) VALUES
            (:address, :city, :state, :zip, :country)');

            $payment_address_query->execute([
                ':address' => $address_payment,
                ':city' => $city_payment,
                ':state' => $state_payment,
                ':zip' => $zip_payment,
                ':country' => $country_payment,
            ]);
            $payment_address_id = $this->db->lastInsertId();

            $ticket_address_query = $this->db->prepare('INSERT INTO `addresses` (address, city, state, zip, country) VALUES
            (:address, :city, :state, :zip, :country)');

            $ticket_address_query->execute([
                ':address' => $address_ticket,
                ':city' => $city_ticket,
                ':state' => $state_ticket,
                ':zip' => $zip_ticket,
                ':country' => $country_ticket,
            ]);
            $ticket_address_id = $this->db->lastInsertId();


            if($user_first_name !== NULL && $user_last_name !== NULL && $user_email !== NULL){
                $login_query = $this->db->prepare('SELECT `users`.`id` from `users` join `user_type` on (`user_type`.`id` = `users`.`user_type_id`)
                WHERE `users`.`first_name` = :firstname and `users` . `last_name` = :lastname and `users` . `email_address` = :email');

                $login_query -> execute([
                ':firstname' => $user_first_name,
                ':lastname' => $user_last_name,
                ':email' => $user_email]);

                $login = $login_query->fetch(PDO::FETCH_ASSOC);
                $user_id = $login['id'];
            } else {
                $user_id = NULL;
            }

            $payment_query = $this->db->prepare('INSERT INTO `payments` (card_number, expiration_date, cvc, cardholder_name, address_id, user_id) VALUES
            (:card_number, :expiration_date, :cvc, :cardholder_name, :address_id, :user_id)');

            $payment_query->execute([
                ':card_number' => $card_number,
                ':expiration_date' => $expiration_date,
                ':cvc' => $cvc,
                ':cardholder_name' => $cardholder_name,
                ':address_id' => $payment_address_id,
                ':user_id' => $user_id,
            ]);
            $payment_id = $this->db->lastInsertId();
            //die($payment_query->debugDumpParams());



            $ticket_query = $this->db->prepare('INSERT INTO `tickets` (first_name,
                middle_name, last_name, gender, dob, phone_number, email_address,
                payment_id, seat_assignment, checkin_bags, carryon_bags, flight_id,
                status_id, user_id, address_id, confirmation_id) VALUES
            (:first_name, :middle_name, :last_name, :gender, :dob, :phone_number, :email_address,
                :payment_id, :seat_assignment, :checkin_bags, :carryon_bags, :flight_id,
                :status, :user_id, :address_id, :confirmation_id)');

            $ticket_query->execute([
                ':first_name' => $ticket_first_name,
                ':middle_name' => $ticket_middle_name,
                ':last_name' => $ticket_last_name,
                ':gender' => $gender,
                ':dob' => $dob,
                ':phone_number' => $phone_number,
                ':email_address' => $ticket_email,
                ':payment_id' => $payment_id,
                ':seat_assignment' => $seat,
                ':checkin_bags' => $check_in,
                ':carryon_bags' => $carry_on,
                ':flight_id' => $flight_id,
                ':user_id' => $user_id,
                ':address_id' => $ticket_address_id,
                ':status' => $status,
                ':confirmation_id' => $confirmation_id,
            ]);            
         
                return $confirmation_id;
        }

        public function display_tickets($user_id){

            $ticket_query = $this->db->prepare('SELECT * from `tickets` WHERE user_id = :user_id');

            $ticket_query->execute([
                ':user_id' => $user_id,
            ]);
            $tickets = $ticket_query->fetchAll();
            return $tickets;


        }

        public function cancel_tickets($id){
            $query = $this->db->prepare('DELETE FROM `tickets` WHERE id = :id');

            $query->execute([':id' => $id]);
            //die($query->debugDumpParams());
        }
        
        public function check_confirmation_id($confirmation_id){
            $confirmation_id_query = $this->db->prepare('SELECT * FROM `tickets` WHERE confirmation_id = :confirmation_id');

            $confirmation_id_query->execute([':confirmation_id' => $confirmation_id,]);
            $confirmation_id_db = $confirmation_id_query->fetch(\PDO::FETCH_ASSOC);

            if($confirmation_id_db == NULL){
                return false;
            } elseif ($confirmation_id !== NULL){
                return true;
            }
        }

        public function get_ticket_by_confirmatiomn_id($name, $confirmation_id){
            $ticket_query = $this->db->prepare('SELECT * FROM `tickets` WHERE confirmation_id = :confirmation_id AND first_name = :first_name');

            $ticket_query->execute([':confirmation_id' => $confirmation_id,
                                    ':first_name' => $name,]);
            $ticket = $ticket_query->fetchall();

            if($ticket !== NULL){
                return $ticket;
            } else {
                return NULL;
            }
            
        }

        public function add_ticket_to_user($email, $name, $confirmation_id){
            
        }

    }