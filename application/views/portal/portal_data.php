<section class="content-header">
  <h1>Portal
    <small>Portal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Portal</li>
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
      <h3 class="box-title">Data Portal</h3>
        <div class="pull-right">
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Portal</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no =1;
         foreach ($portal->result() as $key => $data) { ?>
           <tr>
             <td><?=$no++ ?></td>
             <td><?=$data->tahun_perencanaan ?></td>
             <td>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/edit/'.$data->portal_id) ?>" class="btn btn-warning btn-xs">
                  <i class="fa fa-pencil"></i> Update
                </a>
                <button id="del_portal" data-portalid="<?=$data->portal_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_portal', function() {
    if (confirm('Apakah anda yakin?')) {
        var portal_id = $(this).data('portalid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('portal/del_portal')?>',
            dataType : 'json',
            data : {'portal_id' : portal_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Portal');
                }
            }
        })
    }
})
</script>