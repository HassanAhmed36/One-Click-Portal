$((function(e){$("#hr-payroll").DataTable({order:[[0,"desc"]],order:[],columnDefs:[{orderable:!1,targets:[7]}],language:{searchPlaceholder:"Search...",sSearch:""}}),$(".select2").select2({minimumResultsForSearch:1/0,width:"100%"}),$(document).on("change",":file",(function(){var e=$(this),t=e.get(0).files?e.get(0).files.length:1,l=e.val().replace(/\\/g,"/").replace(/.*\//,"");e.trigger("fileselect",[t,l])})),$(document).ready((function(){$(":file").on("fileselect",(function(e,t,l){var r=$(this).parents(".input-group").find(":text"),a=t>1?t+" files selected":l;r.length?r.val(a):a&&alert(a)}))})),$(".fc-datepicker").datepicker({dateFormat:"dd MM yy",zIndex:999998})}));