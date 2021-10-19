<?php
include_once "../../../connect.php";
echo header_html("../../../style.css");
//Now let us write the SQL

if(isset($_POST['assing_class']))
{
    $group_name = $_POST['group_name'];
    $lecture_id = $_POST['lecture_id'];
    $staff_number = $_POST['staff_number'];
    $course_id = $_POST['course_id'];
    $sql = "INSERT INTO lecture_group (group_name, lecture_id, staff_number) VALUES (\"$group_name\", $lecture_id, $staff_number)";
    if(mysqli_query($link, $sql))
    {
        header("LOCATION: lecture_portal.php");
    }
    //This part here should reorganize groups but it will not make sense, I think the best option will be to reorganize groups when we are done with all the work
}