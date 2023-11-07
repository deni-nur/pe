<section class="content-header">
      <h1>Perjanjian Kinerja Esselon IV
        <small>Perjanjian Kinerja Esselon IV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Esselon IV</li>
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
      <h3 class="box-title">Data Perjanjian Kinerja Esselon IV</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kasi/add') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-plus"></i> Create
          </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Pihak Pertama</th>
            <th>Jabatan Pihak Pertama</th>
            <th>Nama Pihak Kedua</th>
            <th>Jabatan Pihak Kedua</th>
            <th>Bidang</th>
            <th>Sub Bidang</th>
            <th>Tanggal</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; 
         foreach ($pk_kasi->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$data->nama_pihak_pertama ?></td>
            <td><?=$data->jabatan_pihak_pertama ?></td>
            <td><?=$data->nama_pihak_kedua?></td>
            <td><?=$data->jabatan_pihak_kedua ?></td>
            <td><?=$data->bidang ?></td>
            <td><?=$data->sub_bidang ?></td>
            <td><?=format_indo($data->tanggal_pk) ?></td>
            <td>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/cetak/'.$data->pk_kasi_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/cetak_lampiran/'.$data->pk_kasi_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak Lampiran
              </a>
              <br>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$data->pk_kasi_id.'/lampiran') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Lampiran
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/edit/'.$data->pk_kasi_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_pk_kasi" data-pk_kasiid="<?=$data->pk_kasi_id?>" class="btn btn-xs btn-danger" title="Delete">
              <i class="fa fa-trash"></i> Delete
            </td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</section>

<script>
    $(document).on('click', '#del_pk_kasi', function() {
    if (confirm('Apakah anda yakin?')) {
        var pk_kasi_id = $(this).data('pk_kasiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kasi/del')?>',
            dataType : 'json',
            data : {'pk_kasi_id' : pk_kasi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Perjanjian Kinerja Esselon IV');
                }
            }
        })
    }
});
</script>