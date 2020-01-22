<!--  -->
<div class="modal-header">
    <h4 class="modal-title"><?= $judul_modal; ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="icofont icofont-ui-close"></i></span>
    </button>
</div>

<?php
$js_request = json_encode($all_request);
echo "<script>
            var request = {$js_request};\n
            // console.log(karyawan);
            </script>";
?>

<script>
    $('#field-request').removeAttr('disabled');
    $('#div-status').css('display','none');
    $('#div-progress').css('display','none');
    var today = new Date();
    var bulan = ('0'+(today.getMonth()+1)).slice(-2);
    var tahun = today.getFullYear();
    var hari = today.getDate();
    var requester = <?= $nik ;?>;
    today = tahun+'-'+bulan+'-'+hari;
    for(a=1;a<=request.length+1;a++){
        var cari_req = 'REQ'+tahun+bulan+('000'+a).slice(-4);
        if(request.some(data => data.kodeRequest === cari_req)==false){
            $('#kodeRequest').val(cari_req);
            // console.log(requester);
            break;
        }
    }
</script>

<form id="add-request">
    <fieldset id="field-add-request">
        <div class="modal-body">
            <div class="card">
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Detail Request</b></label>
                        <div class="col-sm-9">
                            <hr style="border:0;height:1px;background-image:linear-gradient(to right,rgba(0,0,0,0),rgba(0,0,0,.75),rgba(0,0,0,0));">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Request</label>
                        <div class="col-sm-9">
                            <input id="kodeRequest" name="kodeRequest" type="text" class="form-control" placeholder="Kode Request" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kepentingan/Urgensi</label>
                        <div class="col-sm-9">
                            <select id="kepentingan" name="kepentingan" class="form-control col-sm-12">
                                <option selected style="display: none;">Pilih Salah Satu ..</option>
                                
                                    <option value="100">Dibutuhkan Sekarang</option>
									<option value="90">Dibutuhkan Mendesak</option>
									<option value="80">Penting</option>
									<option value="70">Lebih Cepat Lebih Baik</option>
									<option value="60">Dibutuhkan Hari Ini</option>
									<option value="50">Dibutuhkan Besok</option>
                               
                            </select>
                        </div>
                    </div>
					
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Divisi Tujuan</label>
                        <div class="col-sm-9">
                            <select id="divisi" name="divisi" class="form-control col-sm-12">
                                <option selected style="display: none;">Pilih Salah Satu ..</option>
                                <?php foreach ($all_divisi as $ad) : ?>
                                    <option value="<?= $ad['id']; ?>"><?= $ad['divisi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Identifikasi Kerusakan</label>
                        <div class="col-sm-9">
                            <select id="rusak" name="rusak" class="form-control col-sm-12">
                                <option selected style="display: none;">Pilih Salah Satu ..</option>
                                
                                    <option value="100">Berat</option>
									<option value="80">Sedang</option>
									<option value="60">Kecil</option>
									
                                
                            </select>
                        </div>
                    </div>
					
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi Divisi</label>
                        <div class="col-sm-9">
                            <select id="lokasi" name="lokasi" class="form-control col-sm-12">
                                <option selected style="display: none;">Pilih Salah Satu ..</option>
                                
                                    <option value="100">Dekat</option>
									<option value="80">Sedang</option>
									<option value="60">Jauh</option>
									
                                
                            </select>
                        </div>
                    </div>
					
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea id="deskripsi" name="deskripsi" class="form-control max-textarea" maxlength="255" rows="4"></textarea>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="cancel" type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
        </div>
    </fieldset>
</form>
<script>
    $(document).ready(function() {
        $('input[maxlength]').maxlength({
            threshold: 100
        });
        $('textarea[maxlength]').maxlength({
            threshold: 255
        });

        $('#add-request').submit('click',function(e){
			//<? echo "makan malam";?>
            e.preventDefault();
            if($('#kepentingan').val()=='Pilih Salah Satu ..' || $('#divisi').val()=='Pilih Salah Satu ..' || $('#deskripsi').val()==''){
                alert('Data harus lengkap!');
            } 
			else {
                console.log("tipe=save&requester="+requester+"&tanggalRequest="+today+"&"+$(this).serialize());
                $('#submit').html("<i class='fa fa-circle-notch fa-pulse'></i> Loading...");
                $.ajax({
                    url: "<?=base_url('proses/simpan/request');?>",
                    type: "post",
                    data: "tipe=save&requester="+requester+"&tanggalRequest="+today+"&"+$(this).serialize(),
                    success: function(data){
                        console.log(data);
                        $('#table-request').DataTable().ajax.reload();
                        $('#large-Modal').modal('hide');
                    }
                })

			 
			}
        })

        $('#form-divisi').submit('click',function(e){
            e.preventDefault();
            var id = $('#kodeDivisi').val();
            if(divisi.some(data => data.id === id.toString())){
                var tipes = "update";
            } else {
                var tipes = "save";
            }
            $('#submit').html("<i class='fa fa-circle-notch fa-pulse'></i> Loading...")
            // console.log(tipes);
            $.ajax({
                url: "<?=base_url('proses/simpan/divisi');?>",
                type: "post",
                data: "tipe="+tipes+"&requester="+requester+"&tanggalRequest="+today+"&"+$(this).serialize(),
                success: function(data){
                    console.log(data);
                    $('#table-divisi').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                }
            })
        });
    });
</script>