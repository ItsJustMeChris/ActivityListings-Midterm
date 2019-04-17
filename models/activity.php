<?php
include_once "C:\\xampp\htdocs\Activities\core\database.php";
include_once "C:\\xampp\htdocs\Activities\objects\Activity.php";
include_once "C:\\xampp\htdocs\Activities\interfaces\Activity.php";

class ActivtyModel implements ActivityInterface
{
    public static function create($activityName, $activityDescription, $activityLocation, $type)
    {
        $db = Database::getInstance();
        $activity = [
            'activity_name' => strip_tags($activityName),
            'activity_description' => strip_tags($activityDescription),
            'activity_location' => strip_tags($activityLocation),
            'typeID' => $type
        ];
        $db->insert('activities', $activity);
        return $activity;
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('activities', 'id=?', [$activityID]);
        if ($arr) {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        return $db->query('SELECT * FROM activities');
    }

    public static function readAll()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT * FROM activities');
        $activitiesList = [];
        foreach ($data as $row)
        {
            $activitiesList[] = new Activity($row);
        }
        return $activitiesList;
    }
}