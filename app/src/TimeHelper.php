<?php
namespace Flights;

class TimeHelper {
    public static function dateToTimeStamp(string $date) {
        try {
            $myDate = new \DateTime($date);
        } catch(\Exception $e) {
            $myDate = new \DateTime();
        }

        return (int) $myDate->format('U');
    }
}
