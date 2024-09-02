/*DataTable Init*/


"use strict"; 

$(document).ready(function() {
	var table =$('#datable_1').DataTable({
		"bProcessing": true,
		"aaSorting": [],

		"order": [[0, "desc"]],
		oLanguage: {sProcessing: "<div class='fad fa-sync-alt fa-spin fa-3x'></div>",sLengthMenu: "_MENU_",},
		buttons: [
			  { extend: 'copy', text: 'Copy',
                exportOptions: {
                    columns: ':visible'
                } },
                { extend: 'excel', text: 'Excel',
                exportOptions: {
                    columns: ':visible'
                } },
			  { extend: 'csv', text: 'CSV',
                exportOptions: {
                    columns: ':visible'
                } },
			  { extend: 'pdf', text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                } },
			 {
                extend: 'print', className: 'btn btn-gradient-info', text: 'Print',key: {
                key: 'p',
                altkey: true
            },
                exportOptions: {
                    columns: ':visible'
                }
            },
            { extend: 'colvis', text: 'Hide' }
		],		
		dom: 'Blfrtip',
		"pageLength": 25,
		"scrollX": true,
		responsive: true,
		autoWidth: true,		
		lengthChange: true,
		language: { search: "",
		searchPlaceholder: "Search",
		sLengthMenu: "_MENU_items"

		}
	});
    $('#datable_2').DataTable({ 
		autoWidth: false,
		lengthChange: false,
		"bPaginate": false,
		language: { search: "",searchPlaceholder: "Search" }
	});

	/*Export DataTable*/
	$('#datable_3').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );
	
	 $('#datable_5').DataTable({
		responsive: true,
		language: { search: "" ,sLengthMenu: "_MENU_Items" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		});
	// $('#datable_5 tbody').on( 'click', 'tr', function () {
 //        if ( $(this).hasClass('selected') ) {
 //            $(this).removeClass('selected');
 //        }
 //        else {
 //            table.$('tr.selected').removeClass('selected');
 //            $(this).addClass('selected');
 //        }
 //    } );
 
 $('#datable_1 tbody').on( 'click', 'tr', function () {
     console.log( table.row( this ).data()[0] );
     var title = table.row( this ).data()[0];
     var price = table.row( this ).data()[1];
     $("#pos").append("");
   } );
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );