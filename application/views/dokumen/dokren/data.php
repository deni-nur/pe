<section class="content-header">
  <h1>Dokumen Perencanaan
    <small>Dokumen Perencanaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Dokumen</li>
    <li class="active">Dokumen Perencanaan</li>
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
  <h3 class="box-title">Data Dokumen Perencanaan</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/dokren/add') ?>" class="btn btn-success btn-flat">
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
    <?php $no=1; foreach($dokren->result() as $key => $data) { ?>
    <tr>
        <td><?=$no++ ?>.</td>
        <td><?=$data->jenis_dokren ?></td>
        <td><?=$data->nama_dokren ?></td>
        <td>
          <?php if($data->upload_dokren != null) { ?>
            <embed src="<?=base_url('assets/upload/dokren/'.$data->upload_dokren) ?>" width="150" height="100"></embed>
          <?php } ?>
        </td>
        <td><?=$data->created ?></td>
        <td><?=$data->updated ?></td>
        <td>
        	<a href="<?=base_url('assets/upload/dokren/'.$data->upload_dokren) ?>" class="btn btn-primary btn-xs"><i class="fa fa-download"> Download
        		</i></a>
        	<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dokren/edit/'.$data->dokren_id) ?>" class="btn btn-warning btn-xs">
          		<i class="fa fa-pencil"></i> Update
          	</a>
          	<button id="del_dokren" data-dokrenid="<?=$data->dokren_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_dokren', function() {
    if (confirm('Apakah anda yakin?')) {
        var dokren_id = $(this).data('dokrenid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('dokren/del_dokren')?>',
            dataType : 'json',
            data : {'dokren_id' : dokren_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Dokumen Perencanaan');
                }
            }
        })
    }
})
</script>