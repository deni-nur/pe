<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pnp_trans/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Penempatan Transmigrasi
    <small>Penempatan Transmigrasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Transmigrasi</li>
    <li class="active">Penempatan Transmigrasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Penempatan Transmigrasi</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pnp_trans') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
                        <div class="col-md-6">
                            <label>Nama KK *</label>
                            <input type="text" name="nama_kk" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin *</label>
                            <select name="jk" class="form-control" id="jk">
                                <option value="">- Pilih -</option>
                                <?php
                                $jk=array("L","P");
                                $jlh_bln=count($jk);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$jk[$c] ?>"> <?=$jk[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Umur *</label>
                            <input type="text" name="umur" class="form-control" required>
                        </div>
						<div class="col-md-6">
                            <label>Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $status=array("Kawin","Belum Kawin","Duda","Janda");
                                $jlh_bln=count($status);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$status[$c] ?>"> <?=$status[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Hubungan Keluarga *</label>
                            <select name="hub_kel" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $hub_kel=array("Kepala Keluarga","Istri","Anak");
                                $jlh_bln=count($hub_kel);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$hub_kel[$c] ?>"> <?=$hub_kel[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan *</label>
                            <select name="pendidikan" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php
                                $pendidikan=array("SD","SMP","SLTP","SMA","SLTA","SMK","D I","D III","S1","S2","S3");
                                $jlh_bln=count($pendidikan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$pendidikan[$c] ?>"> <?=$pendidikan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pekerjaan Pokok *</label>
                            <input type="text" name="pekerjaan_pokok" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Keterampilan *</label>
                            <input type="text" name="keterampilan" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Agama *</label>
                            <select name="agama" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php
                                $agama=array("ISLAM","KRISTEN","KATOLIK","HINDU","BUDDHA","KONGHUCU");
                                $jlh_bln=count($agama);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$agama[$c] ?>"> <?=$agama[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa Asal *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>"><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Berangkat *</label>
                            <input type="date" name="tgl_berangkat" value="<?=date('Y-m-d') ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Tiba *</label>
                            <input type="date" name="tgl_tiba" value="<?=date('Y-m-d') ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa Tujuan *</label>
                            <select name="desa_luar_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>"><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Trans *</label>
                            <input type="text" name="jenis_trans" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Perubahan Mutasi </label>
                            <input type="text" name="perubahan_mutasi" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label>Keterangan </label>
                            <textarea name="ket" class="form-control"></textarea>
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