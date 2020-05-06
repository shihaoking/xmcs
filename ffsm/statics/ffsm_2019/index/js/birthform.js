/*
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);    
    if (r != null) return unescape(r[2]); return null;
}

alert(window.location);

var formType = getQueryString('type');
var formTypeName = getQueryString('typename');

//一定要提前赋值formType和formTypeName

*/


//alert(formType);
//alert(formTypeName);


var valueFormCookie = function(cid, cookieName){
	rv = $.cookie(cookieName);
	return valueSet(cid, rv, false);
}

var valueSet = function(cid, value, decode){				
	if(typeof(value) !="undefined" && value != ''){		
		
		if (decode)
			value = decodeURIComponent(value);
		
		id = $("#"+cid);
		
		if (id.is("input:radio")){
			$("input[name='" + cid +"'][value="+value+"]").prop("checked",true);
		}
		else if (id.is("input:checkbox")){							
			id.prop('checked', value == 1);
		}
		else
			id.val(value);					
		return true;
	}
	return false;
}

var saveForm = function()	{
	
	if ($('#name').val() !='')
		$.cookie('xp_name', $('#name').val());
	$.cookie('xp_sex', $("input[name='sex']:checked").val());
	if ($('#birthdate').val() !='')
		$.cookie('xp_birthdate', $('#birthdate').val());
	$.cookie('xp_dst', $('#isDst').is(':checked') ? "1" : "0");
	if ($('#province').val() !='')
		$.cookie('xp_province', $('#province').val());
	if ($('#city').val() !='')
		$.cookie('xp_city', $('#city').val());				
	if ($('#dist').val() !='')
		$.cookie('xp_dist', $('#dist').val());
	if ($('#tz').val() !='')
	    $.cookie('xp_tz', $('#tz').val());			
	if ($('#isDst').val() !='')
		$.cookie('xp_dst', $('#isDst').is(':checked') ? "1" : "0");
	
	if (formType == 2){
		if ($('#name2').val() !='')
			$.cookie('xp_name2', $('#name2').val());				
		$.cookie('xp_sex2', $("input[name='sex2']:checked").val());
		if ($('#birthdate2').val() !='')
			$.cookie('xp_birthdate2', $('#birthdate2').val());
		$.cookie('xp_dst2', $('#isDst2').is(':checked') ? "1" : "0");
		if ($('#province2').val() !='')
			$.cookie('xp_province2', $('#province2').val());
		if ($('#city2').val() !='')
			$.cookie('xp_city2', $('#city2').val());
		if ($('#dist2').val() !='')
			$.cookie('xp_dist2', $('#dist2').val());
		$.cookie('xp_tz2', $('#tz2').val());
		if ($('#tz2').val() !='')
		    $.cookie('xp_tz2', $('#tz2').val());			
		if ($('#isDst2').val() !='')
			$.cookie('xp_dst2', $('#isDst2').is(':checked') ? "1" : "0");
		if ($('#transitdate_merge').val() !='')
			$.cookie('xp_transitdate_merge', $('#transitdate_merge').val());
	}

	if (formType == 3 || formType == 4 ){
		if ($('#transitdate').val() !='')
			$.cookie('xp_transitdate', $('#transitdate').val());
        if ($('#province2').val() !='')
			$.cookie('xp_t_province2', $('#province2').val());
		if ($('#city2').val() !='')
			$.cookie('xp_t_city2', $('#city2').val());
		if ($('#dist2').val() !='')
			$.cookie('xp_t_dist2', $('#dist2').val());
		$.cookie('xp_t_tz2', $('#tz2').val());
		if ($('#tz2').val() !='')
		    $.cookie('xp_t_tz2', $('#tz2').val());		
	}
	
	$.cookie('xp_hsys', $('#hsys').val());
	$.cookie("xp_isSave", "1") ;
	
	if (formType == 2){	
		$.cookie("merge_xptype", $('#xptype').val());
	}
	
	if (formType == 3){	
		$.cookie("luck_xptype", $('#xptype').val());
	}
};


$("#exchangebirth").click(function(){
	name =  $('#name').val();
	$('#name').val($('#name2').val());
	$('#name2').val(name);
	
	datetime =  $('#birthdate').val();
	$('#birthdate').val($('#birthdate2').val());
	$('#birthdate2').val(datetime);  
	
	tz = $('#tz').val();
	$('#tz').val($('#tz2').val());
	$('#tz2').val(tz);	
	
	province = $('#province').val();
	city = $('#city').val();
	dist =  $('#dist').val();
	
	province2 = $('#province2').val();
	city2 = $('#city2').val();
	dist2 =  $('#dist2').val();
	
	$('#province').val(province2);
	$('#province').change();
	$('#city').val(city2);
	$('#city').change();
	$('#dist').val(dist2);
	
	$('#province2').val(province);
	$('#province2').change();
	$('#city2').val(city);
	$('#city2').change();
	$('#dist2').val(dist);
	
	var sex 	= $("input[name='sex']:checked").val(); 
	var sex2 	= $("input[name='sex2']:checked").val();
	$("input[name='sex'][value="+sex2+"]").prop("checked",true);					       
	$("input[name='sex2'][value="+sex+"]").prop("checked",true);		

	var isDst   = $("#isDst").is(':checked');
	var isDst2  = $("#isDst2").is(':checked');							
	$("#isDst2").prop('checked', isDst);
	$("#isDst").prop('checked', isDst2);					
	
});

var restorFormFromUrlParam = function(urlParam, index){
	
	var addIndex = '';
	
	var paraString = urlParam.split("&");
	
	if (index > 1)
		addIndex = index;
	
	var paraObj = {} ;
	 
	for (i=0;  j= paraString[i];  i++){ 
	 	paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length); 
	} 
	var bSeted = false;
	 
	bSeted = valueSet("name" + addIndex, paraObj["name"], true);
	 
	valueSet("sex" + addIndex, paraObj["sex"], false);
	 
	rv = paraObj["date"]; 
	if(typeof(rv) !="undefined"){							
		rv1 = paraObj["time"]; 
		if(typeof(rv) !="undefined"){
			var v = rv + ' ' + rv1;
			$("#birthdate" + addIndex).val(v);			
			//valueSet("birthdate", v);					
		}							
	}
				
	 if (valueSet("province" + addIndex, paraObj["province"], true)) {
		 $("#province" + addIndex).change();
		 if (valueSet("city" + addIndex, paraObj["city"], true)){
			 $("#city" + addIndex).change();								 
			 valueSet("dist" + addIndex, paraObj["dist"], false);								 	
		 }
	 }					
	
	 valueSet("isDst" + addIndex, paraObj["dst"], false);
	
}

var restoreForm = function(){	
	
	var url = location.href;
	var urlIndex = url.indexOf("?");
	if (urlIndex > 0){				
			//从参数恢复，如有						
			 var paraString = url.substring(urlIndex+1, url.length).split("&"); 
			 var pureurl = url.substring(0, urlIndex);
			 var paraObj = {} ;
			 
			 for (i=0;  j= paraString[i];  i++){ 
			 	paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length); 
			 } 
			 var bSeted = false;
			 
			 bSeted = valueSet("name", paraObj["name"], true);
			 
			 valueSet("sex", paraObj["sex"], false);
			 
			rv = paraObj["date"]; 
			if(typeof(rv) !="undefined"){							
				rv1 = paraObj["time"]; 
				if(typeof(rv) !="undefined"){
					var v = rv + ' ' + rv1;
					$("#birthdate").val(v);			
					//valueSet("birthdate", v);					
				}							
			}
						
			 if (valueSet("province", paraObj["province"], true)) {
				 $("#province").change();
				 if (valueSet("city", paraObj["city"], true)){
					 $("#city").change();								 
					 valueSet("dist", paraObj["dist"], false);								 	
				 }
			 }
								
			 valueSet("tz", paraObj["tz"], false);
			 valueSet("isDst", paraObj["dst"], false);
			 
			 
			 if (formType == 2) {
				 bSeted = valueSet("name2", paraObj["name2"], true);
				 valueSet("sex2", paraObj["sex2"], false);										
				rv = paraObj["date2"]; 
				if(typeof(rv) !="undefined"){							
					rv1 = paraObj["time2"]; 
					if(typeof(rv) !="undefined"){
						var v = rv + ' ' + rv1;
						$("#birthdate2").val(v);	
					}							
				}			
				if (valueSet("province2", paraObj["province2"], true)) {
					 $("#province2").change();
					 if (valueSet("city2", paraObj["city2"], true)){
						 $("#city2").change();
						 valueSet("dist2", paraObj["dist2"], false);
					 }
				}				 					
				valueSet("tz2", paraObj["tz2"], false);		
				valueSet("isDst2", paraObj["dst2"], false);
				//推运合盘
				rv = paraObj["date3"]; 
				if(typeof(rv) !="undefined"){							
					rv1 = paraObj["time3"]; 
					if(typeof(rv) !="undefined"){
						var v = rv + ' ' + rv1;
						$("#transitdate_merge").val(v);	
					}							
				}
			 }

			 if (formType == 3 || formType == 4) {
			 	rv = paraObj["date2"]; 
				if(typeof(rv) !="undefined"){							
					rv1 = paraObj["time2"]; 
					if(typeof(rv) !="undefined"){
						var v = rv + ' ' + rv1;
						$("#transitdate").val(v);								
					}							
				}
               if (valueSet("province2", paraObj["province2"], true)) {
                     $("#province2").change();
                     if (valueSet("city2", paraObj["city2"], true)){
                         $("#city2").change();								 
                         valueSet("dist2", paraObj["dist2"], false);								 	
                     }
                 }
                valueSet("tz2", paraObj["tz2"], false);
			 }

			 valueSet("hsys", paraObj["hsys"], false);
			 
			 if (bSeted){
				 //清理地址栏参数
				 rv = paraObj["type"];
				 var urlparam = ''; 
				 if(typeof(rv) !="undefined"){
					 urlparam = "?type=" + rv;
				 }						
				 saveForm();							
				 location.href = pureurl + urlparam;
				 return; 
			 }		
	}
	
	if ($.cookie("xp_isSave")  != "1")				
		return;
	
	valueFormCookie("name", "xp_name");			
	valueFormCookie("sex", "xp_sex");	
	valueFormCookie("birthdate", "xp_birthdate");
	if (valueFormCookie("province", "xp_province")){					
	    $("#province").change();
	    if (valueFormCookie("city", "xp_city")){
	        $("#city").change();
	        valueFormCookie("dist", "xp_dist");
	    }
	}
	valueFormCookie("tz", "xp_tz");
	valueFormCookie("isDst", "xp_dst");
	

	if (formType == 2) {
		valueFormCookie("name2", "xp_name2");			
		valueFormCookie("sex2", "xp_sex2");	
		valueFormCookie("birthdate2", "xp_birthdate2");
		if (valueFormCookie("province2", "xp_province2")){					
		    $("#province2").change();
		    if (valueFormCookie("city2", "xp_city2")){
		        $("#city2").change();				        
		        valueFormCookie("dist2", "xp_dist2");
		    }
		}
		valueFormCookie("tz2", "xp_tz2");
		valueFormCookie("isDst2", "xp_dst2");				
		valueFormCookie("transitdate_merge", "xp_transitdate_merge");
	}

	 if (formType == 3 || formType == 4) {				
		 valueFormCookie("transitdate", "xp_transitdate");
        //默认值        
         if (valueFormCookie("province2", "xp_t_province2")){					
		    $("#province2").change();
		    if (valueFormCookie("city2", "xp_t_city2")){
		        $("#city2").change();				        
		        valueFormCookie("dist2", "xp_t_dist2");
		    }
		}
		valueFormCookie("tz2", "xp_t_tz2");		
	 }

	valueFormCookie("hsys", "xp_hsys");	
	
};

$('#birthform').submit(function() {
	saveForm();
	saveAdvSettings();
	name =  encodeURIComponent($('#name').val());            	
	sex = $("input[name='sex']:checked").val();            	
	datetime =  $('#birthdate').val();            	
	tz = 8;//$('#tz').val();
	dst = $('#isDst').is(':checked') ? 1 : 0;				
	if (datetime == null || datetime == ''){
		alert("请输入您的出生时间信息。");
		return false;
	}
	
	arrdatetime = datetime.split(' ');
	date = arrdatetime[0];
	time = arrdatetime[1];
	
	province = $('#province').val();
	city = encodeURIComponent($('#city').val());
	dist =  encodeURIComponent($('#dist').val());
	
	 if (formType == 2) {
		name2 =  encodeURIComponent($('#name2').val());            	
		sex2 = $("input[name='sex2']:checked").val();            	
		datetime2 =  $('#birthdate2').val();            	
		tz2 = 8; //$('#tz2').val();
		dst2 = $('#isDst2').is(':checked') ? 1 : 0;				
		if (datetime2 == null || datetime2 == ''){
			alert("请输入TA的出生时间信息。");
			return false;
		}
		
		arrdatetime2 = datetime2.split(' ');
		date2 = arrdatetime2[0];
		time2 = arrdatetime2[1];
		
		province2 = $('#province2').val();
		city2 = encodeURIComponent($('#city2').val());
		dist2 =  encodeURIComponent($('#dist2').val());				
	 }

	 if (formType == 3 || formType == 4) {
		datetime2 =  $('#transitdate').val();
		if (datetime2 == null || datetime2 == ''){
			alert("请输入推运到的时间。");
			return false;
		}
		arrdatetime2 = datetime2.split(' '); 
		date2 = arrdatetime2[0];
		time2 = arrdatetime2[1];
	 }
	
	
	hsys = $('#hsys').val();					

	
	var locHref = location.href;
	baseUrl = locHref.substring(0, locHref.lastIndexOf("/"));	

	
	if (name == null  || name =='' 
		|| sex == null  || sex ==''
		|| dist == null  || dist =='' 
		|| date == null  || date =='' 
		|| time == null  || time =='' 
		){
		alert('请确保输入了全部出生信息。');
		return false;
	}  

	if (hsys == null || hsys==''){
		//alert('请选择宫位系统。');
        hsys='P';
		//return false;
	}  	
	
	
	 if (formType == 1) {
	urlparam = "name=" + name +'&sex=' +sex + '&dist='+ dist  + '&date='+ date+'&time='+time + '&dst='+dst +				
		'&hsys='+hsys;
	 }
	
	 if (formType == 2) {			
		if (name2 == null  || name2 =='' 
			|| sex2 == null  || sex2 ==''
			|| dist2 == null  || dist2 =='' 
			|| date2 == null  || date2 =='' 
			|| time2 == null  || time2 =='' 
			){
			alert('请确保输入了TA的全部出生信息。');
			return false;
		}
		urlparam = "name=" + name +'&sex=' +sex + '&dist='+ dist  + '&date='+ date+'&time='+time + '&dst='+dst +
		"&name2=" + name2 +'&sex2=' +sex2 + '&dist2='+ dist2  + '&date2='+ date2+'&time2='+time2 +'&dst2=' + dst2 +
		'&hsys='+hsys;
		
		//合盘推运
		if (formTypeName.indexOf('_') > 0){
			datetime3 =  $('#transitdate_merge').val();            	
			if (datetime3 == null || datetime3 == ''){
				alert("请输入合盘推运时间信息。");
				return false;
			}
			
			arrdatetime3 = datetime3.split(' ');
			date3 = arrdatetime3[0];
			time3 = arrdatetime3[1];
			
			urlparam = urlparam + '&date3='+ date3+'&time3='+time3;
		}		
	 }
	
	 if (formType == 3 || formType == 4) {
		urlparam = "name=" + name +'&sex=' +sex + '&dist='+ dist  + '&date='+ date+'&time='+time +'&dst='+dst +
		'&date2='+ date2+'&time2='+time2 + '&hsys='+hsys;
         if (formTypeName=='solarreturn' || formTypeName=='lunarreturn'){
            urlparam = urlparam + '&dist2=' +  encodeURIComponent($('#dist2').val());
        }
	 }

	saveAdvSettings(); //保存配置
	
	resultUrl = baseUrl+'/xp.php?type='+ formTypeName +'&' + urlparam;				
	window.location = resultUrl;
	//alert(resultUrl);
	
    return false;
});
	
$(document).ready(function() {

	try{
		ThreeLevelCascader("province","city","dist", null);
		ThreeLevelCascader("province2","city2","dist2", null);
	}catch(e){				
	}
				
	var dpopt = {				
		theme: 'android-holo-light', //皮肤样式
        display: 'modal', //显示方式 
        mode: 'scroller', //日期选择模式
		lang:'zh',				
		animate:'pop',
		dateFormat:'yy-mm-dd',
		dateOrder:'yymmdd',
		timeFormat:'HH:ii',
        startYear:1800, //开始年份
        endYear:2100 //结束年份
	};			   
	
	try{
		restoreForm();
	}catch(e){				
	}
	
	$("#birthdate").mobiscroll().datetime(dpopt);		    
	$("#birthdates").mobiscroll().datetime(dpopt);	
	 if (formType == 2) {
		 $("#birthdate2").mobiscroll().datetime(dpopt);
		 $("#transitdate_merge").mobiscroll().datetime(dpopt);
	 }
 
    if (formType == 3 || formType == 4) {
    	$("#transitdate").mobiscroll(dpopt);
    }
              
});

function addZero(n){		
    	   if (n < 10)
    		   return "0" +   n;
	   else
		   return n;                
};

function setCurDate(id){
	 var dateNow = new Date();
	$("#"+id).val(dateNow.getFullYear() + "-" + addZero(dateNow.getMonth() + 1) + "-" + addZero(dateNow.getDate()) 
			+ " " + addZero(dateNow.getHours()) + ":" + addZero(dateNow.getMinutes()));
}	
	    
$("#setCurDateTime").click( function(){
	setCurDate("birthdate");       
});

$("#setCurDateTime2").click(function(){
	setCurDate("birthdate2");    	
});
   
$("#setCurDateTime3").click(function(){
	setCurDate("transitdate");    
});

$("#setCurDateTime4").click(function(){
	setCurDate("transitdate_merge");    
});

$("#setCurPlaceSame").click(function(){
	$('#province2').val($('#province').val()) ;
    $('#province2').change();
    $('#city2').val($('#city').val()) ;
     $('#city2').change();
    $('#dist2').val($('#dist').val()) ;
});

 var xpTypesDescript = {
	"comparision":       "比较盘是将两个人的命盘以其中一人为主体，看另一个人的行星分布在主体盘中的状况，以及两个人行星间产生的相位，来推出两人配合默契程度和缘分。",
	"composite":           "也称为组合盘，就是用一定的数学方法找到两个人命盘同行星的中点位置作为新的行星位置并以次画出的新的星盘，反映了两个人之间的互动关系。",
	"timespacemid":     "也称为戴维森关系盘，时空中点盘更偏向于对于二人关系的走向的预测，是对长时间相处后关系的发展方向、二人的感受等等的论断。",
	"marks":                   "在时空中点盘的基础上，再进一步和本命星盘进行组合，形成马克思盘。一般来说，马克思盘主要看的是两人长期的关系，感情深的情侣。",
	"synastry":                "将两个人的命盘以其中一人为主体，看另一个人的行星进入对方宫位的情况，推出两人间的关系，彼此是相好或是冤家，彼此的缘分深浅…等，对主体星盘的出生时间准确度有较高要求。",
	"transit":                   "行运盘是最基本的用于查看运势的星盘，可以推断此时此地的实时运势，如果出生地和居住地不在同一个地方，请在出生地点里面选择推运时刻居住所在地。",
	"progressed":           "推进盘以本命盘为主盘，以一天代表一年的进行次限推运盘为副盘，查看推运行星和本命行星直接形成的相位，从而推断推运年的年运势。",
	"secprogressed":      "次限盘以一天代表一年的推运方法。有两大功能：一是用来比较年与年运势的变化，二是通观人生大运的变化。它对时间时间的精确度要求很高。",
	"thirdprogressed":   "三限盘是以一天代表一月的推运方法。有两大功能：一是看一月运势，二是推算具体事件在哪个时段发生。它对时间时间的精确度要求很高。",
	"solarreturn":           "在每一年的某个时刻，行进中的太阳都会运行经过人出生时太阳的位置，我们可以以这个时刻为基准绘出星盘，这个星盘就称之为太阳反照盘。这张盘可以用来推断今年生日到次年生日一年之内的运势。<b><font color=\"red\">需要正确选择你推运时间时的居住城市</font></b>。",
	"lunarreturn":          "月亮返照，指的是从周期的角度来看，当月亮透过行运， 而回归到本命盘上的月亮所在位置的那一时刻、地点，所绘制出来的一张占星命盘，用以透视该月亮周期内（返照前后共约28天时间）的运势趋向。<b><font color=\"red\">需要正确选择你推运时间时的居住城市</font></b>。",
	"solararc":                "太阳弧，就是次限推进的太阳与命盘的太阳之间的弧度。次限推进太阳每前进一天，代表这个人生命前进一年。而太阳弧推运，就是将这个弧度应用到星盘上，结合行星和交点进行分析的方法。",
	"firdaria":                 "法达星限法源于波斯，是古典占星中常用到的一种推运工具。它跟我们以往接触的流年法或者太阳弧等推运法不同，它的重心不是看某个确切的时间点发生什么事，而是以宏观的视角把握运势起伏，看的是一种大趋势。",    	   
	"comp_secprogr":       "两人的次限组合中点盘，次限组合盘把静态的组合盘延伸成动态，以便按年来观察两人随着时间变化不同的相处关系，被大多数占星师广泛使用。",    	 
	"comp_thirprogr":      "两人的三限组合中点盘，三限组合盘把静态的组合盘延伸成动态，以便按月来观察两人随着时间变化不同的相处关系，被大多数占星师广泛使用。",    	 
	"tmsp_secprogr":       "时空中点盘的次限盘，时空次限盘在时空中点盘基础上进行次限推运，以便观察时空中点盘按年的变化和走势，被部分占星师广泛使用。",    	 
	"tmsp_thirprogr":      "时空中点盘的三限盘，时空三限盘在时空中点盘基础上进行三限推运，以便观察时空中点盘按月的变化和走势，被部分占星师广泛使用。",    	 
	"marks_secprogr":      "马克思盘的次限盘，马盘次限盘在马克思盘基础上进行次限推运，以便观察马克思盘按年的变化和走势，被部分占星师广泛使用。",    	 
	"marks_thirprogr":     "马克思盘的三限盘，马盘三限盘在马克思盘基础上进行三限推运，以便观察马克思盘按月的变化和走势，被部分占星师广泛使用。",    	 
};


$("#xptype").change(function(){
	formTypeName = $("#xptype").val();
    settingType = formTypeName;    
    initAdvStatus($.cookie("xp_planets_" + settingType), $.cookie("xp_aspects_" + settingType));
	xpDescript = xpTypesDescript[formTypeName];		
	xpName = $("#xptype").find("option:selected").text();
	html = "您当前选择了”<b>" + xpName + "</b>“，" + xpDescript;
	$("#xptype-descript").html(html);
	if (formTypeName=='comparision' || formTypeName=='marks' || formTypeName=='synastry'){
		$("#exchangeBirthInfo").css("display", "block");
	}
	else{
		$("#exchangeBirthInfo").css("display", "none");
	}

    if (formTypeName=='solarreturn' || formTypeName=='lunarreturn'){
        $("#place2").css("display", "block");
    }
    else{
        $("#place2").css("display", "none");
    }
    
    if (formTypeName.indexOf("_") > 0){
		$("#merge-luck-date").css("display", "block");
	}
	else{
		$("#merge-luck-date").css("display", "none");
	}
	
});

$("#xptype").val(formTypeName);
$("#xptype").change();
