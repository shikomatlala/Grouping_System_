<?php
include_once "../../../connect.php";
include_once "../student/form.php";
echo header_html("../../../style.css");
//Back Button
//==============================
//Variables
//=======================
$form = new Form();
$input = new Input();
$_SESSION['mod_code']= 0;
$_SESSION['lect_id'] =0;
$_SESSION['class_id'] = 0;
$_SESSION['staff_num'] = 0;
//View the lectures modules
//Show The lecturer his modules

$year = date('Y');
//Can we tell the lecturer his class today.
//Back button to go back home.
$content = "<h1>Lecturer Portal</h1><br>\n";
$content .= back_button("../home/admin_home.php");
//Lect us call on the lectures Information
$str_sql = "SELECT * 
            FROM lecturer 
            WHERE staff_number = " . (int)$_SESSION['staff_number'];
$ul = "<ul>\n";
//$str_lecturer_information
$ary_result = mysqli_query($link, $str_sql);
if(mysqli_num_rows($ary_result) > 0)
{
  while($row = mysqli_fetch_assoc($ary_result))
  {
      $ul .= "<li>" . "Staff Number ".$row["staff_number"]  . "</li>\n";
      $ul .= "<li>" . substr($row["first_name"], 0). " ". $row["last_name"]  . "</li>\n";
      $ul .= "<li>" . $row["id_nr"]  . "</li>\n";
      $ul .= "<li>" . $row["phone"]  . "</li>\n";
      $ul .= "<li>" . $row["email"]  . "</li>\n";
  }
  $ul.= "</ul>\n<br>";
}
$content .= "<h2>Lecturer Peronal Details</h2>";
$content .= $ul;
//This is true
//Le us give the lecturer the modules that he teaches
//These modules will come from the lecture_lecturer time table
$staff_number = (int)$_SESSION['staff_number'];
$form_link = "action=\"grouping_portal.php\" method=\"POST\">\n";
$form_ = "<form " .$form_link;

//Lecture Details div.
//echo 
echo div("control-group normal_text", $content);
//Show the Form
$form_div = "";
//==================================================================================================================================================================
//SHOW MODULES THAT THE LECTURER HAS BEEN ASSIGNED
//==================================================================================================================================================================
$lecturer_list = "";
$count_lecturers = 0;
$sql = "SELECT * 
FROM lecture_group, lecturer, lecture
WHERE lecture_group.lecture_id = lecture.lecture_id
AND lecturer.staff_number = lecture_group.staff_number
AND lecturer.staff_number = $staff_number
AND year = $year
ORDER BY year DESC";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0)
{
    $lecturer_list .= "\n\t<table>\n\t<tr>";
    $lecturer_list .= "\n\t\t<th>List Count</th>";
    $lecturer_list .= "\n\t\t<th>Class Number</th>";
    $lecturer_list .= "\n\t\t<th>Module Code</th>";
    $lecturer_list .= "\n\t\t<th>Group Name</th>";
    $lecturer_list .= "\n\t\t<th>Year</th>";
    $lecturer_list .= "\n\t\t<th>Semester</th>";
    $lecturer_list .= "\n\t\t<th> </th>";//View Class
    $lecturer_list .= "\n\t\t<th> </th>";//View Group
    //$lecturer_list .= "\n\t\t<th> </th>";//Udate
    //$lecturer_list .= "\n\t\t<th> </th>";//View Student - This is where we take you to the student home page - now we are going to do that - 
    $lecturer_list .= "\n\t</tr>";
    
    while($row = mysqli_fetch_assoc($result))
    {
        $count_lecturers++;
        //------------------
        //Show us everything about the classes in this course
        //------------------
        $lecturer_list .= "\n\t<tr>";
        $lecturer_list .= "\n\t\t<td>" . $count_lecturers . "</td>";
        $lecturer_list .= "\n\t\t<td>" .$row['lecture_group_id'] . "</td>";
        $lecturer_list .= "\n\t\t<td>" .$row['module_code'] . "</td>";
        $lecturer_list .= "\n\t\t<td>" .$row['group_name'] . "</td>";
        $lecturer_list .= "\n\t\t<td>" .$row['year'] . "</td>";
        $lecturer_list .= "\n\t\t<td>" .$row['semester'] . "</td>";
        //------------------
        //View Class Button
        //------------------
        $inputs = "";
        $form->set_form("grouping_portal.php", "POST", "");
        $input->set_input("hidden", "module_code", $row['module_code'], "", "");
        $inputs .= $input->get_input();
        $input->set_input("hidden", "lecture_id", $row['lecture_id'], "", "");
        $inputs .= $input->get_input();
        $input->set_input("hidden", "staff_number", $staff_number, "", "");
        $inputs .= $input->get_input();
        $input->set_input("hidden", "lecture_group_id", $row['lecture_group_id'], "", "");
        $inputs .= $input->get_input();
        $input->set_input("submit", "view_class", "View Class", "", "submit_button");
        $inputs .= $input->get_input();
        $form_out = $form->get_form_wrapper($inputs);
        $lecturer_list .= "\n\t\t<td>" . $form_out . "</td>";

        //------------------
        //View Group
        //------------------
        //$_SESSION[''] = 
        $inputs = "";
        $form->set_form("view_group.php", "POST", "");
        $input->set_input("submit", "view_class", "View Groups", "", "submit_button");
        $inputs .= $input->get_input();
        $input->set_input("hidden", "module_code", $row['module_code'], "", "");
        $inputs .= $input->get_input();
        $form_out = $form->get_form_wrapper($inputs);
        $lecturer_list .= "\n\t\t<td>" . $form_out . "</td>";
        
    }

}
echo "<h2>You Module List</h2>";
echo $lecturer_list;

function back_button($back_url)
{
    $form = new Form();
    $input = new Input();
    $out = "";
        //create a back button - which is actually a form - 
        $form->set_form($back_url, "POST", "");
        //$label->set_label("Click to Register new Student", "First Name", "");
        $input->set_input("submit", "back", "Back", "back_button", "back_button");
        $out =  $form->get_form_wrapper($input->get_input());
        //Above is the back button
    return $out;
}

?>
