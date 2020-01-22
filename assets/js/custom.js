var table_request = $('#table-request').DataTable({
	dom: 'Bfrtip',
	responsive: true,
	autoWidth: false,
	buttons: [
	            {extend:'copy',className:'btn-copy'},
	            {extend:'csv',className:'btn-csv'},
	            {extend:'excel',className:'btn-excel'},
	            {extend:'pdf',className:'btn-pdf'},
	            {extend:'print',className:'btn-print'}
	        ],
	ajax:{
	    url: "<?=base_url('data/request');?>",
	    type:"POST",
	    dataSrc: ""
	},
	aoColumns:[
	    {data:"kodeRequest"},
	    {data:"deskripsi"},
	    {data:"status",
	     render: function(data,type,row,meta,dataToSet){
	         switch(data){
	            case "done": return "<span class='label label-success'>Done</span>";
	            case "onprogress": return "<span class='label label-primary'>On Progress</span>";
	            case "pending": return "<span class='label label-warning'>Pending</span>";
	            case "rejected": return "<span class='label label-danger'>Rejected</span>";
	            default : return '<a id="process" data="'+row.kodeRequest+'" class="label label-primary" style="cursor:pointer;">Process !</a>';
	        }
	    }},
	    {data:"requestTanggal"},
	    {data:"taskKepada"},
	    {data:"doneTanggal"},
	    {data:"doneCatatan"}
	],
	initComplete: function () {
	    $('.btn-copy').html('<span class="feather icon-copy" data-toggle="tooltip" title="Copy To Clipboard"/> Copy</span>')
	    $('.btn-csv').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To CSV"/> CSV</span>')
	    $('.btn-excel').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To Excel"/> Excel</span>')
	    $('.btn-pdf').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To PDF"/> PDF</span>')
	    $('.btn-print').html('<span class="feather icon-printer" data-toggle="tooltip" title="Print The Page"/> Print</span>')
	}
});


$('#table-request tbody').on( 'click', 'a#process', function () {
if(table_request.rows().count()!==0){
    var datas = this.getAttribute("data");
    // console.log(this.getAttribute("data"));
    $("#trigger-modal").click();
    $("#load-modal-here").load("modal/request/c/"+datas);
}
});
$('.selectd').select2({
	placeholder: "Pilih salah satu .."
});
$('input[maxlength]').maxlength({
	threshold: 100
});
$('textarea[maxlength]').maxlength({
    threshold: 255
});

// console.log(detail.kodeRequest);
$('#kodeRequest').val(detail.kodeRequest);
$('#deskripsi').val(detail.deskripsi);

switch(detail.status){
    case "done": {
                    $("#status").text(detail.status);
                    $("#status").removeAttribute('class');
                    $("#status").addClass('label label-success');
                    break;
                 }
    case "onprogress": {
                    $("#status").text(detail.status);
                    $("#status").removeAttribute('class');
                    $("#status").addClass('label label-primary');
                    break;
                 }
    case "pending": {
                    $("#status").text(detail.status);
                    $("#status").removeAttribute('class');
                    $("#status").addClass('label label-warning');
                    break;
                 }
    case "rejected": {
                    $("#status").text(detail.status);
                    $("#status").removeAttribute('class');
                    $("#status").addClass('label label-danger');
                    break;
                 }
    case "": {
                    $("#status").text("Belum ada yang memproses");
                    $("#status").removeAttr('class');
                    $("#status").addClass('label label-default');
                    break;
                 }
    default: break;
}
// switch(detail.progress){
//     case (<=25): 
// }
$('#status-progress').attr('style','width:'+detail.progress+'%;text-align: center;');
$('#status-progress').attr('aria-valuenow',detail.progress);
$('#status-id').text(detail.progress+"%");
console.log(detail.status);

$('#tombol-division').on('click',function(){
	var table_request = $('#table-request').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        autoWidth: false,
        buttons: [
                    {extend:'copy',className:'btn-copy'},
                    {extend:'csv',className:'btn-csv'},
                    {extend:'excel',className:'btn-excel'},
                    {extend:'pdf',className:'btn-pdf'},
                    {extend:'print',className:'btn-print'}
                ],
        ajax:{
            url: "<?=base_url('data/divisi');?>",
            type:"POST",
            dataSrc: ""
        },
        aoColumns:[
            {"title":"Kode","data":"kode"},
            {"title":"Divisi","data":"divisi"}
        ],
        initComplete: function () {
            $('.btn-copy').html('<span class="feather icon-copy" data-toggle="tooltip" title="Copy To Clipboard"/> Copy</span>')
            $('.btn-csv').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To CSV"/> CSV</span>')
            $('.btn-excel').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To Excel"/> Excel</span>')
            $('.btn-pdf').html('<span class="feather icon-file-text" data-toggle="tooltip" title="Export To PDF"/> PDF</span>')
            $('.btn-print').html('<span class="feather icon-printer" data-toggle="tooltip" title="Print The Page"/> Print</span>')
        }
    });
});