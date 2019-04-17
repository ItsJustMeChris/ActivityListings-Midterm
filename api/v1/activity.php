<?php

include_once "../../models/activity.php";
include_once "../../objects/activity.php";


if (isset($_GET['create']) && isset($_GET['activityDescription']) && isset($_GET['activityName']) && isset($_GET['activityLocation']) && isset($_GET['activityType']))
{
    $activityData = ActivtyModel::create($_GET['activityName'], $_GET['activityDescription'], $_GET['activityLocation'], $_GET['activityType']);
    $activity = new Activity($activityData);
    print_r(json_encode($activity));
}

if (isset($_GET['getAll']))
{
    print_r(json_encode(ActivtyModel::readAll()));
}