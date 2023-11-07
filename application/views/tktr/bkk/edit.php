<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/bkk/edit/'.$bkk->bkk_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Bursa Kerja Khusus
    <small>Bursa Kerja Khusus</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Bursa Kerja Khusus</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Bursa Kerja Khusus</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/bkk') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
                        <div class="col-md-6">
                            <label>Nama *</label>
                            <input type="text" name="nama" value="<?=$bkk->nama ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required><?=$bkk->alamat ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>" <?=$data->desa_id == $bkk->desa_id ? "selected" : null ?>><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nomor Izin *</label>
                            <input type="text" name="no_izin" value="<?=$bkk->no_izin ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Pengurus *</label>
                            <input type="text" name="nama_pengurus" value="<?=$bkk->nama_pengurus ?>" class="form-control" required>
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
</section>

<?php echo form_close(); ?>