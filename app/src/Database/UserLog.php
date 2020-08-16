<?php

namespace Flights\Database;

class UserLog extends Database {
    /**
    * Creates user log entry
    *
    * @param $user_id is user id
    * @return bool
    */
    public function log($user_id){
        $sql = 'INSERT INTO `user_log` (`user_id`,`last_login_ip`)
            VALUES (:user_id, :last_login_ip)';
        $sth = $this->db->prepare($sql);

        return $sth->execute([
            ':user_id' => $user_id,
            ':last_login_ip' => $_SERVER["REMOTE_ADDR"],
        ]);
    }

    /**
    * Gets all user long entries for a user
    *
    * @param $user_id user id
    * @return array
    */
    public function getUserLog($user_id){
        $sql = 'SELECT * FROM `user_log` WHERE `user_id` = :user_id';
        $sth = $this->db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
        ]);

        return $sth->fetchAll(PDO::ASSOC);
    }

    /**
    * Gets last user long entry for a user
    *
    * @param $user_id user id
    * @return array
    */
    public function getLastUserLog($user_id){
        $sql = 'SELECT * FROM `user_log`
            WHERE `user_id` = :user_id
            ORDER BY `id` DESC
            LIMIT 1 ';
        $sth = $this->db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
        ]);

        return $sth->fetch(PDO::ASSOC);
    }
}
