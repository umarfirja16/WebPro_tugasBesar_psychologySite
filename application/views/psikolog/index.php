<div class="container">

	<?php if($this->session->flashdata('flash') ) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data Psikolog <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="row mt-3 ">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>psikolog/tambah" class="btn btn-primary">Tambah Data Psikolog</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group">
	  				<input type="text" class="form-control" placeholder="Cari data psikolog.." name="keyword">
	  				<div class="input-group-append">
	    				<button class="btn btn-primary" type="submit" >Search</button>
	  				</div>
				</div>	
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Daftar Psikolog</h3>
			<?php if(empty($psikolog)) : ?>
				<div class="alert alert-danger" role="alert">
					Data Psikolog Tidak Ditemukan
				</div>
			<?php endif; ?> 
			<ul class="list-group">
				<?php foreach( $psikolog as $psg) : ?>
  					<li class="list-group-item">
  						<?= $psg['nama_psikolog']?>
						<a href="<?= base_url(); ?>psikolog/hapus/<?= $psg['id_psikolog']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a> 
						<a href="<?= base_url(); ?>psikolog/ubah/<?= $psg['id_psikolog']; ?>" class="badge badge-success float-right">ubah</a>
						<a href="<?= base_url(); ?>psikolog/detail/<?= $psg['id_psikolog']; ?>" class="badge badge-primary float-right">detail</a>
  					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

</div>