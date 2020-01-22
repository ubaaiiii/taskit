<!-- statustic-card start -->
<div class="col-xl-3 col-md-6">
    <a id="req-reject">
        <div class="card bg-c-pink text-white" style="cursor: pointer;">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5">Rejected Request</p>
                        <h4 class="m-b-0"><?= $request['reject']; ?></h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-alert-octagon f-50 text-c-pink"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-md-6">
    <a id="req-progress">
        <div class="card bg-c-yellow text-white" style="cursor: pointer;">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5">On Progress</p>
                        <h4 class="m-b-0"><?= $request['progress']; ?></h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-refresh-ccw f-50 text-c-yellow"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-md-6">
    <a id="req-new">
        <div class="card bg-c-blue text-white" style="cursor: pointer;">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5">New Request</p>
                        <h4 class="m-b-0"><?= $request['new']; ?></h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-bell f-50 text-c-blue"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-md-6">
    <a id="req-done">
        <div class="card bg-c-green text-white" style="cursor: pointer;">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5">Request Done</p>
                        <h4 class="m-b-0"><?= $request['done']; ?></h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-check-circle f-50 text-c-green"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- statustic-card start -->
<!-- statustic-card start -->
<div class="col-xl-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left ">
                <h3>Tabel Request</h3>
                <span class="text-muted">Untuk detail lebih lengkap, klik tabel.</span>
            </div>
        </div>
        <div class="card-block-big">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="table-request" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th rowspan="2">Kode Request</th>
                                <th rowspan="2">Deskripsi</th>
								<th rowspan="2">Skor SAW</th>
                                <th rowspan="2">Status</th>
                                <th colspan="2">Request</th>
                                <th colspan="2">Done</th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>Oleh</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        var table_request = $('#table-request').DataTable({
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
                        $("#load-modal-here").load("modal/request/t");
                    }
                }
            ],
            ajax: {
                url: "<?= base_url('data/request'); ?>",
                type: "POST",
                dataSrc: ""
            },
            aoColumns: [{
                    data: "kodeRequest"
                },
                {
                    data: "deskripsi",
                    render: function(data, type, row, meta) {
                        return "<textarea readonly class='float-left' width='100%' rows='1'>" + data + "</textarea>";
                    }
                },
				{
                    data: "skor_saw",
                    render: function(data, type, row, meta) {
                        return "<textarea readonly class='float-center' width='100%' rows='1'>" + data + "</textarea>";
                    }
                },
                {
                    data: null, render: function ( data, type, row, meta, dataToSet ) {
                        // return data.kodeRequest+' '+data.status;
                        switch (data.status) {
                            case "done":
                                return "<a style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-success'><strong>Done</strong></a>";
                            case "onprogress":
                                return "<a style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-warning'><strong>On Progress</strong></a>";
                            case "new":
                                var pengganti = '';
                                var pengganti2 = '';
                                (<?=$jabatan;?>==1&&data.divisiTujuan==<?=$divisi;?>)?(pengganti='process'):(pengganti='view');
                                (<?=$jabatan;?>==1&&data.divisiTujuan==<?=$divisi;?>)?(pengganti2='Process!'):(pengganti2='New');
                                return "<a style='cursor:pointer;' id='"+pengganti+"' data='" + row.kodeRequest + "' class='label label-primary'><strong>"+pengganti2+"</strong></a>";
                            case "rejected":
                                return "<a  style='cursor:pointer;' id='view' data='" + row.kodeRequest + "' class='label label-danger'><strong>Rejected</strong></a>";
                            default:
                                return '<a class="label label-danger"><strong>! ERROR !</strong></a>';
                        }
                    }
                },
                {
                    data: "tanggalRequest"
                },
                {
                    data: "requester"
                },
                {
                    data: "tanggalDone"
                },
                {
                    data: "catatanDone",
                    render: function(data, type, row, meta) {
                        return "<textarea readonly class='float-left' width='100%' rows='1'>" + data + "</textarea>";
                    }
                },
                {
                    data: "divisiTujuan",
                    visible: false
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

        $('#req-all').on('click', function() {
            table_request.columns().search("").draw();
        });

        $('#req-your').on('click', function() {
            table_request.columns(4).search("<?=$nik;?>").draw();
        });

        $('#req-new').on('click', function() {
            table_request.columns().search("").draw();
            table_request.columns(3).search("new|process",true,true).draw();
        });

        $('#req-progress').on('click', function() {
            table_request.columns().search("").draw();
            table_request.columns(3).search("on progress").draw();
        });

        $('#req-done').on('click', function() {
            table_request.columns().search("").draw();
            table_request.columns(3).search("done").draw();
        });

        $('#req-reject').on('click', function() {
            table_request.columns().search("").draw();
            table_request.columns(3).search("rejected").draw();
        });


        $('#table-request tbody').on('click', 'a#process', function() {
            if (table_request.rows().count() !== 0) {
                var datas = this.getAttribute("data");
                // console.log(this.getAttribute("data"));
                $("#trigger-modal").click();
                $("#load-modal-here").load("modal/request/c/" + datas);
            }
        });
        $('#table-request tbody').on('click', 'a#view', function() {
            if (table_request.rows().count() !== 0) {
                var datas = this.getAttribute("data");
                // console.log(this.getAttribute("data"));
                $("#trigger-modal").click();
                $("#load-modal-here").load("modal/request/v/" + datas);
            }
        });


    })
</script>
