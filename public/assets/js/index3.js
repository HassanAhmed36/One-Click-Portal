!function(e){"use strict";var o=(r=document.getElementById("balance")).getContext("2d").createLinearGradient(0,180,0,280);o.addColorStop(0,"#f5f6f8"),o.addColorStop(1,"rgba(246, 247, 249, .05)"),r.height="380";new Chart(r,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"on going",data:[11,13,13,20,22,25,17,23,16,16,15,17,15],backgroundColor:"transparent",borderWidth:3,borderColor:"#3366ff",hoverBorderColor:"#3366ff"},{label:"Completed",data:[10,12,12.2,16,18,12,17,15.2,20.2,15,14,16],backgroundColor:"transparent",borderWidth:3,borderColor:"#fe7f00",hoverBorderColor:"#fe7f00"},{label:"",data:[13,18,12,22,18,22,17,21,20,22,24,19],backgroundColor:o,borderWidth:3,borderColor:"#f5f6f8"}]},options:{responsive:!0,maintainAspectRatio:!1,layout:{padding:{left:0,right:0,top:0,bottom:0}},tooltips:{enabled:!1},scales:{yAxes:[{gridLines:{display:!0,drawBorder:!1,zeroLineColor:"rgba(142, 156, 173,0.1)",color:"rgba(142, 156, 173,0.1)"},scaleLabel:{display:!1},ticks:{min:5,stepSize:5,max:30,fontColor:"#8492a6"}}],xAxes:[{ticks:{fontColor:"#8492a6"},gridLines:{color:"rgba(142, 156, 173,0.1)",display:!1}}]},legend:{display:!1},elements:{point:{radius:0}}}});var r,a={series:[74,35],chart:{height:280,type:"donut"},dataLabels:{enabled:!1},legend:{show:!1},stroke:{show:!0,width:0},plotOptions:{pie:{donut:{size:"80%",background:"transparent",labels:{show:!0,name:{show:!0,fontSize:"29px",color:"#6c6f9a",offsetY:-10},value:{show:!0,fontSize:"26px",color:void 0,offsetY:16,formatter:function(e){return e+"%"}},total:{show:!0,showAlways:!1,label:"Total Tasks",fontSize:"22px",fontWeight:600,color:"#373d3f"}}}}},responsive:[{breakpoint:480,options:{legend:{show:!1}}}],labels:["Completed","Running"],colors:["#3366ff","#fe7f00"]};new ApexCharts(document.querySelector("#advancedtask"),a).render(),(r=document.getElementById("spenttask")).height="310";new Chart(r,{type:"bar",data:{labels:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],datasets:[{barPercentage:.2,label:"Work",data:[8,6.5,7,8.2,7,7.8,6.5],backgroundColor:"#3366ff",borderWidth:2,hoverBackgroundColor:"#3366ff",hoverBorderWidth:0,borderColor:"#3366ff",hoverBorderColor:"#3366ff",borderDash:[5,2]},{label:"Working Hours",barPercentage:.2,data:[10,10,10,10,10,10,10],backgroundColor:"#dce2fc",borderWidth:2,hoverBackgroundColor:"#dbe2fc",hoverBorderWidth:0,borderColor:"#dbe2fc",hoverBorderColor:"#dbe2fc"}]},options:{responsive:!0,maintainAspectRatio:!1,layout:{padding:{left:0,right:0,top:0,bottom:0}},tooltips:{enabled:!1},scales:{yAxes:[{gridLines:{display:!0,drawBorder:!1,zeroLineColor:"rgba(142, 156, 173,0.1)",color:"rgba(142, 156, 173,0.1)"},scaleLabel:{display:!1},ticks:{beginAtZero:!0,min:0,max:10,stepSize:2,fontColor:"#8492a6",userCallback:function(e){return e.toString()+"hrs"}}}],xAxes:[{barValueSpacing:0,barDatasetSpacing:0,barRadius:0,stacked:!0,ticks:{beginAtZero:!0,fontColor:"#8492a6"},gridLines:{color:"rgba(142, 156, 173,0.1)",display:!1}}]},legend:{display:!1},elements:{point:{radius:0}}}});e("#tasktable").DataTable({paging:!1,searching:!1,info:!1}),e(".select2").select2({minimumResultsForSearch:1/0,width:"100%"}),e('[data-toggle="datepicker"]').datepicker({autoHide:!0,zIndex:999998}),e(".fc-datepicker").datepicker({autoHide:!0,zIndex:999998})}(jQuery);