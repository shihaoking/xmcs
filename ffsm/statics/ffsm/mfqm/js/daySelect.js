(function($,window,document,undefined){
	$.fn.jqScrollImg = function(params,fnEnd){
		var defaults = params || {
			year: '#year',
			month: '#month',
			day: '#day',
			def_day:'时辰不清楚',
			def_value: 0,
			hour: '#hour',
			minutes: '#minutes'

		};

		var $Year = $(defaults.year),
			$Month = $(defaults.month),
			$Day = $(defaults.day),
			sDef_day = defaults.def_day,
			nDef_value = defaults.def_value,
			$Hour = $(defaults.hour),
			$Minutes = $(defaults.minutes);
		//初始化
		var str = '<option value="'+nDef_value+'" >'+sDef_day+'</option>';
		$Year.html(str);
		$Month.html(str);
		$Day.html(str);
		$Hour.html(str);
		$Minutes.html(str);

		var oDate=new Date();

		//年份
		var nowYear = oDate.getFullYear(),
			nextYear = nowYear+1,
			defYear = $Year.attr("def");
		/*for(var i=1900; i<=nextYear; i++){
			var yStr = '<option value="'+i+'">'+i+'</option>';
			$Year.prepend(yStr);
		}*/
		for(var i = nextYear; i >= 1900; i--){
			var defY = $Year.attr("def");
			if(i == defY){
				var yStr = '<option value="'+i+'" selected>'+i+'</option>';
			}else{
				var yStr = '<option value="'+i+'">'+i+'</option>';
			}
			$Year.append(yStr);
		}
		//月份
		for(var i =1; i <= 12; i++){
			var defM = $Month.attr("def");
			if(i == defM){
				var mStr = '<option value="'+i+'" selected>'+i+'</option>';
			}else{
				var mStr = '<option value="'+i+'">'+i+'</option>';
			}
			$Month.append(mStr);
		}
		//日期
		function setDay(){
			if($Year.val() ==0 || $Month.val() == 0){
				$Day.html(str);
			}else{
                var sel_year = parseInt($Year.val());
                var sel_month = parseInt($Month.val());
                var dayCount = 0;
                switch (sel_month) {
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        dayCount = 31;
                        break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        dayCount = 30;
                        break;
                    case 2:
                        dayCount = 28;
                        if ((sel_year % 4 == 0) && (sel_year % 100 != 0) || (sel_year % 400 == 0)) {
                            dayCount = 29;
                        }
                        break;
                    default:
                        break;
                }
				var defD = $Day.attr('def');
                for (var i = 1; i <= dayCount; i++) {
					if(i == defD){
						var dStr = '<option value="'+i+'" selected>'+i+'</option>';
					}else{
						var dStr = '<option value="'+i+'">'+i+'</option>';
					}
					$Day.append(dStr);
                }
			}
		}
		setDay();
        $Year.change(function () {
            setDay();
        });
        $Month.change(function () {
            setDay();
        });

        //时
        var nowHour = oDate.getHours();
        var defH = $Hour.attr("def") ? $Hour.attr("def") : nowHour;
        for(var i=1; i<=24; i++){
			if(i == defH){
				var hStr = '<option value="'+i+'" selected>'+i+'</option>';
			}else{
				var hStr = '<option value="'+i+'">'+i+'</option>';
			}
			$Hour.append(hStr);
        }
        //分
        var nowMinutes = oDate.getMinutes();
        var defMin = $Minutes.attr("def") ? $Minutes.attr("def") : nowMinutes;
        for(var i=1; i<=60; i++){
			if(i == defMin){
				var minStr = '<option value="'+i+'" selected>'+i+'</option>';
			}else{
				var minStr = '<option value="'+i+'">'+i+'</option>';
			}
			$Minutes.append(minStr);
        }
	};
})(jQuery,window,document);

