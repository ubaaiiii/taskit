<div class="modal-header">
	<h4 class="modal-title"><?=$judul_modal;?></h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true"><i class="icofont icofont-ui-close"></i></span>
	</button>
</div>
<?php
    $js_karyawan = json_encode($all_karyawan);
    $js_detail_karyawan = json_encode($karyawanNik);
    echo "<script>
            var karyawan = ".$js_karyawan.";\n
            var detail_karyawan = ".$js_detail_karyawan.";\n
          </script>";
    if($sebagai=="tambah"){
        echo "  <script>
                    var today = new Date();
                    var bulan = today.getMonth()+1;
                    var tahun = today.getFullYear();
                    for(a=1;a<=karyawan.length;a++){
                        var cari_nik = tahun+('0'+bulan).slice(-2)+('000'+a).slice(-4);
                        if(karyawan.some(data => data.nik === cari_nik)==false){
                            $('#nik').val(cari_nik);
                            break;
                        }
                    }\n
                    $('#username').val('null');
                    $('#password').val('null');
                </script>";
    } else if($sebagai=="editD") {
        echo "<script>
                    $('button#delete').removeAttr('hidden');
                    $('button#submit').html('Save Changes');
              </script>";
    } else if($sebagai=="editP") {
        echo "<script>
                    $('button#submit').html('Save Changes');
                    $('#field-user').removeAttr('style');
              </script>";
    } else if($sebagai=="view") {
        echo "<script>
                    $('#field-karyawan').prop('disabled',true);
                    $('#agama').prop('disabled',true);
                    $('#submit').prop('hidden',true);
                    $('button#cancel').html('Close');
              </script>";
    }
?>

<script>
    function ubahTanggal(tanggalnya='') {
        var tanggal = tanggalnya.substring(0, 2);
        var bulan = tanggalnya.substring(3, 5);
        var tahun = tanggalnya.substring(6, 10);
        var newDate = tahun + "-" + bulan + "-" + tanggal;
        return newDate;
    }

    function togglePassword() {
        var x = document.getElementById('password');
        if (x.type === "password") {
            x.type = "text";
            $('#eye').removeClass('icon-eye');
            $('#eye').addClass('icon-eye-off');
        } else {
            x.type = "password";
            $('#eye').removeClass('icon-eye-off');
            $('#eye').addClass('icon-eye');
        }
    }
</script>

<form id="form-karyawan">
    <fieldset id="field-karyawan">
        <div class="modal-body">
        	<div class="card">
        		<div class="card-block">
        			<div class="form-group row">
        	            <label class="col-sm-3 col-form-label">NIK</label>
        	            <div class="col-sm-9">
        	                <input required id="nik" name="nik" type="text" class="form-control" placeholder="Nomor Induk Karyawan" readonly="">
        	            </div>
        	        </div>
        	        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input required id="nama" name="nama" type="text" class="form-control" placeholder="Nama Lengkap" autocomplete="off" style="text-transform: capitalize;" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input placeholder="Tanggal Lahir" required id="tanggalLahir" name="tanggalLahir" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input required id="email" name="email" type="email" class="form-control" placeholder="Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Divisi</label>
                        <div class="col-sm-9">
                            <select required id="divisi" name="divisi" class="form-control col-sm-12">
                                <option disabled selected>Pilih Salah Satu ..</option>
                                <?php foreach ($all_divisi as $ad) : ?>
                                    <option value="<?= $ad['id']; ?>"><?= $ad['divisi']; ?></option>
                                <?php endforeach; ?>
        		            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select required id="jabatan" name="jabatan" class="form-control col-sm-12">
                                <option disabled selected>Pilih Salah Satu ..</option>
                                <?php foreach ($all_jabatan as $aj) : ?>
                                    <option value="<?= $aj['id']; ?>"><?= $aj['jabatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
        			<fieldset id="field-user" style="display: none;">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input required id="username" name="username" type="text" class="form-control" placeholder="Username" autocomplete="off" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9 input-group">
                                <input required id="password" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off" maxlength="50">
                                <span class="input-group-addon" id="basic-addon3" onclick="togglePassword()"><i id="eye" class="feather icon-eye"></i></span>
                            </div>
                        </div>
                    </fieldset>
        		</div>    
        	</div>
        </div>
    <div class="modal-footer">
        <button id="cancel" type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
        <button hidden id="delete" type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Delete</button>
        <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
    </div>
    </fieldset>
</form>
<script>
	$(document).ready(function(){
        if(detail_karyawan!==null){
            $('#nik').val(detail_karyawan.nik);
            $('#nama').val(detail_karyawan.nama);
            (detail_karyawan.jenisKelamin=="L")?($('#L').prop("checked", true)):($('#P').prop("checked", true));
            $('#agama').val(detail_karyawan.agama);
            $('#jabatan').val(detail_karyawan.jabatan);
            $('#divisi').val(detail_karyawan.divisi);
            $('#agama').trigger('change');
            console.log(detail_karyawan);
            $('#tanggalLahir').val(ubahTanggal(detail_karyawan.tanggalLahir));
            $('#nomorHandphone').val(detail_karyawan.nomorHandphone);
            $('#email').val(detail_karyawan.email);
            $('#alamat').val(detail_karyawan.alamat);
            $('#username').val(detail_karyawan.username);
            $('#password').val(detail_karyawan.password);
        }

        $('#form-karyawan').submit('click',function(e){
            e.preventDefault();
            var id = $('#nik').val();
            if(karyawan.some(data => data.nik === id.toString())){
                var tipes = "update";
            } else {
                var tipes = "save";
            }
            $('#submit').html("<i class='fa fa-circle-notch fa-pulse'></i> Loading...")
            // console.log(tipes);
            $.ajax({
                url: "<?=base_url('proses/simpan/karyawan');?>",
                type: "post",
                data: "tipe="+tipes+"&"+$(this).serialize(),
                success: function(data){
                    var dt = $.parseJSON(data);
                    $('#table-karyawan').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                    $.ajax({
                        url: "<?=base_url('proses/kirim_email');?>",
                        type: "post",
                        data: "nama="+dt.nama+"&username="+dt.username+"&password="+dt.password+"&email="+dt.email,
                        success: function(data){
                            console.log(data);
                        }
                    })
                }
            })
        });

        $('#delete').click(function(){
            var id = $('#nik').val();
            // console.log(id);
            $.ajax({
                url: "<?=base_url('proses/simpan/karyawan');?>",
                type: "post",
                data: "tipe=delete&nik="+id,
                success: function(data){
                    $('#table-karyawan').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                }
            })
        })

		$('.selectd').select2({
			placeholder: "Pilih salah satu .."
		});
		$('input[maxlength]').maxlength({
			threshold: 100
		});
        $('textarea[maxlength]').maxlength({
            threshold: 255
        })
	})
</script>