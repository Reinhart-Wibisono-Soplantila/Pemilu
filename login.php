<?php 
    session_start();
    require 'function.php';

    if (isset($_POST["LOGIN"])) {
        $admin="admin";
        $login="login";
        
        //amankan tempat user menginput data
        $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE NIM= ? ");
        mysqli_stmt_bind_param($stmt, "s", $_POST["NIM"]);
        mysqli_execute($stmt);
        mysqli_stmt_store_result($stmt);


        //cek NIM apakah adaatau tidak
        if( mysqli_stmt_num_rows($stmt) === 1) {
            $result=get_result($stmt);
            $data = array_shift($result);
            $NIM = $data['NIM'];
            $result=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
            $row = mysqli_fetch_assoc($result);

            $pass = mysqli_query($conn, "SELECT * FROM password WHERE NIM='$NIM'");
            $row_pass = mysqli_fetch_assoc($pass);
            //cek apakah admin atau panitia
            if($admin == $row["admin"]){
                if (password_verify($_POST["password"], $row_pass["password"])){
                    // set session
                    $_SESSION["LOGIN"] = true;
                    $_SESSION['NIM']=$NIM;
                    $_SESSION['admin']=true;
                    
                    header("Location: presidium.php");
                } else {
                    echo "<script>
                    alert('Password Salah');
                    </script>
                    ";
                }
            } elseif($row["panitia"] == "panitia"){
                if (password_verify($_POST["password"], $row_pass["password"])){
                    // set session
                    $_SESSION["LOGIN"] = true;
                    $_SESSION['NIM']=$NIM;
                    $_SESSION['panitia']=true;
                    
                    header("Location: GeneratePass.php");
                } else {
                    echo "<script>
                    alert('Password Salah');
                    </script>
                    ";
                } 
            }
            
            // jika bukan admin atau panitia
            // cek LOGIN 
            if($admin != $row["admin"] || $row["admin"] == "panitia"){
                    if($login!=$row["login"]){
                        //cek password
                        if (password_verify($_POST["password"], $row_pass["password"])){

                            $tgl_sekarang=date("Y-m-d H:i:s", strtotime('+'. 6 .'hours'));  // tanggal sekarang
                            $jam_mulai=$row_pass["jam_password"];                           // jam launching password
                            $jangka_waktu = strtotime('+10 minutes', strtotime($jam_mulai));// jangka waktu
                            $tgl_exp=date("Y-m-d H:i:s",$jangka_waktu);                     // tanggal expired
                            
                            //cek jangka waktu password
                            if ($tgl_sekarang >=$tgl_exp ) {

                                echo " <script>  alert( 'Password sudah tidak berlaku') </script>";
                            } else {
                                
                                // set session
                                $_SESSION["LOGIN"] = true;
                                $_SESSION['NIM']=$NIM;
                                $login = "UPDATE mahasiswa SET login='login' WHERE NIM = '$NIM'";
                                mysqli_query($conn, $login);
                                header("Location: halamanutamapemilih.php");     
                            }
                        } else {
                            echo "<script>
                            alert('Password Salah');
                            </script>
                            ";
                        }
                } else {
                    echo "<script>
                    alert('Hanya bisa Log In sekali saja');
                    </script>
                    ";
                }
            }
                
            
//****************** */
           
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


    <title>WEB MMIF</title>
    <link rel="stylesheet" href="style.css">

</head>


<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar navbar-expand-lg fixed-top">
            <div class="navbar-header">
                <img src="img/if.png" alt="">
                <a href="#"></a>PEMILU RAYA MAHASISWA INFORMATIKA</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        </div>
    </nav>

    <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form text center" method="post" id="form-login">
            <div class="login-form ">
                <label>Nim</label>
                <input type="text" class="form-control" id="exampleInputNim1" aria-describedby="namelHelp" name="NIM" required>
            </div>
            <div class="login-form">
                <label>Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <center>
                <button type="submit" name="LOGIN" class="button btn btn-primary">
                    <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                    <span class="btn-txt">Login</span>
                </button>
            </center>
        </form>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#form-login').on("submit", function(){
            var Data = $('#form-login').serialize();
            $.ajax({
                type : 'POST',
                url  : 'login.php',
                data : Data,
                success: function(res){
                    if(res){
                        $(".loading-icon").removeClass("hide");
                        $(".btn-txt").text("");
                    } else {
                        setTimeout(function() {
                            $(".loading-icon").addClass("hide");
                            $(".btn-txt").text("Login");
                        }, 7000);
                    }
                }
            })
        });
    });
</script>

</body>

</html>
