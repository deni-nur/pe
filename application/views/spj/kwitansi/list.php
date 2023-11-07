<section class="content-header">
  <h1>Kwitansi
    <small>Kwitansi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Kwitansi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Kwitansi</h3>
    <div class="pull-right">
</div>
</div>

  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
              <th width="5%">No</th>
              <th width="40%">Sub Kegiatan</th>
              <th>Pagu Anggaran</th>
              <th>Realisasi</th>
              <th>Sisa</th>
              <th width="8%">Actions</th>
          </tr>
        </thead>
        <tbody> 
        <?php $no=1; $a=0;
            foreach($kwitansi->result() as $key => $data_dpa) { 
            foreach($realisasi->result() as $key => $data) {
            if($data_dpa->dpa_id == $data->dpa_id) { 
            ++$a;
            if($a==1) { ?>  
            <?php } ?>
              <tr>
                  <td><?=$no++; ?>.</td>
                  <td><?=$data_dpa->kode_urusan ?>.<?=$data_dpa->kode ?>.<?=$data_dpa->kode_program ?>.<?=$data_dpa->kode_kegiatan ?>.<?=$data_dpa->kode_subkeg ?> <?=$data_dpa->nama_subkeg ?></td>
                  <td><?=indo_currency($data_dpa->jumlah_pagu_subkeg) ?></td>
                  <td><?=indo_currency($data->jumlah_realisasi_subkeg) ?></td>
                  <td><?=indo_currency($data_dpa->jumlah_pagu_subkeg - $data->jumlah_realisasi_subkeg) ?></td>
                  <td>
                    <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$data->pp_id.'/belanja') ?>" class="btn btn-info btn-xs">
                      <i class="fa fa-eye"></i> Kwitansi
                    </a>
                  </td>
              </tr>
          <?php }} $a=0; } ?>
        </tbody>
      </table>
  </div>
</div>
</section>