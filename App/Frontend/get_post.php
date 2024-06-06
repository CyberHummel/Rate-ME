<?php
include "connect.php";
$post_id = 1;

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
    $sql = "SELECT post_content_ID FROM post WHERE post_id = $post_id";
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
    return get_post($post_id)[1];
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

