<section class="content-header">
  <h1>Pencaker Menurut Pendidikan
    <small>Pencaker Menurut Pendidikan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li>Pencaker </li>
    <li class="active">Pencaker Menurut Pendidikan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> Pencaker</h3>
			<div class="pull-right">
				<a href="<?=site_url('pencaker_pd') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">

				<div class="col-md-12">
					<form action="" method="post">
            <?php for($i=0; $i < 7; $i++) : ?>
						<div class="col-md-3">
							<label>Tahun *</label>
						  <select name="tahun[]" class="form-control" required>
                  <option value="">- Pilih -</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
              </select>
						  </div>
						  
              <div class="col-md-3">
              <label>Bulan *</label>
              <select name="bulan[]" class="form-control" required>
                  <option value="">- Pilih -</option>
                  <option value="Januari">Januari</option>
                  <option value="Februari">Februari</option>
                  <option value="Maret">Maret</option>
                  <option value="April">April</option>
                  <option value="Mei">Mei</option>
                  <option value="Juni">Juni</option>
                  <option value="Juli">Juli</option>
                  <option value="Agustus">Agustus</option>
                  <option value="September">September</option>
                  <option value="Oktober">Oktober</option>
                  <option value="November">November</option>
                  <option value="Desember">Desember</option>
              </select>
              </div>

              <div class="col-md-3">
              <label>Pendidikan *</label>
              <select name="pendidikan[]" class="form-control" required>
                  <option value="">- Pilih -</option>
                  <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                  <option value="SD">SD</option>
                  <option value="SLTP">SLTP</option>
                  <option value="SLTA">SLTA</option>
                  <option value="SARJANA MUDA">SARJANA MUDA</option>
                  <option value="SARJANA">SARJANA</option>
                  <option value="S2">S2</option>
              </select>
              </div>
						  
              <div class="col-md-3">
                <label> Jumlah *</label>
                <input type="text" name="jml_org[]" class="form-control" required>
              </div>
                      
              <?php endfor; ?>

						  <div class="col-md-4">
              <div class="form-group">
              </div>
							<button type="submit" name="submit" value="submit" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" name="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>