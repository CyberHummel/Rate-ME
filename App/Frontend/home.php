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
            <h1 class="h1 text-center rate-me_headline">RateME</h1>
        </div>
        
        <div class="container rounded shadow mb-3" style="margin-top: 15%;">
            <h5><?php include "get_post.php"; echo get_Headline(1);?></h5>  <!--TODO: ID of the post automatically set with Algorithm-->
            <div class="rounded shadow mb-8">
                <img src="https://picsum.photos/50" alt="" class="profile-pic ml-2 mt-2">
                <h6 class="ml-2">Marius_Flugel</h6>
                <i class="fa fa-star fa-2xl ml-2"></i>
                <i class="fa fa-star fa-2xl"></i>
                <i class="fa fa-star fa-2xl"></i>
                <i class="fa fa-star fa-2xl" style="margin-bottom: 7%;"></i>
            </div>
    
            <br>
            <div class="text-center rounded container shadow">
                <br>
                <img src="https://picsum.photos/200" alt=""> <!--TODO: Image in Database -->
                <p style="text-align: left;" class="mt-2"><?php echo get_description(1);?></p> <!--Multiple Spans for different Hashtags, also make clickable--> <!--TODO: ID of the post automatically set with Algorithm-->
                <div class="text-left row mt-4">
                    <i class="fa fa-commenting-o fa-2xl ml-4"></i>
                    <?php
                    $ID = 1; //<!--TODO:ID of the post automatically set with Algorithm-->
                    $rating = get_rating($ID);
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
                    ?>
                    <h5>Views: <?php $ID = 1; echo get_views($ID);?> </h5> <!-- TODO:ID of the post automatically set with Algorithm-->
                </div>
            </div>
            <br>
        </div>
        <h1></h1>
        
        <br>
        <div id="bottom-bar" class="container rounded shadow mb-8 text-center fixed-bottom" style="height: 5%;background-color:rgb(255,182,255,1); width:40%;">
        <!-- einbettung in a tag um es als link benutzen zu können-->
        <a href="friends.php" style="text-decoration: none;">
                <i class="fa-solid fa-user-group fa-2xl" style="margin-right: 1%; vertical-align: bottom;"></i>
            </a>
            <i class="fa-solid fa-circle-plus fa-2xl" style="margin-right: 2%; vertical-align: bottom;"></i>
            <i class="fa-solid fa-bars fa-2xl" style="vertical-align: bottom;"></i>
        </div>
        <br>
    </div>
  
</body>
</html>