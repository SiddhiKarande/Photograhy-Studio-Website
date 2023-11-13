
<?php
session_start();
?>
<html>
    <head><title>Admin view</title>
    <style>
        body{
            background-color: #DCDCDC;
        }
        table{
            background: #A9A9A9 ;
        }
        h2{
            text-align:center;
        }
    </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">SmaratPhotos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="mx-2">
                
          
               <a href="logout.php"> <input type="submit" name="" value="LogOut"  style="background-color:red"></a>
            </div>
        </nav>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </body>

</head>

<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "samarat_photo_studio";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

$ses = $_SESSION['adminEmail'];
if($ses== true){

}
else{
    header('location:index.html');
}
$sql = "SELECT * FROM `customers_detail`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
echo $num;
echo " records found in the DataBase<br>";
// Display the rows returned by the sql query
if($num> 0){
    ?>
    <h2><mark>List of people who have Contacted</mark></h2>
    <table border="1" cellspacing="7" >
        <tr>
        <th width="3%">S.No.</th>
        <th width="10%">Name</th>
        <th width="15%">Email</th>
        <th width="12%">Phone No.</th>
        <th width="15%">Event</th>
        <th width="25%">Details</th>
        <th width="15%">Operations</th>
        </tr>


    <?php 

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
       echo"
       <tr>
        <td>".$row['sno']."</td>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['selection']."</td>
        <td>".$row['details']."</td>

        <td><a href='updatecontact.php?id=$row[sno]'><input type='Submit' value='Update'></a>
        <a href='deletecontact.php?id=$row[sno]'><input type='Submit' value='Delete'></a>
        </td>
        </tr>
        ";
        //echo $row['sno'] .  ".  ". $row['name'] ."   ". $row['email']." ". $row['phone']." ". $row['selection'] . " ".  $row['details'];
        echo "<br>";
    }


}
?>
</table>
