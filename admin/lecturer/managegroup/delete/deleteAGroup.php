<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    //Include our post models
    include_once "../config/Database.php";
    include_once "../models/Delete.php";

    if(isset($_POST['group_id']))
    {
        //We just want to tes this out.
        $groupId = $_POST['group_id'];
        $database = new Database();
        $db = $database->connect();
        $post = new Post($db);//this post comes from models/Post.php
        $result = $post->deleteAGroup($groupId);
    }

?>