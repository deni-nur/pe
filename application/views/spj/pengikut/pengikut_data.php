<section class="content-header">
  <h1>Pengikut
    <small>Pengikut</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Pengikut</li>
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
  <h3 class="box-title">Data Pengikut</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/st') ?>" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i> Back
    </a>
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/st/'.$this->uri->segment(4).'/pengikut/add') ?>" class="btn btn-primary btn-flat">
        <i class="fa fa-plus"></i> create
    </a>
  </div>
</div>

<div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Pengikut</th>
            <th width="15%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no =1;
          foreach($pengikut->result() as $pengikut) { ?>
          <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$pengikut->name ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st/'.$this->uri->segment(4).'/pengikut/edit/'.$pengikut->pengikut_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_pengikut" data-pengikutid="<?=$pengikut->pengikut_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_pengikut', function() {
    if (confirm('Apakah anda yakin?')) {
        var pengikut_id = $(this).data('pengikutid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pengikut/del_pengikut')?>',
            dataType : 'json',
            data : {'pengikut_id' : pengikut_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Pengikut');
                }
            }
        })
    }
})
</script>