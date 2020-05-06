var TableHandle = (function(){
	function init(table){
		var Items = table.find('tbody input[type="checkbox"]');
		
		$(Items).each(function(){
			var tr = $(this).parent().parent();
			$(this).click(function (){
				if($(this).is(":checked")){
					tr.addClass("checked");	
				}else{
					tr.removeClass("checked");
				}	
			})

		});//选中高亮tr
		
		table.find('thead input[type="checkbox"]').click(function(){
			$(Items).each(function(){
				this.checked();
			})
		
		});//全选反选按钮
		
		iehover();
	}
	
	function iehover(){
		if($.browser.msie && $.browser.version == "6.0"){
			$("tr").hover(
			  function () {
				$(this).addClass("iehover");
			  },
			  function () {
				$(this).removeClass("iehover");
			  }
			)
		}
	}
	
	return{
		init:init
	}
})();