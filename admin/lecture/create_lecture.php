<?php
include_once "../../../connect.php";
include_once "../student/form.php";
echo header_html("../../../style.css");

//Now the goal is to create all lectures and then show the student the lectures that were created ....
//Firstly make sure that we knwo if we are on the first of the secon semester.
//Or rather let us do it this way we are going to create all lectures for first and second semester.
//select * the modules.
//After doing so we want omke
//HI there 
//We need to have the back button

echo "<h1>Create Modules</h1><br><hr><br>";

echo back_button("lecture_portal.php");

//echo $create_lecture;
if(isset($_POST['auto_create']))
{
    $course_id = $_SESSION['course_id'];
    $sql = "SELECT * \n"
    . "FROM module, course_module\n"
    . "WHERE module.module_code = course_module.module_code\n"
    . "AND course_module.course_id = $course_id";
    $result = mysqli_query($link, $sql);
    $insert_result ="";
    if(mysqli_num_rows($result) > 0)
    {
        //We need to get all the courses and then we need to create 
        //Lecture contains all the modules - semester, year, prerequisite_module, module_code.
        //Now the question is how are we going to make sure that we are going to assign the modules to where they belong?
        //I am also worried about the part of pre-requisites.
        //We can use the module_code to get the pre-requisites which means BT requires AT to be registered. -- And we also need to make sure that the we are able to get that.
        while($row = mysqli_fetch_assoc($result))
        {
            // echo "<br>" . $row['module_code'] . " " . $row['module_name'] . " " . $row['date'] . " " ;
            // //Let us test pre-requisite.
            // $module_code = $row['module_code'];
            // //Now let us break down this module to know if a few things about it.
            // //We can use an array - and bouble sorting.
            //echo "<br>" . $row['module_code'] . " " . $row['module_name'] . " " . $row['date'] . " " ;
            //Let us test pre-requisite.
            $module_code = $row['module_code'];
            //Now we need to create an insert for all these modules so that we can move forward.
            //Now the user needs to specify the semester and the year.
            $year = (int)$_POST['year'];
            $semester = (int)$_POST['semester'];
            //$year = 2019;//(int)date('Y');
            $sql = " INSERT INTO `lecture` (`semester`, `year`, `module_code`) VALUES ($semester, $year, \"$module_code\") ";
            //echo $sql;
            if(mysqli_query($link, $sql))
            {
                //New Lectures Created - Students may be able to now register.
                //echo "<Good <br>";
                $insert_result = "<h2>Modules Created Successfully</h2> <hr><p>Good - Click the Back button</p>";
                
            }
            else
            {
                $insert_result = "<h2>Modules Not Created</h2> <hr><p>" . mysqli_error($link) . "</p>";
            }
            //Now let us break down this module to know if a few things about it.
            //We can use an array - and bouble sorting.
        }
        //header("LOCATION: lecture_portal.php, 7");
        echo $insert_result;
    }
}
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

?>  
