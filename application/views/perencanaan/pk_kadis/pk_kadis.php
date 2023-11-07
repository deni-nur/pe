<section class="content-header">
      <h1>PK
        <small>PK</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li class="active">PK</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data PK</h3>
      <div class="pull-right">
        <a href="<?=site_url('pk_kadis/cetak') ?>" class="btn btn-success">
          <i class="fa fa-print"></i> Cetak
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Sasaran Strategis PK</th>
            <th>Indikator Kinerja</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no =1;
          foreach($renstra as $renstra) { ?>
          <tr>
              <td style="width: 5%"><?=$no++ ?>.</td>
              <td><?=$renstra->sasaran ?></td>
              <td><?=$renstra->indikator_sasaran ?></td>
              <td class="text-center" width="160px">
                  <a href="<?=site_url('pk_kadis/'.$renstra->renstra_id) ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-plus"></i> Target Indikator Kinerja
                  </a>
              </td>
          </tr>
          <?php
          } ?>
</tbody>
</table>
</div>
</div>

</section>