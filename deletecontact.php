<?php
//Connecting to Samarat_Photo_Studio DB
session_start();
$servername = "localhost";
$username = "root";
$password ="";
$database = "samarat_photo_studio";

$conn = mysqli_connect($servername, $username, $password, $database);

$id =$_GET['id'];
$sql = "DELETE  FROM customers_detail Where sno='$id'";
$result = mysqli_query($conn, $sql);
$ses = $_SESSION['adminEmail'];
if($ses== true){
}
else{
    header('location:index.html');
}
if($result){

   // echo "Record Delete";
   header('location:contactRecords.php');

}
else{
    echo "Not deleted";
}

?>