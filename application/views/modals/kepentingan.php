<div class="modal-header">
	<h4 class="modal-title"><?=$judul_modal;?></h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true"><i class="icofont icofont-ui-close"></i></span>
	</button>
</div>

<?php
    $js_divisi = json_encode($detail_kepentingan);
    $js_all_divisi = json_encode($all_kepentingan);
    $js_num_divisi = json_encode($num_kepentingan);
    echo "<script>
            var detail = {$js_divisi};
            var divisi = {$js_all_divisi};
            var numDivisi = {$js_num_divisi};
            // console.log(numDivisi);
          </script>";

    if ($sebagai=="tambah"){
        echo "<script>
                for(a=1;a<=numDivisi+1;a++){
                    if(!divisi.some(data => data.id === a.toString())){
                        $('#kodeDivisi').val(a);
                        break;
                    }
                }
              </script>";
    } else if($sebagai=="edit"){
?>

    <script>
        $('#delete').removeAttr('style');
    </script>

<?php
    } else if($sebagai=="view"){

    } else {

    }
?>

<script>
    function ubahTanggal(tanggalnya) {
        var tanggal = tanggalnya.substring(0, 2);
        var bulan = tanggalnya.substring(3, 5);
        var tahun = tanggalnya.substring(6, 10);
        var newDate = tahun + "-" + bulan + "-" + tanggal;
        return newDate;
    }
</script>

<form id="form-divisi">
    <fieldset id="field-karyawan">
        <div class="modal-body">
        	<div class="card">
        		<div class="card-block">
        			<div class="form-group row">
        	            <label class="col-sm-3 col-form-label">Kode</label>
        	            <div class="col-sm-9">
        	                <input required id="kode" name="kode" type="text" class="form-control" placeholder="Kode Divisi">
        	            </div>
        	        </div>
        	        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Divisi</label>
                        <div class="col-sm-9">
                            <textarea id="deskripsi" name="deskripsi" class="form-control max-textarea" maxlength="255" rows="4"></textarea>
                        </div>
                    </div>
        			
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
            <button id="cancel" type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            <button id="delete" type="button" class="btn btn-warning waves-effect" data-dismiss="modal" style="display: none;">Delete</button>
            <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
        </div>
    </fieldset>
</form>
<script>
	$(document).ready(function(){
        
        $('textarea[maxlength]').maxlength({
            threshold: 255
        });

        if (detail !== null){
            // console.log(detail);
            $('#kode').val(detail.kode);
            $('#deskripsi').val(detail.deskripsi);
        };

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
                data: "tipe="+tipes+"&"+$(this).serialize(),
                success: function(data){
                    console.log(data);
                    $('#table-divisi').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                }
            })
        });

        $('#delete').click(function(){
            var id = $('#kodeDivisi').val();
            $.ajax({
                url: "<?=base_url('proses/simpan/divisi');?>",
                type: "post",
                data: "tipe=delete&kodeDivisi="+id,
                success: function(data){
                    $('#table-divisi').DataTable().ajax.reload();
                    $('#large-Modal').modal('hide');
                }
            })
        })

	})
</script>