<?php
include_once "../class/form.php";
include_once "../../../connect.php";
include_once "../class/student.php";
include_once "../class/component.php";
echo header_html_("../../../style.css");
$form = new Form();
$input = new Input();
$label = new Label();
$student = new Student();
$div = new Div();
$input_wrapper = "";
echo "<h1>Insert a New Admin/Lecturer</h1>\n<br><hr>";
//This is the back button - it is a functio which takes us back
echo back_button("../home/admin_portal.php");
echo "<h3 class=\"center_el\">Enter The Following Details and then Submit</h3>\n";

$form->set_form("insert_admin.php", "POST", "");
$input_wrapper .= newUser();
$input->setInput("submit", "insert_admin", "Insert Admin/Lecturere", "", "update_button", "createAdmin", "", "");
$input_wrapper .= $input->getInput() ."<br>\n";

$div->set_div("form_input", "");
echo $div->get_div($form->get_form_wrapper($input_wrapper));


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
        $input->set_input("submit", $button_name, $button_caption, "", "");
        $inputs .= $input->get_input() . "\n";
        $out =  $form->get_form_wrapper($inputs);
        //Above is the back button
    return $out;
}


// //first _name
// $label->setLabel("first_name", "First Name", "", "lblFName");
// $input->setInput("text", "first_name", "", "First Name", "input_", "fname", "oninput", "validateName(this.id, 'lblFName')");
// $input_wrapper .= $label->getLabel() . "<br>\n";
// $input_wrapper .= $input->getInput() . "<br><br>\n";
// //Last Name
// $label->setLabel("last_name", "Last Name", "", "lblLName");
// $input->setInput("text", "last_name", "", "Last Name", "input_", "lname", "oninput", "validateName(this.id, 'lblLName')");
// $input_wrapper .= $label->getLabel() . "<br>\n";
// $input_wrapper .= $input->getInput() . "<br><br>\n";
// //ID Number
// $label->set_label_("id_nr", "ID Number", "", "lblId_nr");
// $input->setInput("text", "id_nr", "", "ID Number", "input_", "id_nr", "oninput", "validate_id()");
// $input_wrapper .= $label->get_label_() . "<br>\n";
// $input_wrapper .= $input->getInput() . "<br><br>\n";
// //Select Sex
// $label->set_label_("sex", "Sex", "", "lblSex");
// $input_wrapper .= $label->get_label_() . "<br>\n";
// $select = new Select();
// $select->setSelect("sex","sex", "input_", "onchange", "validate_id()");
// $select->set_option("M", "Male");
// $gender_option = "\t".$select->get_option();
// $select->set_option("F","Female");  
// $gender_option .= "\t".$select->get_option();
// $select_output = $select->getSelect($gender_option);
// $input_wrapper.= $select_output. "<br>";
// //Phone Number
// $label->set_label_("phone", "Phone Number", "", "lblPhone");
// $input->setInput("text", "phone", "", "e.g. 0765870538", "input_", "phone", "oninput", "validatePhone()");
// //$input->set_input("text", "phone", "", "Phone Number", "input_");
// $input_wrapper .= $label->get_label_() . "<br>\n";
// $input_wrapper .= $input->getInput() . "<br><br>\n";

// //first _name
// $label->set_label("address", "Home Address", "");
// $input->set_input("text", "address", "", "Home Address", "input_");
// $input_wrapper .= $label->get_label() . "<br>\n";
// $input_wrapper .= $input->get_input_text() . "<br><br>\n";



?>