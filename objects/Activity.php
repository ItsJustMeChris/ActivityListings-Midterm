<?php
include_once "C:\\xampp\htdocs\Activities\core\database.php";

class Activity implements JsonSerializable
{
    public $name;
    public $desc;
    public $loc;
    public $type;

    public function Activity($activityArray)
    {
        $this->name = $activityArray['activity_name'];
        $this->desc = $activityArray['activity_description'];
        $this->loc = $activityArray['activity_location'];
        $this->type = $activityArray['typeID'];
    }

    public function jsonSerialize()
    {
        return [
            'activity_name'=> $this->name,
            'activity_description'=> $this->desc,
            'activity_location'=> $this->loc,
            'activity_type'=> $this->type,
        ];
    }
}