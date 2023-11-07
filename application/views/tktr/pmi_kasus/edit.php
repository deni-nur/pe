<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pmi_kasus/edit/'.$pmi_kasus->pmi_kasus_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>PMI Bermasalah
    <small>PMI Bermasalah</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">PMI Bermasalah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> PMI Bermasalah</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi_kasus') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">

						<div class="col-md-6">
                            <label>Tanggal Laporan *</label>
                            <input type="date" name="tanggal_laporan" value="<?=$pmi_kasus->tanggal_laporan ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama PMI *</label>
                            <input type="text" name="nama_pmi" value="<?=$pmi_kasus->nama_pmi ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Pengadu *</label>
                            <input type="text" name="nama_pengadu" value="<?=$pmi_kasus->nama_pengadu ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Negara Penempatan *</label>
                            <select name="negara_penempatan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $negara_penempatan=array("ALJAZAIR","BAHRAIN","BRUNAI DARUSALAM","HONGKONG","MALAYSIA","OMAN","QATAR","SAUDI ARABIA","SINGAPURA","TAIWAN","UNI EMIRATES ARAB","JEPANG","KOREA SELATAN","NIGERIA","KUWAIT","VIETNAM");
                                $jlh_bln=count($negara_penempatan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$negara_penempatan[$c] ?>" <?=$negara_penempatan[$c] == $pmi_kasus->negara_penempatan ? "selected" : null ?>> <?=$negara_penempatan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Permasalahan *</label>
                            <textarea name="permasalahan" class="form-control" required><?=$pmi_kasus->permasalahan ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Keterangan *</label>
                            <textarea name="ket" class="form-control" required><?=$pmi_kasus->ket ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required><?=$pmi_kasus->alamat ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>" <?=$data->desa_id == $pmi_kasus->desa_id ? "selected" : null ?>><?=$data->name ?></option>
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