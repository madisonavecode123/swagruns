<?php require_once 'session.inc.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php 
require_once 'database.inc.php';

$data = [];
if(isset($_POST['distance']) AND !empty($_POST['distance'])) {
    foreach($_POST['distance'] AS $key => $value) {
        $data[] = sprintf('(1, "%s", %d, %d, "%s")', addslashes($key), intval($value), time(), session_id());
    }
}

$insert_query = 'INSERT `data`(`type`, `name`, `value`, `created_at`, `session`) VALUES ' . implode(',', $data);
echo $insert_query;
echo '<pre>';
print_r($_POST);
echo '</pre>';
mysqli_query($conn, $insert_query);

$score = $_SESSION['data']['score'];

$locations_query = 'SELECT *
                        FROM `races` r
                        JOIN `race_map` rm
                            ON rm.race_id = r.id
                        WHERE rm.location_score='.$score;
$results = mysqli_query($conn, $locations_query) or die (mysqli_error($conn));

//$answers_query = 'SELECT * FROM `data`';
//$answers_results = mysqli_query($conn, $answers_query);


    ?>    
    
<body>
    
    <p id="your-race">Your Race is</p>
    <p id="race_answer">The Long Beach Marathon</p>
    <p id="checkout">Check out the race</p>
    <a href="http://runlongbeach.com/" class="result" target="_blank"><img id="race-result-pic" src="images/longbeach.jpg"/>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="java.js"></script>
    <?php
session_regenerate_id(true);
session_destroy();
    ?>
</body>
</html>