<?php
// check request
if(isset($_POST['id_karyawan']) && isset($_POST['id_karyawan']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['id_karyawan'];

    $id = $_POST['id_user'];
    // delete User
    $query2 = "DELETE FROM data_karyawan WHERE id_karyawan = '$user_id'";

    $query3 = "DELETE FROM user WHERE id_user = '$id'";
    
    if (!$result = mysql_query($query2)) {
        exit(mysql_error());
    }

    mysql_query($query3);
}
?>