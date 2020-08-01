<?php 
    session_start();
    require 'function.php';

    if(!isset($_SESSION["LOGIN"])){
        //set session
        header("Location: login.php");
        exit;
    }
    if( !isset($_SESSION["panitia"])){
        //set session
        header("Location: login.php");
        exit;
    }

    $NIM=$_SESSION['NIM'];

    if(isset($_POST["logout"])){
        LogOut();
    }

    if(isset($_POST["SUBMIT"])){


        $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE NIM= ? ");
        mysqli_stmt_bind_param($stmt, "s", $_POST["NIM"]);
        mysqli_execute($stmt);
        mysqli_stmt_store_result($stmt);


        
        if( mysqli_stmt_num_rows($stmt) === 1) {
            $result=get_result($stmt);
            $data = array_shift($result);
            $verif = "verif";
            $NIM_peserta = $data['NIM'];
            $nama_peserta = $_POST['nama'];
            $result = mysqli_query($conn, "SELECT verif FROM mahasiswa WHERE NIM='$NIM_peserta'");
            $row =  mysqli_fetch_assoc($result);
            if($row["verif"] != $verif){
                $update = "UPDATE mahasiswa SET verif='verif' WHERE NIM = '$NIM_peserta'";
                mysqli_query($conn, $update);
                $password = generatePass($_POST);
            }else{ 
                echo "<script>
                alert('Hanya Bisa Verifikasi Sekali Saja');
                </script>
                ";
            }
        } else {
            echo "<script>
                alert('NIM Tidak Terdaftar');
                </script>
                ";
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
                <li class="log-out nav-item">
                    <form action="" method="POST">
                        <button name="logout" type='submit' class="btn"><img src="img/Web.png"></button>
                    </form>
                </li>
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
                        <form class="regis-form-group " method="post" id="form-pass">
                            <legend class="font-weight-bold ">Form Generate Password</legend>
                            <div class="form-group ">
                                <label for="exampleInputNama1 ">Nama</label>
                                <input type="text " class="form-control " id="exampleInputNama1 " name="NAMA" aria-describedby="emailHelp "required>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputNim ">Nim</label>
                                <input type="text " class="form-control " id="exampleInputNim1 " name="NIM" required>
                            </div>

                        

                    </div>
                    <button type="submit" name="SUBMIT" class="button btn btn-primary">
                        <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                        <span class="btn-txt">Generate Password</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="generate">
        <div class="container">
            <h2>Generate Password</h2>
            <div class="tabel-generate">
                <table>
                    <tr>
                        <th>Nim</th>
                        <th>Password</th>
                    </tr>
                    
                    <?php 
                        $data = mysqli_query($conn, "SELECT * FROM password WHERE NIM='$NIM_peserta'");
                        $row=mysqli_fetch_assoc($data);
                    ?>
                    
                    <tr>
                        <td> <?php echo $row["NIM"] ?></td>
                        <td> <?php echo $password ?></td>
                    </tr>
                </table>
            </div>

        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#form-pass').on("submit", function(){
                var Data = $('#form-pass').serialize();
                $.ajax({
                    type : 'POST',
                    url  : 'GeneratePass.php',
                    data : Data,
                    success: function(res){
                        if(res){
                            $(".loading-icon").removeClass("hide");
                            $(".btn-txt").text("");
                        } else {
                            setTimeout(function() {
                                $(".loading-icon").addClass("hide");
                                $(".btn-txt").text("Generate Password");
                            }, 5000);
                        }
                    }
                })
            });
        });
    </script>
</body>

</html>