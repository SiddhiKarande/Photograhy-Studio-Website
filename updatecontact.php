<?php
session_start();
$servername = "localhost";
$username = "root";
$password ="";
$database = "samarat_photo_studio";

$conn = mysqli_connect($servername, $username, $password, $database);
$ses = $_SESSION['adminEmail'];
if($ses== true){

}
else{
    header('location:index.html');
}
$id =$_GET['id'];

$sql = "SELECT * FROM customers_detail Where sno='$id'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>SmaratPhotos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">SamaratPhotos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Topics
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="weddingpage.html">Wedding Photography</a>
                        <a class="dropdown-item" href="#">In Studio Photo Shoot</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="birthdayPage.html">Birthday Photo Shoot</a>
                        <a class="dropdown-item" href="#">Baby Photo Shoot</a>
                        <a class="dropdown-item" href="babyshower.html">Maternity Shoot</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container my-4">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Name :</label>
                <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="custname" name="custname" placeholder="customer name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" value="<?php echo $row['email']; ?>" class="form-control" id="custEmail" name="custEmail" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Phone Number</label>
                <input type="text" value="<?php echo $row['phone']; ?>" class="form-control" id="custphone" name="custphone" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select your Reqirement</label>
                <select  class="form-control" id="custSelection" name="custSelection">
                    <option value="Wedding Photography" 
                    <?php 
                        if($row['selection']=='Wedding Photography'){
                            echo "selected";
                        }
                    ?>
                    >
                    Wedding Photography</option>
                    <option
                    <?php 
                        if($row['selection']=='Birthday Event'){
                            echo "selected";
                        }
                    ?>
                    >Birthday Event</option>
                    <option
                    <?php 
                        if($row['selection']=='In Studio Shoot'){
                            echo "selected";
                        }
                    ?>
                    >In Studio Shoot</option>
                    <option
                    <?php 
                        if($row['selection']=='Pre-Wedding/Post-Wedding Shoot'){
                            echo "selected";
                        }
                    ?>
                    >Pre-Wedding/Post-Wedding Shoot</option>
                    <option
                    <?php 
                        if($row['selection']=='Other Event'){
                            echo "selected";
                        }
                    ?>
                    >Other Event</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Tell us about your Requirenment.Please explain Your need.</label><br>
                <textarea value=" class="form-control" id="details" name="details" rows="3">
                <?php echo $row['details']; ?>
            </textarea>
            </div>
           <!--<button class="btn btn-primary" value="Update details" name="update">Resubmit</button>-->
           <input type="submit" value="Submit" class="btn" name="submit">
           <div class="form-group">
            <p><b>We will call you back as soon as possible.Thank you .</b></p>
        </div>
        </form>

    </div>
    <?php
if(isset($_POST['submit'])){
    
 $Name = $_POST['custname'];
 $Email = $_POST['custEmail'];
 $Phone = $_POST['custphone'];
 
 $Selection = $_POST['custSelection'];
 $detail = $_POST['details'];

 if($ses== true){

}
else{
    header('location:index.html');
}
 $sql="UPDATE customers_detail SET name='$Name',email='$Email',phone='$Phone',selection='$Selection',details='$detail' WHERE sno='$id'";
 $result=mysqli_query($conn, $sql);
 
if($result){
        echo '<script type="text/javascript">alert("update") </script>';
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/miniproject/contactRecords.php" />
       <?php
        // header('location:index.html');
        
        


       }
else{
    echo '<script type="text/javascript">alert("Not update") </script>';
    header('location:index.html');
}


}
    

?>

    <footer class="container">
        <marquee><b><h3>Samarat Photo  >> Contact Number : 9130953301      >> Email : samaratphotos@gmail.com</h3></b></marquee>
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2021-2022 SamaratPhotos, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
