<?php 
    include "connect.php";
    // Mengambil nilai username dan password darri POST Request
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
    
    if(!empty($_POST['input_user_validate'])) {
        $query = mysqli_query($conn,  "DELETE FROM tb_user WHERE id ='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../user"</script>';
           
        }else {
            $message = '<script>alert("Data gagal dihapus")</script>';

    }
}echo $message;
  
?>