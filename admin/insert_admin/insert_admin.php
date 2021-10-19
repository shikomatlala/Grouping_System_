<?php

include_once "../../../connect.php";
include_once "student.php";
include_once "form.php";
echo header_html_("../../../style.css");
$student = new Student();
$form = new Form();
$input = new Input();
$label = new Label();
$div = new Div();
$student->set_link($link);
echo "<h1>Insert a New Student</h1>\n<br><hr>";
//create a back button - which is actually a form - 
$form->set_form("../home/admin_portal.php", "POST", "");
//$label->set_label("Click to Register new Student", "First Name", "");
$input->set_input("submit", "back", "Back", "", "back_button");
echo $form->get_form_wrapper($input->get_input());
//what do we need to insert this student -- well we just need to know the current studen stumber - but ai its going to take us time-- wel
//Create an error list - if we can do so we will be ale to know how to work with out erros - or we can push the person back and then just change a few things to the class -
//$status_stud_name = "";
if(isset($_POST['insert_admin']))
{
  //echo "Now in here";
    //Get the
    //$student->validate_name($)
    //print_r($student->get_link());
    $_SESSION['admin_label'] = "";
    $_SESSION['admin'] = array();
    $student->set_stud_number();
    $student->set_firstname($_POST['first_name']);
    $student->set_lastname($_POST['last_name']);
    $student->set_id($_POST['id_nr'], $link);
    $student->set_sex($_POST['sex']);
    $student->set_phone($_POST['phone'], $link);
    $student->set_address($_POST['address']);
    $student->set_email($student->get_stud_number());
    //here we have stored everything inside our array - .
    array_push($_SESSION['admin'], $student->get_stud_number(), $_POST['first_name'],$_POST['last_name'],$_POST['id_nr'], $_POST['sex'], $_POST['phone'],$student->get_email(), $_POST['address']);
    //Now there is no where we are comparing the sex and ID 
    if(strpos($student->view_sql(), "NULL") == false)//Meaning no string found
    {
        $sql = $student->view_sql();
        $label_increment = "";
        if(mysqli_query($link, $student->view_sql()))
        {
          echo "<h1>Lecturer added </h1><hr>";
          //Now le us go to the point were we have the user add more information about our student.
          //echo "<a href=\"student_portal_home.php\">Register another Student</a><br> ";
          //include "student_portal_home.php";
          //Now let us show the student details for the student that has just registered
          //The details are stored in the session
          //create lables contain
          //include_once "module_regisration.php";
          echo $label_increment;
          $_SESSION['stud_label'] = $student->get_student_label();
          echo $student->get_student_label();
          //Create a form where the select will be held
          echo "<br>";
          echo "<hr>";
          echo "<br>";
          //Create a finish button -- to insert this lecturer to the system
          $staff_number = $student-> get_stud_number();
          //finish_button();
          echo button($staff_number,  "staff_number", $_POST['id_nr'], "id_nr", "finish_insert", "Finish", "sign_up.php");

        }
    }
    else
    {
      //echo "<br>Many Errors Found change this dude <br><br>";
      //return the student with the errors that they have made
      $form = new Form();
      $input = new Input();
      $label = new Label();
      $input_wrapper = "";
      $form->set_form("insert_admin.php", "POST", "");
      //first _name
      $label->set_label("first_name", $student->get_stud_name_status($student->get_firstname()), "");
      $input->set_input("text", "first_name",$student->get_firstname(), "First Name", "input_");
      $input_wrapper .= $label->get_label() . "<br>\n";
      $input_wrapper .= $input->get_input_text() . "<br><br>\n";
      //Last Name
      $label->set_label("last_name", $student->get_stud_surn_status($student->get_lastname()), "");
      $input->set_input("text", "last_name", $student->get_lastname(), "Last Name", "input_");
      $input_wrapper .= $label->get_label() . "<br>\n";
      $input_wrapper .= $input->get_input_text() . "<br><br>\n";
      //ID Number
      $label->setLabel("id_nr", $student->get_id_status($student->get_id()), "", "lblId_nr");
      $input->setInput("text", "id_nr", "", "ID Number", "input_", "id_nr", "oninput", "validate_id()");
      $input_wrapper .= $label->getLabel() . "<br>\n";
      $input_wrapper .= $input->getInput() . "<br><br>\n";
      //Select Sex
      $label->setLabel("sex", $student->validate_sex($student->get_id(), $student->get_sex()), "", "lblSex");
      $input_wrapper .= $label->getLabel() . "<br>\n";
      $select = new Select();
      $select->setSelect("sex","sex", "input_", "onchange", "validate_id()");
      $select->set_option("M", "Male");
      $gender_option = "\t".$select->get_option();
      $select->set_option("F","Female");
      $gender_option .= "\t".$select->get_option();
      $select_output = $select->getSelect($gender_option);
      $input_wrapper.= $select_output . "<br>";
      //ID
      $label->setLabel("phone", $student->get_phone_status($student->get_phone()), "", "lblPhone");
      $input->setInput("text", "phone", $student->get_phone(), "Phone Number", "input_", "phone", "oninput", "validatePhone()");
      $input_wrapper .= $label->getLabel() . "<br>\n";
      $input_wrapper .= $input->getInput() . "<br><br>\n";
      //first _name
      $label->set_label("address", "Home Address", "");
      $input->set_input("text", "address", $student->get_address(), "Home Address", "input_");
      $input_wrapper .= $label->get_label() . "<br>\n";
      $input_wrapper .= $input->get_input_text() . "<br><br>\n";
      $input->set_input("submit","insert_admin", "Insert Admin", "","update_button");
      $input_wrapper .= $input->get_input() ."<br>\n";
      $div->set_div("form_input", "");
      echo $div->get_div($form->get_form_wrapper($input_wrapper));
    }
}
//Let us show the student information the form that we want to use.
echo "<br>";
echo "<br>";


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
        $input->set_input_("submit", $button_name, $button_caption, "update_button", "update_button", "subMit");
        $inputs .= $input->get_input_() . "\n";
        $out =  $form->get_form_wrapper($inputs);
        //Above is the back button
    return $out;
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
function finish_button($back_url)
{
    $form = new Form();
    $input = new Input();
    $out = "";
        //create a back button - which is actually a form - 
        $form->set_form($back_url, "POST", "");
        //$label->set_label("Click to Register new Student", "First Name", "");
        $input->set_input("submit", "finish", "Finish", "update_button", "update_button");
        echo $form->get_form_wrapper($input->get_input());
        //Above is the back button
    return $out;
}

?>
