<div class="modal-header">
	<h4 class="modal-title"><?=$judul_modal;?></h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true"><i class="icofont icofont-ui-close"></i></span>
	</button>
</div>

<?php
    $js_kepentingan = json_encode($detail_kepentingan);
    $js_all_kepentingan = json_encode($all_kepentingan);
    $js_num_kepentingan = json_encode($num_kepentingan);
    echo "<script>
            var detail = {$js_kepentingan};
            var kepentingan = {$js_all_kepentingan};
            var numKepentingan = {$js_num_kepentingan};
            // console.log(numDivisi);
          </script>";

    if ($sebagai=="tambah"){
        echo "<script>
                for(a=1;a<=numKepentingan+1;a++){
                    if(!kepentingan.some(data => data.id === a.toString())){
                        $('#id').val(a);
                        break;
                    }
                }
              </script>";
    } else if($sebagai=="edit"){

    	echo "<script>
        $('#delete').removeAttr('style');
    </script>";

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
        			<div hidden class="form-group row">
        	            <label class="col-sm-3 col-form-label">ID</label>
        	            <div class="col-sm-9">
        	                <input required id="id" name="id" type="text" class="form-control" placeholder="Kode Kepentingan">
        	            </div>
        	        </div>
        			<div class="form-group row">
        	            <label class="col-sm-3 col-form-label">Kode</label>
        	            <div class="col-sm-9">
        	                <input required id="kode" name="kode" type="text" class="form-control" placeholder="Kode Kepentingan">
        	            </div>
        	        </div>
        	        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea id="deskripsi" name="deskripsi" class="form-control max-textarea" maxlength="255" rows="4"></textarea>
                        </div>
                    </div>
										<div class="form-group row">
				                <label class="col-sm-3 col-form-label">Skor</label>
				                <div class="col-sm-9">
				                    <input required id="skor" name="skor" type="range" value="0" min="0" max="100" class="form-control">
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
            $('#id').val(detail.id);
            $('#deskripsi').val(detail.deskripsi);
            $('#skor').val(detail.skor);
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
                url: "<?=base_url('proses/simpan/kepentingan');?>",
                type: "post",
                data: "tipe="+tipes+"&"+$(this).serialize(),
                success: function(data){
									if (data=="true"){
										console.log(data);
										$('#table-divisi').DataTable().ajax.reload();
										$('#large-Modal').modal('hide');
									} else {
										Swal.fire(
											'Gagal!',
											'Salah kirim data.',
											'error'
										)
									}
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
				$('input[type="range"]').rangeslider({
				    polyfill : false,
				    onInit : function() {
				        this.output = $( '<div class="range-output" />' ).insertAfter( this.$range ).html( this.$element.val() );
				    },
				    onSlide : function( position, value ) {
				        this.output.html( value );
				    }
				});

	})
</script>
