<?php 
include ("models/m_toko.php");
$toko = new Toko($connection);

if(@$_GET['act'] == '') {
?>


        <div class="row">
        	<div class="col-lg-12">
        		<h1>Toko <small> Data Toko</small></h1>
        		<ol class="breadcrumb">
        			<li><a href="index.html"><i class="icon-dashboard"></i> Toko</a></li>
        		</ol>
        	</div>
        </div>

        <div class="row">
        	<div class="col-lg-12">
        		<div class="table table-responsive">
        			<table class="table table-bordered table-hover table-striped">
        				<tr>
        					<th style="text-align: center;">No</th>
        					<th>Nama Toko</th>
        					<th>Pemilik Toko</th>
        					<th>Alamat Toko</th>
        					<th>Email</th>
        					<th>Jumlah Saldo</th>
        					<th>Opsi</th>
        				</tr>
        				<?php
        					$no = 1;
        					$tampil = $toko->tampil();
        					while($data = $tampil->fetch_object()) {
        				?>
        				<tr>
        					<td align="center"><?php echo $no++."."; ?></td>
        					<td><?php echo $data->nama_toko; ?></td>
        					<td><?php echo $data->nama_pemilik_toko; ?></td>
        					<td><?php echo $data->alamat_toko; ?></td>
        					<td><?php echo $data->email; ?></td>
        					<td><?php echo $data->jumlah_saldo; ?></td>
        					<td align="center">
        						<a id="edit_mbr" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_member; ?>" data-nama="<?php echo $data->nama; ?>" data-email="<?php echo $data->email; ?>" data-alamat="<?php echo $data->alamat; ?>" data-nohp="<?php echo $data->no_hp; ?>">
        						<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
        						</a>
                                <a href="?page=member&act=del&id=<?php echo $data->id_user; ?>" onclick="return confirm('Apakah anda yakin?')">
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
        							<label class="control-label" form="nama-toko">Nama Toko</label>
        							<input type="text" name="nama-toko" class="form-control" id="nama-toko" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="p-toko">Nama Pemilik Toko</label>
        							<input type="text" name="p-toko" class="form-control" id="p-toko" required>
        						</div>
                                <div class="form-group">
                                    <label class="control-label" form="alamat">Alamat Toko</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                </div>
        						<div class="form-group">
        							<label class="control-label" form="email">Email</label>
        							<input type="text" name="email" class="form-control" id="email" required>
        						</div>
        					<div class="modal-footer">
        						<button type="reset" class="btn btn-danger">Reset</button>
        						<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        					</div>
        				</form>

        				<?php
                        if (@$_POST['tambah']) {
                            $nama = $connection->conn->real_escape_string($_POST['nama_toko']);
                            $pemilik_toko = $connection->conn->real_escape_string($_POST['nama_pemilik_toko']);
                            $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                            $no_hp = $connection->conn->real_escape_string($_POST['email']);
                            $jumlah_saldo = $connection->conn->real_escape_string($_POST['jumlah_saldo']);


                                $user = $mbr->tambah_user($email, $password);
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
                                    <label class="control-label" form="pass">Password</label>
                                    <input type="text" name="pass" class="form-control" id="pass" required>
                                </div>
        						<div class="form-group">
        							<label class="control-label" form="alamat">Alamat</label>
        							<input type="text" name="alamat" class="form-control" id="alamat" required>
        						</div>
        						<div class="form-group">
        							<label class="control-label" form="nohp">Nomor HP</label>
        							<input type="text" name="nohp" class="form-control" id="nohp" required>
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
                        var id_member = $(this).data('id');
                        var nama = $(this).data('nama');
                        var email = $(this).data('email');
                        var password = $(this).data('pass');
                        var alamat = $(this).data('alamat');
                        var no_hp = $(this).data('nohp');
                        $("#modal-edit #nama").val(nama);
                        $("#modal-edit #email").val(email);
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
    $mbr->hapus($_GET['id']);
    header("location: ?page=member");
}

