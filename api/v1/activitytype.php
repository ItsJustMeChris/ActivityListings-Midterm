<?php

include_once "../../models/activityType.php";


if (isset($_GET['create']) && isset($_GET['typeName']) && isset($_GET['typeDescription']))
{
    ActivityType::create($_GET['typeName'], $_GET['typeDescription']);
    $type = [];
    $type[] = $_GET['typeName'];
    $type[] = $_GET['typeDescription'];
    print_r(json_encode($type));
}

if (isset($_GET['getAll']))
{
    $allTypesReturn = ActivityType::getAll();
    $allTypesJson = [];
    foreach ($allTypesReturn as $row)
    {
        $type = [];
        $type[] = $row['type_name'];
        $type[] = $row['type_description'];
        $type[] = $row['ID'];
        $allTypesJson[] = $type;
    }
    print_r(json_encode($allTypesJson));
}