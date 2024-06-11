<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home!</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5f3357375.js" crossorigin="anonymous"></script>
</head>
<body class="backround" style="height: 1000px;">
    <div class="container rounded  mb-5 text" style="height: 100%; width: 50%;">

        <div class="fixed-top container" style="background-color:rgb(255,255,255,0.9)">
            <h1 class="h1 text-center rate-me_headline">RateME</h1>
        </div>

            <?php include "get_post.php";
                include_once "post.php";

                $postIDs = get_20_newest_posts();
                ?>
                <div style="margin-top: 15%">
                    <?php show_post($postIDs[0]); ?>
                </div>
                <?php

                for($i = 1; $i < sizeof($postIDs); $i++){
                    ?>
                    <div class="container">
                        <?php show_post($postIDs[$i]); ?>
                    </div>
                    <?php
                }
                ?>






        </div>

        <br>
        <div id="bottom-bar" class="container rounded shadow mb-8 text-center fixed-bottom" style="height: 5%;background-color:rgb(255,182,255,1); width:40%;">
        <!-- einbettung in a tag um es als link benutzen zu können-->
            <a href="friends.php" style="text-decoration: none; color: black;">
                <i class="fa-solid fa-user-group fa-2xl" style="margin-right: 1%; vertical-align: bottom;"></i>
            </a>
            <a href="add_post.php" style="text-decoration: none; color: black;">
                <i class="fa-solid fa-circle-plus fa-2xl" style="margin-right: 2%; vertical-align: bottom;"></i>
            </a>
                <i class="fa-solid fa-bars fa-2xl" style="vertical-align: bottom;"></i>
        </div>
        <br>
    </div>
  
</body>
</html>