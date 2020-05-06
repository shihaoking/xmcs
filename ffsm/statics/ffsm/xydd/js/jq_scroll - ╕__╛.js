 $(".home-wrapper .one").click(function(){
		$(this).addClass('active');
		$(".home-wrapper .two,.home-wrapper .three").removeClass('active');
		$(".home-wrapper .one img").attr("src","/statics/ffsm/xydd/images/ft_title1_active.png"); 
		$(".home-wrapper .two img").attr("src","/statics/ffsm/xydd/images/ft_title2.png"); 
		$(".home-wrapper .three img").attr("src","/statics/ffsm/xydd/images/ft_title3.png"); 
		$(".part2").hide(); 
		$(".part3").hide(); 
		$(".part1").show();
	
	});
	$(".home-wrapper .two").click(function(){
		$(this).addClass('active');
		$(".home-wrapper .two,.home-wrapper .three").removeClass('active');
		$(".home-wrapper .one img").attr("src","/statics/ffsm/xydd/images/ft_title1.png"); 
		$(".home-wrapper .two img").attr("src","/statics/ffsm/xydd/images/ft_title2_active.png"); 
		$(".home-wrapper .three img").attr("src","/statics/ffsm/xydd/images/ft_title3.png"); 
		 
		$(".part1").hide(); 
		$(".part3").hide();
		$(".part2").show();
	});
	$(".home-wrapper .three").click(function(){
		$(this).addClass('active');
		$(".home-wrapper .one,.home-wrapper .two").removeClass('active');
		$(".home-wrapper .one img").attr("src","/statics/ffsm/xydd/images/ft_title1.png"); 
		$(".home-wrapper .two img").attr("src","/statics/ffsm/xydd/images/ft_title2.png"); 
		$(".home-wrapper .three img").attr("src","/statics/ffsm/xydd/images/ft_title3_active.png"); 
		
		$(".part1").hide(); 
		$(".part2").hide();
		$(".part3").show(); 
	});
	
	
	
	$($(".square-nav li")[0]).click(function(){
		$(".square-nav li").removeClass('active');
		$(this).addClass('active');	
		$(".user-lists2,.more-btn2").hide(); 
		$(".user-lists3,.more-btn3").hide();
		$(".user-lists1,.more-btn1").show(); 

	});
	$($(".square-nav li")[1]).click(function(){
		$(".square-nav li").removeClass('active');
		$(this).addClass('active');	
		$(".user-lists1,.more-btn1").hide(); 
		$(".user-lists3,.more-btn3").hide();
		$(".user-lists2,.more-btn2").show(); 
	});
	$($(".square-nav li")[2]).click(function(){
		$(".square-nav li").removeClass('active');
		$(this).addClass('active');	
		$(".user-lists1,.more-btn1").hide(); 
		$(".user-lists2,.more-btn2").hide();
		$(".user-lists3,.more-btn3").show(); 
	});

  $(".wtqf_ck").click(function(){
		var id=$(this).attr("data-id");
		var count_desc=parseInt($("#id_"+id).text());
		
		$.ajax({
		type:'GET',
		url:'/?ac=xydd_dj&id='+id,
		dataType:'html',
		})
		.success(function(s) {
			var data=s.split("ok");
			if(data[0]==1){
				$("#id_"+id).text(count_desc+1);
			}
			$("#wrapper").append(data[1]);
			
			setTimeout(function() {
			  $(".shop-common-tip-layer").remove();
			}, 2000);
		})
		.error(function() {
		});
	});
	var page1=2;
	var page2=2;
	var page3=2;
	$(".more-btn1").click(function(){
		
		$.ajax({
		type:'GET',
		url:'/?ac=xydd&page='+page1+'&list_cl=',
		dataType:'html',
		})
		.success(function(s) {
			$(".user-lists1").append(s);
			page1++;
		})
		.error(function() {
		});
	});
	$(".more-btn2").click(function(){
		
		$.ajax({
		type:'GET',
		url:'/?ac=xydd&page='+page2+'&list_cl=week',
		dataType:'html',
		})
		.success(function(s) {
			$(".user-lists2").append(s);
			page2++;
		})
		.error(function() {
		});
	});
	$(".more-btn3").click(function(){
		
		$.ajax({
		type:'GET',
		url:'/?ac=xydd&page='+page3+'&list_cl=zd',
		dataType:'html',
		})
		.success(function(s) {
			$(".user-lists3").append(s);
            page3++;
		})
		.error(function() {
		});
	});
	$(".xydd_self").click(function(){
		var id=$(this).attr("data-id");
		console.log(page1);
		$.ajax({
		type:'GET',
		url:'/?ac=xydd_self&id='+id,
		dataType:'html',
		})
		.success(function(s) {
		$(".home-wrapper .two,.home-wrapper .three").removeClass('active');
		$(".home-wrapper .one img").attr("src","/statics/ffsm/xydd/images/ft_title1.png"); 
		$(".home-wrapper .two img").attr("src","/statics/ffsm/xydd/images/ft_title2_active.png"); 
		$(".home-wrapper .three img").attr("src","/statics/ffsm/xydd/images/ft_title3.png"); 
			$(".part1").hide(); 
			$(".part3").hide();
			$(".part2").show();
			$(".user_self").html(s);
		})
		.error(function() {
		});
	});