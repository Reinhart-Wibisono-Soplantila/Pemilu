<?php
    //koneksi ke database   urutan parameter(namaHost, username, password, database)
    $conn = mysqli_connect("localhost","root", "", "mmif");

    function get_result(\mysqli_stmt $statement) {
    $result = array();
    mysqli_stmt_store_result($statement);
    for ($i = 0; $i < $statement->num_rows; $i++) {
        $metadata = mysqli_stmt_result_metadata($statement);
        $params = array();
        while ($field = mysqli_fetch_field($metadata))
        {
            $params[] = &$result[$i][$field->name];
        }
        call_user_func_array(array($statement, 'bind_result'), $params);
        $statement->fetch();
    }
    return $result;
    }

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function generatePass($data){
        global $conn;
        $nama = $data["NAMA"];
        $NIM = $data["NIM"];
        $password = passAcak(7);

        $result = mysqli_query($conn, "SELECT registrasi FROM mahasiswa WHERE NIM='$NIM'");
        $regis =  mysqli_fetch_assoc($result);

        // enkripsi password
        $enkripsi = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE mahasiswa SET nama = '$nama', password = '$enkripsi' WHERE NIM = '$NIM'";
        mysqli_query($conn, $update);
        
        // isi database passsword
        $db_pass = "INSERT INTO password VALUES ('', '$NIM', '$enkripsi', NOW())";
        mysqli_query($conn, $db_pass);

        //enkripsi NIM
        $enk_NIM = base64_encode($NIM);
        $enc = "INSERT INTO suara_mmif VALUES ('', '$enk_NIM', '', '', '', '', '')";
        mysqli_query($conn, $enc);
        return $password;
    }


    // function regis($data){
    //     global $conn;
    //     $nama = $data["nama"];
    //     $NIM = $data["NIM"];
    //     $email_sso = $data["email_sso"];
    //     $password = passAcak(7);
    //     // echo $password;

    //     //enkripsi NIM
    //     $enk_NIM = base64_encode($NIM);
    //     $enc = "INSERT INTO suara_mmif VALUES ('', '$enk_NIM', '', '', '', '', '')";
    //     mysqli_query($conn, $enc);

    //     //enkripsi password
    //     $enkripsi = password_hash($password, PASSWORD_DEFAULT);
    //     $update = "UPDATE mahasiswa SET nama = '$nama', password = '$enkripsi' WHERE NIM = '$NIM'";
    //     mysqli_query($conn, $update);
        
    //     // isi database passsword
    //     $db_pass = "INSERT INTO password VALUES ('', '$NIM', '$enkripsi', NOW())";
    //     mysqli_query($conn, $db_pass);


    //     //kirim email
    //     ini_set( 'display_errors', 1 );
    //     error_reporting( E_ALL );
    //     $from = "reinhartsoplantila@gmail.com";    
    //     $subject = "Password akun web pemilu";    
    //     $message = "Password untuk Login ke halaman pemilu:" . $password;   
    //     $headers = "From:" . $from;
    //     mail($email_sso, $subject, $message, $headers);   
    //     // if(mail($email_sso, $subject, $message, $headers)){
    //     //     echo "  sukses  ";
    //     // } else {
    //     //     echo "  gagal  ";
    //     // }
    //     // $en_NIM=password_hash($NIM, PASSWORD_DEFAULT);
    //     // $_SESSION["en_NIM"]=$en_NIM;
    //     // $insert = "INSERT INTO suara_mmif values('', '$en_NIM', '', '', '', '')";
    //     // mysqli_query($conn, $insert);

    //     return mysqli_affected_rows($conn);
    // }


    function passAcak($panjang) {
        global $conn;
        global $NIM;
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; // password
        $string = '';

        //generate password
        for ($i=0; $i < $panjang; $i++) { 
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
        }
       
        return $string;
    }


    //input data oleh admin
    function inputGambarKetum($data){
        global $conn;

        //GAMBAR KETUM1
        // cek apabila inputan kosong atau tidak
        if($_FILES['gambar_ketum1']['error']===4){
            return false;
        } else {
            //ambil data gambar
            $namaFile1 =$_FILES['gambar_ketum1']['name'];
            $ukuranfile1 =$_FILES['gambar_ketum1']['size'];
            $error1 = $_FILES['gambar_ketum1']['error'];
            $tmpName1= $_FILES['gambar_ketum1']['tmp_name'];

            //cek apakah yang diupload adalah gambar
            $ekstensiGambarValid=['png'];
            $ekstensiKetum1 = explode('.', $namaFile1);
            $ekstensiKetum1 = strtolower(end($ekstensiKetum1));


            if(in_array($ekstensiKetum1, $ekstensiGambarValid)){
                //cek ukuran
                if($ukuranfile1>10000000){
                    echo "<script> alert('ukuran gambar terlalu besar') </script>";
                } else {
                    //jika lolos, upload file
                    //generate nama baru
                    $namaFileBaru1 = "CalonKetum1";
                    $namaFileBaru1 .= '.';
                    $namaFileBaru1 .= $ekstensiKetum1;
                    move_uploaded_file($tmpName1, 'img/' . $namaFileBaru1);

                    $gambar1=$namaFile1;
                    $update1 = "UPDATE admin SET foto = '$namaFileBaru1' WHERE jabatan='kandidat_ketum1'";
                    mysqli_query($conn, $update1);
                    echo "<script> alert('Berhasil Mengaupload Foto Calon Pertama Ketua Umum') </script>";
                }
            } else {
                echo "<script> alert('Hanya gambar yang bisa di upload dan jenis filenya .png') </script>";
            }
        }

        //GAMBAR KETUM2
        // cek apabila gambar kosong atau tidak
        if($_FILES['gambar_ketum2']['error']===4){
            return false;
        } else {
            //ambil data gambar
            $namaFile2 =$_FILES['gambar_ketum2']['name'];
            $ukuranfile2 =$_FILES['gambar_ketum2']['size'];
            $error2 = $_FILES['gambar_ketum2']['error'];
            $tmpName2= $_FILES['gambar_ketum2']['tmp_name'];

            //cek apakah yang diupload adalah gambar
            $ekstensiGambarValid=['png'];
            $ekstensiKetum2 = explode('.', $namaFile2);
            $ekstensiKetum2 = strtolower(end($ekstensiKetum2));
            if(in_array($ekstensiKetum2, $ekstensiGambarValid)){//cek ukuran
                if($ukuranfile2>10000000){
                    echo "<script> alert('ukuran gambar terlalu besar') </script>";
                } else {
                    //jika lolos, upload file
                    //generate nama baru
                    $namaFileBaru2 = "CalonKetum2";
                    $namaFileBaru2 .= '.';
                    $namaFileBaru2 .= $ekstensiKetum2;
                    move_uploaded_file($tmpName2, 'img/' . $namaFileBaru2);
            
                    $gambar2=$namaFile2;

                    $update2 = "UPDATE admin SET foto = '$namaFileBaru2' WHERE jabatan='kandidat_ketum2'";
                    mysqli_query($conn, $update2);

                    echo "<script> alert('Berhasil Mengupload Foto Calon Kedua Ketua Umum') </script>";
                }
            } else {
                echo "<script> alert('Hanya gambar yang bisa di upload dan jenis filenya .png') </script>";
            }
        }
    }
    function inputGambarKetude($data){
        global $conn;

        //GAMBAR KETUDE 1
        // cek apabila gambar kosong atau tidak
        if($_FILES['gambar_ketude1']['error']===4){
            return false;
        } else { 
            //ambil data gambar
            $namaFile1 =$_FILES['gambar_ketude1']['name'];
            $ukuranfile1 =$_FILES['gambar_ketude1']['size'];
            $error1 = $_FILES['gambar_ketude1']['error'];
            $tmpName1= $_FILES['gambar_ketude1']['tmp_name'];

            //cek apakah yang diupload adalah gambar
            $ekstensiGambarValid=['png'];
            $ekstensiKetude1 = explode('.', $namaFile1);
            $ekstensiKetude1 = strtolower(end($ekstensiKetude1));
            if(in_array($ekstensiKetude1, $ekstensiGambarValid)){
                //cek ukuran
                if($ukuranfile1>10000000){
                    echo "<script> alert('ukuran gambar terlalu besar') </script>";
                } else {
                    //jika lolos, upload file
                    //generate nama baru
                    $namaFileBaru1 = "CalonKetude1";
                    $namaFileBaru1 .= '.';
                    $namaFileBaru1 .= $ekstensiKetude1;
                    move_uploaded_file($tmpName1, 'img/' . $namaFileBaru1);

                    $gambar1=$namaFile1;

                    $update1 = "UPDATE admin SET foto='$namaFileBaru1' WHERE jabatan='kandidat_ketude1'";
                    mysqli_query($conn, $update1);
                    echo "<script> alert('Berhasil Mengupload Foto Calon Pertama Ketua Dewan') </script>";
                }
            } else {
                echo "<script> alert('Hanya gambar yang bisa di upload dan jenis filenya .png') </script>";
            }
            
        }

        //GAMBAR 2
        // cek apabila gambar kosong atau tidak
        if($_FILES['gambar_ketude2']['error']===4){
            return false;
        } else {  
            //ambil data gambar
            $namaFile2 =$_FILES['gambar_ketude2']['name'];
            $ukuranfile2 =$_FILES['gambar_ketude2']['size'];
            $error2 = $_FILES['gambar_ketude2']['error'];
            $tmpName2= $_FILES['gambar_ketude2']['tmp_name'];

            //cek apakah yang diupload adalah gambar
            $ekstensiGambarValid=['png'];
            $ekstensiKetude2 = explode('.', $namaFile2);
            $ekstensiKetude2 = strtolower(end($ekstensiKetude2));
            if(in_array($ekstensiKetude2, $ekstensiGambarValid)){
                //cek ukuran
                if($ukuranfile2>10000000){
                    echo "<script> alert('ukuran gambar terlalu besar') </script>";
                } else {
                    //jika lolos, upload file
                    //generate nama baru
                    $namaFileBaru2 = "CalonKetude2";
                    $namaFileBaru2 .= '.';
                    $namaFileBaru2 .= $ekstensiKetude2;
                    move_uploaded_file($tmpName2, 'img/' . $namaFileBaru2);

                    $gambar2=$namaFile2;

                    $update2 = "UPDATE admin SET foto='$namaFileBaru2' WHERE jabatan='kandidat_ketude2'";
                    mysqli_query($conn, $update2);
                    echo "<script> alert('Berhasil Mengupload Foto Calon Kedua Ketua Dewan') </script>";
                }
            } else {
                echo "<script> alert('Hanya gambar yang bisa di upload dan jenis filenya .png') </script>";
            }
        }
    }
    
    function inputNamaketum($data){
        global $conn;

        $kandidat_ketum1 = $data["kandidat_ketum1"];
        $kandidat_ketum2 = $data["kandidat_ketum2"];
        
        //NAMA KETUM1
        //cek apakah nama diinput atau tidak
        if($kandidat_ketum1 == ''){
            return false;
        } else {
            $nama1 = "UPDATE admin SET nama = '$kandidat_ketum1'WHERE jabatan='kandidat_ketum1'";
            mysqli_query($conn, $nama1);
            echo "<script> alert('Berhasil Mengupload Nama Calon Pertama Ketua UMUM') </script>";
        }

        //NAMA KETUM2
        //cek apakah nama diinput atau tidak
        if($kandidat_ketum2 == ''){
            return true;
        } else {
            $nama2 = "UPDATE admin SET nama = '$kandidat_ketum2'WHERE jabatan='kandidat_ketum2'";
            mysqli_query($conn, $nama2);
            echo "<script> alert('Berhasil Mengupload Nama Calon Kedua Ketua UMUM') </script>";
        }
    }

    function inputNamaKetude($data){
        global $conn;
        $kandidat_ketude1 = $data["kandidat_ketude1"];
        $kandidat_ketude2 = $data["kandidat_ketude2"];
        //NAMA KETUDE 1
        //cek apakah nama kosong atau tidak
        if($kandidat_ketude1 == ''){
            return false;
        } else {
            $nama1 = "UPDATE admin SET nama = '$kandidat_ketude1'WHERE jabatan='kandidat_ketude1'";
            mysqli_query($conn, $nama1);
            echo "<script> alert('Berhasil Mengupload Nama Calon Pertama Ketua Dewan') </script>";
        }

        //NAMA KETUDE 2
        //cek apakah nama ksong atau tidak
        if($kandidat_ketude2 == ''){
            return false;
        } else {
            $nama2 = "UPDATE admin SET nama = '$kandidat_ketude2'WHERE jabatan='kandidat_ketude2'";
            mysqli_query($conn, $nama2);
            echo "<script> alert('Berhasil Mengupload Nama Calon Kedua Ketua Dewan') </script>";
        }
    }

    function cari($keyword){
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR 
                                                NIM LIKE '%$keyword%'";
        
        
        return query($query);
    }
          
    function LogOut(){
        dataLogout();
        $_SESSION['NIM']='';
        $_SESSION['LOGIN']='';
        $_SESSION['admin']='';
        $_SESSION['ketude1']='';
        $_SESSION['ketude2']='';
        $_SESSION['ketum1']=true;
        $_SESSION['ketum2']=true;
        unset($_SESSION['NIM']);
        unset($_SESSION['LOGIN']);
        unset($_SESSION['admin']);
        unset($_SESSION['ketude1']);
        unset($_SESSION['ketude2']);
        unset($_SESSION['ketum1']);
        unset($_SESSION['ketum2']);
        session_unset();
        session_destroy();
        header("Location: login.php");
    }

    function dataLogout(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $logout = "UPDATE mahasiswa SET logout='logout' WHERE NIM='$NIM'";
        mysqli_query($conn, $logout);
    }

    function ketude1(){
        echo "<script> alert('Anda Memilih Kandidat Ketua Dewan Pertama')</script>" ;  
        $_SESSION['ketude1']=true;
    }

    function ketude2(){
        echo "<script> alert('Anda Memilih Kandidat Ketua Dewan Kedua')</script>" ;
        $_SESSION['ketude2']=true;
    }

    function ketum1(){
        echo "<script> alert('Anda Memilih Kandidat Ketua Umum Pertama')</script>" ;
        $_SESSION['ketum1']=true;
    }

    function ketum2(){
        echo "<script> alert('Anda Memilih Kandidat Ketua Umum Kedua')</script>" ;
        $_SESSION['ketum2']=true;
    }

    function suaraketude(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $sudah='sudah';
        if(isset($_SESSION["ketude1"])){
            $data1=1;
            $result = mysqli_query($conn, "SELECT NIM FROM suara_mmif");
            while($row = mysqli_fetch_assoc($result)){
                $dec = base64_decode($row["NIM"]);
                $enc=base64_encode($NIM);

                if($NIM==$dec) {
                    $update1 = "UPDATE suara_mmif SET calonketude1='$data1', created_at=NOW() WHERE NIM='$enc'";
                    mysqli_query($conn, $update1);
                }
            } 
        }
         elseif(isset($_SESSION["ketude2"])){
            $data2=1;
            $result = mysqli_query($conn, "SELECT NIM FROM suara_mmif");
            while($row = mysqli_fetch_assoc($result)){
                $dec = base64_decode($row["NIM"]);
                $enc=base64_encode($NIM);
                
                if( $NIM==$dec) {
                    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
                    $rows = mysqli_fetch_assoc($result);
                    $data2=1;
                    $update2 = "UPDATE suara_mmif SET calonketude2='$data2', created_at=NOW() WHERE NIM='$enc'";
                    mysqli_query($conn, $update2);
                }
            }
        }
    }

    function suaraketum(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $sudah='sudah';
        if(isset($_SESSION["ketum1"])){
            $data1=1;
            $result = mysqli_query($conn, "SELECT * FROM suara_mmif");
            while($row = mysqli_fetch_assoc($result)){
                $dec = base64_decode($row["NIM"]);
                $enc=base64_encode($NIM);
                if($NIM==$dec) {
                    $update1 = "UPDATE suara_mmif SET calonketum1='$data1', created_at=NOW() WHERE NIM='$enc'";
                    mysqli_query($conn, $update1);
                    
                    $update = "UPDATE mahasiswa SET ketum='sudah' WHERE NIM = '$NIM'";
                    mysqli_query($conn, $update);
                   
                }
            }
        } elseif(isset($_SESSION["ketum2"])) {
            $result = mysqli_query($conn, "SELECT NIM FROM suara_mmif");
            while($row = mysqli_fetch_assoc($result)){
                $dec = base64_decode($row["NIM"]);
                $enc=base64_encode($NIM);
                if($NIM==$dec) {
                    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
                    $rows = mysqli_fetch_assoc($result);
                   
                    $data2=1;
                    $update2 = "UPDATE suara_mmif SET calonketum2='$data2', created_at=NOW() WHERE NIM='$enc'";
                    mysqli_query($conn, $update2);

                    $update = "UPDATE mahasiswa SET ketum='sudah' WHERE NIM = '$NIM'";
                    mysqli_query($conn, $update);
                    
                }
            } 
        } 
    }

    function submitTidakMemilih(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $sudah='sudah';

        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
        $row = mysqli_fetch_assoc($result);

        if($sudah != $row["ketum"] && $sudah != $row["ketude"]){
            $tidakMemilih = "UPDATE mahasiswa SET submit_tdkMemilih='tidak memilih' WHERE NIM = '$NIM'";
            mysqli_query($conn, $tidakMemilih);
        } elseif ($sudah == $row["ketum"] && $sudah != $row["ketude"]){
            $tidakMemilih = "UPDATE mahasiswa SET submit_tdkMemilih='tidak memilih' WHERE NIM = '$NIM'";
            mysqli_query($conn, $tidakMemilih);
        } elseif ($sudah != $row["ketum"] && $sudah == $row["ketude"]){
            $tidakMemilih = "UPDATE mahasiswa SET submit_tdkMemilih='tidak memilih' WHERE NIM = '$NIM'";
            mysqli_query($conn, $tidakMemilih);
        }
    }

    function submitMemilih(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $sudah='sudah';

        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
        $row = mysqli_fetch_assoc($result);
        if($sudah == $row["ketum"] && $sudah == $row["ketude"]){
            $selesai = "UPDATE mahasiswa SET submit_memilih='memilih' WHERE NIM = '$NIM'";
            mysqli_query($conn, $selesai);
        }
    }

    function memilih(){
        global $conn;
        $NIM=$_SESSION['NIM'];
        $sudah='sudah';
        
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
        $row = mysqli_fetch_assoc($result);
        if($row["submit_memilih"]=="memilih" || $row["submit_tdkMemilih"]=="tidak memilih"){
            $selesai = "UPDATE mahasiswa SET memilih='sudah' WHERE NIM = '$NIM'";
            mysqli_query($conn, $selesai);
        }
    }

    // function updateDataPemilih(){
    //     global $conn;
    //     global $tanggal;
    //     $data_awal =$tanggal;
    //     $loop = 16;
    //     $calonketude1 = [];
    //     $calonketude2 = [];
    //     $calonketum1 = [];
    //     $calonketum2 = [];
        
    //     for($data=0; $data<1000; $data+=1){
    //         $perMenit = date('Y-m-d H:i:s', strtotime('+'.$data.'minutes',strtotime($data_awal)));
    //         $memilih[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$perMenit'");
    //         $belummemilih[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$perMenit'");
    //     }

    //     // echo '<br>';
    //     $q1 = '';
    //     $q2 = '';
    //     $q3 = '';
    //     $q4 = '';
        
    //     for($data=0; $data<$loop;$data++){
    //         while($datas = mysqli_fetch_array($calonketude1[$data])) {
    //             $q1 = $q1.$datas['calonketude1'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketude2[$data])) {
    //             $q2 = $q2.$datas['calonketude2'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketum1[$data])) {
    //             $q3 = $q3.$datas['calonketum1'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketum2[$data])) {
    //             $q4 = $q4.$datas['calonketum2'].',';
    //         }

    //     }
    //     // echo $q1.'data, pada jam: '. $tigajam;
    //     // echo $q2.'data, pada jam: '. $tigajam;
    //     // echo $q3.'data, pada jam: '. $tigajam;
    //     // echo $q4.'data, pada jam: '. $tigajam;
    // }

    // function grafik($q1, $q2, $q3, $q4){
    //     global $tanggal;
    //     //mengambl data setiap 6 jam
    //     $data_awal =$tanggal;
    //     $loop = 16;
    //     $calonketude1 = [];
    //     $calonketude2 = [];
    //     $calonketum1 = [];
    //     $calonketum2 = [];
        
    //     for($data=0; $data<$loop*6; $data+=6){
    //         $enamjam = date('Y-m-d H:i:s', strtotime('+'.$data.'hours',strtotime($data_awal)));
    //         $calonketude1[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
    //         $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
    //         $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
    //         $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
    //     }

    //     // echo '<br>';
    //     $q1 = '';
    //     $q2 = '';
    //     $q3 = '';
    //     $q4 = '';
        
    //     for($data=0; $data<$loop;$data++){
    //         while($datas = mysqli_fetch_array($calonketude1[$data])) {
    //             $q1 = $q1.$datas['calonketude1'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketude2[$data])) {
    //             $q2 = $q2.$datas['calonketude2'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketum1[$data])) {
    //             $q3 = $q3.$datas['calonketum1'].',';
    //         }
    //         while($datas = mysqli_fetch_array($calonketum2[$data])) {
    //             $q4 = $q4.$datas['calonketum2'].',';
    //         }

    //     }
    //     // echo $q1.'data, pada jam: '. $tigajam;
    //     // echo $q2.'data, pada jam: '. $tigajam;
    //     // echo $q3.'data, pada jam: '. $tigajam;
    //     // echo $q4.'data, pada jam: '. $tigajam;
    // }

   

    // function encrypt($NIM){
    //     //enkripsi nim
    //     $key =md5('indonesia');
    //     $salt=md5('indonesia');
    //     $enk_NIM = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $NIM, MCRYPT_MODE_ECB)));
    //     $enc = "INSERT INTO suara_mmif VALUES('', '$enk_NIM', '', 0,0,0,0)";
    //     mysqli_query($conn, $enc);
    // }

    // function decrypt($NIM){
    //     $key =md5('indonesia');
    //     $enk_NIM = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($NIM), MCRYPT_MODE_ECB));
    //     return $NIM;
    // }

    // function hashword($NIM) {
    //     $salt = md5('indonesia');
    //     $string = crypt($NIM, '$1$' . $salt . '$');
    //     return $string;
    // }
?>

