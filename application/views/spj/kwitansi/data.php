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
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
        </a>
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Uraian</th>
            <th width="18%">Name</th>
            <th width="10%">Nominal</th>
            <th width="13%">Tanggal</th>
            <th width="12%">Cetak</th>
            <th width="12%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no =1;
          foreach($kwitansi->result() as $key => $data) { ?>
          <tr>
            <td><?=$no++; ?>.</td>
            <td><?=$data->uraian ?></td>
            <td><?=$data->name ?></td>
            <td align="right"><?=indo_currency($data->biaya*$data->lama_perjalanan-$data->h_pajak) ?></td>
            <td><?=format_indo($data->tanggal) ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/cetak/'.$data->kwitansi_id) ?>" class="btn btn-info btn-xs">
                <i class="fa fa-print"></i> Cetak
              </a>
              <br>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/cetak2/'.$data->kwitansi_id) ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-print"></i> Cetak Mamin+FC
              </a>
              <br>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/cetak_dinas_biasa/'.$data->kwitansi_id) ?>" class="btn btn-default btn-xs">
                <i class="fa fa-print"></i> Cetak Dinas Biasa
              </a>
            </td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/edit/'.$data->kwitansi_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_kwitansi" data-kwitansiid="<?=$data->kwitansi_id?>" class="btn btn-xs btn-danger">
                <i class="fa fa-trash"></i> Delete
              </button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>

</section>

<script>
    $(document).on('click', '#del_kwitansi', function() {
    if (confirm('Apakah anda yakin?')) {
        var kwitansi_id = $(this).data('kwitansiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kwitansi/del_kwitansi')?>',
            dataType : 'json',
            data : {'kwitansi_id' : kwitansi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Kwitansi');
                }
            }
        })
    }
})
</script>