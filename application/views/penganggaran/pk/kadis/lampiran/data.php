<section class="content-header">
      <h1>Perjanjian Kinerja Esselon II
        <small>Perjanjian Kinerja Esselon II</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
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
      <h3 class="box-title">Data Lampiran Perjanjian Kinerja Esselon II</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kadis') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kadis/'.$this->uri->segment(4).'/lampiran_add') ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
          </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th width="5%" rowspan="2">No</th>
            <th rowspan="2">Sasaran Strategis</th>
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
            <td><?=$data->uraian_sasaran ?></td>
            <td><?=$data->uraian_indikator_sasaran?></td>
            <td><?=$data->satuan ?></td>
            <td><?=$data->target_tahunan ?></td>
            <td><?=$data->triwulan_1 ?></td>
            <td><?=$data->triwulan_2 ?></td>
            <td><?=$data->triwulan_3 ?></td>
            <td><?=$data->triwulan_4 ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis/'.$this->uri->segment(4).'/lampiran/'.$data->lampiran_pk_kadis_id.'/program_pk_kadis') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus" title="Program PK KADIS"></i> Program
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kadis/'.$this->uri->segment(4).'/lampiran_edit/'.$data->lampiran_pk_kadis_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_lampiran_pk_kadis" data-lampiran_pk_kadisid="<?=$data->lampiran_pk_kadis_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_lampiran_pk_kadis', function() {
    if (confirm('Apakah anda yakin?')) {
        var lampiran_pk_kadis_id = $(this).data('lampiran_pk_kadisid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kadis/lampiran_del')?>',
            dataType : 'json',
            data : {'lampiran_pk_kadis_id' : lampiran_pk_kadis_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Lampiran Perjanjian Kinerja Esselon II');
                }
            }
        })
    }
});
</script>