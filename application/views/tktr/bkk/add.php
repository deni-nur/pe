<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/bkk/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Bursa Kerja Khusus
    <small>Bursa Kerja Khusus</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Bursa Kerja Khusus</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Bursa Kerja Khusus</h3>
			<div class="box-tools pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/bkk') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
						
                        <div class="col-md-6">
                            <label>Nama *</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Desa *</label>
                            <select name="desa_id" class="form-control" >
                                <option value="">- Pilih -</option>
                                <?php foreach($desa->result() as $key => $data) { ?>
                                    <option value="<?=$data->desa_id?>"><?=$data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nomor Izin *</label>
                            <input type="text" name="no_izin" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Pengurus *</label>
                            <input type="text" name="nama_pengurus" class="form-control" required>
                        </div>
                            
                        <div class="form-group">
                        </div>
						<div class="col-md-4">
							<button type="submit" name="submit" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
			</div>
			
		</div>
	</div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        // $("#kabupaten_id").hide();
        // $("#kecamatan_id").hide();
        // $("#desa_id").hide();

        loadkabupaten();
        loadkecamatan();
        loaddesa();
    });

        function loadkabupaten() {
            $("#provinsi_id").change(function() {
                var getprovinsi = $("#provinsi_id").val();

                $.ajax({
                    type : "POST",
                    dataType : "JSON",
                    url : "<?= base_url(); ?>Bkk/getdatakabupaten",
                    data : {provinsi : getprovinsi},
                    success : function(data) {
                        console.log(data);

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="'+data[i].kabupaten_id+'">'+data[i].name+'</option>';
                        }

                        $("#kabupaten_id").html(html);
                        // $("#kabupaten_id").show();
                    }
                });
            });
        }

        function loadkecamatan() {
            $("#kabupaten_id").change(function() {
                var getkabupaten = $("#kabupaten_id").val();

                $.ajax({
                    type : "POST",
                    dataType : "JSON",
                    url : "<?= base_url(); ?>Bkk/getdatakecamatan",
                    data : {kabupaten : getkabupaten},
                    success : function(data) {
                        console.log(data);

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="'+data[i].kecamatan_id+'">'+data[i].name+'</option>';
                        }

                        $("#kecamatan_id").html(html);
                        // $("#kecamatan_id").show();
                    }
                });
            });
        }

        function loaddesa() {
            $("#kecamatan_id").change(function() {
                var getkecamatan = $("#kecamatan_id").val();

                $.ajax({
                    type : "POST",
                    dataType : "JSON",
                    url : "<?= base_url(); ?>Bkk/getdatadesa",
                    data : {kecamatan : getkecamatan},
                    success : function(data) {
                        console.log(data);

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="'+data[i].desa_id+'">'+data[i].name+'</option>';
                        }

                        $("#desa_id").html(html);
                        // $("#desa_id").show();
                    }
                });
            });
        }
</script>

<?php echo form_close(); ?>