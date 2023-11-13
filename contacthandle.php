<?php
//Connecting to Samarat_Photo_Studio DB

session_start();


$servername = "localhost";
$username = "root";
$password ="";
$database = "samarat_photo_studio";

    $Name = $_POST['custname'];
	$Email = $_POST['custEmail'];
	$Phone = $_POST['custphone'];
	
	$Selection = $_POST['custSelection'];
	$detail = $_POST['details'];


$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
    die ("notconnected" . mysqli_connect_error());
    
}else {
    $ses = $_SESSION['adminEmail'];
    if($ses== true){
    
    }
    else{
        header('location:index.html');
    }
 $sql="INSERT INTO `customers_detail` (`name`, `email`, `phone`, `selection`, `details`) VALUES ('$Name', '$Email', '$Phone', '$Selection', '$detail')";
 $result=mysqli_query($conn, $sql);
 //header("Location:index.html")
//echo "conn";
    if($result){
         $showAlert = true;
         header("Location:index.html");
    
            }
    }
?>