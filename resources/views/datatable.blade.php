
{{-- header  --}}
@push('unyama')
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.1/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.3.1/css/searchPanes.dataTables.min.css">
@endpush

@push('print-button-styles')
<style>
    /* @media print {
        .print-button {
            display: none;
        }
    } */


.btn-csv {
 border:none;
 background: rgb(36, 151, 46);
 color: white;
 padding: 10px;
}
.btn-csv:hover {
   background: rgb(130, 144, 5);
}
.btn-excel {
  border:none;
 background: rgb(5, 195, 112);
 color: white;
 padding: 10px;
}
.btn-excel:hover {
    background: rgb(130, 144, 5);
}
.btn-print {
  border:none;
 background: rgb(5, 52, 205);
 color: white;
 padding: 10px;
}
.btn-print:hover {
   background: rgb(130, 144, 5);
}

div#myTable_filter {
    margin-bottom: 30px;
}

@media (min-width: 640px) {
    .dt-buttons {
        margin-top:30px;
        border: 1px solid red;
        display: flex;
        flex-direction: column;
    }
}

</style>
@endpush




{{-- footer  --}}
    @push('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.8.2/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.3.1/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.4.1/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
<script src="{{ URL::to('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::to('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::to('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::to('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable(
        {
            "scrollX": true,
            "responsive": false,
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "info": true,
            "ordering": true,
            "fixedColumns":   {
                "leftColumns": 2,

            },
            "columnDefs": [
                { "width": "20px", "targets": 0 }
            ],
            "dom": 'Bfrtip',
           
            "buttons": [
                {
                    extend: 'csv',
                    text: 'Export CSV',
                    className: 'btn-csv',
                    exportOptions: {
                        columns: ':visible',
                        stripHtml: false,

                    }
                },
                {
                    extend: 'excel',
                    text: 'Export Excel',
                    className: 'btn-excel',
                    exportOptions: {
                        columns: ':visible',
                        stripHtml: false,
                    }
                },
                {
                    extend: 'print',
                    text: 'Print as Pdf',
                    className: 'btn-print',
                    exportOptions: {
                        columns: ':visible',
                        stripHtml: false,

                    }
                },
            
        ],
            "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },


        }
    );

} );
</script>
    @endpush
