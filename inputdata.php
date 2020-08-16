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
    $result = mysqli_query($conn, "SELECT * FROM admin");
    
    if (isset($_POST["submit_ketum"])){
        // $kandidat_ketum1=$_POST["kandidat_ketum1"];
        // $kandidat_ketum2=$_POST["kandidat_ketum2"];
        inputNamaKetum($_POST);
        inputGambarKetum($_POST);
    }
    if( isset($_POST["submit_ketude"])){
        // $kandidat_ketude1=$_POST["kandidat_ketude1"];
        // $kandidat_ketude1=$_POST["kandidat_ketude2"];
        inputNamaKetude($_POST);
        inputGambarKetude($_POST);
    }
    if( isset($_POST["submit_date"])){
        $tanggal = $_POST["inputDate"];
        echo $tanggal;
        $result2 = mysqli_query($conn, "UPDATE admin SET nama='$tanggal' WHERE jabatan = 'tanggal'");
    }

    if(isset($_POST["logout"])){
        LogOut();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


    <title>Web MMIF</title>
    <link rel="stylesheet" href="style.css">


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
                        <p>Admin: <?php 
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

    <section class="input-form">
        <h1>INPUT DATA KANDIDAT</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <form class="ketude-form-group" method="post" action="" enctype="multipart/form-data" id="ketum">
                            <h4 class="font-weight-bold ">KANDIDAT KETUA UMUM<br>HMIF FT UH</h4>
                            <div class="form-group ">
                                <label for="exampleInputNama1 "><b>Kandidat 1</b><br>Nama</label>
                                <input type="text " class="form-control justify-content-center " id="exampleInputNama1 " aria-describedby="emailHelp " name="kandidat_ketum1">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputImage1 ">Image</label>
                                <input type="file" class="form-control " id="exampleInputImage1 " name="gambar_ketum1">
                            </div>
                            <div class="next">
                                <div class="form-group ">
                                    <label for="exampleInputNama1 "><b>Kandidat 2</b><br>Nama</label>
                                    <input type="text " class="form-control " id="exampleInputNama1 " aria-describedby="emailHelp " name="kandidat_ketum2">
                                </div>
                                <div class="form-group ">
                                    <label for="exampleInputImage1 ">Image</label>
                                    <input type="file" class="form-control " id="exampleInputImage1 " name="gambar_ketum2">

                                </div>
                            </div>
                            <button name="submit_ketum" class="button btn btn-primary">
                                <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                                <span class="btn-txt">Submit</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                <div class="col">
                    <div class="card">  
                    <form id="dateWrapper" method="post" action="">
                        <h4 class="font-weight-bold ">INPUT TANGGAL MULAI<br>PEMUNGUTAN SUARA</h4>
                        <div class="form-group-date">
                            <label for="exampleInputDate ">Tanggal dan Jam</label>
                            <input type="text" class="form-control " id="exampleInputDate " placeholder="yyyy-mm-dd hh:mm:ss" name="inputDate">     
                        </div> 
                        <button class="button2 btn btn-primary" name="submit_date">
                            <i class="loading-icon2 fa fa-spinner fa-spin hide"></i>
                            <span class="btn-txt2">Submit</span>
                        </button>
                    </form>
                </div>
                <a href="admin.html" class="back"><button type="submit " class=" btn btn-primary ">Back to Home</button></a>
            </div> 
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <form class="ketude-form-group" action="" method="post" enctype="multipart/form-data" id="ketude">
                            <h4 class="font-weight-bold ">KANDIDAT KETUA DEWAN<br>MMIF FT UH</h4>

                            <div class="form-group ">
                                <label for="exampleInputNama1 "><b>Kandidat 1</b><br>Nama</label>
                                <input type="text " class="form-control " id="exampleInputNama1 " aria-describedby="emailHelp " name="kandidat_ketude1">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputImage1 ">Image</label>
                                <input type="file" class="form-control " id="exampleInputImage1 " name="gambar_ketude1">
                            </div>

                            <div class="next">
                                <div class="form-group ">
                                    <label for="exampleInputNama1 "><b>Kandidat 2</b><br>Nama</label>
                                    <input type="text " class="form-control " id="exampleInputNama1 " aria-describedby="emailHelp " name="kandidat_ketude2">
                                </div>
                                <div class="form-group ">
                                    <label for="exampleInputImage1 ">Image</label>
                                    <input type="file" class="form-control " id="exampleInputImage1 " name="gambar_ketude2">

                                </div>
                            </div>
                            <button name="submit_ketude" class="button1 btn btn-primary">
                                <i class="loading-icon1 fa fa-spinner fa-spin hide"></i>
                                <span class="btn-txt1">Submit</span>
                            </button>
                        </form>
                        <a href="admin.php" class="back"><button type="submit " class=" btn btn-primary ">Back to Home</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        $(document).ready(function() {
            $('#ketude').on('submit', function(){
            let Data = $('#ketude').serialize();
            $.ajax({
            type : 'POST',
            url  : 'inputdata.php',
            data : Data,
            success: function(res){
                if (res){
                    $(".loading-icon").removeClass("hide");
                    // $(".button").attr("disabled", true);
                    $(".btn-txt").text("");
                } else {
                    setTimeout(function() {
                        $(".loading-icon").addClass("hide");
                        // $(".button").attr("disabled", false);
                        $(".btn-txt").text("Submit");
                    }, 3000);
                }
            }
        });
            });
        });
        
        $(document).ready(function() {
            $('#dateWrapper').on('submit', function(){
            let Data = $('#dateWrapper').serialize();
            $.ajax({
            type : 'POST',
            url  : 'inputdata.php',
            data : Data,
            success: function(res){
                if (res){
                    $(".loading-icon2").removeClass("hide");
                    // $(".button").attr("disabled", true);
                    $(".btn-txt2").text("");
                } else {
                    setTimeout(function() {
                        $(".loading-icon2").addClass("hide");
                        // $(".button").attr("disabled", false);
                        $(".btn-txt2").text("Submit");
                    }, 3000);
                }
            }
        });
            });
        });
        
        $(document).ready(function() {
            $('#ketum').on('submit', function(){
            let Data = $('#ketum').serialize();
            $.ajax({
            type : 'POST',
            url  : 'inputdata.php',
            data : Data,
            success: function(){
            
                $(".loading-icon1").removeClass("hide");
                $(".button1").attr("disabled", true);
                $(".btn-txt1").text("");

                setTimeout(function() {
                    $(".loading-icon1").addClass("hide");
                    $(".button1").attr("disabled", false);
                    $(".btn-txt1").text("Submit");
                }, 3000);
            }
        }
    });
            });
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>
