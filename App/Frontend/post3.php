<?php
include_once 'get_username.php';


$postid = get_20_newest_posts()[2];
?>

<!DOCTYPE html>
<html lang="en">

<div class="container rounded shadow mb-3 bg-light text" style="margin-top: 15%;">
    <h5><?php echo get_Headline($postid);?></h5>  <!--TODO: ID of the post automatically set with Algorithm-->
    <div class="rounded shadow mb-8">
        <img src="https://picsum.photos/50" alt="" class="profile-pic ml-2 mt-2"> <!--TODO: Image in Database -->
        <h6 class="ml-2"><?php 
                    $username = getPostCreator($postid);
                    echo htmlspecialchars($username);
                ?> </h6> <!--TODO: Get Post Creator/User-->
        <i class="fa fa-star fa-2xl ml-2"></i>
        <i class="fa fa-star fa-2xl"></i>
        <i class="fa fa-star fa-2xl"></i>
        <i class="fa fa-star fa-2xl" style="margin-bottom: 7%;"></i>
    </div>

    <br>
    <div class="text-center rounded container shadow">
        <br>
        <img src="https://picsum.photos/200" alt=""> <!--TODO: Image in Database -->
        <p style="text-align: left;" class="mt-2"><?php echo get_description($postid);?></p> <!--Multiple Spans for different Hashtags, also make clickable--> <!--TODO: ID of the post automatically set with Algorithm-->
        <div class="text-left row mt-4">
            <i class="fa fa-commenting-o fa-2xl ml-4"></i>
            <?php
            $ID = $postid; //<!--TODO:ID of the post automatically set with Algorithm-->
            $rating = get_rating($ID);
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


            <h5>Views: <?php $ID = 11; if( is_null(get_views($ID)) ) echo 0; else echo get_views($ID);?> </h5> <!-- TODO:ID of the post automatically set with Algorithm-->
        </div>
    </div>
</html>