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
    
    //pagination
    $jumlahDataPerHalaman=25;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;
    

    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

    if ( isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }

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



    <title>Web MMIF</title>
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

    <!-- Data Pemilih -->
    <section class="update-pemilih">
        <div class="container">
            <h2>Data Pemilih</h2>
            <div class="tabel-pemilih">
                <table>

                <!-- Pagenation -->
                <form action="" method="post" >
                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
                    <button type="submit" name="cari"> Cari </button>
                </form>
                <br><br>

                <?php if($halamanAktif>1) : ?>
                    <a href="?halaman=<?= $halamanAktif-1 ?>">&laquo</a>
                <?php endif ?>


                <?php if(isset($_POST["cari"])) :?>
                    <?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
                        <a id="halaman" href="?halaman=<?= $i ?>"> <?php echo $i; ?> </a>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
                        <?php if($i == $halamanAktif) : ?>
                            <a id="halaman" href="?halaman=<?= $i ?>" style="font-weight: bold; color:red;"> <?php echo $i; ?> </a>
                        <?php else : ?>
                            <a href="?halaman=<?= $i ?>"> <?php echo $i; ?> </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>

                <?php if($halamanAktif<$jumlahHalaman) : ?>
                    <a href="?halaman=<?= $halamanAktif+1 ?>">&raquo</a>
                <?php endif ?>

                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Memilih Ketum</th>
                        <th>Memilih Ketude</th>
                    </tr>
                    <?php $i = 1 ?>
                    <?php foreach($mahasiswa as $row) : ?>
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <!-- <td> 
                                <a href="update.php?id=<?= $row["id"]; ?>">ubah</a> | 
                                <a href="hapus.php?id=<?= $row["id"]; ?>" >hapus</a>    
                                <!-- hati hati dengan ?= ?> dan ?php ?> -->
                            
                            <td> <?php echo $row["NIM"]; ?> </td>
                            <td> <?php echo $row["nama"]; ?> </td>
                            <td> <?php echo $row["ketum"]; ?> </td>
                            <td> <?php echo $row["ketude"]; ?> </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <a href="admin.html" class="back1"><button type="submit " class=" btn btn-primary ">Back to Home</button></a>

        </div>
    </section>



    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>
