function createCookie(e,t,i){if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3);var o="; expires="+n.toGMTString()}else o="";document.cookie=e+"="+t+o+"; path=/"}function readCookie(e){for(var t=e+"=",i=document.cookie.split(";"),n=0;n<i.length;n++){for(var o=i[n];" "==o.charAt(0);)o=o.substring(1,o.length);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return null}function eraseCookie(e){createCookie(e,"",-1)}!function(e){function t(t){e("link[rel*=style][title]").each((function(e){this.disabled=!0,this.getAttribute("title")==t&&(this.disabled=!1)})),createCookie("style",t,365)}e(document).ready((function(){e(".styleswitch").click((function(){return t(this.getAttribute("data-switchcolor")),!1}));var i=readCookie("style");if(i)t(i);else{e("link[rel*=style][title]").each((function(e){this.disabled=!0,this.getAttribute("data-default-color")&&(this.disabled=!1)}))}}))}(jQuery),jQuery(".demo_changer .demo-icon").click((function(){jQuery(".demo_changer").hasClass("active")?jQuery(".demo_changer").animate({left:"-270px"},(function(){jQuery(".demo_changer").toggleClass("active")})):jQuery(".demo_changer").animate({left:"0px"},(function(){jQuery(".demo_changer").toggleClass("active")}));new PerfectScrollbar(".sidebar-left1",{useBothWheelAxes:!0,suppressScrollX:!0})}));