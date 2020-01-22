<div class="col-xl-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left ">
                <h3>Tabel Karyawan</h3>
                <span class="text-muted">Untuk detail lebih lengkap, klik tabel.</span>
            </div>
        </div>
        <div class="card-block-big">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="table-karyawan" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody style="cursor: pointer;">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $js_divisi = json_encode($all_divisi);
    $js_jabatan = json_encode($all_jabatan);
    echo "<script>
            var divisi = {$js_divisi};\n
            var jabatan = {$js_jabatan};\n
          </script>";
?>

<script type="text/javascript">
    var table_request = $('#table-karyawan').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        autoWidth: false,
        buttons: [
                    {extend:'copy',className:'btn-copy'},
                    {extend:'csv',className:'btn-csv'},
                    {extend:'excel',className:'btn-excel'},
                    {extend:'pdf',className:'btn-pdf'},
                    {extend:'print',className:'btn-print'},
                    {
                        text: 'Tambah',
                        className: 'btn-tambah',
                        action: function (e,dt,node,config) {
                            $("#trigger-modal").click();
                            $("#load-modal-here").load("modal/karyawan/t");
                        }
                    }
                ],
        ajax:{
            url: "<?=base_url('data/karyawan');?>",
            type:"POST",
            dataSrc: ""
        },
        aoColumns:[
            {data:"nik"},
            {data:"nama"},
            {data:"email"},
            {data:"divisi",
			render: function(data,type,row,meta){
                var found = divisi.find(function(element) {
                  return element.id == data;
                });
                return (found==undefined)?("kesalahan kode"):(found.divisi);
             }},
            {data:"jabatan",
             render: function(data,type,row,meta){
                var found = jabatan.find(function(element) {
                  return element.id == data;
                });
                return (found==undefined)?("kesalahan kode"):(found.jabatan);
             }}
        ],
        initComplete: function () {
            $('.btn-copy').html('<span class="feather icon-copy" data-toggle="tooltip" title="Copy To Clipboard"/> Copy</span>')
            $('.btn-csv').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To CSV"/> CSV</span>')
            $('.btn-excel').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To Excel"/> Excel</span>')
            $('.btn-pdf').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To PDF"/> PDF</span>')
            $('.btn-print').html('<span class="feather icon-printer" data-toggle="tooltip" title="Print The Page"/> Print</span>')
            $('.btn-tambah').html('<span class="feather icon-plus-circle" data-toggle="tooltip" title="Add Data"/> Tambah</span>')
        }
    });

    $('#table-karyawan tbody').on('click', 'tr', function() {
        if (table_request.rows().count() !== 0) {
            var datas = table_request.row(this).data();
            // console.log(datas);
            $("#trigger-modal").click();
            $("#load-modal-here").load("modal/karyawan/e/"+datas.nik);
        }
    });
</script>
