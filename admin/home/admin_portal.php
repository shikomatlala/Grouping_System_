<?php
  include "../../../connect.php";
  echo header_html_("../../../style.css");
?>
    <h1>WELCOME TO THE GROUPING SYSTEM</h1>
    <h2>Sign In</h2>
    <form class="form_admin_portal" action="confirm_admin_user.php" method="post">
      <label for="username">Username:</label><br>
      <input class="input_" type="text" id="username" name="username"><br><br>

      <label for="password">Password:</label><br>
      <input class="input_" type="password" id="password" name="password"><br><br>

      <input class="submit_button" type="submit" value="Submit" name="submit"><br><br>
    </form>
    <div class="basic_center">
      <a href="../insert_admin/create_admin.php">Create Admin?</a><br>
    </div>

  </body>
</html>
