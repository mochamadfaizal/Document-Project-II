<?php
// check request
if(isset($_POST['id_pemasok']) && isset($_POST['id_pemasok']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['id_pemasok'];

    // delete User
    $query = "DELETE FROM data_pemasok WHERE id_pemasok = '$user_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>