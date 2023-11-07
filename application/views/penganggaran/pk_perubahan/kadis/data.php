<section class="content-header">
      <h1>Perjanjian Kinerja Perubahan Esselon II
        <small>Perjanjian Kinerja Perubahan Esselon II</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja Perubahan</li>
        <li class="active">Esselon II</li>
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
      <h3 class="box-title">Data Perjanjian Kinerja Perubahan Esselon II</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/add') ?>" class="btn btn-success btn-flat">
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
            <th>Tanggal</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; 
         foreach ($pk_kadis_perubahan->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$data->nama_pihak_pertama ?></td>
            <td><?=$data->jabatan_pihak_pertama ?></td>
            <td><?=$data->nama_pihak_kedua?></td>
            <td><?=$data->jabatan_pihak_kedua ?></td>
            <td><?=format_indo($data->tanggal_pk) ?></td>
            <td>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/cetak/'.$data->pk_kadis_perubahan_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/cetak_lampiran/'.$data->pk_kadis_perubahan_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak Lampiran
              </a>
              <br>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$data->pk_kadis_perubahan_id.'/lampiran') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Lampiran
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/edit/'.$data->pk_kadis_perubahan_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_pk_kadis_perubahan" data-pk_kadis_perubahanid="<?=$data->pk_kadis_perubahan_id?>" class="btn btn-xs btn-danger" title="Delete">
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
    $(document).on('click', '#del_pk_kadis_perubahan', function() {
    if (confirm('Apakah anda yakin?')) {
        var pk_kadis_perubahan_id = $(this).data('pk_kadis_perubahanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kadis_perubahan/del')?>',
            dataType : 'json',
            data : {'pk_kadis_perubahan_id' : pk_kadis_perubahan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Perjanjian Kinerja Perubahan Esselon II');
                }
            }
        })
    }
});
</script>