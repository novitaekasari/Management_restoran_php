<?php 
    session_start();
    include "connect.php";
    // Mengambil nilai username dan password darri POST Request
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;
    // Memeriksa apakah form telah disubmit
    if(!empty($_POST['submit_validate'])) {
        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
        $hasil = mysqli_fetch_array($query);
        if ($hasil) {
            // Menambhakan session
            $_SESSION['username_restoran'] = $username;
            $_SESSION['level_restoran'] = $hasil['level'];
            $_SESSION['id_restoran'] = $hasil['id'];
            // Redirect ke halaman home jika valid
            header('location:../home');
        } else {  ?>
            <script>
               alert('Username atau password yang anda masukan salah'); 
               window.location='../login';
            </script>;
<?php
    }
}
?>