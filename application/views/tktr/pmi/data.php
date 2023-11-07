<section class="content-header">
  <h1>PMI
    <small>PMI</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li class="active">PMI</li>
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
            <h3 class="box-title">Data PMI</h3>
            <div class="pull-right">
                <a href="<?= site_url('portal/'.$this->uri->segment(2).'/pmi/form') ?>" title="Import Data" class="btn btn-primary">
                    <i class="fa fa-cloud-upload"></i> Import Data
                </a>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi/add') ?>" class="btn btn-success">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama PMI</th>
                        <th>Alamat</th>
                        <th>Negara Tujuan</th>
                        <th>PPTKIS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php $no =1;
                        foreach($pmi->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->nama ?></td>
                            <td><?=$data->alamat ?></td>
                            <td><?=$data->ngr_tjuan ?></td>
                            <td><?=$data->pptkis ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi/edit/'.$data->pmi_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_pmi" data-pmiid="<?=$data->pmi_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_pmi', function() {
    if (confirm('Apakah anda yakin?')) {
        var pmi_id = $(this).data('pmiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pmi/del_pmi')?>',
            dataType : 'json',
            data : {'pmi_id' : pmi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data PMI');
                }
            }
        })
    }
})
</script>