<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$this->uri->segment(4).'/anggota_trans/edit/'.$anggota_trans->anggota_trans_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Anggota Transmigrasi
    <small>Anggota Transmigrasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Transmigrasi</li>
    <li class="active">Anggota Transmigrasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Anggota Transmigrasi</h3>
        <div class="pull-right">
            <a onclick="javascript:history.back()" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
                        
                        <div class="col-md-6">
                            <label>Nama Anggota *</label>
                            <input type="text" name="nama_anggota" value="<?=$anggota_trans->nama_anggota ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin *</label>
                            <select name="jk" class="form-control" id="jk">
                                <option value="">- Pilih -</option>
                                <?php
                                $jk=array("L","P");
                                $jlh_bln=count($jk);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$jk[$c] ?>" <?=$jk[$c] == $anggota_trans->jk ? "selected" : null ?>> <?=$jk[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Umur *</label>
                            <input type="text" name="umur" value="<?=$anggota_trans->umur ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $status=array("Kawin","Belum Kawin","Duda","Janda");
                                $jlh_bln=count($status);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$status[$c] ?>" <?=$status[$c] == $anggota_trans->status ? "selected" : null ?>> <?=$status[$c] ?></option>
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
                                <option value="<?=$hub_kel[$c] ?>" <?=$hub_kel[$c] == $anggota_trans->hub_kel ? "selected" : null ?>> <?=$hub_kel[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan </label>
                            <select name="pendidikan" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php
                                $pendidikan=array("SD","SMP","SLTP","SMA","SLTA","SMK","D I","D III","S1","S2","S3");
                                $jlh_bln=count($pendidikan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$pendidikan[$c] ?>" <?=$pendidikan[$c] == $anggota_trans->pendidikan ? "selected" : null ?>> <?=$pendidikan[$c] ?></option>
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