<?php
include_once 'get_username.php';
include_once 'connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function show_post($postid, $show_RatingButtons)
{
    if (isset($postid)) {
?>
        <div class="container rounded shadow mb-3 bg-light text">
            <h5><?php echo get_Headline($postid); ?></h5>
            <div class="rounded shadow mb-8">
                <img src="https://picsum.photos/50" alt="" class="profile-pic ml-2 mt-2">
                <?php
                if(get_image($postid) !== null){//Maximus
                    echo '<img src="data:image/jpeg;base64,'.base64_encode(getUserImage(getPostCreator($postid))).'" class="profile-pic ml-2 mt-2" style="width: 50px;"/ alt="No image found">';
                }
                ?>
                <h6 class="ml-2">
                    <?php
                    $username = getPostCreator($postid);
                    echo $username;
                    ?>
                </h6>
                <?php
                $username = getPostCreator($postid);
                $sql = "SELECT user_rating FROM `user` WHERE user_username = '$username'";
                $conn = connect_db();
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $userRating = $row['user_rating'];

                if (is_null($userRating)) {
                    echo 0.0;
                } else {
                    if ($userRating >= 20) { ?>
                        <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                    <?php } else { ?>
                        <i class="fa fa-star fa-2xl"></i>
                    <?php }
                    if ($userRating >= 40) { ?>
                        <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                    <?php } else { ?>
                        <i class="fa fa-star fa-2xl"></i>
                    <?php }
                    if ($userRating >= 60) { ?>
                        <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                    <?php } else { ?>
                        <i class="fa fa-star fa-2xl"></i>
                    <?php }
                    if ($userRating >= 80) { ?>
                        <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                    <?php } else { ?>
                        <i class="fa fa-star fa-2xl"></i>
                    <?php }
                    if ($userRating >= 95) { ?>
                        <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                    <?php } else { ?>
                        <i class="fa fa-star fa-2xl"></i>
                    <?php }
                }
                ?>
            </div>

            <br>
            <div class="text-center round container shadow">
                <br>
                <?php
                if(get_image($postid) !== null){//Maximus
                    echo '<img src="data:image/jpeg;base64,'.base64_encode(get_image($postid)).'" style="width: 300px;"/ alt="No image found">';
                }
                ?>

                <p style="text-align: left;" class="mt-2"><?php echo get_description($postid); ?></p>
                <div class="text-left row mt-4">
                    <i class="fa fa-commenting-o fa-2xl ml-4"></i>
                    <?php
                    // entworfen von maximus , dynamik mit db von marius und bissle maximus
                    $ID = $postid;
                    $rating = get_rating($ID);

                    if (is_null($rating)) {
                        echo 0.0;
                    } else {
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
                        if ($rating >= 95) { ?>
                            <i class="fa fa-star fa-2xl" style="color: gold;"></i>
                        <?php } else { ?>
                            <i class="fa fa-star fa-2xl"></i>
                        <?php }
                    }

                    if ($show_RatingButtons) {
                    ?>

                        <form action="like_post.php" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $postid; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID']; ?>">
                            <button type="submit" name="like_type" value="like"><i class="fas fa-thumbs-up fa-2x"> </i>
                            </button>
                            <button type="submit" name="like_type" value="dislike"><i class="fas fa-thumbs-down fa-2x"></i>
                            </button>
                        </form>
                    <?php } ?>
                    <h5>Views: <?php $ID = $_SESSION['user_ID'];
                                if (is_null(get_views($ID))) echo 0;
                                else echo get_views($ID); ?> </h5>
                </div>
            </div>
        </div>
<?php
    }
}

?>
