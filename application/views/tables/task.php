<div class="col-xl-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left ">
                <h3 id="judulTabel"><?= $judulTabel; ?></h3>
                <span class="text-muted">Untuk detail lebih lengkap, klik tabel.</span>
            </div>
        </div>
        <div class="card-block-big">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="table-task" class="table table-striped table-bordered nowrap">
                        <thead>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    if ($('#judulTabel').text() == "Tugasku") {
        var kolom = [];
        kolom = [{
                title: "Kode",
                data: "kodeRequest"
            },
            {
                title: "Ditugaskan",
                data: "dikerjakanOleh",
                visible: false
            },
            {
                title: "Status",
                data: "status",
                visible: false
            },
            {
                title: "Diminta Oleh",
                data: "requester"
            },
            {
                title: "Deskripsi",
                data: "deskripsi"
            },
            {
                title: "Catatan Manager",
                data: "catatanTugas"
            }
        ]
    } else {
        var kolom = [];
        kolom = [{
                title: "Kode",
                data: "kodeRequest"
            },
            {
                title: "Divisi Tujuan",
                data: "divisiTujuan",
                visible: false
            },
            {
                title: "Status",
                data: "status", render: function ( data, type, row, meta, dataToSet ) {
                        // return data.kodeRequest+' '+data.status;
                        switch (data) {
                            case "done":
                                return "<a style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-success'><strong>Done</strong></a>";
                            case "onprogress":
                                return "<a style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-warning'><strong>On Progress</strong></a>";
                            case "new":
                                return "<a style='cursor:pointer;' id='process' data='" + row.kodeRequest + "' class='label label-primary'><strong>New</strong></a>";
                            case "rejected":
                                return "<a  style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-danger'><strong>Rejected</strong></a>";
                            default:
                                return '<a class="label label-danger"><strong>! ERROR !</strong></a>';
                        }
                    }
            },
            {
                title: "Diminta Oleh",
                data: "requester"
            },
            {
                title: "Deskripsi",
                data: "deskripsi"
            }
        ]
    }
    var table_task = $('#table-task').DataTable({
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
            }
        ],
        ajax: {
            url: "<?= base_url('data/request'); ?>",
            type: "POST",
            dataSrc: ""
        },
        aoColumns: kolom,
        initComplete: function() {
            $('.btn-copy').html('<span class="feather icon-copy" data-toggle="tooltip" title="Copy To Clipboard"/> Copy</span>')
            $('.btn-csv').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To CSV"/> CSV</span>')
            $('.btn-excel').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To Excel"/> Excel</span>')
            $('.btn-pdf').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To PDF"/> PDF</span>')
            $('.btn-print').html('<span class="feather icon-printer" data-toggle="tooltip" title="Print The Page"/> Print</span>')
        }
    });

    if ($('#judulTabel').text() == "Tugasku") {
        table_task.columns([1,2]).search("<?= $nik; ?>|onprogress",true,true).draw();
    } else {
        table_task.columns(1).search("<?= $divisi; ?>").draw();
    }

    $('#table-task tbody').on('click', 'a#process', function() {
            if (table_task.rows().count() !== 0) {
                var datas = this.getAttribute("data");
                // console.log(this.getAttribute("data"));
                $("#trigger-modal").click();
                $("#load-modal-here").load("modal/request/c/" + datas);
            }
        });
        $('#table-task tbody').on('click', 'a#view', function() {
            if (table_task.rows().count() !== 0) {
                var datas = this.getAttribute("data");
                // console.log(this.getAttribute("data"));
                $("#trigger-modal").click();
                $("#load-modal-here").load("modal/request/v/" + datas);
            }
        });
</script>