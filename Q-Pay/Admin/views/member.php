<?php 
include ("models/m_member.php");
$mbr = new Member($connection);

if(@$_GET['act'] == '') {
?>

<div class="row">
	<div class="col-lg-12">
		<h1>Member <small> Data Member</small></h1>
		<ol class="breadcrumb">
			<li><a href="index.html"><i class="icon-dashboard"></i> Member</a></li>
		</ol>
	</div>
        </div>

        <div class="row">
        	<div class="col-lg-12">
        		<div class="table table-responsive">
        			<table class="table table-bordered table-hover table-striped">
        				<tr>
        					<th style="text-align: center;">No</th>
        					<th>Nama</th>
        					<th>Email</th>
        					<th>Alamat</th>
                            <th>Username</th>
                            <th>Password</th>
        					<th>No HP</th>
        					<th>Saldo</th>
        					<th>Opsi</th>
        				</tr>
        				<?php 
        					$no = 1;
        					$tampil = $mbr->tampil();
        					while($data = $tampil->fetch_object()) {
        				?>
        				<tr>
        					<td align="center"><?php echo $no++."."; ?></td>
        					<td><?php echo $data->nama; ?></td>
        					<td><?php echo $data->email; ?></td>
        					<td><?php echo $data->alamat; ?></td>
                            <td><?php echo $data->username; ?></td>
                            <td><?php echo $data->password; ?></td>
        					<td><?php echo $data->no_hp; ?></td>
        					<td><?php echo $data->jumlah_saldo; ?></td>
        					<td align="center">
        						<a id="edit_mbr" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_member; ?>" data-nama="<?php echo $data->nama; ?>" data-email="<?php echo $data->email; ?>" data-username="<?php echo $data->username; ?>" data-alamat="<?php echo $data->alamat; ?>" data-nohp="<?php echo $data->no_hp; ?>">
        						<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
        						</a>
                                <a href="?page=member&act=del&id=<?php echo $data->id_member; ?>&iduser=<?php echo $data->id_user; ?>" onclick="return confirm('Apakah anda yakin?')">
        						  <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                </a>  
        					</td>
        				</tr>
        				<?php 
        				} ?>
        			</table>
        		</div>

        		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>

        		<div id="tambah" class="modal fade" role="dialog">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Tambah Data Member</h4>
        				</div>
        				<form action="" method="post">
        					<div class="modal-body">
        						<div class="form-group">
        							<label class="control-label" form="nama">Nama</label>
        							<input type="text" name="nama" class="form-control" id="nama" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="email">Email</label>
        							<input type="text" name="email" class="form-control" id="email" required>
        						</div>
                                <div class="form-group">
                                    <label class="control-label" form="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" form="pass">Password</label>
                                    <input type="password" name="pass" class="form-control" id="pass" required>
                                </div>
        						<div class="form-group">
        							<label class="control-label" form="alamat">Alamat</label>
        							<input type="text" name="alamat" class="form-control" id="alamat" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="no_hp">Nomor HP</label>
        							<input type="text" name="no_hp" class="form-control" id="no_hp" required>
        						</div>
        					<div class="modal-footer">
        						<button type="reset" class="btn btn-danger">Reset</button>
        						<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        					</div>
        				</form>

        				<?php 
                        if (@$_POST['tambah']) {
                            $nama = $connection->conn->real_escape_string($_POST['nama']);
                            $email = $connection->conn->real_escape_string($_POST['email']);
                            $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                            $no_hp = $connection->conn->real_escape_string($_POST['no_hp']);
                            $username = $connection->conn->real_escape_string($_POST['username']);
                            $password = $connection->conn->real_escape_string($_POST['pass']);
                            $jumlah_saldo = $connection->conn->real_escape_string($_POST['jumlah_saldo']);


                                $user = $mbr->tambah_user($username, $password);
                                $data_user = $user->fetch_object();
                                $id = $data_user->id_user;
                                $mbr->tambah($id, $nama, $email, $alamat, $no_hp, $jumlah_saldo);
                                header("location: ?page=member");
                        }
                        ?>

        			</div>
        		</div>
        	</div>


        	<div id="edit" class="modal fade" role="dialog">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Edit Data Member</h4>
        				</div>
        				<form id="form" method="post">
        					<div class="modal-body" id="modal-edit">
        						<div class="form-group">
        							<label class="control-label" form="nama">Nama</label>
        							<input type="text" name="nama" class="form-control" id="nama" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="email">Email</label>
        							<input type="email" name="email" class="form-control" id="email" required>
        						</div>
                                <div class="form-group">
                                    <label class="control-label" form="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" form="pass">Password</label>
                                    <input type="text" name="pass" class="form-control" id="pass" required>
                                </div>
        						<div class="form-group">
        							<label class="control-label" form="alamat">Alamat</label>
        							<input type="text" name="alamat" class="form-control" id="alamat" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="nohp">Nomor HP</label>
        							<input type="text" name="nohp" class="form-control" id="no_hp" required>
        						</div>
        					</div>
        					<div class="modal-footer">
        						<input type="submit" class="btn btn-success" name="edit" value="Simpan">
        					</div>
        				</form>	
        					</div>
        				</div>
        			</div>
        			 <script src="assets/js/jquery-1.10.2.js"></script>
        			 <script type="text/javascript">

        			 $(document).on("click", "#edit_mbr", function() {
                        var id_member = $(this).data('id_member');
                        var nama = $(this).data('nama');
                        var email = $(this).data('email');
                        var username = $(this).data('username');
                        var password = $(this).data('password');
                        var alamat = $(this).data('alamat');
                        var no_hp = $(this).data('no_hp');
                        $("#modal-edit #nama").val(nama);
                        $("#modal-edit #email").val(email);
                        $("#modal-edit #username").val(username);
                        $("#modal-edit #pass").val(password);
                        $("#modal-edit #alamat").val(alamat);
                        $("#modal-edit #nohp").val(no_hp);
                     })

                     $(document).ready(function(e){
                        $("#form").on("submit", (function(e){
                            e.preventDefault();
                            $.ajax({
                                url : 'models/proses_edit_member.php',
                                type : 'POST',
                                data : new FormData(this),
                                contentType : false,
                                cache : false,
                                processData : false,
                                success : function(msg) {
                                    $('.table').html(msg);
                                }
                            });
                        }));
                     })
        			 </script>
        		</div>
    		</div>


<?php
} else if(@$_GET['act'] == 'del') {
    $mbr->hapus($_GET['id'], $_GET['iduser']);
    header("location: ?page=member");
}
