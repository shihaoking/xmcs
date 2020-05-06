/**
*　事符格式化
*/
String.format = function(str) {
    var args = arguments, re = new RegExp("%([1-" + args.length + "])", "g");
    return String(str).replace(
    re,
    function($1, $2) {
        return args[$2];
    }
    );
};

var Util = {};

Util.Config = {
    //遮罩层背景颜色
    Screen_Background: "#fff",
    //遮罩层透明度
    Screen_Opacity: "5",
    //遮罩层内容背景颜色
    Screen_ContentBg: "transparent",
    Screen_PositionTop:"0",
    Screen_PositionLeft:"50%",
	
    TextBoxDefaultColor: "#666",
    TextBoxActiveColor:"#000"
}

Util.Copy = function(pStr,hasReturn){
	var result = false;
    //IE
    if(window.clipboardData)
    {
        window.clipboardData.clearData();
        result = window.clipboardData.setData("Text", pStr);
    }
    //FireFox
    else if (window.netscape)
    {
        try
        {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        }
        catch (e)
        {
            alert("您的firefox安全限制限制您进行剪贴板操作，请打开'about:config'将signed.applets.codebase_principal_support'设置为true'之后重试");
            return result;
        }
        var clip = Components.classes["@mozilla.org/widget/clipboard;1"].createInstance(Components.interfaces.nsIClipboard);
        if (!clip)
        	return result;
        var trans = Components.classes["@mozilla.org/widget/transferable;1"].createInstance(Components.interfaces.nsITransferable);
        if (!trans)
        	return result;
			
        trans.addDataFlavor('text/unicode');
        var str = new Object();
        var len = new Object();
        var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
        var copytext = pStr;
        str.data = copytext;
        trans.setTransferData("text/unicode",str,copytext.length*2);
        var clipid = Components.interfaces.nsIClipboard;
        if (!clip)
        	return result;
        clip.setData(trans,null,clipid.kGlobalClipboard);
		result = true;
    }
	if(hasReturn){
    	return result;
	}
	else{
		if(result){
			alert("内容已复制至剪贴板!");
		}
		else{
			alert("复制失败! 您使用的浏览器不支持复制功能.");
		}
	}
}

/*
* 弹出层
*/
Util.ScreenManager = {
    /*Public 隐藏方法*/
    Hide: function(doFun){
        this.canClose = true;
        this.popCoverDiv(false);
        if(doFun){
            doFun();
        }
    },
    /*Public 显示方法*/
    Show: function(containBox,isClickHide){
        if(isClickHide != undefined){
            Util.ScreenManager.IsClickHide = isClickHide;
        }
        else{
            Util.ScreenManager.IsClickHide = false;
        }
        this.popCoverDiv(true,containBox);
    },
	Gone: function(containBox){
		Util.ScreenManager.IsClickHide = true;
        this.popCoverDiv(true,containBox,true);
	},
    //取得页面的高宽
    getBodySize: function (){
        var bodySize = [];
        with(document.documentElement) {
            bodySize[0] = (scrollWidth>clientWidth)?scrollWidth:clientWidth;//如果滚动条的宽度大于页面的宽度，取得滚动条的宽度，否则取页面宽度
            bodySize[1] = (scrollHeight>clientHeight)?scrollHeight:clientHeight;//如果滚动条的高度大于页面的高度，取得滚动条的高度，否则取高度
        }
        return bodySize;
    },
    config:{
        cachebox:"screen_cache_box",/*缓存层*/
        contentbox:"screen_content_box",/*内容层*/
        coverbox:"screen_cover_div",/*透明层*/
        gonebox:"screen_gone_box",	/*移位缓存层*/
    	contentwidth:400
	},
    canClose:true,
    ShowSelfControl:function(containBox,showFun){
        Util.ScreenManager.IsClickHide = true;
        this.popCoverDiv(3,containBox,undefined,showFun);
    },
    //创建遮盖层
    popCoverDiv: function (isShow,containBox,isGone,showFun){
		if(typeof isGone == 'undefined'){
			isGone = false;
		}
        var screenBox = document.getElementById(Util.ScreenManager.config.coverbox);
        if (!screenBox) {
            //如果存在遮盖层，则让其显示
            //否则创建遮盖层
            var coverDiv = document.createElement('div');
            document.body.appendChild(coverDiv);
            coverDiv.id = Util.ScreenManager.config.coverbox;
            var bodySize;
            with(coverDiv.style) {
                if ($.browser.msie && $.browser.version == 6) {
                    position = 'absolute';
                    background = Util.Config.Screen_Background;
                    left = '0px';
                    top = '0px';
                    bodySize = this.getBodySize();
                    width = '100%';
                    height = bodySize[1] + 'px';
                }
                else{
                    position = 'fixed';
                    background = Util.Config.Screen_Background;
                    left = '0';
                    top = '0';
                    width = '100%'
                    height = '100%';
                }
                zIndex = 99;
                if ($.browser.msie) {
                    filter = "Alpha(Opacity=" + Util.Config.Screen_Opacity + "0)";	//IE逆境
                } else {
                    opacity = Number("0."+Util.Config.Screen_Opacity);
                }
            }
            coverDiv.onclick = function(){
                if(Util.ScreenManager.canClose){
                    if(Util.ScreenManager.IsClickHide == undefined || Util.ScreenManager.IsClickHide == false){
                        coverDiv.style.display = "none";
                        document.getElementById(Util.ScreenManager.config.contentbox).style.display = "none";
                    }
                }
            };

            var contentDiv = document.createElement("div");
            contentDiv.id = Util.ScreenManager.config.contentbox;
			var contentWidth = $(containBox).width();
            with(contentDiv.style){
                position = "absolute";
                backgroundColor = Util.Config.Screen_ContentBg;
                var widthNum = contentWidth || Util.ScreenManager.config.contentwidth;
                width = widthNum + "px";
                left = Util.Config.Screen_PositionLeft;
                var mfNum = widthNum/2;
                marginLeft = "-" + mfNum + 'px';
                top = Util.Config.Screen_PositionTop;
                zIndex = 100;
            }


            document.body.appendChild(contentDiv);
            contentDiv.onmouseover = function(){
                Util.ScreenManager.canClose = false;
            };

            contentDiv.onmouseout = function(){
                Util.ScreenManager.canClose = true;
            };
            screenBox = contentDiv;
        }
        screenBox.style.display = isShow ? "block" : "none" ;
        if(isShow == 3){
            if(showFun){
                showFun();
            }
        }
        else{
            
            if(isShow && containBox){
                //创建Cache Box
				var cacheEle;
				var cacheBox = document.getElementById(Util.ScreenManager.config.cachebox);
				if(!cacheBox){
					var cBox = document.createElement("div");
					document.body.appendChild(cBox);
					cBox.id = Util.ScreenManager.config.cachebox;
					cBox.style.display = "none";
					cacheBox = cBox;
				}
				cacheEle = cacheBox;

                var cBox = document.getElementById(Util.ScreenManager.config.contentbox);
                var contentNodes = cBox.childNodes;
                for(var i = 0,len = contentNodes.length; i < len; i++){
                    cacheEle.appendChild(contentNodes[i]);
                }
                containBox.style.display = "";
				
                cBox.appendChild(containBox);
				var tops = Util.ScreenManager.GetScrollTop() + 100;
				cBox.style.top = tops + "px";
            }
			else{
				if(!isGone){
					var goneBox = document.getElementById(Util.ScreenManager.config.gonebox);
					if(!goneBox){
						var gBox = document.createElement("div");
						document.body.appendChild(gBox);
						gBox.id = Util.ScreenManager.config.gonebox;
						gBox.style.display = "none";
						//gBox.style.position = "absolute";
						//gBox.style.left = "-9999px";
						goneBox = gBox;
					}
					var cBox = document.getElementById(Util.ScreenManager.config.contentbox);
					var contentNodes = cBox.childNodes;
					for(var i = 0,len = contentNodes.length; i < len; i++){
						goneBox.appendChild(contentNodes[i]);
					}
				}
			}
			document.getElementById(Util.ScreenManager.config.contentbox).style.display = isShow ? "block" : "none" ;
        }
		
		var hide_tags = ["select"];
		if(isShow){
			for(var iN = 0,Nlen = hide_tags.length; iN < Nlen; iN++){
				var selList = document.getElementsByTagName(hide_tags[iN]);
				for(var i = 0,len = selList.length; i < len; i++){
					selList[i].style.visibility = "hidden";
				}
				selList = containBox.getElementsByTagName(hide_tags[iN]);
				for(var i = 0,len = selList.length; i < len; i++){
					selList[i].style.visibility = "";
				}
			}
		}
		else{
			for(var iN = 0,Nlen = hide_tags.length; iN < Nlen; iN++){
				var selList = document.getElementsByTagName(hide_tags[iN]);
				for(var i = 0,len = selList.length; i < len; i++){
					selList[i].style.visibility = "";
				}
			}
		}
		
        this.canClose = true;
    },
	GetScrollTop:function(){
        var scrollTop=0;
        if(document.documentElement&&document.documentElement.scrollTop){
            scrollTop=document.documentElement.scrollTop;
        }else if(document.body){
            scrollTop=document.body.scrollTop;
        }
        return scrollTop;
    }
}

Util.Date = {
	GetTimeText:function(num){
		var arr = [3600,60];
		var result = "";
		for(var i = 0,len = arr.length; i < len; i++){
			var item = arr[i];
			if(num >= item){
				var s = (num / item).toFixed(0);
				result += Util.Date._getDoubleText(s) + ":";
				num = num % item;
			}
			else{
				result += "00:";
			}
		}
		result += Util.Date._getDoubleText(num);
		return result;
	},
	_getDoubleText: function(num){
		if(num.toString().length > 1){
			return num;
		}
		else{
			return "0" + num.toString();
		}
	}
}

Util.Cookie = {
    Get:function(name){
        var cookieValue = null;
        var search = name + "=";
        if (document.cookie.length > 0) {
            offset = document.cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = document.cookie.indexOf(";", offset);
                if (end == -1)
                end = document.cookie.length;
                cookieValue = unescape(document.cookie.substring(offset, end));
            }
        }
        return cookieValue;
    },
    Set:function(name, value, hours){
        var expire = "";
        if (hours != null) {
            expire = new Date((new Date()).getTime() + hours * 3600000);
            expire = "; expires=" + expire.toGMTString();
        }
        document.cookie = name + "=" + escape(value) + expire +";path=/";
    }
}

/**
* 验证
*/
Util.Validate = {
	_reg:{
		intege:"^-?[1-9]\\d*$",					//整数
		intege1:"^[1-9]\\d*$",					//正整数
		intege2:"^-[1-9]\\d*$",					//负整数
		num:"^([+-]?)\\d*\\.?\\d+$",			//数字
		num1:"^[1-9]\\d*|0$",					//正数（正整数 + 0）
		num2:"^-[1-9]\\d*|0$",					//负数（负整数 + 0）
		decmal:"^([+-]?)\\d*\\.\\d+$",			//浮点数
		decmal1:/^[0-9]*.?\d*$/,　　	//正浮点数
		decmal2:"^-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*)$",　 //负浮点数
		decmal3:"^-?([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0)$",　 //浮点数
		decmal4:"^[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0$",　　 //非负浮点数（正浮点数 + 0）
		decmal5:"^(-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*))|0?.0+|0$",　　//非正浮点数（负浮点数 + 0）
	
		email:/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, //邮件
		color:"^[a-fA-F0-9]{6}$",				//颜色
		url:"^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&=]*)?$",	//url
		chinese:"^[\\u4E00-\\u9FA5\\uF900-\\uFA2D]+$",					//仅中文
		ascii:"^[\\x00-\\xFF]+$",				//仅ACSII字符
		zipcode:"^\\d{6}$",						//邮编
		mobile:/^(13[0-9]|15[0|1|2|3|5|6|7|8|9]|14[7|5]|18[0|5|6|7|8|9])\d{8}$/,				//手机
		ip4:"^(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)$",	//ip地址
		notempty:function(value){ return value.length > 0;},						//非空
		picture:"(.*)\\.(jpg|bmp|gif|ico|pcx|jpeg|tif|png|raw|tga)$",	//图片
		rar:"(.*)\\.(rar|zip|7zip|tgz)$",								//压缩文件
		date:"^\\d{4}(\\-|\\/|\.)\\d{1,2}\\1\\d{1,2}$",					//日期
		qq:"^[1-9]*[1-9][0-9]*$",				//QQ号码
		tel:"^(([0\\+]\\d{2,3}(-)?)?(0\\d{2,3})(-)?)?(\\d{7,8})(-(\\d{3,}))?$",	//电话号码的函数(包括验证国内区号,国际区号,分机号)
		name:"^[\\u4E00-\\u9FA5\\uF900-\\uFA2Da-zA-Z]([\\s.]?[\\u4E00-\\u9FA5\\uF900-\\uFA2Da-zA-Z]+){1,}$", //真实姓名由汉字、英文字母、空格和点组成，不能以空格开头至少两个字
		addressname:"^[\\u4E00-\\u9FA5\\uF900-\\uFA2Da-zA-Z]{1,}$",	//收货人
		username:"^[0-9a-zA-Z_\u0391-\uFFE5]{2,15}$",					//用来用户注册。匹配由数字、26个英文字母中文或者下划线组成的字符串 3-15个字符串之间 
		letter:"^[A-Za-z]+$",					//字母
		letter_u:"^[A-Z]+$",					//大写字母
		letter_l:"^[a-z]+$",					//小写字母
		idcard:"^[1-9]([0-9]{14}|[0-9]{16}[0-9xX])$",	//身份证
        passwrd:"^[\\w-@#$%^&*]{6,20}$"         //密码保证6-20位的英文字母/数字/下划线/减号和@#$%^&*这些符号
	},
	Check: function(type,value){
		if(Util.Validate._reg[type] == undefined){
			alert("Type " + type + " is not in the data");
			return false;
		}
		var reg;
		if(typeof Util.Validate._reg[type] == "string"){
			reg = new RegExp(Util.Validate._reg[type]);
		}
		else if((typeof Util.Validate._reg[type]) == "function"){
			return Util.Validate._reg[type](value);
		}
		else{
			reg = Util.Validate._reg[type];
		}
		return reg.test(value);
	},
    mb_strlen: function(str){
        var offset = 0;
        for(var i=0; i<str.length; i++){
            var string = str.substr(i,1);
            if(escape(string).substr(0,2)=="%u"){
                offset +=3;
            }
            else{
                offset +=1;
            }
        }
        return offset;
    },
	BindForm: function(ele,handler){
		var form = $(ele);
		form.submit(function(){
			if($(this).attr("notvali") == "1"){
				return true;
			}
			var state = true;
			var errorArr = {};
			var checkArr = form.find("[vali]");
			var allArr = {};
			for(var i = 0,len = checkArr.length; i < len; i++){
				var typeArr = $(checkArr[i]).attr("vali").split("|");
				for(var j = 0,jlen = typeArr.length; j < jlen; j++){
					allArr[i.toString()] = checkArr[i];
					if(!(Util.Validate.Check(typeArr[j],$(checkArr[i]).val()) ||  ($(checkArr[i]).attr("require") == "0" && $.trim($(checkArr[i]).val()) == ""))){
						state = false;
						if(!errorArr[i.toString()]){
							errorArr[i.toString()] = checkArr[i];
						}
						break;
					}
					if(typeArr[j] == "notempty"){
						var min = $(checkArr[i]).attr("min") ? Number($(checkArr[i]).attr("min")) : 0;
						var max = $(checkArr[i]).attr("max") ? Number($(checkArr[i]).attr("max")) : -1;
						var count = $.trim(checkArr[i].value).length;
						if(!(min <= count && (max == -1 || max >= count))){
							state = false;
							if(!errorArr[i.toString()]){
								errorArr[i.toString()] = checkArr[i];
							}
						}
					}
				}
			}
			if(handler && handler.DefaultCallBack){
				handler.DefaultCallBack(allArr);
			}
			if(handler && handler.ErrorCallBack){
				handler.ErrorCallBack(errorArr);
			}	
			if(handler && handler.ReturnCallBack){
				return handler.ReturnCallBack($(this),state);
			}
			else{
				return state;
			}
		});
	},
	CheckDate: function (year, month, day ) {
		var myDate = new Date();
		myDate.setFullYear( year, (month - 1), day );
		return ((myDate.getMonth()+1) == month && day<32); 
	}
};

Util.TabManager = function(pList,pActiveStyle,pDisableStyle){
	var _self = this;
	var _obj = {
		List: pList,
		ActiveStyle: pActiveStyle,
		DisableStyle: pDisableStyle
	};
	var _ChangeHandler;
	var time ;
	var _autoTimer;
	this._autoTimeOut = 3000;
	var overObj;
	var activeIndex;
	var _autostate = false;
	function display(){
		for(var j = 0; j < _obj.List.length; j++){
			var ele = _obj.List[j].Tab;
			ele.removeClass(_obj.ActiveStyle);
			ele.addClass(_obj.DisableStyle);
			_obj.List[j].Content.hide();
		}
		
		overObj.Tab.addClass(_obj.ActiveStyle);
		overObj.Content.show();
		if(_ChangeHandler){
			_ChangeHandler(overObj);
		}
	}
	
	function autoDisplay(){
		activeIndex++;
		if(activeIndex >= _obj.List.length){
			activeIndex = 0;
		}
		overObj = _obj.List[activeIndex];
		display();
	}
	
	var init = function(){
		for(var i = 0; i < _obj.List.length; i++){
			var item = _obj.List[i];
			item.Tab.bind("mouseover",{obj:item,index:i},function(e){
				overObj = e.data.obj;
				activeIndex = e.data.index;
				time = window.setTimeout(display,300);
				_self.SetAuto(_autostate);
			}).bind("click",{obj:item,index:i},function(e){
				overObj = e.data.obj;
				activeIndex = e.data.index;
				if(time != undefined){
					window.clearTimeout(time);
				}
				display();
				this.blur();
				_self.SetAuto(_autostate);
			}).bind("mouseout",function(){
				if(time != undefined){
					window.clearTimeout(time);
				}
			});
		}
		
	}
	this.SetAuto = function(v){
		if(_autoTimer){
			window.clearInterval(_autoTimer);
		}
		if(v){
			_autoTimer = window.setInterval(autoDisplay,_self._autoTimeOut);
		}
		_autostate = v;
	}
	this.SetChangeHandler = function(pHandler){
		_ChangeHandler = pHandler;
	},
	this.Select = function(key){
		activeIndex = key;
		overObj = _obj.List[key];
		display();
	}
	init();
}

Util.TextBox = {
    BindDefaultText: function(ele,text){
		if(ele.value == ""){
			ele.style.color = Util.Config.TextBoxDefaultColor;
       	 	ele.value = text;
		}
		else if(ele.value == text){
			ele.style.color = Util.Config.TextBoxDefaultColor;
		}
        
        ele.onblur = function(){
            if(ele.value == ""){
                ele.value = text;
                ele.style.color = Util.Config.TextBoxDefaultColor;
            }
            else{
                ele.style.color = Util.Config.TextBoxActiveColor;
            }
        };
        ele.onfocus = function(){
            ele.style.color = Util.Config.TextBoxActiveColor;
            if(ele.value == text){
                ele.value = "";
            }
        };
        ele.GetValue = function(){
            if(ele.value == text){
                return "";
            }
            return ele.value;
        };
		ele.Clear = function(){
			ele.value = "";
			ele.onblur();
		};
        return ele;
    },
	BindInt: function(ele,config){
		var box = $(ele);
		box.bind("focus",function(){
			this.select();
		}).bind("blur",function(){
			if($.trim(this.value) == ""){
				var defaultNum = 1;
				if(config && config.min != undefined){
					defaultNum = config.min;
				}
				this.value = defaultNum;
			}
			else{
				if(config && config.min && config.min>Number(this.value)){
					this.value = config.min;
				}
			}
		});
		box.keydown(function(e){
			if(e.ctrlKey){
				return true;
			}
			if(e.altKey){
				return true;
			}
			if(e.metaKey){
				return true;
			}
			return ((e.keyCode > 45 && e.keyCode < 58) || (e.keyCode > 36 && e.keyCode < 41) || (e.keyCode > 95 && e.keyCode < 106) || e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 110 || e.keyCode == 190 || e.keyCode == 13);
		})
	},
	BindEmail: function(ele){
		var box = $(ele);
		box.bind("focus",function(){this.select();});
		box.keyup(function(e){
			var t = '';
			with(this.value) { 
				for (var i = 0; i < length; i++)
					t += (65296 <= charCodeAt(i) && charCodeAt(i) <= 65305) ? String.fromCharCode(charCodeAt(i) - 65248) : charAt(i); 
			}
			this.value = t;
		});
	}
}

Util.DropDown = (function(){
	var _data = [];
	var _activeIndex = -1;
	var showContent = function(){
		var item = _data[_activeIndex];
		if(item.main){
			if(!item.main.shown){
				item.content.hide();
			}
			else{
				item.content.show();
			}
		}
	}
	var Return = {
		Bind: function(main,content){
			main = $(main);
			content = $(content);
			var index = _data.push({main:main,content:content}) - 1;
			main.shown = 0;
			content.hide();
			main.bind("mouseover",{index:index},function(e){
				var item = _data[_activeIndex];
				if(item){
					if(item.main.timer){
						item.main.shown = 0;
						window.clearTimeout(item.main.timer);
						showContent();
					}
				}
				_activeIndex = e.data.index;
				item = _data[_activeIndex];
				item.main.shown = 1;
				item.main.timer = window.setTimeout(showContent,400);
			}).bind("mouseout",{index:index},function(e){
				_activeIndex = e.data.index;
				var item = _data[_activeIndex];
				if(item && item.main.timer){
					window.clearTimeout(item.main.timer);
				}
				item.main.shown = 0;
				item.main.timer = window.setTimeout(showContent,400);
			}).bind("click",{index:index},function(e){
				var item = _data[_activeIndex];
				if(item){
					if(item.main.timer){
						item.main.shown = 0;
						window.clearTimeout(item.main.timer);
						showContent();
					}
				}
				_activeIndex = e.data.index;
				item = _data[_activeIndex];
				item.main.shown = 1;
				showContent();
			});
			
			content.bind("mouseover",{index:index},function(e){
				_activeIndex = e.data.index;
				var item = _data[_activeIndex];
				if(item.main.timer){
					window.clearTimeout(item.main.timer);
				}
				item.main.shown = 1;
			}).bind("mouseout",{index:index},function(e){
				_activeIndex = e.data.index;
				var item = _data[_activeIndex];
				item.main.shown = 0;
				item.main.timer = window.setTimeout(showContent,400);
			});
			return index;
		},
		Hide: function(index){
			_activeIndex = index;
			var item = _data[_activeIndex];
			if(item.main.timer){
				window.clearTimeout(item.main.timer);
			}
			item.main.shown = 0;
			showContent();
		}
	};
	
	return Return;
})();

Util.MsgBox = (function(){
	var _Config = {
		confirmTemp:'<div class="pop-up"><h3><a href="javascript:;" rel="close">关闭</a>%2</h3><div class="pop-up-contents"><span class="pop-ico %3"></span><span class="pop-msg">%1</span><div class="pop-bottom"><button type="button" rel="enter">确定</button> <button type="button" rel="close">取消</button></div></div></div>',
		alertTemp:'<div class="pop-up"><h3><a href="javascript:;" rel="close">关闭</a>%2</h3><div class="pop-up-contents"><span class="pop-ico %3"></span><span class="pop-msg">%1</span><div class="pop-bottom" style="text-align:center;"><button type="button" rel="enter">确定</button></div></div></div>',
		msgTemp:'<div class="pop-up"><h3><a href="javascript:;" rel="close">关闭</a>%2</h3><div class="pop-up-contents"><span class="pop-msg">%1</span></div></div>',
		formTemp:'<form method="post"><div class="pop-up widthauto"><h3><a href="javascript:;" rel="close">关闭</a>%1</h3><div class="pop-up-contents" rel="con"></div></div></form>',
		urlTemp:'<div class="pop-up widthauto"><h3><a href="javascript:;" rel="close">关闭</a>%1</h3><div class="pop-up-contents"><iframe src="%2" width="%3" height="%4" frameborder="0" scrolling="auto"><\/iframe></div></div>',
		boxType:{
			warm:"ico-warn",
			suc:"ico-suc",
			fail:"ico-err",
			hint: "ico-warn",
			err:"ico-err",
			ques:"ico-warn"
		}
	}
	var _cacheConfirmBox,_cacheAlertBox,_cacheShowBox,_cacheFormBox,_cacheFormHideBox,_cacheUrlBox;
	var createBox = function(obj){
		obj.type = _Config.boxType[obj.type];
		if(typeof obj.type == "undefined"){
			obj.type = _Config.boxType.hint;
		}
		if(typeof obj.title == "undefined"){
			obj.title = "提示";
		}
	}
	
	var bindBox = function(cachebox,obj){
		$(cachebox).find("[rel]").bind("click",function(){
			if(obj.callback){
				obj.callback();
			}
			Util.ScreenManager.Hide();
		});
		Util.ScreenManager.Show(cachebox);
	}
	
	var Return = {
		/*
			选择提示框
			参数：
			Util.MsgBox.Confirm({
				text: "提示内容",	//[必填]提示内容
				type: "suc",	//[可选]提示类型 warm[警告],suc[成功],fail[失败],hint[信息],err[错误],ques[疑问]  默认为hint
				title:"提示头",	//[可选]提示头
				callback:function(r){} //[可选]点击按钮后执行的方法 r参数：true为点击确定 false为取消
			});
		*/
		Confirm: function(obj){
			createBox(obj);
			if(!_cacheConfirmBox){
				_cacheConfirmBox = document.createElement("div");
			}
			_cacheConfirmBox.innerHTML = String.format(_Config.confirmTemp,obj.text,obj.title,obj.type);
			$(_cacheConfirmBox).find("[rel]").bind("click",function(){
				if(obj.callback){
					obj.callback(($(this).attr("rel") == "enter"));
				}
				Util.ScreenManager.Hide();
			});
			Util.ScreenManager.Show(_cacheConfirmBox,true);
		},
		/*
			选择提示框
			参数：
			Util.MsgBox.Alert({
				text: "提示内容",	//[必填]提示内容
				type: "suc",	//[可选]提示类型 warm[警告],suc[成功],fail[失败],hint[信息],err[错误],ques[疑问]  默认为hint
				title:"提示头",	//[可选]提示头
				callback: function(){} //[可选]点击按钮后的回调
			});
		*/
		Alert: function(obj){
			createBox(obj);
			if(!_cacheAlertBox){
				_cacheAlertBox = document.createElement("div");
			}
			_cacheAlertBox.innerHTML = String.format(_Config.alertTemp,obj.text,obj.title,obj.type);
			bindBox(_cacheAlertBox,obj);
			$(_cacheAlertBox).find("[rel='enter']")[0].focus();
		},
		/*
			内容显示
			参数：
			Util.MsgBox.Show({
				text: "提示内容",	//[必填]提示内容
				title:"提示头"	//[可选]提示头
			});
		*/
		Show: function(obj){
			createBox(obj);
			if(!_cacheShowBox){
				_cacheShowBox = document.createElement("div");
			}
			_cacheShowBox.innerHTML = String.format(_Config.msgTemp,obj.text,obj.title);
			bindBox(_cacheShowBox,obj);
		},
		ShowForm: function(obj){
			createBox(obj);
			if(!_cacheFormBox){
				_cacheFormBox = document.createElement("div");
			}
			else{
				$(_cacheFormBox).find("input[type='hidden'][rel='specil']").remove();
			}
			_cacheFormBox.innerHTML = String.format(_Config.formTemp,obj.title);
			$(_cacheFormBox).find("[rel='con']").html("")
			$(_cacheFormBox).find("[rel='con']").append(obj.text);

			if(obj.params){
				for(var k in obj.params){
					$(_cacheFormBox).find("form").append($('<input name="'+k+'" type="hidden" value="'+obj.params[k]+'" rel="specil"/>'));
				}
			}
			if(obj.url != undefined){
				$(_cacheFormBox).find("form").attr("action",obj.url);
			}
			else{
				$(_cacheFormBox).find("form").attr("action","");
			}
			
			$(_cacheFormBox).find("[rel='close']").bind("click",function(){
				Util.ScreenManager.Hide();
				if(!_cacheFormHideBox){
					_cacheFormHideBox = document.createElement("div");
					_cacheFormHideBox.style.display = "none";
					document.body.appendChild(_cacheFormHideBox);
				}
				$(_cacheFormHideBox).append(obj.text);
			});
			
			Util.ScreenManager.Show(_cacheFormBox,true);
			if(obj.showcallback){
				obj.showcallback();
			}
		},
		ShowUrl: function(obj){
			createBox(obj);
			if(!_cacheUrlBox){
				_cacheUrlBox = document.createElement("div");
			}
			if(!obj.width){
				obj.width = 400;
			}
			if(!obj.height){
				obj.height = 300;
			}
			_cacheUrlBox.innerHTML = String.format(_Config.urlTemp,obj.title,obj.url,obj.width,obj.height);
			
			bindBox(_cacheUrlBox,obj);
			var cw = $(_cacheUrlBox).width();
			if(obj.width > cw){
				$(_cacheUrlBox).css({marginLeft:-(obj.width - cw)/2});
			}
		}
	}
	
	return Return;
})();

Util.Calendar = (function(){
	var _temp = {
		top:'<div class="date-head" rel="js_cal_show_box"><a href="javascript:;" class="btn-today" rel="js_cal_now_btn">今天</a><span class="date-change"><a href="javascript:;" rel="js_cal_pre_btn" class="prev">上个月</a><a href="javascript:;" rel="js_cal_next_btn" class="next">下个月</a></span><strong rel="js_title"></strong></div>',
		sel:'<div class="date-head" style="display:none;" rel="js_cal_sel_box"><select id="js_cal_year_sel"></select><select id="js_cal_month_sel"></select><a href="javascript:;" class="btn-day">确定</a></div>',
		head:'<ul class="date-wkday"><li>一</li><li>二</li><li>三</li><li>四</li><li>五</li><li>六</li><li>日</li></ul>',
		con:'<ul class="date-contents"></ul>',
		item:'<li><a href="javascript:;" rel="item" %2>%1</a></li>',
		item2:'<li><span>%1</span></li>'
	}
	
	var initSelect = function(){
		var optionObj = {};
		var optgroupObj = {};
		var df = document.createDocumentFragment();
		for(i=1901;i<2050;i++){
			optionObj = document.createElement("option");
			optionObj.value = i;
			optionObj.innerHTML = i+"年";
			df.appendChild(optionObj);
			if(i%10 == 0){
				optgroupObj = document.createElement("optgroup");
				optgroupObj.setAttribute("label","───");
				df.appendChild(optgroupObj);
			}
		}
		document.getElementById("js_cal_year_sel").appendChild(df);
		var monthSel = document.getElementById("js_cal_month_sel");
		for(var i = 1,len = 13; i < len; i++){
			var optionItem = document.createElement("option");
			optionItem.value = i;
			optionItem.innerHTML = i+"月";
			monthSel.appendChild(optionItem);
		}
	};
	
	function getMonthDays(year, month) {
		var monthDays = [31,28,31,30,31,30,31,31,30,31,30,31];
		if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
			monthDays[1] = 29
		}
		return monthDays[month]
	}
	
	var _calBox;
	var _activeInput;
	var _calHideState = true;
	var _activeDate = new Date();
	
	var createCal = function(date){
		var calconbox;
		_activeDate = date;
		_activeInput.val(date.getFullYear() + "-" + getTowString(Number(date.getMonth()+1)) +"-" + getTowString(date.getDate()));
		if(!_calBox){
			_calBox = $('<div style="display:none;position:absolute;"></div>');
			$(document.body).append(_calBox);
			_calBox.bind("mouseover",function(){
				_calHideState = false;
			}).bind("mouseout",function(){
				_calHideState = true;
			});
			calconbox = $('<div class="date-box"></div>');
			calconbox.append($(_temp.top));
			calconbox.append($(_temp.sel));
			calconbox.append($(_temp.head));
			calconbox.append($(_temp.con));
			_calBox.append(calconbox);
			_calBox.click(function(e){
				var src = e.target || window.event.srcElement;
				if(src.tagName.toUpperCase() != "SELECT" && $(src).attr("rel") != "item"){
					_activeInput[0].focus();
				}
				
			});
			calconbox.find("a[rel='js_cal_pre_btn']").click(function(){
				_activeDate = new Date(_activeDate.getFullYear(),(_activeDate.getMonth()-1),_activeDate.getDate());
				createCal(_activeDate);
			});
			calconbox.find("a[rel='js_cal_next_btn']").click(function(){
				_activeDate = new Date(_activeDate.getFullYear(),(_activeDate.getMonth()+1),_activeDate.getDate());
				createCal(_activeDate);
			});
			calconbox.find("a[rel='js_cal_now_btn']").click(function(){
				_activeDate = new Date();
				createCal(_activeDate);
			});
			calconbox.find("strong[rel='js_title']").click(function(){
				calconbox.find("div.date-head[rel='js_cal_show_box']").hide();
				calconbox.find("div.date-head[rel='js_cal_sel_box']").show();
				document.getElementById("js_cal_year_sel").value = _activeDate.getFullYear();
				document.getElementById("js_cal_month_sel").value = (_activeDate.getMonth() + 1);
			})
			calconbox.find("div.date-head[rel='js_cal_sel_box'] a.btn-day").click(function(e){
				calconbox.find("div.date-head[rel='js_cal_show_box']").show();
				calconbox.find("div.date-head[rel='js_cal_sel_box']").hide();
				var selY = document.getElementById("js_cal_year_sel").value;
				var selM = Number(document.getElementById("js_cal_month_sel").value);
				if(Util.Validate.CheckDate(selY,selM,_activeDate.getDate())){
					Util.Calendar.Select(selY,selM,_activeDate.getDate());
				}
				else{
					Util.Calendar.Select(selY,selM,1);
				}
			})
			initSelect();
			
		}
		if(!calconbox){
			calconbox = _calBox.find(".date-box");
		}

		var days = getMonthDays(date.getFullYear(),date.getMonth());
		var html = "";
		var y = date.getFullYear();
		var m = date.getMonth();
		var now = new Date();
		
		calconbox.find("[rel='js_title']").html(y + "年" + (m+1) + "月");
		
		var firstD = new Date(y,m,1);
		startDay = firstD.getDay();
		var col = 0;
		for (var i = 1; i < startDay; i++) {
			html += String.format(_temp.item2," ");
			col++;
		}
		for (var i = 1; i <= days; i++) {
			var calsies = "";
			if(i == date.getDate()){
				calsies = " class='tday' ";
			}
			html += String.format(_temp.item,i,calsies+" onclick='Util.Calendar.Select("+y+","+(m+1)+","+i+")'");
		}
		var dataContent = calconbox.find(".date-contents");
		dataContent.html(html);
	}
	
	var getTowString = function(num){
		var num = num.toString();
		if(num.length == 1){
			return  "0" + num;
		}
		return num;
	}
	
	var Return = {
		Bind: function(input){
			input.bind("focus",function(){
				var dd;
				if(/^\d{4}-\d{1,2}-\d{1,2}$/.test($(this).val())){
					var v = $(this).val().split("-");
					if(Util.Validate.CheckDate(v[0],v[1],v[2])){
						dd = new Date(v[0],(Number(v[1]) - 1),v[2]);
					}
					else{
						dd = new Date();
					}
				}
				else{
					dd = new Date();
				}
										
				var t = $(this).offset().top + $(this).height() + 5;
				var l = $(this).offset().left;
				_activeInput = $(this);
				createCal(dd);
				_calBox.show().css({top:t,left:l});
			}).bind("blur",function(){
				if(_calHideState && _calBox) _calBox.hide();
			});
		},
		Select: function(y,m,d){
			_activeInput.val(y + "-" + getTowString(m) +"-" + getTowString(d));
			_calHideState = true;
			if(_calHideState && _calBox) _calBox.hide();
		}
	};
	
	return Return;
})();

Util.Result = (function(){
	var _config = {
		temp: '<span class="text-hint correct" rel="con"></span>',	//模板
		parent: '',
		type:{	//提示类型
			suc:"correct",
			err:"error",
			warm:"warn"
		},
		timeOut: 3000	//隐藏时间
	}
	
	//创建提示信息Dom
	var createDom = function(txt,type){
		if(!_config.cacheDom){
			_config.cacheDom = $(String.format(_config.temp));
			$(document.body).append(_config.cacheDom);
			_config.cacheDom.css({
				position:"absolute",
				zIndex:1000,
				top:document.body.scrollTop + 5 + "px",
				left:document.documentElement.clientWidth * 48/100
			});
			_config.cacheDom.hide();
		}
		var con = _config.cacheDom;
		if(txt){
			con.html(txt);
		}
		if(type){
			for(var k in _config.type){
				con.removeClass(_config.type[k]);
			}
			con.addClass(_config.type[type]);
		}
	}
	
	var hide = function(){
		createDom();
		_config.cacheDom.hide();
	}
	
	var Return = {
		Show: function(txt,type,isHide,timeOut){
			if(!type){
				type = "warm";
			}
			if(isHide == undefined){
				isHide = true;
			}
			if(_config.hideTimer){
				window.clearInterval(_config.hideTimer);
			}
			createDom(txt,type);
			_config.cacheDom.show();
			if(isHide){
				if(!timeOut){
					timeOut = _config.timeOut;
				}
				_config.hideTimer = window.setTimeout(Util.Result.Hide,timeOut);
			}
		},
		Hide: function(){
			if(_config.hideTimer){
				window.clearInterval(_config.hideTimer);
			}
			hide();
		}
	};
	
	return Return;
})();

Util.Url = {
	ReplaceQueryVar:function(skey, svalue){
		var href = location.href;
		if(location.hash){
			href = href.replace(location.hash,'');
		}
		var urls = href.split('?');
		var kws  = urls[1].split('&');
		var kw = newurl = '';
		var ischange = 0;
		for(i=0; i < kws.length; i++ ){
			kw = $.trim(kws[i]);
			if( kw=='' ){
				continue;
			}
			else{
				kwss = kws[i].split('=');
				if( kwss.length < 2 ) continue;
				if( kwss[0]==skey ){
					if( kwss[1] != svalue ){
						kwss[1] = svalue;
						ischange = 2;
					} else {
						ischange = 1;
					}
				}
				if( kwss[1] != '' ){
					newurl += (newurl=='' ? kwss[0] + '=' + kwss[1] : '&' + kwss[0] + '=' + kwss[1]);
				}
			}
		}
		if( ischange==0 ){
			newurl += '&'+ skey + '=' + svalue;
		}
		var url;
		if( ischange != 1){
			url = urls[0]+'?'+newurl;
		} else {
			url = location.href;
		}
		window.location.href = url;
	}
}