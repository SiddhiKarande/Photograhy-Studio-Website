<?php
session_start();
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //include 'C:\xampp\htdocs\miniproject\dbconnect.php';
    $servername = "localhost";
$username = "root";
$password ="";
$database = "samarat_photo_studio";

$conn = mysqli_connect($servername, $username, $password, $database);
    
    $Email = $_POST['adminEmail'];
    $pass = $_POST['adminPassword'];

    $q= "select * from adminlogin where admin_Email='$Email' && pass='$pass' ";

$result=mysqli_query($conn, $q);

$num= mysqli_num_rows($result);

if($num==1){
	$_SESSION['adminEmail']=$Email;
	header('location:contactRecords.php');
	
}else{
	
	header('location:index.html');
} 
}

?>