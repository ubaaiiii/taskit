<div class="col-xl-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left ">
                <h3>Tabel Divisi</h3>
                <span class="text-muted">Untuk detail lebih lengkap, klik tabel.</span>
            </div>
        </div>
        <div class="card-block-big">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="table-divisi" class="table table-striped table-bordered nowrap">
                        <thead>

                        </thead>
                        <tbody style="cursor: pointer;">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var table_divisi = $('#table-divisi').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            autoWidth: false,
            buttons: [{
                    extend: 'copy',
                    className: 'btn-copy'
                },
                {
                    extend: 'csv',
                    className: 'btn-csv'
                },
                {
                    extend: 'excel',
                    className: 'btn-excel'
                },
                {
                    extend: 'pdf',
                    className: 'btn-pdf'
                },
                {
                    extend: 'print',
                    className: 'btn-print'
                },
                {
                    text: 'Tambah',
                    className: 'btn-tambah',
                    action: function (e,dt,node,config) {
                        $("#trigger-modal").click();
                        $("#load-modal-here").load("modal/divisi/t");
                    }
                }
            ],
            ajax: {
                url: "<?= base_url('data/divisi'); ?>",
                type: "POST",
                dataSrc: ""
            },
            aoColumns: [{
                    title: "Kode",
                    data: "id"
                },
                {
                    title: "Divisi",
                    data: "divisi"
                }
            ],
            initComplete: function() {
                $('.btn-copy').html('<span class="feather icon-copy" data-toggle="tooltip" title="Copy To Clipboard"/> Copy</span>')
                $('.btn-csv').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To CSV"/> CSV</span>')
                $('.btn-excel').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To Excel"/> Excel</span>')
                $('.btn-pdf').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To PDF"/> PDF</span>')
                $('.btn-print').html('<span class="feather icon-printer" data-toggle="tooltip" title="Print The Page"/> Print</span>')
                $('.btn-tambah').html('<span class="feather icon-plus-circle" data-toggle="tooltip" title="Add Data"/> Tambah</span>')
            }
        });

        $('#table-divisi tbody').on('click', 'tr', function() {
            if (table_divisi.rows().count() !== 0) {
                var datas = table_divisi.row(this).data();
                // console.log(datas.id);
                $("#trigger-modal").click();
                $("#load-modal-here").load("modal/divisi/c/" + datas.id);
            }
        });

        
    });
</script>