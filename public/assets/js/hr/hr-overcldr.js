$((function(e){$(".fc-datepicker").datepicker({dateFormat:"dd MM yy",monthNamesShort:["Jan","Feb","Mar","Apr","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec"]})})),document.addEventListener("DOMContentLoaded",(function(){var e=document.getElementById("calendar1"),t=new FullCalendar.Calendar(e,{headerToolbar:{left:"prev",center:"title",right:"next"},initialDate:"2021-01",navLinks:!0,businessHours:!0,editable:!0,selectable:!0,selectMirror:!0,droppable:!0,drop:function(e){document.getElementById("drop-remove").checked&&e.draggedEl.parentNode.removeChild(e.draggedEl)},select:function(e){var a=prompt("Event Title:");a&&t.addEvent({title:a,start:e.start,end:e.end,allDay:e.allDay}),t.unselect()},eventClick:function(e){confirm("Are you sure you want to delete this event?")&&e.event.remove()},editable:!0,dayMaxEvents:!0,eventRender:function(e,t){"Halfday"==e.description.toString()&&t.find(".fc-event-time").after($('<span class="fc-event-icons"></span>').html("<i class='fe fe-view'></i> "))},events:[{title:"Halfday",start:"2021-01-06",constraint:"Halfday",display:"rgba(240, 74, 32, 0.15)",color:"rgba(240, 74, 32, 0.15)"},{title:"Absent",start:"2021-01-13",end:"2021-01-16",display:"rgba(241, 21, 65, 0.15)",color:"rgba(241, 21, 65, 0.15)"},{title:"Republic Day",start:"2021-01-26",display:"background"},{title:"Late",start:"2021-01-08",display:"#d8fbfd",color:"#d8fbfd"},{title:"Late",start:"2021-01-20",display:"#d8fbfd",color:"#d8fbfd"}]});t.render()}));