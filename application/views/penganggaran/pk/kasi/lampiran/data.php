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
      <h3 class="box-title">Data Lampiran Perjanjian Kinerja Esselon IV</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kasi') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran_add') ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
          </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th width="5%" rowspan="2">No</th>
            <th rowspan="2">Sasaran Kegiatan</th>
            <th rowspan="2">Indikator Kinerja</th>
            <th rowspan="2">Satuan</th>
            <th rowspan="2">Target Tahunan</th>
            <th width="8%" colspan="4">Target Triwulan</th>
            <th width="19%" rowspan="2">Actions</th>
          </tr>
          <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; foreach ($lampiran->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$data->uraian_indikator_kegiatan ?></td>
            <td><?=$data->uraian_indikator_subkeg ?></td>
            <td><?=$data->satuan ?></td>
            <td><?=$data->target_tahunan ?></td>
            <td><?=$data->triwulan_1 ?></td>
            <td><?=$data->triwulan_2 ?></td>
            <td><?=$data->triwulan_3 ?></td>
            <td><?=$data->triwulan_4 ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran/'.$data->lampiran_pk_kasi_id.'/kegiatan_pk_kasi') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus" ></i> Kegiatan
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran_edit/'.$data->lampiran_pk_kasi_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_lampiran_pk_kasi" data-lampiran_pk_kasiid="<?=$data->lampiran_pk_kasi_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_lampiran_pk_kasi', function() {
    if (confirm('Apakah anda yakin?')) {
        var lampiran_pk_kasi_id = $(this).data('lampiran_pk_kasiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kasi/lampiran_del')?>',
            dataType : 'json',
            data : {'lampiran_pk_kasi_id' : lampiran_pk_kasi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Lampiran Perjanjian Kinerja Esselon IV');
                }
            }
        })
    }
});
</script>