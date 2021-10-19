<?php
include_once "form.php";
include_once "student.php";

function newUser()
{
    $input = new Input();
    $label = new Label();

    $input_wrapper = "";
    $label->setLabel("first_name", "First Name", "", "lblFName");
    $input->setInput("text", "first_name", "", "First Name", "input_", "fname", "oninput", "validateName(this.id, 'lblFName')");
    $input_wrapper .= $label->getLabel() . "<br>\n";
    $input_wrapper .= $input->getInput() . "<br><br>\n";
    //Last Name
    $label->setLabel("last_name", "Last Name", "", "lblLName");
    $input->setInput("text", "last_name", "", "Last Name", "input_", "lname", "oninput", "validateName(this.id, 'lblLName')");
    $input_wrapper .= $label->getLabel() . "<br>\n";
    $input_wrapper .= $input->getInput() . "<br><br>\n";
    //ID Number
    $label->set_label_("id_nr", "ID Number", "", "lblId_nr");
    $input->setInput("text", "id_nr", "", "ID Number", "input_", "id_nr", "oninput", "validate_id()");
    $input_wrapper .= $label->get_label_() . "<br>\n";
    $input_wrapper .= $input->getInput() . "<br><br>\n";
    //Select Sex
    $label->set_label_("sex", "Sex", "", "lblSex");
    $input_wrapper .= $label->get_label_() . "<br>\n";
    $select = new Select();
    $select->setSelect("sex","sex", "input_", "onchange", "validate_id()");
    $select->set_option("M", "Male");
    $gender_option = "\t".$select->get_option();
    $select->set_option("F","Female");  
    $gender_option .= "\t".$select->get_option();
    $select_output = $select->getSelect($gender_option);
    $input_wrapper.= $select_output. "<br>";
    //Phone Number
    $label->set_label_("phone", "Phone Number", "", "lblPhone");
    $input->setInput("text", "phone", "", "e.g. 0765870538", "input_", "phone", "oninput", "validatePhone()");
    $input_wrapper .= $label->get_label_() . "<br>\n";
    $input_wrapper .= $input->getInput() . "<br><br>\n";

    $label->set_label("address", "Home Address", "");
    $input->set_input("text", "address", "", "Home Address", "input_");
    $input_wrapper .= $label->get_label() . "<br>\n";
    $input_wrapper .= $input->get_input_text() . "<br><br>\n";
    // $input->set_input("submit","submit", "Insert Student", "","update_button");
    // $input_wrapper .= $input->get_input() ."<br>\n";

    return $input_wrapper;
}







// =============================================================================
//     THIS INFORMATION BELONG TO $form->set_form("insert_student", "POST", "");
//     This information has been replaced with a new user component
// =============================================================================

    //first _name
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
    // $input_wrapper .= $label->get_label_() . "<br>\n";
    // $input_wrapper .= $input->getInput() . "<br><br>\n";
    // //first _name
    // $label->set_label("address", "Home Address", "");
    // $input->set_input("text", "address", "", "Home Address", "input_");
    // $input_wrapper .= $label->get_label() . "<br>\n";
    // $input_wrapper .= $input->get_input_text() . "<br><br>\n";
    // $input->set_input("submit","submit", "Insert Student", "","update_button");
    // $input_wrapper .= $input->get_input() ."<br>\n";


?>