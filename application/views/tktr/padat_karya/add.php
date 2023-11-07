<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/padat_karya/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Padat Karya Infrastruktur
    <small>Padat Karya Infrastruktur</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Padat Karya Infrastruktur</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Padat Karya Infrastruktur</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/padat_karya') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
						<div class="col-md-6">
                            <label>Jenis *</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="">- Pilih -</option>
                                <option value="PERKERASAN JALAN">PERKERASAN JALAN</option>
                                <option value="RABAT BETON">RABAT BETON</option>
                                <option value="PIPANISASI">PIPANISASI</option>
                                <option value="TEMBOK PENAHAN TANAH">TEMBOK PENAHAN TANAH</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama *</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>"><?=$data->name ?></option>
                                <?php } ?>
                            </select>
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