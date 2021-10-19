<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
//Includes our database and our models
include_once "../config/Database.php";
include_once "../models/groupGroupMembers.php";

// $conn = mysqli_connect('localhost', 'root', '', 'grouping_system');


    if(isset($_POST['group_id']))
    {



        // echo "POST: The group ID is " . $_POST['group_id'];
        $group_id = $_POST['group_id'];
        $group_id = (int)substr($group_id,6,2);

        $database = new Database();
        $db = $database->connect();
        $post = new Post($db);
        $result = $post->read($group_id);
        $num = $result->rowCount();
        if($num > 0)
        {
            $posts_arr = array(); //I do not see the purpose of this associative array
            // $posts_arr['data'] = array();
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                Extract($row);
                $post_item = array(
                    // 'group_id' => $group_id,
                    // 'group_name' => $group_name,
                    // 'count_member' => $count_member
                    'group_id' =>$group_id,
                    'group_name' =>$group_name,
                    'group_member_id' =>$group_member_id,
                    'member_mark' =>$member_mark,
                    'stud_number' =>$stud_number,
                    'lecture_group_id' =>$lecture_group_id
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
        //now that we ware here - we can create a select statement where get all the stuff that we are looking for.
        // $sql = "SELECT * 
        // FROM `group`, `group_member`
        // WHERE `group`.group_id = `group_member`.`group_id`
        // AND `group`.group_id =" . $group_id;

        // echo $sql;

        ///Now that we have all this information we can then proceed to sending the user this information
    }