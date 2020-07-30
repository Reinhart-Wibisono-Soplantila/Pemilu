<?php 
    session_start();
    
    require 'function.php';

    if ( !isset($_SESSION["LOGIN"])){
      //set session
      header("Location: login.php");
      exit;
    }
    
    $NIM=$_SESSION['NIM'];
    $sudah='sudah';


    if( isset($_POST["ketude"])){
      $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
      $row = mysqli_fetch_assoc($result);
      if ($sudah == $row["ketude"]){
        echo " <script> alert('hanya bisa memilih satu kali') </script>";
      } else {
        header("Location: pemilihanketude.php");
      }
    }

    if( isset($_POST["ketum"])){
      $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
      $row = mysqli_fetch_assoc($result);
      if ($sudah == $row["ketum"]){
        echo " <script> alert('hanya bisa memilih satu kali') </script>";
      } else {
        header("Location: pemilihanketum.php");
      }
    }


    if(isset($_POST["SUBMIT"])){
        suaraketum();
        suaraketude();
        tidakMemilih();
        LogOut();
    }

    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
    $row = mysqli_fetch_assoc($result);
    if($sudah == $row["ketum"] && $sudah == $row["ketude"]){
        $selesai = "UPDATE mahasiswa SET submit_memilih='sudah' WHERE NIM = '$NIM'";
        mysqli_query($conn, $selesai);
    }


    //mengambl data setiap 6 jam
    $data_awal ="2020-07-25 20:00:00";
    $loop = 16;
    $calonketude1 = [];
    $calonketude2 = [];
    $calonketum1 = [];
    $calonketum2 = [];
    
    for($data=0; $data<$loop*6; $data+=6){
        $enamjam = date('Y-m-d H:i:s', strtotime('+'.$data.'hours',strtotime($data_awal)));
        $calonketude1[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
        $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
        $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
        $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
    }

    // echo '<br>';
    $q1 = '';
    $q2 = '';
    $q3 = '';
    $q4 = '';
    
    for($data=0; $data<$loop;$data++){
        while($datas = mysqli_fetch_array($calonketude1[$data])) {
            $q1 = $q1.$datas['calonketude1'].',';
        }
        while($datas = mysqli_fetch_array($calonketude2[$data])) {
            $q2 = $q2.$datas['calonketude2'].',';
        }
        while($datas = mysqli_fetch_array($calonketum1[$data])) {
            $q3 = $q3.$datas['calonketum1'].',';
        }
        while($datas = mysqli_fetch_array($calonketum2[$data])) {
            $q4 = $q4.$datas['calonketum2'].',';
        }

    }
    // echo $q1.'data, pada jam: '. $tigajam;
    // echo $q2.'data, pada jam: '. $tigajam;
    // echo $q3.'data, pada jam: '. $tigajam;
    // echo $q4.'data, pada jam: '. $tigajam;
    
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">

    <title>WEB MMIF</title>
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
                    <p><?php 
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



    <!-- Menu Pilihan -->
    <section class="menu-pilihan">
        <div class="row justify-content-center">
            <form action="" method="post">
                <button  class="btn btn-primary" name="ketum"> 
                    <div class="foto1">
                        <img src="img/Gogog.png" alt="">
                        <p>CALON<br>KETUA UMUM<br>HMIF FT-UH</p>
                    </div>
                </button>
            </form>
            <form action="" method="post">
                <button name="ketude" class="btn btn-primary">
                        <div class="foto2">
                        <img src="img/Gogog.png" alt="">
                        <p>CALON<br>KETUA DEWAN<br>MMIF FT-UH</p>
                    </div>
                </button>
            </form>
        </div>
    </section>


    <center>
        <form method="post" id="form-submit">
            <button type='submit' class="submit btn btn-primary" name="SUBMIT">
                <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                <span class="btn-txt">Submit</span>
            </button>
        </form>
    </center>


    <!-- UPDATE DATA PEMILIH -->
    <section class="update-data-pemilih">
        <div class="container">
            <div class="col text-center">
                <P>UPDATE DATA PEMILIH</P>
            </div>
            <div class="row justify-content-center">
                <div class="kotak ">
                    <h1><?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
                      // $row = mysqli_fetch_assoc($result);
                      $row=mysqli_num_rows($result);
                      echo $row;?></h1>
                    <h3>Jumlah Pemilih Tetap</h3>
                </div>
                <div class="kotak ">
                    <h1><?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE submit_memilih='memilih'");
                    // $row = mysqli_fetch_assoc($result);
                    $row=mysqli_num_rows($result);
                    echo $row;?></h1>
                    <h3>Telah Memilih</h3>
                </div>
                <div class="kotak ">
                    <h1><?php $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE memilih=''");
                    // $row = mysqli_fetch_assoc($result);
                    $row=mysqli_num_rows($result);
                    echo $row;?></h1>
                    <h3>Belum Memilih</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Perolehan Suara Sementara Calon Ketua Umum HMIF-FT-UH  -->
    <section class="update">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-4">
                    <h2>Update Perolehan Suara Sementara</h2>
                    <h2>Calon Ketua Umum HMIF-FT-UH Periode 2020/2021</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="foto-update">
                    <div class="foto1">
                        <h1>1</h1>
                        
                        <?php
                            $gambar1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM admin WHERE jabatan='kandidat_ketum1'")); 
                            if($gambar1["foto"] == "CalonKetum1.png"){
                                echo '<img src="img/CalonKetum1.png" alt="">';
                            } else {
                                echo '<img src="img/Gogog.png" alt="">';
                            }
                            ?>

                        <p><?php 
                            $admin1 = mysqli_query($conn, "SELECT * FROM admin where jabatan='kandidat_ketum1'");
                            $nama1=mysqli_fetch_assoc($admin1);
                            if ($nama1["nama"]== ''){
                                echo "Nama Calon"; 
                            } else {
                                echo $nama1["nama"];
                            }
                            ?></p>
                    </div>
                    <div class="foto2">
                        <h1>2</h1>
                        
                        <?php
                            $gambar2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM admin WHERE jabatan='kandidat_ketum2'")); 
                            if($gambar2["foto"] == "CalonKetum2.png"){
                                echo '<img src="img/CalonKetum2.png" alt="">';
                            } else {
                                echo '<img src="img/Gogog.png" alt="">';
                            }
                            ?>

                        <p><?php 
                            $admin2 = mysqli_query($conn, "SELECT * FROM admin where jabatan='kandidat_ketum2'"); 
                            $nama2=mysqli_fetch_assoc($admin2);
                            if ($nama1["nama"]== ''){
                                echo "Nama Calon"; 
                            } else {
                                echo $nama2["nama"];
                            }
                            ?></p>
                    </div>
                </div>
                <div class="chart-update">
                    <form action="">
                        <select name="" id="">
                        <option value="" disabled selected hidden>Hari</option>
                        <option value="">Senin</option>
                        <option value="">Selasa</option>
                    </select>
                    </form>
                    <canvas id="chart2"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Perolehan Suara Sementara Calon Ketua Umum DMIF-FT-UH  -->

    <section class="update mb-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-4">
                    <h2>Update Perolehan Suara Sementara</h2>
                    <h2>Calon Ketua Umum DMIF-FT-UH Periode 2020/2021</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="foto-update">
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

                        <p><?php 
                            $admin1 = mysqli_query($conn, "SELECT * FROM admin where jabatan='kandidat_ketude1'");
                            $nama1=mysqli_fetch_assoc($admin1);
                            if ($nama1["nama"]== ''){
                                echo "Nama Calon"; 
                            } else {
                                echo $nama1["nama"];
                            } ?></p>
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
                </div>
                <div class="chart-update">
                    <form action="">
                        <select name="" id="">
                        <option value="" disabled selected hidden>Hari</option>
                        <option value="">Senin</option>
                        <option value="">Selasa</option>
                    </select>
                    </form>
                    <canvas id="chart1"></canvas>
                </div>   
            </div>
        </div>
    </section>


<script>
//grafik ketua dewan
$(document).ready(function() {
    let xlabel = [0];
    let interval = 3000 * 60 * 60 ;

    var ctx = document.getElementById('chart1').getContext('2d');
    var data = {
        labels: xlabel,
        datasets: [{
            label: "Ketude 1",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [0, <?php echo $q1?>]
            
            }
            , {
            label: "Ketude 2",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [0, <?php echo $q2?>] 
            
        }]
    };

    var options = {}

    var chart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
    
    setInterval(function() {
        waktu();
        
        var chart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    }, 5000);

    function waktu() {
        let d = new Date();
        let n = d.getHours();
        xlabel.push(n)
        // document.getElementById('tes1').innerHTML = xlabel;
        chart.render();
    };
});
</script>
<script>
    //grafik ketua umum
    $(document).ready(function() {
        let xlabel = [0];
        let interval = 3000 * 60 * 60 ;

        var ctx = document.getElementById('chart2').getContext('2d');
        var data = {
            labels: xlabel,
            datasets: [{
                label: "Ketum 1",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [0, <?php echo $q3?>]
                
                }
                , {
                label: "Ketum 2",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [0, <?php echo $q4?>] 
                
            }]
        };

        var options = {}

        var chart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
        
        setInterval(function() {
            waktu();
            
            var chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        }, 5000);

        function waktu() {
            let d = new Date();
            let n = d.getHours();
            xlabel.push(n)
            // document.getElementById('tes1').innerHTML = xlabel;
            chart.render();
        };
    });
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    //tombol submit
    $(document).ready(function() {
        $('#form-submit').on("submit", function(){
            var Data = $('#form-submit').serialize();
            $.ajax({
                type : 'POST',
                url  : 'halamanutamapemilih.php',
                data : Data,
                success: function(res){
                    if(res){
                        $(".loading-icon").removeClass("hide");
                        $(".btn-txt").text("");
                    } else {
                        setTimeout(function() {
                        $(".loading-icon").addClass("hide");
                        $(".btn-txt").text("Submit");
                        }, 7000);
                    }
                }
            });
        });
    });
</script>
</body>

</html>
