<?php
include_once "../../../connect.php";
include_once "../student/form.php";
echo header_html("../../../style.css");
echo "<h1>DSO34BT Groups</h1><br><hr>";

echo back_button("timetable.php");

//Count the number of groups. 
//Put the edit group button.

echo "<h2>Group list</h2>";
// function button($id, $caption, $action, $function, $class)
echo editNav();
// echo button("", "Manage Groups", "", "","" );

//I can now get the module_code
if(isset($_POST['view_class']))
{
    //Get the module code
    $_SESSION['mod_code'] = $_POST['module_code'];
}

$sql = "select student.stud_number, student.first_name, student.last_name, student.gender, `group`.`group_name`
from `group`, group_member, student
WHERE `group`.group_id = group_member.group_id
AND student.stud_number = group_member.stud_number";
$result = mysqli_query($link, $sql);
$group_list = "";
if(mysqli_num_rows($result)>0)
{

    $group_list .= "\n\t<table id=\"groupList\">\n\t<tr>";
    $group_list .= "\n\t\t<th>Student Number</th>";
    $group_list .= "\n\t\t<th>First Name</th>";
    $group_list .= "\n\t\t<th>Last Name</th>";
    $group_list .= "\n\t\t<th>Gender</th>";
    $group_list .= "\n\t\t<th>Group Name</th>";
    $group_list .= "\n\t</tr>";
    
    while($row = mysqli_fetch_assoc($result))
    {
        //------------------
        //Show us everything about the classes in this course
        //------------------
        $group_list .= "\n\t<tr>";
        $group_list .= "\n\t\t<td>" .$row['stud_number'] . "</td>";
        $group_list .= "\n\t\t<td>" .$row['first_name'] . "</td>";
        $group_list .= "\n\t\t<td>" .$row['last_name'] . "</td>";
        $group_list .= "\n\t\t<td>" .$row['gender'] . "</td>";
        $group_list .= "\n\t\t<td>" .$row['group_name'] . "</td>";
        $group_list .= "\n\t</tr>";
    }
    $group_list .= "\n\t</table>";


}
else
{
    $group_list = "<h3>No Groups Found</h3>";
}
echo "<br>".$group_list;

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

function button($id, $caption, $action, $function, $class)
{
    return "<button class=\"$class\" id=\"$id\" $action=\"$function\">$caption</button>";
}

function editNav()
{
 return "
    <div class=\"topnav\" id=\"myTopnav\">
    <ul>
        <li> " . button("", "Group List","onclick", "deleteGroup()", "linkButton") . "</li>
        <li> " . button("", "Add Student","", "", "linkButton") . "</li>
        <li> " . button("", "Delete Student","", "", "linkButton") . "</li>
        <li> " . button("", "Split Group","", "", "linkButton") . "</li>
        <li> " . button("", "Print List","", "", "linkButton") . "</li>
        <li> " . button("", "Delete Group","onclick", "viewGroups()", "linkButton") . "</li>
    </ul>
</div>";

}


?>