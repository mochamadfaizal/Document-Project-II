<form class="form-horizontal" method="post" action="./proses-pendaftaran.php">
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="telp_pemasok" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" id="email" name="telp_pemasok" placeholder="08562419xxxx" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="alamat"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="daftar" type="submit" value="Daftar" class="btn btn-primary">
		</div>
	</div>
</form>