<?php
include_once "C:\\xampp\htdocs\Activities\core\database.php";

class ActivityType
{
    public static function create($activityType, $typeDescription)
    {
        $db = Database::getInstance();
        $type = array(
            'type_name' => strip_tags($activityType),
            'type_description' => strip_tags($typeDescription)
        );
        $db->insert('activity_type', $type);
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('activity_type', 'id=?', [$activityID]);
        if ($arr) {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();

        return $db->query('SELECT * FROM activity_type');
    }
}