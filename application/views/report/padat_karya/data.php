<section class="content-header">
  <h1>Padat Karya Infrastruktur
    <small>Padat Karya Infrastruktur</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Padat Karya Infrastruktur</li>
  </ol>
</section>

<section class="content">

<div class="box">
<div class="box-header with-border">
    <h3 class="box-title">Filter Data</h3>
</div>
<div class="box-body">
    <form action="" method="post">
        <div class="row">

            <div class="col-md-3">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" name="jenis" value="<?=@$post['jenis'] ?>" class="form-control" placeholder="Rebat Beton / Perkerasan Jalan">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label">Desa</label>
						<div class="col-sm-9">
							<select name="desa" class="form-control">
								<option value="">- All -</option>
								<?php foreach($desa as $cst => $data) { ?>
									<option value="<?=$data->desa_id ?>" <?=@$post['desa'] == $data->desa_id ? 'selected' : '' ?>><?=$data->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label">Tahun</label>
						<div class="col-sm-9">
							<select name="portal" class="form-control">
								<option value="">- All -</option>
								<?php foreach($portal as $cst => $data) { ?>
									<option value="<?=$data->portal_id ?>" <?=@$post['portal'] == $data->portal_id ? 'selected' : '' ?>><?=$data->tahun_perencanaan ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
      
        </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button type="submit" name="reset" class="btn btn-flat">Reset</button>
                        <button type="submit" name="filter" class="btn btn-info btn-flat">
                            <i class="fa fa-search"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Padat Karya Infrastruktur</h3>
    
    <div class="pull-right">
        <a href="<?= site_url('portal/'.$this->uri->segment(2).'/report_padat_karya/cetak') ?>" target="_blank" class="btn btn-warning">
            <i class="fa fa-print"></i> Cetak
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                     <th width="5%">No</th>
                     	<th>Tahun</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($row->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->tahun_perencanaan ?></td>
                    <td><?=$data->jenis ?></td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->nama_desa ?></td>
                    <td><?=$data->nama_kecamatan ?></td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<script>
    $(document).on('click', '#del_padat_karya', function() {
    if (confirm('Apakah anda yakin?')) {
        var padat_karya_id = $(this).data('padat_karyaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('padat_karya/del_padat_karya')?>',
            dataType : 'json',
            data : {'padat_karya_id' : padat_karya_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Padat Karya');
                }
            }
        })
    }
});
</script>