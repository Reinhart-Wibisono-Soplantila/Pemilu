<?php 
    session_start();
    require 'function.php';

    if ( !isset($_SESSION["LOGIN"])){
      //set session
      header("Location: login.php");
      exit;
    }
    
    $NIM=$_SESSION['NIM']; 
    $memilih='memilih';

    if ( isset($_POST["calonketude1"])) {
        if ($memilih == $rows["ketude"]){
            header("Location: halamanutamapemilih.php");
            exit;
        } else {
            echo "<script> alert('Anda Memilih Kandidat Ketua Dewan Pertama')</script>" ;
            ketude1();
            $update = "UPDATE mahasiswa SET ketude='memilih' WHERE NIM = '$NIM'";
            mysqli_query($conn, $update);
            header("Location: halamanutamapemilih.php");
        }
    } elseif (isset($_POST["calonketude2"])) {
        if ($memilih == $rows["ketude"]){
            header("Location: halamanutamapemilih.php");
            exit;
        } else {
        echo "<script> alert('Anda Memilih Kandidat Ketua Dewan Kedua')</script>" ;
        ketude2();
        $update = "UPDATE mahasiswa SET ketude='memilih' WHERE NIM = '$NIM'";
        mysqli_query($conn, $update);
        header("Location: halamanutamapemilih.php");
        }
    }

    // if (isset($_SESSION['ketud1'])){
    //     echo "<script> alert('BERHASIL KANDIDAT PERTAMA')</script>" ;
    // } elseif (isset($_SESSION['ketud2'])){
    //     echo "<script> alert('BERHASIL KANDIDAT KEDUA')</script>" ;
    // }
        
    if(isset($_POST["logout"])){
        LogOut();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li class="name nav-item">
                    <p>
                    <?php 
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
    </nav>


    <div class="container">
        <section class="pilih-ketum">
            <div class="row justify-content-center">
                <form action="" method="post">
                    <button type="submit" name="calonketude1" onclick="return (confirm('Apakah anda yakin memilih Kadidat Ketua Dewan Pertama?'))" class="btn btn-primary" id="calonketude1">
                    <div class="loader">
                        <div class="loading"></div>
                        </div>
                            <div class="foto1">
                            <h1>1</h1>

                            <?php
                            $gambar1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM admin WHERE jabatan='kandidat_ketude1'")); 
                            if($gambar1["foto"] == "CalonKetude1.png"){
                                echo '<img src="img/CalonKetude1.png" alt="">';
                            } else {
                                echo '<img src="img/Gogog.png" alt="">';
                            }
                            ?>

                            <p>
                            <?php 
                            $admin1 = mysqli_query($conn, "SELECT * FROM admin where jabatan='kandidat_ketude1'");
                            $nama1=mysqli_fetch_assoc($admin1);
                            if ($nama1["nama"]== ''){
                                echo "Nama Calon"; 
                            } else {
                                echo $nama1["nama"];
                            } ?></p>
                        </div>
                        </input>
                    </button>
                </form>
                <div class="topik-ketum">
                    <p>CALON<br>KETUA DEWAN<br>HMIF FT-UH</p>
                </div>
                <form action="" method="post">
                    <button type="submit" class="btn btn-primary" onclick="return (confirm('Apakah anda yakin memilih Kadidat Ketua Dewan Kedua?'))" id="calonketude2" name="calonketude2">
                        <div class="loader">
                            <div class="loading"></div>
                        </div>
                            <div class="foto2">
                            <h1>2</h1>

                            <?php
                            $gambar2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM admin WHERE jabatan='kandidat_ketude2'")); 
                            if($gambar2["foto"] == "CalonKetude2.png"){
                                echo '<img src="img/CalonKetude2.png" alt="">';
                            } else {
                                echo '<img src="img/Gogog.png" alt="">';
                            }
                            ?>
                            
                            <p><?php 
                                $admin2 = mysqli_query($conn, "SELECT * FROM admin where jabatan='kandidat_ketude2'");
                                $nama2=mysqli_fetch_assoc($admin2);
                                if ($nama2["nama"]== ''){
                                    echo "Nama Calon"; 
                                } else {
                                    echo $nama2["nama"];
                                } ?></p>
                            </div>
                    </button>
                </form>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        // function spinner() {
        //     document.getElementsByClassName("loader")[0].style.display = "block";
        // }

       
        

        
    </script>

</body>

</html>
