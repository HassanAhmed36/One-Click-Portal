$((function(e){$("#basic-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""}}),$(".responsive-datatable").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable-1").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable-2").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""}}),(a=$("#file-datatable").DataTable({buttons:["copy","excel","pdf","colvis"],responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""}})).buttons().container().appendTo("#file-datatable_wrapper .col-md-6:eq(0)");var a=$("#delete-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}});$("#delete-datatable tbody").on("click","tr",(function(){$(this).hasClass("selected")?$(this).removeClass("selected"):(a.$("tr.selected").removeClass("selected"),$(this).addClass("selected"))})),$("#button").click((function(){a.row(".selected").remove().draw(!1)})),$("#details-datatable").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:""},responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){var a=e.data();return"Details for "+a[0]+" "+a[1]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table border mb-0"})}}}),$(".select2").select2({minimumResultsForSearch:1/0})}));