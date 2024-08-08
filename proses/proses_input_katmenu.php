<?php 
    include "connect.php";
    // Mengambil nilai username dan password darri POST Request
    $jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "" ;
    $katmenu = (isset($_POST['katmenu'])) ? htmlentities($_POST['katmenu']) : "" ;

    if(!empty($_POST['input_katmenu_validate'])) {
        $select = mysqli_query($conn, "SELECT kategori_menu FROM tb_kategori_menu WHERE kategori_menu='$katmenu'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Kategori yang dimasukan telah ada");
            window.location="../katemnu"</script>';
        } else {
        $query = mysqli_query($conn, "INSERT INTO tb_kategori_menu (jenis_menu, kategori_menu)
        values ('$jenismenu', '$katmenu')");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
            window.location="../katmenu"</script>';
           
        }else {
            $message = '<script>alert("Data Gagal Dimasukan")\
              window.location="../katmenu"</script>';
        }
    }
}echo $message;
  
?>