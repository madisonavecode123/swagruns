<?php require_once 'session.inc.php';?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php 
require_once 'database.inc.php';
//$answers_query='SELECT * FROM `answers`' ;
//$answers_results=m ysqli_query($conn, $answers_query) or die( 'Failed to quereh'); 

$data = [];
if(isset($_POST['locations']) AND !empty($_POST['locations'])) {
    foreach($_POST['locations'] AS $key => $value) {
        $data[] = sprintf('(0, "%s", %d, %d, "%s")', addslashes($key), intval($value), time(), session_id());
    }
}

$insert_query = 'INSERT `data`(`type`, `name`, `value`, `created_at`, `session`) VALUES ' . implode(',', $data);
echo $insert_query;
echo '<pre>';
print_r($_POST);
echo '</pre>';
mysqli_query($conn, $insert_query);

$race_id = 1; // LA

$score = $_POST['locations']['beach']*2;
$score += $_POST['locations']['city']*3;
$score += $_POST['locations']['town']*5;
$score += $_POST['locations']['wine']*7;

$_SESSION['data'] = ['score' => $score];//save the score in the session 

$race_id_subquery = 'IFNULL((SELECT DISTINCT race_id
                        FROM race_map
                        WHERE location_score='.$score.'), 1)';

$race_query = 'SELECT DISTINCT `key`, `distance`
                    FROM `race_distance`
                    WHERE `race_id` = '.$race_id_subquery;
echo $race_query;
$result = mysqli_query($conn, $race_query);

    ?>
    
<body id="distance-page">

    <h1>HOW DO YOU FEEL ABOUT THESE DISTANCES?</h1>
    <h4>Set the following to LOVE <span class="selectbutton glyphicon glyphicon-heart-empty" aria-hidden="true"></span> LIKE <span class="selectbutton glyphicon glyphicon-thumbs-up"></span> or DISLIKE <span class="selectbutton glyphicon glyphicon-thumbs-down"></span> </h4>
    
<form id="distanceform" class="anwers" action="answers.php" method="POST">
    <div class="distances">
        <?php

        while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="imagediv">
                <p class="distancecircle two_ltr"><?php echo $row['key'];?></p>
                <p><?php echo $row['distance'];?></p>
                <div class="cir_block highlight">
                    <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
                </div>
                        <input type="hidden" class="location-input" name="distance[<?php echo $row['key'];?>]" value=""/>
            </div>
        <?php
        }
        ?>
        
<!--
        <div class="imagediv">
            <p class="distancecircle three_ltr">10K</p>
            <p>6.2 miles</p>
            <div class="cir_block highlight">
                <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
            </div>
                 <input type="hidden" class="location-input" name="distance[10K]" value=""/>
        </div>
        <div class="imagediv">
            <p class="distancecircle three_ltr">15K</p>
            <p>15K or 9.3 miles</p>
            <div class="cir_block highlight">
                <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
            </div>
                 <input type="hidden" class="location-input" name="distance[15K]" value=""/>
        </div>
        <div class="imagediv">
            <p class="distancecircle four_ltr">13.1</p>
            <p>Half Marathon</p>
            <div class="cir_block highlight">
                <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
            </div>
                 <input type="hidden" class="location-input" name="distance[13M]" value=""/>

        </div>

        <div class="imagediv">
            <p class="distancecircle four_ltr">26.2</p>
            <p>Marathon</p>
            <div class="cir_block highlight">
                <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
            </div>
                <input type="hidden" class="location-input" name="distance[26M]" value=""/>
        </div>
-->
    </div>

    <nav>
        <ul id="page-btn-list">
            <li><a class="btn btn-default glyphicon glyphicon-chevron-left" href="location.php"></a>
            </li>
            <li><button type="submit" id="btn-continue" class="continue-button btn btn-primary cont_btn disabled">CONTINUE</button>
            </li>
        </ul>
    </nav>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="java.js"></script>
</body>

</html>