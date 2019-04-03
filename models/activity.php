<?php
include_once "C:\wamp64\www\midterm\core\database.php";

class Activity
{
    public static function create($activityName, $activityDescription, $activityLocation, $user=0)
    {
        $db = Database::getInstance();
        $activity = array(
            'activity_name' => $activityName,
            'activity_description' => $activityDescription,
            'activity_location' => $activityLocation,
            'activity_poster' => $user
        );
        $db->insert('activities', $activity);
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('category_forums', 'id=?', [$activityID]);
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
}