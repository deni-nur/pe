<section class="content-header">
  <h1>Pencaker
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li class="active">Pencaker</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Pencaker</h3>
			<div class="pull-right">
				<a href="<?=site_url('pencaker') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('pencaker/process') ?>" method="post">
						<div class="form-group">
							<label>Tahun *</label>
                            <input type="hidden" name="id" value="<?=$row->pencaker_id?>">
							<select name="tahun" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $now=date('Y');
                                for ($a=2020;$a<=$now;$a++) { ?>
                                <option value="<?=$a ?>" <?=$a == $row->tahun ? "selected" : null ?>><?=$a ?></option>
                                <?php } ?>
                            </select>
						</div>
						<div class="form-group">
							<label>Bulan *</label>
							<select name="bulan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                $jlh_bln=count($bulan);
                                for($c=0; $c<$jlh_bln; $c+=1){ ?>
                                <option value="<?=$bulan[$c] ?>" <?=$bulan[$c] == $row->bulan ? "selected" : null ?>> <?=$bulan[$c] ?></option>
                                <?php } ?>
                            </select>
						</div>
                        <div class="form-group">
							<label>Jenis Kelamin *</label>
							<select name="jk" class="form-control" >
								<option value="">- Pilih -</option>
								<option value="L" <?=$row->jk == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
								<option value="P" <?=$row->jk == 'P' ? 'selected' : '' ?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Pendidikan *</label>
							<select name="pendidikan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $pendidikan=array("Tidak Tamat SD","SD","SLTP","SLTA","Sarjana Muda","S1","S2");
                                $jlh_pd=count($pendidikan);
                                for($c=0; $c<$jlh_pd; $c+=1){ ?>
                                <option value="<?=$pendidikan[$c] ?>" <?=$pendidikan[$c] == $row->pendidikan ? "selected" : null ?>> <?=$pendidikan[$c] ?></option>
                                <?php } ?>
                            </select>
						</div>

						<div class="form-group">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>