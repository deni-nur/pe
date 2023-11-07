<section class="content-header">
  <h1>Surat Tugas
    <small>Surat Tugas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Surat Tugas</li>
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
      <h3 class="box-title">Data Surat tugas</h3>
      <div class="pull-right">
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Dasar Surat</th>
            <th>Maksud Perjalanan Dinas</th>
            <th width="20%">Pegawai yang Melaksanakan</th>
            <th width="28%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no =1;
          foreach($st->result() as $st) { ?>
          <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$st->darsur ?></td>
            <td><?=$st->maksud ?></td>
            <td><?=$st->name ?>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/'.$st->st_id.'/pengikut') ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-plus"></i> Pengikut
              </a>
            </td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/cetak/'.$st->st_id) ?>" class="btn btn-info btn-xs">
                <i class="fa fa-print"></i> Cetak TTE
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/cetak2/'.$st->st_id) ?>" class="btn btn-default btn-xs">
                <i class="fa fa-print"></i> Cetak SPJ
              </a>
               <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/edit/'.$st->st_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_st" data-stid="<?=$st->st_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_st', function() {
    if (confirm('Apakah anda yakin?')) {
        var st_id = $(this).data('stid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('st/del_st')?>',
            dataType : 'json',
            data : {'st_id' : st_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Surat Tugas');
                }
            }
        })
    }
})
</script>