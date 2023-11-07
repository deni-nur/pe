<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/perusahaan/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Perusahaan
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Perusahaan</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/perusahaan') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">

                        <div class="col-md-6">
                            <label>Nama Perusahaan *</label>
                            <input type="text" name="nama_perusahaan" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
						<div class="col-md-6">
                            <label>Tanggal Berdiri *</label>
                            <input type="date" name="tanggal_berdiri" value="<?=date('Y-m-d') ?>" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label>KBLI *</label>
                            <input type="text" name="kbli" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Phone *</label>
                            <input type="number" name="phone" class="form-control" required>
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
                        <div class="col-md-6">
                            <label>Kepemilikan *</label>
                            <select name="kepemilikan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $kepemilikan=array("KOPERASI","PATUNGAN","PERSEORANGAN","PERSERO","SWASTA","YAYASAN");
                                $jlh_bln=count($kepemilikan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$kepemilikan[$c] ?>"> <?=$kepemilikan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Capital Status *</label>
                            <select name="capital_status" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $capital_status=array("JOINT VENTURE","PMA","PMDN","SWASTA NASIONAL");
                                $jlh_bln=count($capital_status);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$capital_status[$c] ?>"> <?=$capital_status[$c] ?></option>
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