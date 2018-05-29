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
							<th>Email</th>
							<th>Telpon</th>
							<th>Username</th>
							<th>Password</th>
							<th colspan="2">Tidakan</th>
						</tr>';

	$id_toko = $_SESSION['id_toko'];


	$query = "SELECT * FROM data_karyawan where id_toko = '$id_toko'";
	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    
    $query2 = "SELECT * FROM user WHERE id_user = ''";
	
    


    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$query2 = "SELECT * FROM user WHERE id_user = '$row[id_user]'";

    		$result2 = mysql_query($query2);

    		$row2 = mysql_fetch_assoc($result2);
	
    		$data .= '<tr align="center">
    					<td>'.$number.'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['alamat'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['no_hp'].'</td>
						<td>'.$row2['username'].'</td>
						<td>'.$row2['password'].'</td>
						<td>
							<button onclick="GetUserDetails('.$row['id_karyawan'].','.$row2['id_user'].')" class="btn btn-warning">Update</button>
						</td>
						<td>
							<button onclick="DeleteUser('.$row['id_karyawan'].','.$row2['id_user'].')" class="btn btn-danger">Delete</button>
						</td>
		    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="9">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>