<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/tkm/edit/'.$tkm->tkm_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Tenaga Kerja Mandiri
    <small>Tenaga Kerja Mandiri</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Tenaga Kerja Mandiri</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Tenaga Kerja Mandiri</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/tkm') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
						<div class="col-md-6">
                            <label>Kelompok *</label>
                            <select name="kelompok" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $kelompok=array("BUDIDAYA PERIKANAN DARAT","BENGKEL LAS","MENJAHIT","PENGOLAHAN HASIL PERTANIAN","SABLON","BUDIDAYA IKAN KOI","BENGKEL BUBUT");
                                $jlh_bln=count($kelompok);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$kelompok[$c] ?>" <?=$kelompok[$c] == $tkm->kelompok ? "selected" : null ?>><?=$kelompok[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama *</label>
                            <input type="text" name="nama" value="<?=$tkm->nama ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin *</label>
                            <select name="jk" class="form-control" id="jk">
                                <option value="">- Pilih -</option>
                                <option value="L" <?php if($tkm->jk=="L") { echo "selected"; } ?>>Laki - Laki</option>
                                <option value="P" <?php if($tkm->jk=="P") { echo "selected"; } ?>>Perempuan </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required><?=$tkm->alamat ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>" <?=$data->desa_id==$tkm->desa_id ? "selected" : null ?>><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Keterangan *</label>
                            <input type="text" name="ket" value="<?=$tkm->ket ?>" class="form-control" required>
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