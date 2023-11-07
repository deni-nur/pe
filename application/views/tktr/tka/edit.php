<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/edit/'.$tka->tka_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Tenaga Kerja Asing
    <small>Tenaga Kerja Asing</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Tenaga Kerja Asing</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Tenaga Kerja Asing</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/data_tka') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">

                        <div class="col-md-6">
                            <label>Nama Tenaga Kerja Asing *</label>
                            <input type="text" name="nama_tka" value="<?=$tka->nama_tka ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin *</label>
                            <select name="jk" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $jk=array("L","P");
                                $jlh_bln=count($jk);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$jk[$c] ?>" <?=$jk[$c] == $tka->jk ? "selected" : null ?>> <?=$jk[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
						<div class="col-md-6">
                            <label>Kebangsaan *</label>
                            <select name="kebangsaan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $kebangsaan=array("CHINA","KOREA","KOREA SELATAN","MALAYSIA","RRC","TAIWAN");
                                $jlh_bln=count($kebangsaan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$kebangsaan[$c] ?>" <?=$kebangsaan[$c] == $tka->kebangsaan ? "selected" : null ?>> <?=$kebangsaan[$c] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Passport *</label>
                            <input type="text" name="passport" value="<?=$tka->passport ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>KITAS / KITAP *</label>
                            <input type="text" name="kitas" value="<?=$tka->kitas ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Jabatan *</label>
                            <input type="text" name="jabatan" value="<?=$tka->jabatan ?>" class="form-control" required>
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