<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/add'),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Kwitansi
        <small>Kwitansi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>SPJ</li>
        <li class="active">Kwitansi</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?=ucfirst($page) ?> Permintaan Pembayaran</h3>
    <div class="pull-right">
      <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/data') ?>" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
                
          <div class="form-group">
              <label>Tanggal Kwitansi *</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tanggal" value="<?=date('Y-m-d') ?>" class="form-control" required>
                  </div>
              </div>

            <div class="form-group">
              <label>Nomor Bukti *</label>
                  <input type="text" name="nomor_bukti" class="form-control" required>
            <div>

          <div>
            <br>
          <label for="uraian" >Uraian *</label>
          </div>
          <div class=" input-group">
              <input type="text" name="uraian" id="uraian" class="form-control" required>
              <input type="hidden" name="r_pp_id" id="r_pp_id" class="form-control" required>
              <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-rpp"><i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
        </div>
      </div>
          
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-flat">
              <i class="fa fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-flat">Reset</button>
          </div>
                
      </div>
    </div>
    
  </div>
</div>
</section>
<?php echo form_close(); ?>

<div class="modal fade" id="modal-rpp">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Uraian</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="table3" > 
        <thead>
            <tr>
                <th>No</th>
                <th>Uraian</th>
                <th>Name</th>
                <th>Biaya</th>
                <th>Kuantitas</th>
                <th>Pajak</th>
                <th>Tanggal NPD</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($r_pp->result() as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++; ?>.</td>
                <td><?=$data->uraian ?></td>
                <td><?=$data->nama_pemilik ?></td>
                <td><?=indo_bil($data->biaya) ?></td>
                <td><?=$data->lama_perjalanan ?></td>
                <td><?=indo_bil($data->h_pajak) ?></td>
                <td><?=indo_date($data->tgl_rpp) ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-rpp"
                    data-r_pp_id="<?=$data->r_pp_id ?>"
                    data-uraian="<?=$data->uraian ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
    $(document).on('click', '#select-rpp', function() {
    var r_pp_id = $(this).data('r_pp_id');
    var uraian = $(this).data('uraian');
    $('#r_pp_id').val(r_pp_id);
    $('#uraian').val(uraian);
    $('#modal-rpp').modal('hide');
})
})
</script>