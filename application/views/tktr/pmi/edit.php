<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pmi/edit/'.$pmi->pmi_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>PMI
    <small>PMI </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK dan TR</li>
    <li class="active">PMI</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> PMI</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		<div class="box-body">
			<div class="row">

				<div class="col-md-6">
				<label for="tgl_registrasi">Tanggal Registrasi *</label>
				<input type="date" name="tgl_registrasi" value="<?=$pmi->tgl_registrasi ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="id_sistem"> ID Sistem *</label>
				<input type="text" name="id_sistem" value="<?=$pmi->id_sistem ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="nama">Nama PMI *</label>
				<input type="text" name="nama" value="<?=$pmi->nama ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="tmpt_lhr">Tempat Lahir *</label>
				<input type="text" name="tmpt_lhr" value="<?=$pmi->tmpt_lhr ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="tgl_lhr">Tanggal Lahir *</label>
				<input type="date" name="tgl_lhr" value="<?=$pmi->tgl_lhr ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label>Jenis Kelamin *</label>
				<select name="jk" class="form-control" required>
					<option value="">- Pilih -</option>
					<option value="L" <?php if($pmi->jk=="L") { echo "selected"; } ?>>Laki-Laki</option>
                    <option value="P" <?php if($pmi->jk=="P") { echo "selected"; } ?>>Perempuan</option>
				</select>
			</div>
			<div class="col-md-6">
				<label for="pptkis">PPTKIS *</label>
				<input type="text" name="pptkis" value="<?=$pmi->pptkis ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="agensi">Agensi *</label>
				<input type="text" name="agensi" value="<?=$pmi->agensi ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label>Negara Tujuan *</label>
				<select name="ngr_tjuan" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <?php
                    $ngr_tujuan=array("ALJAZAIR","BAHRAIN","BRUNAI DARUSALAM","HONGKONG","MALAYSIA","OMAN","QATAR","SAUDI ARABIA","SINGAPURA","TAIWAN","UNI EMIRATES ARAB","JEPANG","KOREA SELATAN","NIGERIA","KUWAIT","VIETNAM");
                    $jlh_bln=count($ngr_tujuan);
                    for($c=0; $c<$jlh_bln; $c+=1){ ?>
                    <option value="<?=$ngr_tujuan[$c] ?>" <?=$ngr_tujuan[$c] == $pmi->ngr_tjuan ? "selected" : null ?>> <?=$ngr_tujuan[$c] ?></option>
                    <?php } ?>
                </select>
			</div>
			<div class="col-md-6">
				<label>Pendidikan</label>
				<select name="pendidikan" class="form-control">
					<option value="">- Pilih -</option>
					<?php
                    $pendidikan=array("SD","SMP","SMA","SMK","D I","D III","S1","S2","S3");
                    $jlh_bln=count($pendidikan);
                    for($c=0; $c<$jlh_bln; $c+=1){ ?>
                    <option value="<?=$pendidikan[$c] ?>" <?=$pendidikan[$c] == $pmi->pendidikan ? "selected" : null ?>> <?=$pendidikan[$c] ?></option>
                    <?php } ?>
				</select>
			</div>
			<div class="col-md-6">
				<label>Sektor Pekerjaan *</label>
				<select name="sktor_pkrjaan" class="form-control" required>
					<option value="">- Pilih -</option>
					<option value="FORMAL" <?php if($pmi->sktor_pkrjaan=="FORMAL") { echo "selected"; } ?>>Formal</option>
					<option value="INFORMAL" <?php if($pmi->sktor_pkrjaan=="INFORMAL") { echo "selected"; } ?>>Informal</option>
				</select>
			</div>
			<div class="col-md-6">
				<label for="jbtn">Jabatan *</label>
				<input type="text" name="jbtn" value="<?=$pmi->jbtn ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="sttus">Status *</label>
				<input type="text" name="sttus" value="<?=$pmi->sttus ?>" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label for="alamat">Alamat *</label>
				<textarea name="alamat" class="form-control" required><?=$pmi->alamat ?></textarea>
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