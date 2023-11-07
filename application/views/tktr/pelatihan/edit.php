<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pelatihan/edit/'.$pelatihan->pelatihan_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Pelatihan Kerja
    <small>Pelatihan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Pelatihan Kerja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Pelatihan Kerja</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pelatihan') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
						<div class="col-md-6">
                            <label>Sumber Dana *</label>
                            <select name="sumber_dana" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sumber_dana=array("APBD","APBN");
                                $jlh_bln=count($sumber_dana);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$sumber_dana[$c] ?>" <?=$sumber_dana[$c] == $pelatihan->sumber_dana ? "selected" : null ?>> <?=$sumber_dana[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Kejuruan *</label>
                            <select name="kejuruan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $kejuruan=array("BANGUNAN","BISNIS DAN MANAJEMEN","DESIGN BATIK","GARMEN APPAREL","INDUSTRI KREATIF","OTOMOTIF","PROCESSING","REFRIGERATION","TEKNIK LAS","TEKNIK LISTRIK","TEKNIK MANUFAKTUR","TIK");
                                $jlh_bln=count($kejuruan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$kejuruan[$c] ?>" <?=$kejuruan[$c] == $pelatihan->kejuruan ? "selected" : null ?>> <?=$kejuruan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama *</label>
                            <input type="text" name="nama" value="<?=$pelatihan->nama ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tempat *</label>
                            <input type="text" name="tempat" value="<?=$pelatihan->tempat ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" value="<?=$pelatihan->tanggal_lahir ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin *</label>
                            <select name="jk" class="form-control" id="jk">
                                <option value="">- Pilih -</option>
                                <?php
                                $jk=array("L","P");
                                $jlh_bln=count($jk);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$jk[$c] ?>" <?=$jk[$c] == $pelatihan->jk ? "selected" : null ?>> <?=$jk[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan</label>
                            <select name="pendidikan" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php
                                $pendidikan=array("SD","SMP","SLTP","SMA","SLTA","SMK","D I","D III","S1","S2","S3");
                                $jlh_bln=count($pendidikan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$pendidikan[$c] ?>" <?=$pendidikan[$c] == $pelatihan->pendidikan ? "selected" : null ?>> <?=$pendidikan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required><?=$pelatihan->alamat ?></textarea>
                        </div>
                        <!-- <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>" <?=$data->desa_id == $pelatihan->desa_id ? "selected" : null ?>><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <div class="col-md-6">
                            <label>No HP *</label>
                            <input type="text" name="no_hp" value="<?=$pelatihan->no_hp ?>" class="form-control" required>
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