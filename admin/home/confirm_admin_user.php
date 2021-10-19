<?php
include "../../../connect.php";
echo header_html_("../../../style.css");

$username = (int)$_POST['username'];
$password = $_POST['password'];
if(isset($_POST['submit']))
{
    //Let us login the user
    //Check if their stud_number and password are imagegammacorrect
    if(isset($username))
    {
      $sql = "SELECT * FROM lecturer_portal WHERE password = '$password' AND staff_number = $username ";
      $result = mysqli_query($link, $sql);
      if(mysqli_num_rows($result) > 0)
      {

          // include "admin_home.php";
          // header("")
          header("LOCATION: admin_home.php");
          $_SESSION['staff_number'] = $username;
          //echo $_SESSION['staff_number'];
      }
      else
      {
        //include "login_error.php";
        header("LOCATION: admin_portal.php");
      }
    }
}
else
{
  header("LOCATION: admin_portal.php");
}




 ?>
