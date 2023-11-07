<section class="content-header">
  <h1>Rekapitulasi Belanja
    <small>Data Rekapitulasi Belanja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Rekapitulasi Belanja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Rekapitulasi Belanja</h3>
			<div class="pull-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-cetak_rekap_perkode_rekening"><i class="fa fa-print"></i> Cetak Rekap Perkode Rekening</button>
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekap') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th>Belanja</center></th>
                        <th width="10%">Realisasi</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Actions</th>
					</tr> 
                </thead>
                <tbody>
                    <?php $no=0; $a=0;
                            foreach($belanja->result() as $key => $data_belanja) {
                            foreach($rincian_pp->result() as $key => $data_rpp) {
                            if($data_belanja->belanja_id == $data_rpp->belanja_id) {
                                ++$a;
                                if($a==1) { ?>
                    
                    <tr>
                        <td colspan="2"><b><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></b></td>
                        <td><b><?=indo_currency($data_belanja->jumlah_biaya) ?></b></td>
                        <td></td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekap/'.$data_belanja->pp_id.'/belanja_data/'.$data_belanja->belanja_id.'/rincian_belanja_data') ?>" class="btn btn-default btn-xs">
                              <i class="fa fa-eye"></i> Rincian Belanja
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td><?=++$no; ?>.</td>
                        <td><?=$data_rpp->uraian ?></td>
                        <td><?=indo_currency($data_rpp->biaya) ?></td>
                        <td><?=format_indo($data_rpp->tgl_kwitansi) ?></td>
                        <td></td>
                    </tr> 
                    <?php }} $a=0; } ?>
				</tbody>
			</table>
		</div>
    </div>
</section>

<div class="modal modal-info fade" id="modal-cetak_rekap_perkode_rekening">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Cetak Rekapitulasi Belanja Perkode Rekening</h4>
    </div>
    <form action="<?=base_url('portal/'.$this->uri->segment(2).'/rekap/'.$this->uri->segment(4).'/belanja_data/cetak_rekap_perkode_rekening') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">

        <div class="form-group">
            <label>Date</label>
            <div>
                <input type="date" name="date1" value="<?=@$GET['date1'] ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>s/d</label>
            <div>
                <input type="date" name="date2" value="<?=@$GET['date2'] ?>" class="form-control">
            </div>
        </div>
               
        <div>
        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Cetak</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>