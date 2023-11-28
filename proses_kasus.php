<?php
$id=$_GET['id'];
$tanResult=mysqli_query($conn, "SELECT * FROM tan_user WHERE id_user=$id");
while ($user_data = mysqli_fetch_array($tanResult)) {
    $tanUser=$user_data['username'];
    $tanPass=$user_data['password'];
    $tanNamaUs=$user_data['nama_user'];
    $selected_role_id=$user_data['id_role'];//tanda
}
?>