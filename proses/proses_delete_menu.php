<?php 
    include "connect.php";
    // Mengambil nilai username dan password darri POST Request
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
    $foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "" ;
    
    if(!empty($_POST['delete_menu_validate'])) {
        $query = mysqli_query($conn,  "DELETE  FROM tb_menu WHERE id ='$id'");
        if ($query) {
            unlink("../assets/img/$foto");
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../menu"</script>';
           
        }else {
            $message = '<script>alert("Data gagal dihapus");
             window.location="../menu"</script>';

    }
}echo $message;
  
?>