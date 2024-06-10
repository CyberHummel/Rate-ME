<?php
include "connect.php";



function get_post($post_id) {

    $conn = connect_db();
    $sql = "SELECT * FROM post WHERE post_id = $post_id";
    $result = mysqli_query($conn, $sql);

    if(!is_null($result)) {
        $post = mysqli_fetch_assoc($result);
        if($post['post_ID'] == $post_id){
            $views = $post['post_views'];
            $date = $post['post_date'];
            $rating = $post['post_rating'];
            return array($views, $rating, $date);
        }
    }
}


function get_post_content($post_id)
{
    $conn = connect_db();
    $sql = "SELECT post_content_ID FROM post_ids WHERE post_ID = $post_id";
    $result = mysqli_query($conn, $sql);

    if(!is_null($result)){
        $post_content_id = mysqli_fetch_assoc($result);
        $post_content_id = $post_content_id['post_content_ID'];
        $sql ="SELECT * FROM post_content WHERE post_content_ID = $post_content_id";
        $result = mysqli_query($conn, $sql);

        if(!is_null($result)){
            $post_content = mysqli_fetch_assoc($result);
            $post_content_headline = $post_content['post_content_headline'];
            $post_content_description = $post_content['post_content_description'];
            $post_content_image  = $post_content['post_content_image'];
            return array($post_content_headline, $post_content_description, $post_content_image);

        }
    }
}

function get_views($post_id){
    return get_post($post_id)[0];
}

function get_rating($post_id){
    if(is_null(get_post($post_id)[1])){
        return 0;
    }else{
        return get_post($post_id)[1];
    }

}

function get_Headline($post_id)
{
    return get_post_content($post_id)[0];
}

function  get_description($post_id)
{
    return get_post_content($post_id)[1];
}

function get_image($post_id)
{
    return get_post_content($post_id)[2];
}

function get_20_newest_posts()
{
    $conn = connect_db();
    $sql = "SELECT post_ID FROM post ORDER BY post_date LIMIT 20";
    $result = mysqli_query($conn, $sql);
    $result_array = array();
    while($row = mysqli_fetch_array($result))
    {
        $result_array[] = $row["post_ID"];
    }
    return $result_array;
}
