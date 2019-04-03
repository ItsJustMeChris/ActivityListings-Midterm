<?php

include_once "../../models/activity.php";


if (isset($_GET['create']) && isset($_GET['activityDescription']) && isset($_GET['activityName']) && isset($_GET['activityLocation']))
{
    Activity::create($_GET['activityName'], $_GET['activityDescription'], $_GET['activityLocation']);
    echo "YAY";
}

if (isset($_GET['getAll']))
{
    $allActivitiesReturn = Activity::getAll();
    $allActivitiesJson = [];
    foreach ($allActivitiesReturn as $row)
    {
        $activity = [];
        $activity[] = $row['activity_name'];
        $activity[] = $row['activity_description'];
        $activity[] = $row['activity_location'];
        $allActivitiesJson[] = $activity;
    }

    print_r(json_encode($allActivitiesJson));
}