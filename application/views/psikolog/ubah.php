<div class="container">
	
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
  				<div class="card-header">
    				Form Ubah Data Psikolog
  				</div>
  				<div class="card-body">
    				<form action="" method="post">
						<div class="form-group">
    						<label for="nama">Nama</label>
    						<input type="text" name ="nama" class="form-control" id="nama" value="<?= $psikolog['nama_psikolog']; ?>">
                <small class="form-text text-danger"><?= form_error('nama')?></small>
  						<div class="form-group">
    						<label for="nama">Alamat</label>
    						<input type="text" name ="alamat" class="form-control" id="alamat" value="<?= $psikolog['alamat_psikolog']; ?>">
                <small class="form-text text-danger"><?= form_error('alamat')?></small>
  						</div>
  						<div class="form-group">
    						<label for="nama">Email</label>
    						<input type="text" name ="email" class="form-control" id="email" value="<?= $psikolog['email_psikolog']; ?>">
                <small class="form-text text-danger"><?= form_error('email')?></small>
  						</div>
  						<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
					</form>		
  				</div>
			</div>
			
		</div>
	</div>
</div>