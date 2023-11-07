<section class="content-header">
      <h1>Perjanjian Kinerja Esselon III
        <small>Perjanjian Kinerja Esselon III</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Esselon III</li>
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
      <h3 class="box-title">Data Lampiran Perjanjian Kinerja Esselon III</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kabid_add') ?>" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
          </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Program</th>
            <th>Pagu Anggaran</th>
            <th width="15%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; foreach ($program_pk_kabid->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$data->nama_program ?></td>
            <td><?=indo_currency($data->pagu_anggaran) ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kabid_edit/'.$data->program_pk_kabid_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_program_pk_kabid" data-program_pk_kabidid="<?=$data->program_pk_kabid_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_program_pk_kabid', function() {
    if (confirm('Apakah anda yakin?')) {
        var program_pk_kabid_id = $(this).data('program_pk_kabidid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kabid/program_pk_kabid_del')?>',
            dataType : 'json',
            data : {'program_pk_kabid_id' : program_pk_kabid_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Program Perjanjian Kinerja Esselon III');
                }
            }
        })
    }
});
</script>