<?php 
    include "connect.php";
    // Mengambil nilai username dan password darri POST Request
    $name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
    $nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;
    $alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "" ;
    $password = md5('password');
    
    if(!empty($_POST['input_register_validate'])) {
        $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Username yang dimasukan telah ada");
            window.location="../user"</script>';
        } else {
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama, username, nohp, alamat, password)
        values ('$name', '$username', '$nohp', '$alamat', '$password')");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
            window.location="../login"</script>';
           
        }else {
            $message = '<script>alert("Data Gagal Dimasukan")</script>';
        }
    }
}echo $message;
  
?>