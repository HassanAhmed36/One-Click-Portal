!function(t){t.fn.extend({champ:function(a){var s=t.extend({selector:"tab_wrapper",plugin_type:"tab",side:"",active_tab:"1",controllers:"false",ajax:"false",multiple_tabs:"false",show_ajax_content_in_tab:"false",content_path:"false"},a),e=1,i=1;return this.each((function(){var a=s.plugin_type,n=s.side,l=s.active_tab,r=s.controllers,c=s.multiple_tabs,o=s.ajax,d=s.show_ajax_content_in_tab,v=s.content_path,h=t(this).find(" > div > div.tab_content"),p=t(this).find(" >ul li"),_=t(this),f=t(".controller").closest(".tab_wrapper");function u(a){a.find(" >ul li:eq(0)").hasClass("active")?t(".controller .previous",a).hide():t(".controller .previous",a).show(),a.find(" >ul li").last().hasClass("active")?t(".controller .next",a).hide():t(".controller .next",a).show()}if(""!=n&&_.addClass(n+"_side"),"true"==r&&(_.addClass("withControls"),_.append("<div class='controller'><span class='previous'>previous</span><span class='next'>next</span></div>")),"accordion"==a&&(_.addClass("accordion"),_.removeClass(n+"_side"),_.removeClass("withControls"),t(".controller",_).remove()),"true"==o&&(t.ajax({url:v,success:function(a){t(" .tab_content.tab_"+d,_).html(a)}}),t(document).ajaxError((function(a,s,e){t(" .tab_content.tab_"+d,_).prepend("<h4 class='error'>Error requesting page "+e.url+"</h2>")}))),t(".controller .previous",t(this)).click((function(){t(this).closest(".controller").siblings("ul").find("li.active").prev().trigger("click"),u(f)})),t(".controller .next",t(this)).click((function(){t(this).closest(".controller").siblings("ul").find("li.active").next().trigger("click"),u(f)})),t(this).find(" >ul li").removeClass("active"),t(this).find(" > div > div.tab_content").removeClass("active"),""==l?(t(this).find(" >ul li:eq(0)").addClass("active").show(),t(this).find(" > div > div.tab_content:eq(0)").addClass("active").show(),u(_)):(t(this).find(" >ul li:eq("+(l-1)+")").addClass("active").show(),t(this).find(" > div > div.tab_content:eq("+(l-1)+")").addClass("active").show(),u(_)),h.first().addClass("first"),h.last().addClass("last"),h.each((function(){var a="tab_"+t(this).parents(".tab_wrapper").length+"_"+i;t(this).addClass(a),t(this).attr("title",a),i++})),"true"==c){var b=t(this).closest(".tab_wrapper"),C=t(this).find(" >ul li:eq(0)").text();b.addClass("show-as-dropdown"),b.prepend("<div class='active_tab'><span class='text'>"+C+"</span><span class='arrow'></span></div>")}t(".active_tab").click((function(){t(this).next().stop(!0,!0).slideToggle()})),p.each((function(){var a="tab_"+t(this).parents(".tab_wrapper").length+"_"+e,s=t(this).text(),i=t(this).closest(".tab_wrapper");t(this).attr("rel",a);var n=t(this).attr("class");h.each((function(){t(this).hasClass(a)&&i.find(" > div > div.tab_content."+a).before("<div title='"+a+"' class='accordian_header "+a+" "+n+"'>"+s+"<span class='arrow'></span></div>")})),e++})),t(".accordian_header").click((function(){var a=t(this).attr("title"),s=t(this).next(".tab_content").css("display"),e=t(this).closest(".tab_wrapper");"none"==s?(e.find(">.content_wrapper >.accordian_header").removeClass("active"),t(this).addClass("active"),e.find(">ul >li").removeClass("active"),e.find(">ul >li[rel='"+a+"']").addClass("active"),h.removeClass("active").stop(!0,!0).slideUp(),e.find(" > div > div.tab_content."+a).addClass("active").stop(!0,!0).slideDown()):(e.find(">.content_wrapper >.accordian_header").removeClass("active"),t(this).removeClass("active"),e.find(">ul >li").removeClass("active"),e.find(" > div > div.tab_content."+a).removeClass("active").stop(!0,!0).slideUp())})),p.click((function(){var a=t(this).attr("rel"),s=t(this).closest(".tab_wrapper");t(this).closest(".tab_list").next(".content_wrapper").find(" >.accordian_header").removeClass("active"),s.find(".accordian_header."+a).addClass("active"),h.removeClass("active").hide(),s.find(" > div > div.tab_content."+a).addClass("active").show(),p.removeClass("active"),t(this).addClass("active"),u(s);var e=t(window).width();if("true"==c){if(t(this).parent(".tab_list").parent(".show-as-dropdown")){var i=t(this).text();t(".active_tab .text").text(i)}e<=768&&t(this).closest(".tab_list").stop(!0,!0).slideUp()}}))}))}})}(jQuery);