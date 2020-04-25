<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card">
			 	<div class="card-header">
			 		Detail Data Psikolog
			 	</div>
			  	<div class="card-body">
			    	<h5 class="card-title"><?= $psikolog['nama_psikolog'];  ?></h5>
			    	<h6 class="card-subtitle mb-2 text-muted"><?= $psikolog['alamat_psikolog'];  ?></h6>
			    	<p class="card-text"><?= $psikolog['email_psikolog'];  ?></p>
			    	<a href="<?= base_url(); ?>psikolog" class="btn btn-primary">Kembali</a>
			  	</div>
			</div>
		</div>
	</div>
</div>