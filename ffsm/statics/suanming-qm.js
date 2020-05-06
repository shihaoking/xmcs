function checkForm() {
	$('.lunpan_box').css('display','block');
	var username = document.login.username.value;
	if (username == "") {
		alert("没有填姓名！");
		document.login.username.focus();
		return false;
	}

    var phone = document.login.phone.value;
    if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){ 
        alert("手机号码有误，请重填"); 
      	document.login.phone.focus();
      $('.lunpan_box').css('display','none');
      event.preventDefault();
        return false; 
    } 

	var b_input = document.getElementById('birthday').getAttribute("data-date");
	
	var strs= new Array();
	strs=b_input.split("-");
	var y = strs[0];
	var m = strs[1];
	var d = strs[2];
	
	var ys = y;
	var ms = m;
	var ds = d;
	
	var h = document.login.h.value;
	var i = document.login.i.value;
	m = m - 1;
	d = d - 1;
	var sTermInfo = new Array(0, 21198, 42461, 63813, 85308, 106961, 128806, 150834, 173055, 195433, 217965, 240558, 263215, 285853, 308440, 330912, 353245, 375400, 397371, 419149, 440750, 462193, 483513, 504747);

	function wzc(year, num) {
		var objD = new Date((31556956000 * (year - 1882) + sTermInfo[num] * 60000) + Date.UTC(1882, 0, 5, 18, 0));
		var hh = objD.getUTCHours();
		var mm = objD.getUTCMinutes();
		var ss = objD.getUTCSeconds();
		var s = num + '/(' + (objD.getUTCMonth() + 1) + "月" + objD.getUTCDate() + "日" + hh + ":" + mm + ')';
		return (s);
	}

	function sTerm_d(y, n) {
		var offDate = new Date((31556956000 * (y - 1882) + sTermInfo[n] * 60000) + Date.UTC(1882, 0, 5, 18, 0));
		return (offDate.getUTCDate());
	}

	function sTerm_hi(y, n) {
		var offDate = new Date((31556956000 * (y - 1882) + sTermInfo[n] * 60000) + Date.UTC(1882, 0, 5, 18, 0));
		var hi = offDate.getUTCHours() * 60 + offDate.getUTCMinutes();
		return (hi);
	}

	function sTerm_s(y, n) {
		var offDate = new Date((31556956000 * (y - 1882) + sTermInfo[n] * 60000) + Date.UTC(1882, 0, 5, 18, 0));
		return (offDate);
	}
	var cY, cM, cD, cH;
	if (m < 2) cY = y - 1900 + 36 - 1;
	else cY = y - 1900 + 36;
	var term2 = sTerm_d(y, 2);
	if (m == 1 && (d + 1) > term2) cY = y - 1900 + 36;
	if (m == 1 && (d + 1) == term2 && (h * 60 + i) >= sTerm_hi(y, 2)) cY = y - 1900 + 36;
	var firstNode = sTerm_d(y, m * 2);
	cM = (y - 1900) * 12 + m + 12;
	var start_term = (Date.UTC(y, m, d + 1, h, i, 0, 0) - sTerm_s(y, m * 2 - 2)) / 1000;
	var start_term1 = wzc(y, m * 2 - 2);
	if (m == 0) {
		start_term = (Date.UTC(y, m, d + 1, h, i, 0, 0) - sTerm_s(y - 1, 22)) / 1000;
		start_term1 = wzc(y - 1, 22);
	}
	var end_term = (sTerm_s(y, m * 2) - Date.UTC(y, m, d + 1, h, i, 0)) / 1000;
	var end_term1 = wzc(y, m * 2);

	if ((d + 1) > firstNode || ((d + 1) == firstNode && (h * 60 + i * 1) >= sTerm_hi(y, m * 2))) {
		cM = (y - 1900) * 12 + m + 13;
		start_term = (Date.UTC(y, m, d + 1, h, i, 0, 0) - sTerm_s(y, m * 2)) / 1000;
		start_term1 = wzc(y, m * 2);
		end_term = (sTerm_s(y, m * 2 + 2) - Date.UTC(y, m, d + 1, h, i, 0)) / 1000;
		end_term1 = wzc(y, m * 2 + 2);
		if (m == 11) {
			end_term = (sTerm_s(y + 1, 0) - Date.UTC(y, m, d + 1, h, i, 0, 0)) / 1000;
			end_term1 = wzc(y + 1, 0);
		}
	}

	if (start_term < 0) start_term = 0;
	if (end_term < 0) end_term = 0;
	var dayCyclical = Date.UTC(y, m, 1, 0, 0, 0, 0) / 86400000 + 25567 + 10;
	cD = dayCyclical + d;
	if (h >= 23) cD = dayCyclical + d + 1;
	var nh;
	if (h == 23 || h == 1 || h == 3 || h == 5 || h == 7 || h == 9 || h == 11 || h == 13 || h == 15 || h == 17 || h == 19 || h == 21) {
		nh = h - 1;
		nh = nh + 2;
	} else {
		nh = h;
	}
	var houseCyclical = (Date.UTC(y, m, d + 1, nh, 0, 0, 0) / 3600000 + 25567 * 24) / 2;
	cH = houseCyclical;
	var lunarInfo = new Array(
	0x4bd8, 0x4ae0, 0xa570, 0x54d5, 0xd260, 0xd950, 0x5554, 0x56af, 0x9ad0, 0x55d2, 0x4ae0, 0xa5b6, 0xa4d0, 0xd250, 0xd295, 0xb54f, 0xd6a0, 0xada2, 0x95b0, 0x4977, 0x497f, 0xa4b0, 0xb4b5, 0x6a50, 0x6d40, 0xab54, 0x2b6f, 0x9570, 0x52f2, 0x4970, 0x6566, 0xd4a0, 0xea50, 0x6a95, 0x5adf, 0x2b60, 0x86e3, 0x92ef, 0xc8d7, 0xc95f, 0xd4a0, 0xd8a6, 0xb55f, 0x56a0, 0xa5b4, 0x25df, 0x92d0, 0xd2b2, 0xa950, 0xb557, 0x6ca0, 0xb550, 0x5355, 0x4daf, 0xa5b0, 0x4573, 0x52bf, 0xa9a8, 0xe950, 0x6aa0, 0xaea6, 0xab50, 0x4b60, 0xaae4, 0xa570, 0x5260, 0xf263, 0xd950, 0x5b57, 0x56a0, 0x96d0, 0x4dd5, 0x4ad0, 0xa4d0, 0xd4d4, 0xd250, 0xd558, 0xb540, 0xb6a0, 0x95a6, 0x95bf, 0x49b0, 0xa974, 0xa4b0, 0xb27a, 0x6a50, 0x6d40, 0xaf46, 0xab60, 0x9570, 0x4af5, 0x4970, 0x64b0, 0x74a3, 0xea50, 0x6b58, 0x5ac0, 0xab60, 0x96d5, 0x92e0, 0xc960, 0xd954, 0xd4a0, 0xda50, 0x7552, 0x56a0, 0xabb7, 0x25d0, 0x92d0, 0xcab5, 0xa950, 0xb4a0, 0xbaa4, 0xad50, 0x55d9, 0x4ba0, 0xa5b0, 0x5176, 0x52bf, 0xa930, 0x7954, 0x6aa0, 0xad50, 0x5b52, 0x4b60, 0xa6e6, 0xa4e0, 0xd260, 0xea65, 0xd530, 0x5aa0, 0x76a3, 0x96d0, 0x4afb, 0x4ad0, 0xa4d0, 0xd0b6, 0xd25f, 0xd520, 0xdd45, 0xb5a0, 0x56d0, 0x55b2, 0x49b0, 0xa577, 0xa4b0, 0xaa50, 0xb255, 0x6d2f, 0xada0, 0x4b63, 0x937f, 0x49f8, 0x4970, 0x64b0, 0x68a6, 0xea5f, 0x6b20, 0xa6c4, 0xaaef, 0x92e0, 0xd2e3, 0xc960, 0xd557, 0xd4a0, 0xda50, 0x5d55, 0x56a0, 0xa6d0, 0x55d4, 0x52d0, 0xa9b8, 0xa950, 0xb4a0, 0xb6a6, 0xad50, 0x55a0, 0xaba4, 0xa5b0, 0x52b0, 0xb273, 0x6930, 0x7337, 0x6aa0, 0xad50, 0x4b55, 0x4b6f, 0xa570, 0x54e4, 0xd260, 0xe968, 0xd520, 0xdaa0, 0x6aa6, 0x56df, 0x4ae0, 0xa9d4, 0xa4d0, 0xd150, 0xf252, 0xd520);
	var nStr1 = new Array('○', '一', '二', '三', '四', '五', '六', '七', '八', '九', '十');
	var nStr2 = new Array('初', '十', '廿', '卅');
	var monthName = new Array("", "正", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二");

	function lYearDays(y) {
		var i, sum = 348;
		for (i = 0x8000; i > 0x8; i >>= 1) sum += (lunarInfo[y - 1900] & i) ? 1 : 0;
		return (sum + leapDays(y));
	}

	function leapDays(y) {
		if (leapMonth(y)) return ((lunarInfo[y - 1899] & 0xf) == 0xf ? 30 : 29);
		else return (0);
	}

	function leapMonth(y) {
		var lm = lunarInfo[y - 1900] & 0xf;
		return (lm == 0xf ? 0 : lm);
	}

	function monthDays(y, m) {
		return ((lunarInfo[y - 1900] & (0x10000 >> m)) ? 30 : 29);
	}



	function Lunar(objDate) {
		var i, leap = 0,
			temp = 0;
		var offset = (Date.UTC(objDate.getFullYear(), objDate.getMonth(), objDate.getDate()) - Date.UTC(1900, 0, 31)) / 86400000;
		if (objDate.getHours() >= 23) {
			offset++;
		}
		for (i = 1900; i < 2100 && offset > 0; i++) {
			temp = lYearDays(i);
			offset -= temp;
		}
		if (offset < 0) {
			offset += temp;
			i--;
		}
		this.year = i;
		leap = leapMonth(i);
		this.isLeap = false;
		for (i = 1; i < 13 && offset > 0; i++) {
			if (leap > 0 && i == (leap + 1) && this.isLeap == false) {
				--i;
				this.isLeap = true;
				temp = leapDays(this.year);
			} else {
				temp = monthDays(this.year, i);
			}
			if (this.isLeap == true && i == (leap + 1)) this.isLeap = false;
			offset -= temp;
		}
		if (offset == 0 && leap > 0 && i == leap + 1) if (this.isLeap) {
			this.isLeap = false;
		} else {
			this.isLeap = true;
			--i;
		}
		if (offset < 0) {
			offset += temp;
			--i;
		}
		this.month = i;
		this.day = offset + 1;
	}




	function cYear(y) {
		var s;
		s = nStr1[Math.floor(y / 1000)];
		s += nStr1[Math.floor((y % 1000) / 100)];
		s += nStr1[Math.floor((y % 100) / 10)];
		s += nStr1[y % 10];
		return (s);
	}

	function cDay(d) {
		var s;
		switch (d) {
		case 10:
			s = '初十';
			break;
		case 20:
			s = '二十';
			break;
			break;
		case 30:
			s = '三十';
			break;
			break;
		default:
			s = nStr2[Math.floor(d / 10)];
			s += nStr1[d % 10];
		}
		return (s);
	}

	function lll(y, m, i, h) {
		var hh=["00:00-00:59早子", "01:00-01:59丑", "02:00-02:59丑", "03:00-03:59寅", "04:00-04:59寅", "05:00-05:59卯", "06:00-06:59卯", "07:00-07:59辰", "08:00-08:59辰", "09:00-09:59巳", "10:00-10:59巳", "11:00-11:59午", "12:00-12:59午", "13:00-13:59未", "14:00-14:59未", "15:00-15:59申", "16:00-16:59申", "17:00-17:59酉", "18:00-18:59酉", "19:00-19:59戌", "20:00-20:59戌", "21:00-21:59亥", "22:00-22:59亥", "23:00-23:59晚子"];
		var sDObj = new Date(y, m, i + 1, h);
		var lDObj = new Lunar(sDObj);
		var lY = cYear(lDObj.year);
		var lM = monthName[lDObj.month];
		var lD = cDay(lDObj.day);
		var lL = lDObj.isLeap ? '闰' : '';
		if(h>=0 && h<24){
			var lS =hh[h];
		}else{
			var lS ='未知';
		}
		var lH = lDObj.isLeap ? '闰' : '';
		
		return (lY + '年' + lL + lM + '月' + lD + '日' + ' '+lS+'时' )
	}
	var lDate = lll(y, m, d, h);
	
	login.y.value = ys;
	login.m.value = ms;
	login.d.value = ds;
	
	login.cY.value = cY;
	login.cM.value = cM;
	login.cD.value = cD;
	login.cH.value = cH;
	login.term1.value = wzc(y, m * 2);
	login.term2.value = wzc(y, m * 2 + 1);
	login.start_term.value = start_term;
	login.end_term.value = end_term;
	login.start_term1.value = start_term1;
	login.end_term1.value = end_term1;
	login.lDate.value = lDate;
}