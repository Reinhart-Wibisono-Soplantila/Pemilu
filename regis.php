<?php 
    require 'function.php';
    
    if (isset($_POST["regis"])){
        $NIM = $_POST["NIM"];
        $email_user = $_POST["email_sso"];
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");

        if( mysqli_num_rows($result) === 1) {
            $registrasi='sudah';
            $result = mysqli_query($conn, "SELECT registrasi FROM mahasiswa WHERE NIM='$NIM'");
            $regis =  mysqli_fetch_assoc($result);
            if($registrasi != $regis["registrasi"]){
                $update = "UPDATE mahasiswa SET registrasi='sudah' WHERE NIM = '$NIM'";
                mysqli_query($conn, $update);
                $result = mysqli_query($conn, "SELECT email_sso FROM mahasiswa WHERE NIM='$NIM'");
                $email =  mysqli_fetch_assoc($result);
                if($email_user == $email["email_sso"]){
                    
                    if( regis($_POST)>0){
                        // encrypt($NIM);
                        echo "<script>
                            alert('berhasil terregister');
                            </script>
                            ";
                            
                    } else{
                        echo mysqli_error($conn);
                        
                    }
                }
                else{
                    echo "<script>
                    alert('Registrasi gagal, periksa kembali email dan nim');
                    </script>
                    "; 
                }
            } else {
                echo "<script>
                    alert('Anda sudah melakukan registrasi sebelumnya');
                    </script>
                    "; 
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="navbar-header">
            <img src="img/if.png" alt="">
            <a href="#"></a>PEMILU RAYA MAHASISWA INFORMATIKA</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="log-in"><a href="login.php" style="color: white;">Login</a></li>
            </ul>
        </div>
    </nav>

    <section class="regis-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="icon-kandidat ">
                            <h1 class="who">WHO'S</h1>
                            <img src="img/Gogog.png" width="250 " alt=" ">
                            <h1 class="next">NEXT ?</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <form class="regis-form-group " action="" method="post" id="regis">
                            <legend class="font-weight-bold ">Form Registrasi Pemilih</legend>
                            <div class="form-group ">
                                <label for="exampleInputNama1 ">Nama</label>
                                <input type="text " class="form-control " id="exampleInputNama1 " aria-describedby="emailHelp " name="nama" required>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputNim ">Nim</label>
                                <input type="text " class="form-control " id="exampleInputNim1 " name="NIM" required>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1 ">Email</label>
                                <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " name="email_sso" required>
                            </div>
                    
                            <button type="submit" class="button btn btn-primary" name="regis">
                            <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                            <span class="btn-txt">Registrasi</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UPDATE DATA PEMILIH -->
    <section class="update-data-pemilih">
        <div class="container ">
            <h2 style="text-align: center; ">UPDATE DATA PEMILIH</h2>
            <div class="row justify-content-center ">
                <div class="kotak ">
                    <h1>
                    <?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
                      // $row = mysqli_fetch_assoc($result);
                      $row=mysqli_num_rows($result);
                      echo $row;?>
                    </h1>
                    <h3>Jumlah Pemilih Tetap</h3>
                </div>
                <div class="kotak ">
                    <h1>
                    <?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE memilih='sudah'");
                    // $row = mysqli_fetch_assoc($result);
                    $row=mysqli_num_rows($result);
                    echo $row;?>
                    </h1>
                    <h3>Telah Memilih</h3>
                </div>
                <div class="kotak ">
                    <h1>
                    <?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE memilih=''");
                    // $row = mysqli_fetch_assoc($result);
                    $row=mysqli_num_rows($result);
                    echo $row;?>
                    </h1>
                    <h3>Belum Memilih</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#regis').on('submit', function(){
                let Data = $('#regis').serialize();
                $.ajax({
                    type : 'POST',
                    url  : 'regis.php',
                    data : Data,
                    success: function(res){
                        if (res) {
                            $(".loading-icon").removeClass("hide");
                            $(".btn-txt").text("");
                        } else {
                            setTimeout(function() {
                                $(".loading-icon").addClass("hide");
                                $(".btn-txt").text("Registrasi");
                            }, 3000);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
