<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr align="center">
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Telpon</th>
							<th>Toko</th>
							<th colspan="2">Tidakan</th>
						</tr>';

	$query = "SELECT * FROM data_karyawan";

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
						<td>'.$row['nama_krywn'].'</td>
						<td>'.$row['alamat_krywn'].'</td>
						<td>'.$row['email_krywn'].'</td>
						<td>'.$row['telp_krywn'].'</td>
						<td>'.$row['id_toko'].'</td>
						<td>
							<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
						</td>
						<td>
							<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
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