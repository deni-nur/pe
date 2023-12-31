<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('st/pelaksana/'.$st->st_id.'/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Pelaksana
    <small>Pelaksana</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Pelaksana</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Pelaksana</h3>
        <div class="pull-right">
            <a onclick="javascript:history.back()" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div>
                    <label for="pegawai_id">Nama Pelaksana *</label>
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" name="pelaksana_id" value="<?=$pelaksana->pelaksana_id ?>"> -->
                        <!-- <input type="text" name="st_id" value="<?=$pelaksana->st_id//=$this->uri->segment(3) ?>"> -->
                        <select name="pegawai_id" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach($pegawai as $key => $data) { ?>
                                <option value="<?=$data->pegawai_id?>"><?=$data->name ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
        
    </div>
</div>
</section>
<?php echo form_close(); ?>