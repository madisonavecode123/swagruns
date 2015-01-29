<?php require_once 'session.inc.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <h1>HOW DO YOU FEEL ABOUT THE FOLLOWING VACATION SPOTS?</h1>
    <h4>Set the following to LOVE <span class="selectbutton glyphicon glyphicon-heart-empty" aria-hidden="true"></span> LIKE <span class="selectbutton glyphicon glyphicon-thumbs-up"></span> or DISLIKE <span class="selectbutton glyphicon glyphicon-thumbs-down"></span> </h4>
    <form id="beachform" class="anwers" action="distance.php" method="POST">
        <div class="vacation_spots">
            <div class="row">
                <div class="imagediv col-md-6">
                    <img class="imagebox img-responsive" src="images/beach.jpg" />
                    <p>Beach Vacation</p>
                    <div class="btn_block highlight">
                        <span id="beachlove" class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                        <span id="beachlike" class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                        <span id="beachhate" class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
                    </div>
                    <input type="hidden" class="location-input" name="locations[beach]" value=""/>
                </div>

                <div class="imagediv col-md-6">
                    <img class="imagebox img-responsive" src="images/city.jpg">
                    <p>City View</p>
                    <div class="btn_block highlight">
                        <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
                    </div>
                    <input type="hidden" class="location-input" name="locations[city]" value=""/>
                </div>
            </div>

            <div class="row">
                <div class="imagediv col-md-6">
                    <img class="imagebox img-responsive" src="images/smalltown.jpg">
                    <p>Small Town Charm</p>
                    <div class="btn_block highlight">
                        <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
                    </div>
                    <input type="hidden" class="location-input" name="locations[town]" value=""/>
                </div>
                <div class="imagediv col-md-6">
                    <img class="imagebox img-responsive" src="images/wine.jpg">
                    <p>Wine Country</p>
                    <div class="btn_block highlight">
                        <span class="glyphicon glyphicon-heart-empty love-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-up like-btn" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-down hate-btn" aria-hidden="true"></span>
                    </div>
                    <input type="hidden" class="location-input" name="locations[wine]" value=""/>
                </div>
            </div>

        </div>

        <div id="continue-container">
            <button type="submit" id="btn-continue" class="continue-button btn btn-primary cont_btn disabled">CONTINUE</button>
        </div>
    </form>
  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="java.js"></script>



</body>

</html>
