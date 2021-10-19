<?php
    //headers - link to our databse and our models
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    //Includes our database and our models
    include_once "../config/Database.php";
    include_once "../models/postallgroups.php";
    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();
    $post = new Post($db);
    $result = $post->read();
    $num = $result->rowCount();
    if($num > 0)
    {
        $posts_arr = array(); //I do not see the purpose of this associative array
        // $posts_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            Extract($row);
            $post_item = array(
                'group_id' => $group_id,
                'group_name' => $group_name,
                'count_member' => $count_member
            );
            //Push to data associative array
            array_push($posts_arr, $post_item);
        }
        //Turn to JSON
        echo json_encode($posts_arr);
    }
    else
    {
        echo json_encode(array('message'=> 'No posts found'));
    }
?>