<?php

namespace Flights\Database;

class Tickets extends Database {
    public function findById($id) {
        $sql = "select * from `tickets` where `id` = :id";
        $sth = $this->db->prepare($sql);
        $sth->execute([':id' => $id]);
        $ticket = $sth->fetch(PDO::FETCH_ASSOC);

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
            $ticket = $sth->fetch(PDO::FETCH_ASSOC);

            return $ticket;

        }

        public function getSoldSeats($flight_id) {
            $seats = [];
            $sql = "select * from `tickets` where `flight_id` = :flight_id";
            $sth = $this->db->prepare($sql);
            $sth->execute([':flight_id' => $flight_id]);
            $tickets = $sth->fetch(PDO::FETCH_ASSOC);

            foreach($tickets as $ticket) {

                $seats[] = $ticket["seat_assignment"];

            }
            return $seats;
        }

    }
