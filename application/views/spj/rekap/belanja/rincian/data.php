<section class="content-header">
  <h1>Rekapitulasi Rincian Belanja
    <small>Data Rekapitulasi Rincian Belanja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Rekapitulasi Rincian Belanja</li>
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
			<h3 class="box-title">Data Rekapitulasi Rincian Belanja</h3>
			<div class="pull-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-cetak"><i class="fa fa-print"></i> Cetak</button>
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekap/'.$this->uri->segment(4).'/belanja_data') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="2%">No</th>
						<th width="40%">Uraian</center></th>
                        <th>Nama</th>
                        <th width="13%">Biaya</th>
                        <th>Pajak</th>
                        <th width="10%">Tanggal Pembayaran</th>
					</tr>   
                </thead>
                <tbody>
                    <?php $no=1; $a=0;
                        foreach($belanja->result() as $key => $data_belanja) {
                        foreach($rincian_pp->result() as $key => $data_rpp) {
                            if($data_belanja->belanja_id == $data_rpp->belanja_id) {
                                ++$a;
                                if($a==1) { ?>
                    <?php } ?>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$data_rpp->uraian ?></td>
                        <td><?=$data_rpp->name ?></td>
                        <td><?=indo_currency($data_rpp->biaya) ?></td>
                        <td><?=$data_rpp->pajak ?> %</td>
                        <td><?=format_indo($data_rpp->tgl_kwitansi) ?></td>
                    </tr> 
                    <?php }} $a=0; } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<div class="modal modal-info fade" id="modal-cetak">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Cetak Rekapitulasi Pembayaran Perjalanan Dinas</h4>
    </div>
    <form action="<?=base_url('portal/'.$this->uri->segment(2).'/rekap/'.$this->uri->segment(4).'/belanja_data/'.$this->uri->segment(6).'/cetak_dinas_biasa') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            <label>Pilih Tanggal *</label>
                <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <!-- <input type="hidden" name="pp_id" value="<?=$this->uri->segment(4) ?>" class="form-control"> -->
                <input type="date" name="tanggal" value="" class="form-control">
                </div>
        </div>
        <div>

        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Cetak Perjalanan Dinas Biasa</button>
        </div>
    </div>
</div>
</div>
</form>

<form action="<?=base_url('portal/'.$this->uri->segment(2).'/rekap/'.$this->uri->segment(4).'/belanja_data/'.$this->uri->segment(6).'/cetak_dalam_kota') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            <label>Pilih Tanggal *</label>
                <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <!-- <input type="hidden" name="pp_id" value="<?=$this->uri->segment(4) ?>" class="form-control"> -->
                <input type="date" name="tanggal" value="" class="form-control">
                </div>
        </div>
        <div>

        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Cetak Perjalanan Dinas Dalam Kota</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>