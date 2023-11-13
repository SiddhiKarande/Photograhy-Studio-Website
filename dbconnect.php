<?php
//Connecting to Samarat_Photo_Studio DB

$servername = "localhost";
$username = "root";
$password ="";
$database = "samarat_photo_studio";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
    die ("notconnected" . mysqli_connect_error());
}
echo "conn";


?>