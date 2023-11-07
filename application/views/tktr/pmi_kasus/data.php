<section class="content-header">
  <h1>PMI Bermasalah
    <small>PMI Bermasalah</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">PMI Bermasalah</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data PMI Bermasalah</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/pmi_kasus/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi_kasus/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Tanggal Laporan / Surat</th>
                    <th>Nama PMI</th>
                    <th>Alamat</th>
                    <th>Nama / Hubungan Pengadu</th>
                    <th>Negara Penempatan</th>
                    <th>Permasalahan</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($pmi_kasus->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->tanggal_laporan ?></td>
                    <td><?=$data->nama_pmi ?></td>
                    <td><?=$data->alamat ?></td>
                    <td><?=$data->nama_pengadu ?></td>
                    <td><?=$data->negara_penempatan ?></td>
                    <td><?=$data->permasalahan ?></td>
                    <td><?=$data->ket ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pmi_kasus/edit/'.$data->pmi_kasus_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_pmi_kasus" data-pmi_kasusid="<?=$data->pmi_kasus_id?>" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<script>
    $(document).on('click', '#del_pmi_kasus', function() {
    if (confirm('Apakah anda yakin?')) {
        var pmi_kasus_id = $(this).data('pmi_kasusid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pmi_kasus/del_pmi_kasus')?>',
            dataType : 'json',
            data : {'pmi_kasus_id' : pmi_kasus_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data PMI Bermasalah');
                }
            }
        })
    }
});
</script>