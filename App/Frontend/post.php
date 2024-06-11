<?php
include_once 'get_username.php';
echo "User ID: " . $_SESSION['user_ID'];

// eroor finden yaaay
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function show_post($postid) //Maximus
{
    if (isset($postid)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <div class="container rounded shadow mb-3 bg-light text">
            <h5><?php echo get_Headline($postid); ?></h5>
            <div class="rounded shadow mb-8">
                <img src="https://picsum.photos/50" alt="" class="profile-pic ml-2 mt-2">
                <h6 class="ml-2">
                    <?php
                    $username = getPostCreator($postid);
                    echo htmlspecialchars($username);
                    ?>
                </h6> <!--TODO: Get Post Creator/User-->
                <i class="fa fa-star fa-2xl ml-2"></i>
                <i class="fa fa-star fa-2xl"></i>
                <i class="fa fa-star fa-2xl"></i>
                <i class="fa fa-star fa-2xl"
                   style="margin-bottom: 7%;"></i>
            </div>

            <br>
            <div class="text-center rounded container shadow">
                <br>
                <img src="https://picsum.photos/200" alt=""> <!--TODO: Image in Database -->
                <p style="text-align: left;" class="mt-2"><?php echo get_description($postid); ?></p>
                <!--Multiple Spans for different Hashtags, also make clickable-->
                <div class="text-left row mt-4">
                    <i class="fa fa-commenting-o fa-2xl ml-4"></i>
                    <?php
                    $ID = $postid;
                    $rating = get_rating($ID);

                    if (is_null($rating)) {
                        echo 0.0;
                    } else {
                        // jetz einfach immer if else ob rating thresholds ereicht wurden oder nicht Marius, maximus
                        if ($rating >= 20) { ?>
                            <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                        <?php } else { ?>
                            <i class="fa fa-star fa-2xl"></i>
                        <?php }
                        if ($rating >= 40) { ?>
                            <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                        <?php } else { ?>
                            <i class="fa fa-star fa-2xl"></i>
                        <?php }
                        if ($rating >= 60) { ?>
                            <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                        <?php } else { ?>
                            <i class="fa fa-star fa-2xl"></i>
                        <?php }
                        if ($rating >= 80) { ?>
                            <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                        <?php } else { ?>
                            <i class="fa fa-star fa-2xl"></i>
                        <?php }
                    }
                    ?>
                    <!-- daumen hoch /runter form Marius-->
                    <form action="../backend/like_post.php" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $postid; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID']; ?>">
                        <button type="submit" name="like_type" value="like"><i class="fas fa-thumbs-up fa-2x"> </i>
                        </button>
                        <button type="submit" name="like_type" value="dislike"><i class="fas fa-thumbs-down fa-2x"></i>
                        </button>
                    </form>
                    <h5>Views: <?php $ID = 11;
                        if (is_null(get_views($ID))) echo 0; else echo get_views($ID); ?> </h5>
                </div>
            </div>
        </html>


        <?php
    }
}

?>



