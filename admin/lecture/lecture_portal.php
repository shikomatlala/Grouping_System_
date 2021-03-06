<?php
//All our includes are here.
include_once "../../../connect.php";
include_once "../functions.php";
include_once "../student/student.php";
include_once "../student/form.php";
echo header_html("../../../style.css");
//OK Now let us manege the lectures.
echo "<h1>Course Management Portal</h1><br>";
back_button("../home/admin_home.php");
echo "\n<div class=\"container2\">\n";
echo "<h3>Populate Modules</h3>";
echo "<p>You can populate modules so that students can enrol modules<br>

creating a module will require you to also have lecturers who will be available to give the modules<br>Select to create a module.</p>";
//Lec us nwo create a user can create a lecturer -
$form = new Form();
$label = new Label();
$input = new Input();
//Potential issue here is that this session is created when the Admin goes to the student portal - Now I need to make sure that I just call this
$_SESSION['course_id'] = 0;
echo get_course_list($link, "lecture_portal.php");


//
//echo "<div class=\container2\" >";
if(isset($_POST['click_course']) )//)
{


  //Put in place the year and the callender
  //echo $_POST['click_course'] . "**** " .  $_POST['course'] . " ||||";
  //$_SESSION['isClicked'] = true;
  $_SESSION['course_sess'] = $_POST['course'];

  //You can also view all the available classes for the year.
  //In order to view course modules we need to know the know the course _id
  $course_id = $_SESSION['course_sess'];
  $label->set_label("view_course", "Click to view and Manage Course Modules", "");
  echo $label->get_label() . "<br>";
  echo button("", "", "$course_id", "course_id", "view_course", "View Course Modules", "view_course_module.php") . "<br>";
  //Specify semester and year --
  //echo "<br>" .  $_SESSION['course_sess'] . " <br>";
  //create a session for saving of this information to keep int fase
  //I am learning that I cannot have more than one form at a time - and yet use both those forms together - I do not know how one can be able to do this.
  echo "<h2>Auto Create Lectures</h2>";
  echo "<p>You can automatically create all lectures for<p>" . get_course_name_clicked($link, $_SESSION['course_sess']) . " by clicking the button bellow";


  //Create a form for the user to click the button so that they can create the lecture
  //now what is automatic creation of lectures.
  //Create a form - remember that he purpose of the form is to make sure that we can get the course that we working with.
  $semester_num_select = new Select();
  $year_select = new Select();
  $year_select_output = "";
  $inputs = "";
  $compile_select = "";
  
  //Create Form 
  $form->set_form("create_lecture.php", "POST", "");
  //Create a select button - for semester - or a drop down.
  $semester_num_select->set_select("semester", "semester", "input_");
  $semester_num_select->set_option("1", "1st Semester");
  $compile_select .= "\t". $semester_num_select->get_option();
  $semester_num_select->set_option("2", "2nd Semester");
  $compile_select .= "\t". $semester_num_select->get_option();
  $semester_select = $semester_num_select->get_select($compile_select);  
  //Create the Year Select
  //But this should be created pragmatically so we need to check which have been done before
  $compile_select = "";
  $year_select->set_select("year", "year", "input_");
  $year_select->set_option("2019", "2019", "");
  $compile_select .= "\t". $year_select->get_option();
  $year_select->set_option("2020", "2020", "");
  $compile_select .= "\t". $year_select->get_option();
  $year_select->set_option("2021", "2021", "");
  $compile_select .= "\t". $year_select->get_option();
  $year_select_output = $year_select->get_select($compile_select);  
  //echo $final_select;

  $label->set_label("semester", "Choose Year", "");
  $inputs .= $label->get_label() . "<br>";
  //$inputs .= $final_select  . "<br>";
  //Hidden button
  $input->set_input("hidden", "course_id", $_SESSION['course_sess'], "", "");
  $inputs .= $input->get_input();
  $inputs .= $year_select_output . "<br>";
  $label->set_label("semester", "Choose Semester", "");
  $inputs .= $label->get_label() . "<br>";
  $inputs .= $semester_select . "<br>";
  //Submit Button
  $input->set_input("submit", "auto_create", "Auto Create Lectures", "", "update_button");
  $inputs .= $input->get_input() . "<br>";
  echo $form->get_form_wrapper($inputs);
  $_SESSION['course_id'] = (int)$_SESSION['course_sess'];
}
if(isset($_POST['auto_create']))
{
  $course_id = $_SESSION['course_id'];
  //We need to get the semester and tye year --
  $sql = "SELECT * \n"
    . "FROM module, course_module\n"
    . "WHERE module.module_code = course_module.module_code\n"
    . "AND course_module.course_id = $course_id ";
  $result = mysqli_query($link, $sql);
  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      echo "<br>" . $row['module_code'] . " " . $row['module_name'] . " " . $row['date'] . " " ;
    }
  }

}
//Now we want to see all the course first and then we want to see all the modules
//Now let us add things inside our form

function back_button($back_url)
{
    $form = new Form();
    $input = new Input();
    $out = "";
        //create a back button - which is actually a form - 
        $form->set_form($back_url, "POST", "");
        //$label->set_label("Click to Register new Student", "First Name", "");
        $input->set_input("submit", "back", "Back", "", "back_button");
        echo $form->get_form_wrapper($input->get_input());
        //Above is the back button
    return $out;
}
//This button take information --- Let us now make use of it
function button($data1, $data_name1, $data2, $data_name2, $button_name, $button_caption, $action)
{
    $form = new Form();
    $input = new Input();
    $inputs = "";
    $out = "";
        //create a back button - which is actually a form - 
        $form->set_form($action, "POST", "");
        $input->set_input("hidden", $data_name1, $data1, "", "");
        $inputs .= $input->get_input() . "\n";
        $input->set_input("hidden", $data_name2, $data2, "", "");
        $inputs .= $input->get_input() . "\n";
        $input->set_input("submit", $button_name, $button_caption, "", "submit_button");
        $inputs .= $input->get_input() . "\n";
        $out =  $form->get_form_wrapper($inputs);
        //Above is the back button
    return $out;
}

echo "</div>";

?>
