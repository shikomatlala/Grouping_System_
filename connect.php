<?php
session_start();
$database = "grouping_system";
$password = "";
$username = "root";
$servername = "localhost";

//CREATE SESSION VARIABLES
//echo ($_SERVER['REQUEST_URI']); //The reason why I did this echo was to test if the $_SERVER['REQUEST_URI']; works
$link = mysqli_connect($servername, $username, $password, $database);
if($link == false){
    die ("ERROR: Could not connect " . mysqli_connect_error());
}
//One of the things that we can do is to make sure that we create a script that purely hold functions -- but the issue is that we have a lot of moving parts.
//$_SESSION('staff_number') = 0
function div($class, $content)
{
    $out = "";
    $out = "<div class=\"$class\">\n";
    $out .= $content;
    $out .= "</div>\n";
    return $out;
}
function header_html_($style_link)
{
    $url = $_SERVER['REQUEST_URI'];

    //index location
    $js_file = "";
    //loop through the slashes
    $y = 0;
    for($x = 0; $x < strlen($url); $x++)
    { 
        //now display all the slashes
        //Now the goal is to cut the first two slashes
        if($url[$x] === "/")
        {
            $y++;
            if($y >= 4)
            {
                $js_file .= ".." .  $url[$x];
            }
        }
    }
    $js_file .= "index.js";  
    $out = "\n<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\">";
    $out .= "
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link rel=\"stylesheet\" href=\"$style_link\" />
        <title>Grouping System</title>
        <meta charset=\"UTF-8\" />
    </head>
    <body>
    <script src=\"$js_file\"></script>
    \n";

    return $out;
}

function header_html($style_link)
{
    $url = $_SERVER['REQUEST_URI'];

    //index location
    $js_file = "";
    //loop through the slashes
    $y = 0;
    for($x = 0; $x < strlen($url); $x++)
    { 
        //now display all the slashes
        //Now the goal is to cut the first two slashes
        if($url[$x] === "/")
        {
            $y++;
            if($y >= 4)
            {
                $js_file .= ".." .  $url[$x];
            }
        }
    }
    $js_file .= "index.js";  
    $out = "\n<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\">";
    $out .= "
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link rel=\"stylesheet\" href=\"$style_link\" />
        <title>Grouping System</title>
        <meta charset=\"UTF-8\" />
    </head>
    <body>
    <div class=\"topnav\" id=\"myTopnav\">
        <ul>
            <li><a href=\"../lecturer/timetable.php\">Home</a></li>
            <li><a href=\"../lecture/lecture_portal.php\">Manage Lecturers</a></li>
            <li><a href=\"../student/student_portal_home.php\">Manage Students</a></li>
            <li><a href=\"../../../index.php\">Log out</a></li>
        </ul>
    </div>
    <script src=\"$js_file\"></script>
    \n";

    return $out;
}

//<link rel=\"stylesheet\" href=\"$style_link\" />

?>
