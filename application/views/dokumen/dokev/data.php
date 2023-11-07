<section class="content-header">
  <h1>Dokumen Evaluasi
    <small>Dokumen Evaluasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Dokumen</li>
    <li class="active">Dokumen Evaluasi</li>
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
  <h3 class="box-title">Data Dokumen Evaluasi</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/dokev/add') ?>" class="btn btn-success btn-flat">
        <i class="fa fa-plus"></i> Create
      </a>
</div>
</div>

<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Jenis Dokumen</th>
        <th>Nama Dokumen</th>
        <th>File</th>
        <th width="12%">Created</th>
        <th width="12%">Updated</th>
        <th width="19%">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($dokev->result() as $key => $data) { ?>
    <tr>
        <td><?=$no++ ?>.</td>
        <td><?=$data->jenis_dokev ?></td>
        <td><?=$data->nama_dokev ?></td>
        <td>
          <?php if($data->upload_dokev != null) { ?>
            <embed src="<?=base_url('assets/upload/dokev/'.$data->upload_dokev) ?>" width="150" height="100"></embed>
          <?php } ?>
        </td>
        <td><?=$data->created ?></td>
        <td><?=$data->updated ?></td>
        <td>
        	<a href="<?=base_url('assets/upload/dokev/'.$data->upload_dokev) ?>" class="btn btn-primary btn-xs"><i class="fa fa-download"> Download
        		</i></a>
        	<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dokev/edit/'.$data->dokev_id) ?>" class="btn btn-warning btn-xs">
          		<i class="fa fa-pencil"></i> Update
          	</a>
          	<button id="del_dokev" data-dokevid="<?=$data->dokev_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_dokev', function() {
    if (confirm('Apakah anda yakin?')) {
        var dokev_id = $(this).data('dokevid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('dokev/del_dokev')?>',
            dataType : 'json',
            data : {'dokev_id' : dokev_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Dokumen Evaluasi');
                }
            }
        })
    }
})
</script>