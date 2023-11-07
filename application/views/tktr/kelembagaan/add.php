<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/kelembagaan/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Kelembagaan
    <small>Kelembagaan </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Kelembagaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Kelembagaan</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelembagaan') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
						<div class="col-md-6">
                            <label>Lembaga *</label>
                            <select name="lembaga" class="form-control" id="lembaga">
                                <option value="">- Pilih -</option>
                                <option value="LPKS">LPKS</option>
                                <option value="BLKK">BLKK</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Kelembagaan *</label>
                            <input type="text" name="nama_kelembagaan" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nomor Izin </label>
                            <input type="text" name="no_izin" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>NIB </label>
                            <input type="text" name="nib" class="form-control">
                        </div>
                        
                        <div class="col-md-6">
                            <label>No Telephon </label>
                            <input type="text" name="no_tlp" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Penanggung Jawab *</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jabatan Penanggung Jawab *</label>
                            <select name="jabatan" class="form-control" required>
                              <option value="">- Pilih -</option>
                              <option value="Kepala LPKS"> Kepala LPKS</option>
                              <option value="Kepala BLKK"> Kepala BLKK</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>No HP Penanggung Jawab *</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jumlah Program Pelatihan Keseluruhan *</label>
                            <input type="number" name="jml_pelatihan" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Program Pelatihan yang Terakreditasi *</label>
                            <input type="text" name="pelatihan_terakreditasi" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Terdaftar / Belum Terdaftar *</label>
                            <select name="verif" class="form-control" required>
                              <option value="">- Pilih -</option>
                              <option value="YA"> YA</option>
                              <option value="TIDAK"> TIDAK</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat Kelembagaan *</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
                        
                        <div class="form-group">
                        </div>
						<div class="col-md-4">
							<button type="submit" name="submit" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<?php echo form_close(); ?>