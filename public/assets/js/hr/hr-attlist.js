$((function(e){$("#hr-attendance").DataTable({rowReorder:!0,columnDefs:[{orderable:!0,className:"reorder",targets:0},{orderable:!1,targets:"_all"}]});$("#emp-attendance").DataTable({order:[[0,"asec"]],order:[],columnDefs:[{orderable:!1,targets:[5,6]}],language:{searchPlaceholder:"Search...",sSearch:""}}),$(".timepicker").timepicker({showInputs:!1}),$(".fc-datepicker").datepicker({dateFormat:"dd MM yy",monthNamesShort:["Jan","Feb","Mar","Apr","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec"]}),$(".fc-datepicker").datepicker("setDate","today"),$(".select2").select2({minimumResultsForSearch:1/0,width:"100%"})}));