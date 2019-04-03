<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Midterm</title>
    <meta name="author" content="ItsJustMeChris">
    <meta name="description" content="Activity Listings">
    <link rel="stylesheet" href="assets/styles/main.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">


</head>

<body>
<div class="grid">
    <header class="header">
        Header
    </header>
    <header class="sub-head">
        <div class="site-title">
            <span class="darker-font">Activities</span> Listings
        </div>
    </header>
    <div class="wrapper">
        <div class="main">
            <div class="category" id="activities-list">
                <div class="category-head">
                    Activities
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>

    const fetchActivities = async () => {
        let activities = await fetch('http://localhost/midterm/api/v1/activity.php?getAll').then(r=>r.json());
        console.log(activities);
        activities.forEach(activity=>{
            const el = document.createElement('div');
            el.innerHTML = `<div class="activity">
                    <div class="activity-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="activity-title">
                        ${activity[0]}
                    </div>
                    <div class="activity-description">
                        ${activity[1]}
                    </div>
                    <div class="activity-topics">
                        ${activity[2]}
                    </div>
                </div>`;
            document.getElementById('activities-list').appendChild(el);
        });
        return activities;
    }
    fetchActivities();
</script>
</html>
