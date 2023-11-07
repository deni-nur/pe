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
      <h3 class="box-title">Data Perjanjian Kinerja Esselon III</h3>
      <div class="pull-right">
        <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kabid/add') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-plus"></i> Create
          </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Pihak Pertama</th>
            <th>Jabatan Pihak Pertama</th>
            <th>Nama Pihak Kedua</th>
            <th>Jabatan Pihak Kedua</th>
            <th>Bidang</th>
            <th>Tanggal</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; 
         foreach ($pk_kabid->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$data->nama_pihak_pertama ?></td>
            <td><?=$data->jabatan_pihak_pertama ?></td>
            <td><?=$data->nama_pihak_kedua?></td>
            <td><?=$data->jabatan_pihak_kedua ?></td>
            <td><?=$data->bidang ?></td>
            <td><?=format_indo($data->tanggal_pk) ?></td>
            <td>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kabid/cetak/'.$data->pk_kabid_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kabid/cetak_lampiran/'.$data->pk_kabid_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-print"></i> Cetak Lampiran
              </a>
              <br>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$data->pk_kabid_id.'/lampiran') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Lampiran
              </a>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pk_kabid/edit/'.$data->pk_kabid_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_pk_kabid" data-pk_kabidid="<?=$data->pk_kabid_id?>" class="btn btn-xs btn-danger" title="Delete">
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
    $(document).on('click', '#del_pk_kabid', function() {
    if (confirm('Apakah anda yakin?')) {
        var pk_kabid_id = $(this).data('pk_kabidid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pk_kabid/del')?>',
            dataType : 'json',
            data : {'pk_kabid_id' : pk_kabid_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Perjanjian Kinerja Esselon III');
                }
            }
        })
    }
});
</script>