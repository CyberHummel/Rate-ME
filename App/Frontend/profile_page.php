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
<div class="container rounded bg-light shadow mb-5 text" style="height: 100%; width: 50%;">

    <div class="fixed-top container" style="background-color:rgb(255,255,255,0.9)">
        <h1 class="h1 text-center rate-me_headline">Welcome <?php session_start(); echo $_SESSION["user_username"]; ?></h1>
    </div>

    <div class="container rounded shadow mb-3" style="margin-top: 15%">
        <h2 class="h2 text-left">Your Rating:</h2>
        <!--TODO: Hier die Ratings ausgeben -->
        <?php
        $ID = $_SESSION["user_ID"];

        $rating = 100;
        if (is_null($rating)){
        echo 0.0;
        }
        else{
        if($rating >= 20){ ?>
        <i class="fa fa-star fa-2xl"></i>

        <?php }
                    if( $rating >= 40){ ?>
        <i class="fa fa-star fa-2xl"></i>
        <?php }
        if ($rating >= 60){ ?>
        <i class="fa fa-star fa-2xl"></i>
        <?php }

        if($rating >= 80){ ?>
        <i class="fa fa-star fa-2xl"></i>
        <?php }
        }
        ?>

        <h2 class="h2 text-left">Your Posts:</h2>
        <!--TODO: Hier die Posts ausgeben -->
        <h2 class="h2 text-left">Your Friends:</h2>
        <!--TODO: Hier die Friends ausgeben -->
    </div>




</div>

</body>
</html>