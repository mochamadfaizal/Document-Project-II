<?php
	// include Database connection file 
	include("db_connection.php");
	include '../auth.php';

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr align="center">
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Telpon</th>
							<th colspan="2">Tindakan</th>
						</tr>';


	$id_toko = $_SESSION['id_toko'];

	$query = "SELECT * FROM data_pemasok WHERE id_toko = '$id_toko'";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr align="center">
    					<td>'.$number.'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['alamat'].'</td>
						<td>'.$row['no_telp'].'</td>
						<td>
							<button onclick="GetUserDetails('.$row['id_pemasok'].')" class="btn btn-warning">Update</button>
						</td>
						<td>
							<button onclick="DeleteUser('.$row['id_pemasok'].')" class="btn btn-danger">Delete</button>
						</td>
		    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="7">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>