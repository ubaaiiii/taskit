<!--  -->
<div class="modal-header">
    <h4 class="modal-title"><?= $judul_modal; ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="icofont icofont-ui-close"></i></span>
    </button>
</div>
<?php
$js_detail = json_encode($detail_request);
$js_karyawan = json_encode($all_karyawan);
$js_request = json_encode($all_request);
echo "<script>
            var detail = {$js_detail};\n
            var karyawan = {$js_karyawan};\n
            var request = {$js_request};\n
            // console.log(karyawan);
            </script>";
if (!empty($sebagai)) {
    if ($sebagai == "view") {
        echo "<script>
                // $('#field-request').attr('disabled','');
                $('#field-request input').css('pointer-events','none');
                $('#field-request textarea').css('pointer-events','none');
                $('#field-request select').css('pointer-events','none');
                $('#field-tugas input').css('pointer-events','none');
                $('#field-tugas textarea').css('pointer-events','none');
                $('#field-tugas select').css('pointer-events','none');
                $('#submit').css('display','none');
                $('#cancel').html('Close');
                // console.log(karyawan);
              </script>";
    } else if ($sebagai == "tambah") {
        echo "<script>
                $('#field-request').removeAttr('disabled');
                $('#div-status').css('display','none');
                $('#div-progress').css('display','none');
                var today = new Date();
                var bulan = ('0'+(today.getMonth()+1)).slice(-2);
                var tahun = today.getFullYear();
                var hari = today.getDate();
                for(a=1;a<=request.length+1;a++){
                    var cari_req = 'REQ'+tahun+bulan+('000'+a).slice(-4);
                    if(request.some(data => data.kodeRequest === cari_req)==false){
                        $('#kodeRequest').val(cari_req);
                        console.log(tahun+'-'+bulan+'-'+hari);
                        break;
                    }
                }
                $('#requestTanggal').val(tahun+'-'+bulan+'-'+hari);
                $('#div-tanggalRequest').css('display','none');
                $('#oleh').val('{$nik}');
                $('#div-oleh').css('display','none');
              </script>";
    } else if ($sebagai == "edit") {
        echo "<script>
                console.log('ini edit');
                $('#field-request').removeAttr('disabled');
                $('#div-status').css('display','none');
                $('#div-progress').css('display','none');
                var today = new Date();
                var bulan = ('0'+(today.getMonth()+1)).slice(-2);
                var tahun = today.getFullYear();
                var hari = today.getDate();
                for(a=1;a<=request.length+1;a++){
                    var cari_req = 'REQ'+tahun+bulan+('000'+a).slice(-4);
                    if(request.some(data => data.kodeRequest === cari_req)==false){
                        $('#kodeRequest').val(cari_req);
                        console.log(tahun+'-'+bulan+'-'+hari);
                        break;
                    }
                }
                $('#requestTanggal').val(tahun+'-'+bulan+'-'+hari);
                $('#div-tanggalRequest').css('display','none');
                $('#oleh').val('{$nik}');
                $('#div-oleh').css('display','none');
              </script>";
    } else if ($sebagai == "proses") {
        echo "<script>
                var today = new Date();
                var bulan = ('0'+(today.getMonth()+1)).slice(-2);
                var tahun = today.getFullYear();
                var hari = today.getDate();
                // $('#field-request').attr('disabled','');
                $('#row-tanggalDone').css('display','none');
                $('#label-ditugaskan').html('Berikan ke');
                $('#field-request input').css('pointer-events','none');
                $('#field-request textarea').css('pointer-events','none');
                $('#field-request select').css('pointer-events','none');
                $('#tanggalDone').val(tahun+'-'+bulan+'-'+hari);
                // console.log(karyawan);
              </script>";
    }
}
?>
<script>
    function divKaryawan(divisi) {
        var idDiv = divisi;
        var ketemu = karyawan.filter(function(e) {
            return e.divisi == idDiv;
        });
        // console.log(ketemu);
        $('#ditugaskan').empty();
        $.each(ketemu, function(i, value) {
            $opt = '<option value="' + ketemu[i].nik + '">' + ketemu[i].nama + "</option>";
            $("#ditugaskan").append($opt);
        });
        // $('#ditugaskan').val(0);
    }

    function ubahTanggal(tanggalnya) {
        var tanggal = tanggalnya.substring(0, 2);
        var bulan = tanggalnya.substring(3, 5);
        var tahun = tanggalnya.substring(6, 10);
        var newDate = tahun + "-" + bulan + "-" + tanggal;
        return newDate;
    }
</script>
<form id="request">
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
                <fieldset id="field-request">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea id="deskripsi" name="deskripsi" class="form-control max-textarea" maxlength="255" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row" id="div-tanggalRequest">
                        <label class="col-sm-3 col-form-label">Tanggal Request</label>
                        <div class="col-sm-9">
                            <input id="requestTanggal" name="requestTanggal" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="form-group row" id="div-status">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <span id="status" class="label label-primary"></span>
                        </div>
                    </div>
                    <div class="form-group row" id="div-oleh">
                        <label class="col-sm-3 col-form-label">Reporter</label>
                        <div class="col-sm-9">
                            <input id="oleh" name="oleh" type="text" class="form-control" placeholder="Oleh" autocomplete="off" maxlength="13">
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
                    <div class="form-group row" id="div-progress">
                        <label class="col-sm-3 col-form-label">Progress</label>
                        <div class="col-sm-9">
                            <div class="progress">
                                <div id="status-progress" class="progress-bar progress-bar-striped progress-bar-animated progress-bar-primary" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><b id="status-id"></b></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="field-tugas" style="display: none;">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Detail Tugas</b></label>
                        <div class="col-sm-9">
                            <hr style="border:0;height:1px;background-image:linear-gradient(to right,rgba(0,0,0,0),rgba(0,0,0,.75),rgba(0,0,0,0));">
                        </div>
                    </div>

                    <div class="form-group row" id="row-ditugaskan">
                        <label class="col-sm-3 col-form-label" id="label-ditugaskan">Ditugaskan</label>
                        <div class="col-sm-9">
                            <select id="ditugaskan" name="ditugaskan" class="form-control col-sm-12 ">
                                <option value="0" selected style="display: none;">Pilih Salah Satu ..</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="row-tanggalDone">
                        <label class="col-sm-3 col-form-label" id="label-tanggal">Tanggal Done</label>
                        <div class="col-sm-9">
                            <input id="tanggalDone" name="tanggalDone" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="form-group row" id="row-catatan">
                        <label class="col-sm-3 col-form-label" id="label-catatan">Catatan</label>
                        <div class="col-sm-9">
                            <textarea id="catatan" name="catatan" class="form-control max-textarea" maxlength="255" rows="4"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button id="cancel" type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
		<button id="pending" type="button" class="btn btn-warning waves-effect waves-light ">Pending</button>
		<button id="onprogress" type="button" class="btn btn-warning waves-effect waves-light ">Proses</button>
		<button id="done" type="button" class="btn btn-warning waves-effect waves-light ">Done</button>
        <button id="reject" type="button" class="btn btn-warning waves-effect waves-light ">Reject</button>
        <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('input[maxlength]').maxlength({
            threshold: 100
        });
        $('textarea[maxlength]').maxlength({
            threshold: 255
        });
        // $('#ditugaskan').select2();

        if (detail !== null) {
            // console.log(detail.kodeRequest);
            $('#kodeRequest').val(detail.kodeRequest);
            $('#deskripsi').val(detail.deskripsi);
            $('#status-progress').attr('style', 'width:' + detail.progress + '%;text-align: center;');
            $('#status-progress').attr('aria-valuenow', detail.progress);
            // console.log(detail.catatanDone);
            switch (detail.status) {
                case "done": {
                    $("#status").text(detail.status);
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-success');
                    $("#field-tugas").removeAttr('style');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-animated progress-bar-success');
                    $('#reject').css('display','none');
                    break;
                }
                case "onprogress": {
                    $("#status").text(detail.status);
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-warning');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-animated progress-bar-warning');
                    $('#ditugaskan').text(detail.dikerjakanOleh);
                    $("#field-tugas").removeAttr('style');
                    $('#label-ditugaskan').html('Dikerjakan Oleh');
                    $('#row-tanggalDone').css('display','none');
                    $('#row-catatan').css('display','none');
                    $('#reject').css('display','none');
                    break;
                }
                case "rejected": {
                    $("#status").text(detail.status);
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-danger');
                    $("#field-tugas").removeAttr('style');
                    $('#label-catatan').html('Alasan Reject');
                    $('#label-tanggal').html('Tanggal Reject');
                    $('#label-ditugaskan').html('Direject Oleh');
                    $('#ditugaskan').text(detail.dikerjakanOleh);
                    // $('#row-tanggalDone').css('display','none');
                    $('#status-progress').attr('style', 'width:100%;text-align: center;');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-danger');
                    $('#status-progress').attr('aria-valuenow', '0');
                    $('#reject').css('display','none');
                    break;
                }
				case "close": {
                    $("#status").text(detail.status);
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-danger');
                    $("#field-tugas").removeAttr('style');
                    $('#label-catatan').html('Alasan Reject');
                    $('#label-tanggal').html('Tanggal Reject');
                    $('#label-ditugaskan').html('Direject Oleh');
                    $('#ditugaskan').text(detail.dikerjakanOleh);
                    // $('#row-tanggalDone').css('display','none');
                    $('#status-progress').attr('style', 'width:100%;text-align: center;');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-danger');
                    $('#status-progress').attr('aria-valuenow', '0');
                    $('#reject').css('display','none');
                    break;
                }
				case "pending": {
                    $("#status").text(detail.status);
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-danger');
                    $("#field-tugas").removeAttr('style');
                    $('#label-catatan').html('Alasan Reject');
                    $('#label-tanggal').html('Tanggal Reject');
                    $('#label-ditugaskan').html('Direject Oleh');
                    $('#ditugaskan').text(detail.dikerjakanOleh);
                    // $('#row-tanggalDone').css('display','none');
                    $('#status-progress').attr('style', 'width:100%;text-align: center;');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-danger');
                    $('#status-progress').attr('aria-valuenow', '0');
                    $('#reject').css('display','none');
                    break;
                }
                case "new": {
                    $("#status").text("Baru");
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-primary');
                    $('#status-progress').attr('class', 'progress-bar progress-bar-striped progress-bar-animated progress-bar-primary');
                    $("#field-tugas").removeAttr('style');
                    if("<?=$judul_modal;?>"=="View Request"){
                        $('#field-tugas').css('display','none');
                        $('#div-progress').css('display','none');
                        $('#reject').css('display','none');
                    }
                    break;
                }
                default:
                    break;
            }
            var found = karyawan.find(function(element) {
                return element.nik == detail.requester
            });
            // console.log(found);
            if (found != undefined) {
                // console.log(found.nama);
            }

            $('#requestTanggal').val(ubahTanggal(detail.tanggalRequest));
            if(detail.tanggalDone!==''){
                $('#tanggalDone').val(ubahTanggal(detail.tanggalDone));
            }
            $('#status-id').text(detail.progress + "%");
            $('#divisi').val(detail.divisiTujuan);
            $('#oleh').val(found.nama);
            $('#catatan').val(detail.catatanDone);
            divKaryawan(detail.divisiTujuan);
        }

        $('#divisi').on('change',function(){
            divKaryawan($('#divisi option:selected').val());
        })

        $('#reject').click(function(e){
            e.preventDefault();
            if($('#catatan').val()==''){
                alert('Catatan Harus Diisi');
            } else {
                console.log($('#request').serialize());
            }
            $.ajax({
                url: "<?=base_url('proses/simpan/request');?>",
                type: "post",
                data: "tipe=reject&"+$('#request').serialize(),
                success: function(data){
                    $('#table-request').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                }
            })
        })
    });
</script>