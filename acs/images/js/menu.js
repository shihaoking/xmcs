$(document).ready(function() {
						   
	var ctrlMenu = (function(){					   
						   
		$("#menu .dir").bind("click",function (event) {
			event.stopPropagation();
			$(this).blur();
			$(this).children("span").toggleClass("open")
			var submenu = $(this).parent().find(".child");
			if (submenu.is(":hidden")) {
				submenu.slideDown(150);
			} else {
				submenu.slideUp(150);
			};

		});	
		
		$("#menu .child a").bind("click",function (event) {
			event.stopPropagation();
			$("#menu .child a.current").removeClass("current");
			$(this).addClass("current")

		});	
	
	})()					   
						   
						   
})