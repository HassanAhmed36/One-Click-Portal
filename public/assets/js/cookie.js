$((function(){var e={title:"We Care about your privacy",text:"By using this site, you agree to our use of cookies, Terms And Conditions.",theme:"white",learnMore:!0,position:"bottom",onAccept:acceptCallbackFunction};$.acceptCookies(e);function o(){var o="var options = "+JSON.stringify(e,null,5)+";\n$.acceptCookies(options);";$("#currentOptions").val(o),$("#currentOptions").height(0),$("#currentOptions").height($("#currentOptions").scrollHeight)}$(".clear-button").click((function(t){t.preventDefault(),$("#cookie-popup-container").remove(),document.cookie="cookiesAccepted=; path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;",$.acceptCookies(e),$(".cookie-indicator").removeClass("badge-success").addClass("badge-danger").text("No cookie found"),o()})),$(".theme-button").click((function(t){t.preventDefault(),$("#cookie-popup-container").remove(),e.theme=$(this).data("theme1").replace("theme-",""),$.acceptCookies(e),o()})),$(".position-button").click((function(t){t.preventDefault(),$("#cookie-popup-container").remove();var c=$(this).data("position");e.position=c,$.acceptCookies(e),o()})),$("#btnCustomize").click((function(e){e.preventDefault(),$("html, body").animate({scrollTop:$(".theme-buttons").offset().top},500)})),$(".option-button").click((function(o){o.preventDefault(),$("#cookie-popup-container").remove();var t=$(this).data("option");"default"==t?e={title:"Cookies & Privacy Policy",text:"There are no cookies used on this site, but if there were this message could be customised to provide more details. Click the accept button below to see the optional callback in action... .",theme:"dark",learnMore:!0,position:"top",onAccept:acceptCallbackFunction}:"nolearnbutton"==t?e.learnMore=!1:"customtext"==t&&(""!=$("#customHeader").val()&&(e.title=$("#customHeader").val()),""!=$("#customSubHeader").val()&&(e.text=$("#customSubHeader").val()),""!=$("#customAccept").val()&&(e.acceptButtonText=$("#customAccept").val()),""!=$("#customLearnMore").val()&&(e.learnMoreButtonText=$("#customLearnMore").val()),""!=$("#customLearnMoreInfo").val()&&(e.learnMoreInfoText=$("#customLearnMoreInfo").val())),$.acceptCookies(e)})),getCookie("cookiesAccepted")?$(".cookie-indicator").removeClass("badge-danger").addClass("badge-success").text("Cookie saved"):$(".cookie-indicator").removeClass("badge-success").addClass("badge-danger").text("No cookie found")}));var acceptCallbackFunction=function(){$(".cookie-indicator").removeClass("badge-danger").addClass("badge-success").text("Cookie saved")};function getCookie(e){for(var o=e+"=",t=decodeURIComponent(document.cookie).split(";"),c=0;c<t.length;c++){for(var a=t[c];" "==a.charAt(0);)a=a.substring(1);if(0==a.indexOf(o))return a.substring(o.length,a.length)}return""}