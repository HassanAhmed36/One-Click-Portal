$((function(){"use strict";var e=document.getElementById("chartBar1").getContext("2d");new Chart(e,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{label:"# of Votes",data:[14,12,34,25,24,20],backgroundColor:"#fe7f00"}]},options:{maintainAspectRatio:!1,responsive:!0,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{barPercentage:.6,ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var a=document.getElementById("chartBar2").getContext("2d");new Chart(a,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{label:"# of Votes",data:[14,12,34,25,24,20],backgroundColor:"#3366ff"}]},options:{maintainAspectRatio:!1,responsive:!0,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{barPercentage:.6,ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var t=document.getElementById("chartBar3").getContext("2d"),o=t.createLinearGradient(0,0,0,250);o.addColorStop(0,"#4c048e"),o.addColorStop(1,"#fe7f00"),new Chart(t,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{label:"# of Votes",data:[14,12,34,25,24,20],backgroundColor:o}]},options:{maintainAspectRatio:!1,responsive:!0,legend:{display:!1,labels:{display:!1}},hover:{mode:null},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{barPercentage:.6,ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var r=document.getElementById("chartBar4").getContext("2d");new Chart(r,{type:"horizontalBar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{label:"# of Votes",data:[14,12,34,25,24,20],backgroundColor:["#3366ff","#fe7f00","#ffad00","#45aaf2","#01c353","#f7592d"]}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{ticks:{beginAtZero:!0,fontSize:11,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var n=document.getElementById("chartBar5").getContext("2d");new Chart(n,{type:"horizontalBar",data:{labels:["Jan","Feb","Mar","Apr","May"],datasets:[{data:[14,12,34,25,24,20],backgroundColor:["#fe7f00","#ffad00","#45aaf2","#01c353","#f7592d"]},{data:[22,30,25,30,20,40],backgroundColor:"#3366ff"}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{ticks:{beginAtZero:!0,fontSize:11,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var i=document.getElementById("chartStacked1");new Chart(i,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{data:[14,12,34,25,24,20],backgroundColor:"#fe7f00",borderWidth:1,fill:!0},{data:[14,12,34,25,24,20],backgroundColor:"#3366ff",borderWidth:1,fill:!0}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{stacked:!0,ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{barPercentage:.5,stacked:!0,ticks:{fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var l=document.getElementById("chartStacked2");new Chart(l,{type:"horizontalBar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun"],datasets:[{data:[14,12,34,25,24,20],backgroundColor:"#fe7f00",borderWidth:1,fill:!0},{data:[14,12,34,25,24,20],backgroundColor:"#3366ff",borderWidth:1,fill:!0}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{stacked:!0,ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{stacked:!0,ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var d=document.getElementById("chartLine1");new Chart(d,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","July","Aug","Sep","Oct","Nov","Dec"],datasets:[{data:[14,12,34,25,44,36,35,25,30,32,20,25],borderColor:"#3366ff",borderWidth:1,fill:!1},{data:[35,30,45,35,55,40,10,20,25,55,50,45],borderColor:"#fe7f00",borderWidth:1,fill:!1}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var s=document.getElementById("chartArea1"),b=t.createLinearGradient(0,350,0,0);b.addColorStop(0,"rgba(71, 84, 242,0)"),b.addColorStop(1,"rgba(71, 84, 242,.5)");var c=t.createLinearGradient(0,280,0,0);c.addColorStop(0,"rgba(240, 74, 32, 0)"),c.addColorStop(1,"rgba(240, 74, 32, .5)"),new Chart(s,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","July","Aug","Sep","Oct","Nov","Dec"],datasets:[{data:[14,12,34,25,44,36,35,25,30,32,20,25],borderColor:"#3366ff",borderWidth:1,backgroundColor:b},{data:[35,30,45,35,55,40,10,20,25,55,50,45],borderColor:"#fe7f00",borderWidth:1,backgroundColor:c}]},options:{maintainAspectRatio:!1,legend:{display:!1,labels:{display:!1}},scales:{yAxes:[{ticks:{beginAtZero:!0,fontSize:10,max:80,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}],xAxes:[{ticks:{beginAtZero:!0,fontSize:11,fontColor:"#b4b7c5"},gridLines:{color:"rgba(180, 183, 197, 0.4)"}}]}}});var g={labels:["Jan","Feb","Mar","Apr","May"],datasets:[{data:[35,24,20,15,8],backgroundColor:["#3366ff","#fe7f00","#ffad00","#45aaf2","#01c353","#f7592d"]}]},f={maintainAspectRatio:!1,responsive:!0,legend:{display:!1},animation:{animateScale:!0,animateRotate:!0}};i=document.getElementById("chartPie"),new Chart(i,{type:"doughnut",data:g,options:f}),l=document.getElementById("chartDonut"),new Chart(l,{type:"pie",data:g,options:f})}));