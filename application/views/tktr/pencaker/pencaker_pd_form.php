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
      <h3 class="box-title"><?=ucfirst($page) ?> Pencaker Menurut Pendidikan</h3>
      <div class="pull-right">
        <a href="<?=site_url('pencaker_pd') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('pencaker_pd/process') ?>" method="post">
            <div class="form-group">
              <label>Tahun *</label>
              <input type="hidden" name="id" value="<?=$row->pencaker_pd_id?>">
              <select name="tahun" class="form-control" required>
                  <option value="">- Pilih -</option>
                  <?php
                  $now=date('Y');
                  for ($a=2021;$a<=$now;$a++) { ?>
                  <option value="<?=$a ?>" <?=$a == $row->tahun ? "selected" : null ?>><?=$a ?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group">
            <label>Pendidikan *</label>
            <select name="pendidikan" class="form-control" required>
                <option value="">- Pilih -</option>
                <?php
                $pendidikan=array("Tidak Tamat SD","SD","SLTP","SLTA","SARJANA MUDA","SARJANA","S2");
                $jlh_bln=count($pendidikan);
                for($c=0; $c<$jlh_bln; $c+=1){ ?>
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