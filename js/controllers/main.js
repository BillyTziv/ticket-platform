$(document).ready( function () {
  var ticketDatatable = $('#myTable').DataTable({
    "dom": '<"#dtCustomFilters"><"dtSearchFilter"f><"dtLength"l><"dtActionButtons"B>t<"dtPagination"p><"dtInformation"i>',
            // "dom": 'Bfrtip',
    "bDestroy": true,
            fixedHeader: true,
    lengthMenu: [ 10, 20, 50, 75, 100 ],
    displayLength: 10,
    select: true,
    hover: true,
    buttons: {
      buttons: [
        {
          text: '<i class=\'fas fa-trash\'></i> DELETE',
          className: 'btn btn-light vs-dt-btn btn-padding-lr',
          action: function ( e, dt, node, config ) {
            var ticketListToDelete = ticketDatatable.rows( { selected: true } )[0];
            var numOfItemsToDelete = ticketDatatable.rows( { selected: true } ).count();

            console.log("Deleting: ", ticketListToDelete);
          }
        },
        {
          text: '<i class=\'fas fa-file-export\'></i> EXCEL',
          extend: 'excelHtml5',
          title: "EXCEL",
          className: 'btn btn-light vs-dt-btn btn-padding-lr',
          exportOptions: {
            columns: [':visible :not(:last-child)']
          }
        },
        {
          text: '<i class=\'fas fa-file-export\'></i> PDF',
          extend: 'pdfHtml5',
          title: "EXCEL",
          className: 'btn btn-light vs-dt-btn btn-padding-lr',
          orientation: 'landscape',
           pageSize: 'LEGAL',
          exportOptions: {
            columns: [':visible :not(:last-child)']
          }
        }
      ]
    },
    language: {
                search: "",
                searchPlaceholder: "Type to search...",
      lengthMenu: "_MENU_"              
            }
  });
});