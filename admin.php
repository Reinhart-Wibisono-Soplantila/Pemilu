<?php 
session_start();
    
require 'function.php';

if(!isset($_SESSION["LOGIN"])){
    //set session
    header("Location: login.php");
    exit;
}
if( !isset($_SESSION["admin"])){
    //set session
    header("Location: login.php");
    exit;
}
$NIM=$_SESSION['NIM'];

if(isset($_POST["logout"])){
    LogOut();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">



    <title>Admin</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="navbar-header">
                <img src="img/if.png" alt="">
                <a href="#"></a>PEMILU RAYA MAHASISWA INFORMATIKA</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="name nav-item">
                        <p>Admin : <?php 
                        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
                        $nama = mysqli_fetch_assoc($result);
                        echo $nama["nama"];
                        ?></p>
                    </li>
                    <li class="log-out nav-item">
                        <form action="" method="post">
                            <button name="logout" type='submit' class="btn"><img src="img/Web.png"></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Button halaman input dan daftar pemilih  -->
    <section class="halaman-utama-admin">
        <div class="container">
            <button class="btn button1" onclick="document.location='inputdata.php'">Input Data Kandidat</button>
            <button class="btn button2" onclick="document.location='updatepemilih.php'">Update Daftar Pemilih</button>
        </div>

    </section>



    

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="3.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>
