
	//配置模板
	var ConfigTemplete = {
		p_side:{
			currentStyle: "focus",
			temp:'<li class="focus" rel="%2"><a href="javascript:;">%1</a></li>'
		},
		t_side:{
			tagName:'li',
			currentStyle: "open",
			temp:'<a href="javascript:;"><i></i>%1</a>'
		},
		side:{
			currentStyle: "focus",
			tagName:'ul',
			temp:'<li><a href="javascript:;">%1</a></li>',
			isHold:true
		},
		tab:{
			currentStyle: "focus",
			tagName:'ul',
			className: '',
			temp:'<li key="%2">%1<a href="javascript:;" class="close">关闭<\/a><\/li>',
			contentTemp:'<iframe src="%1" frameborder="0" scrolling="auto"><\/iframe>',
			dropTimer:200,
			disableStyle: "disabled"
		}
	}
	
	var SidbarControl = (function(){
		var _cache = {};
		var _parentBox;
		var _childBox;
		
		var getList = function(item,defaultKey){
			var ul = $(document.createElement(ConfigTemplete.side.tagName));
			for(var i = 0,len = item.Childs.length; i < len; i++){
				var obj = item.Childs[i];
				var li = $(String.format(ConfigTemplete.side.temp,obj.Text));
				li.bind("click",{p:getParent(obj),c:obj},function(e){
					display(e.data.p,e.data.c.Key);
					TopMenuControl.Add(e.data.c.Key,e.data.c);
				});
				ul.attr("rel","child");
				ul.append(li);
				if(defaultKey == obj.Key){
					li.addClass(ConfigTemplete.side.currentStyle);
					li.children().addClass(ConfigTemplete.side.currentStyle);
				}
			}
			return ul;
		}
		
		//显示子菜单
		var displayChild = function(obj,defaultKey){
			_parentBox.children().removeClass(ConfigTemplete.p_side.currentStyle);
			_parentBox.find("[rel='"+obj.Key+"']").addClass(ConfigTemplete.p_side.currentStyle);
			var ul;
			for(var i = 0,len = obj.Childs.length; i < len; i++){
				if(!ul){
					ul = ConfigTemplete.side.isHold? _childBox : $(document.createElement(ConfigTemplete.side.tagName));
				}
				var item = obj.Childs[i];
				if(item.Childs){
					var li = $(document.createElement(ConfigTemplete.t_side.tagName));
					var h4 = $(String.format(ConfigTemplete.t_side.temp,item.Text));
					h4.attr("rel","parent");
					li.append(h4);
					var list = getList(item,defaultKey);
					li.append(list);
					if(item.Shown){
						list.hide();
						h4.removeClass(ConfigTemplete.t_side.currentStyle);
					}
					else{
						list.show();
						h4.addClass(ConfigTemplete.t_side.currentStyle);
					}
					h4.bind("click",{dom:list,parent:item},function(e){
						if(e.data.parent.Shown){
							e.data.dom.show();
							e.data.parent.Shown = false;
							$(this).addClass(ConfigTemplete.t_side.currentStyle);
							
						}
						else{
							e.data.dom.hide();
							e.data.parent.Shown = true;
							$(this).removeClass(ConfigTemplete.t_side.currentStyle);
						}
					});
					ul.append(li);
				}
				else{
					var li = $(String.format(ConfigTemplete.side.temp,item.Text));
					li.bind("click",{p:obj,c:item},function(e){
						display(e.data.p,e.data.c.Key);
						TopMenuControl.Add(e.data.c.Key,e.data.c);
					});
					if(defaultKey == item.Key){
						li.addClass(ConfigTemplete.side.currentStyle);
					}
					ul.append(li);
				}
			}
			if(ul && !ConfigTemplete.side.isHold){
				_childBox.append(ul);
			}
		}
		
		var _activeKey;
		var display = function(obj,defaultKey){
			_childBox.empty();
			displayChild(obj,defaultKey);
			_activeKey = defaultKey;
		}
		
		//取得第一级
		var getParent = function(obj,arr){
			if(!obj.Parent){
				if(arr){
					arr.push(obj);
				}
				return obj;
			}
			else{
				if(arr){
					arr.push(obj);
				}
				return getParent(MenuData[obj.Parent]);
			}
		}
		
		var showAllList = function(isHide){
			if(_activeMenu.Childs){
				for(var i = 0,len = _activeMenu.Childs.length; i < len; i++){
					_activeMenu.Childs[i].Shown = isHide;
				}
				if(isHide){
					_childBox.find("[rel='parent']").removeClass(ConfigTemplete.t_side.currentStyle);
					_childBox.find("[rel='child']").hide();
				}
				else{
					_childBox.find("[rel='parent']").addClass(ConfigTemplete.t_side.currentStyle);
					_childBox.find("[rel='child']").show();
				}
			}
		}
		
		var _activeMenu;
		//初始化方法
		var init = function(){
			var activeMenu = MenuData[SidbarControl.DefaultKey];
			var dk;
			for(var k in MenuData){
				MenuData[k].Key = k;
				var it = MenuData[k].Parent;
				var p = MenuData[MenuData[k].Parent];
				if(it != undefined && p){
					if(!p.Childs){
						p.Childs = [];
					}
					p.Childs.push(MenuData[k]);
				}
				if(!it){
					var cItem = $(String.format(ConfigTemplete.p_side.temp, MenuData[k].Text, k));
					_parentBox.append(cItem);
					cItem.bind("click",MenuData[k],function(e){
						display(e.data,TopMenuControl.ActiveKey);
						_activeMenu = e.data;
						this.blur();
					});
					if(!activeMenu){
						activeMenu = MenuData[k];
					}
				}
				if(MenuData[k].Default){
					dk = k;
				}
			}
			_activeMenu = activeMenu;
			displayChild(activeMenu,dk);
			TopMenuControl.ClickCallBack = function(obj){
				if(obj){
					var key = obj.key;
					var obj = getParent(MenuData[key]);
					display(obj,key);
				}
			}
		}
		
		var Return = {
			Bind: function(parentBox,childBox){
				_parentBox = $(parentBox);
				_childBox = $(childBox);
				init();
			},
			ShowSec: function(){
				showAllList(false);
			},
			HideSec: function(){
				showAllList(true);
			},
			GetActiveList: function(){
				var arr = [];
				var item = MenuData[_activeKey];
				if(item){
					arr.push(item);
					getParent(item,arr);
				}
				return arr;
			}
		};
		return Return;
	})();
	
	//Tab切换
	var TopMenuControl = (function(){
		var _cache= {};
		var _contentBox;
		var _tabBox;
		var _temp = ConfigTemplete.tab;
		var _warpBox;
		var _leftBtn;
		var _rightBtn;
		
		//计算显示的Tab总长度
		var setTabBoxLen = function(){
			var result = 0;
			$(_tabBox).children().each(function(i){
				result += this.offsetWidth + 1;
			});
			if(result < $(_warpBox).width()){
				result = $(_warpBox).width() - 1;
			}
			$(_tabBox).width(result);
			return result;
		}
		
		
		//判断是否启用向左/向右图标
		var setDisabled = function(){
			var ww = $(_warpBox).width();
			var tw = $(_tabBox).width();
			var less = $(_tabBox).offset().left - $(_warpBox).offset().left;
			if(less < 0){
				_leftBtn.removeClass(ConfigTemplete.tab.disableStyle);
			}
			else{
				_leftBtn.addClass(ConfigTemplete.tab.disableStyle);
			}
			if((ww - less + 1) < tw){
				_rightBtn.removeClass(ConfigTemplete.tab.disableStyle);
			}
			else{
				_rightBtn.addClass(ConfigTemplete.tab.disableStyle);
			}
		}
		
		var _moveCache={};
		
		//移动方法
		var startMove = function(){
			setDisabled();
			if(!_moveCache.btn.hasClass(ConfigTemplete.tab.disableStyle)){
				var l = $(_tabBox).offset().left - $(_warpBox).offset().left;
				if(_moveCache.isLeft){
					l+=10;
				}
				else{
					l-=10;
				}
				if($(_tabBox).offset().left > $(_warpBox).offset().left){
					l -= 9;
				}
				$(_tabBox).css({left:l});
			}
			else{
				window.clearInterval(_moveCache.timer);
			}
		}
		
		
		//绑定按钮事件
		var bindBtnEvents = function(btn,isLeft){
			btn.mousedown(function(e){
				if(_moveCache.timer){
					window.clearInterval(_moveCache.timer);
				}
				if(!$(this).hasClass(ConfigTemplete.tab.disableStyle)){
					_moveCache.btn = $(this);
					_moveCache.isLeft = isLeft;
					_moveCache.timer = window.setInterval(startMove,1);
				}
			});
			
			btn.mouseup(function(e){
				if(_moveCache.timer){
					window.clearInterval(_moveCache.timer);
				}
			});
			btn.mouseout(function(e){
				if(_moveCache.timer){
					window.clearInterval(_moveCache.timer);
				}
			});
		}
		
		//判断是否在显示区域
		var isExistInArea = function(key){
			var result = {left:0,right:0,lstate:false,rstate:false};
			var activeLeft = _cache[TopMenuControl.ActiveKey].tab.offset().left - $(_warpBox).offset().left;
			var along = (activeLeft + _cache[TopMenuControl.ActiveKey].tab[0].offsetWidth);
			result.lstate = activeLeft < 0;
			result.rstate = along > $(_warpBox).width();
			if(result.rstate){
				result.right = along - $(_warpBox).width();
			}
			if(result.lstate){
				result.left = activeLeft;
			}
			return result;
		}
		
		
		var moveTab = function(){
			if(_cache[TopMenuControl.ActiveKey]){			
				var len = setTabBoxLen();
				var isexist = isExistInArea(TopMenuControl.ActiveKey);
				var activeTab = _cache[TopMenuControl.ActiveKey].tab;
				//判断是否在显示区域
				if(isexist.rstate){
					$(_tabBox).animate({ left: $(_tabBox).offset().left - $(_warpBox).offset().left - isexist.right },   { queue: false, duration: ConfigTemplete.tab.dropTimer ,complete:function(){setDisabled();} }); 
				}
				if(isexist.lstate){
					$(_tabBox).animate({ left: $(_tabBox).offset().left - $(_warpBox).offset().left - isexist.left },   { queue: false, duration: ConfigTemplete.tab.dropTimer ,complete:function(){setDisabled();} }); 
				}
				setDisabled();
			}
		}
		
		//增加Tab
		var insertItem = function(key,obj,params){
			if(!_cache[key]){
				var html = "";
				html = String.format(_temp.temp,obj.Text,key);
				var tabItem = $(html);
				var contentItem = $(String.format(_temp.contentTemp,obj.url));
				_cache[key] = {key:key,tab:tabItem,content:contentItem};
				$(_tabBox).append(tabItem);
				$(_contentBox).append(contentItem);
				bindEvents(_cache[key]);
			}
			else{
				if(!_cache[key].shown){
					$(_tabBox).append(_cache[key].tab);
				}
				if(params && params.refash_page){
					_cache[key].content[0].contentWindow.location.reload();
				}
				else{
					var url = obj.url;
					url += /.*\?.+/.test(url) ? "&_t=" + (new Date()).getTime() : "?_t=" + (new Date()).getTime();
					if(params){
						var paramsVal = [];
						for(var k in params){
							paramsVal.push(k + "=" + params[k]);
						}
						url += "&" + paramsVal.join("&");
					}
					_cache[key].content[0].contentWindow.location.href = url;
				}
			}
			return selectItem(key);
		}
		//绑定事件
		var bindEvents = function(obj){
			obj.tab.click(function(e){
				var aObj = insertItem(obj.key,MenuData[obj.key],{refash_page:true});
				if(TopMenuControl.ClickCallBack){
					TopMenuControl.ClickCallBack(aObj);
				}
			});
			obj.tab.find("a.close").click(function(e){
				if($.browser.msie){
					event.cancelBubble=true;
				}else{
					e.stopPropagation();
					e.preventDefault();
				}
				hideItem(obj.key);
			});
			$(obj.tab).bind("dblclick",function(){
				hideItem(obj.key);
			});
		}
		//隐藏Tab
		var hideItem = function(key){
			if(_cache[key]){
				_cache[key].tab.hide();
				_cache[key].content.hide();
				if(_cache[key].actived){
					var oldKey;
					var isexit = false;
					for(var i = 0,len = _tabBox.children.length; i < len; i++){
						var k = $(_tabBox.children[i]).attr("key");
						if(_cache[k].shown){
							if(k != key){
								oldKey = k;
							}
							else{
								isexit = true;
							}
							if(oldKey != undefined && isexit){
								break;
							}
						}
					}
					if(oldKey == undefined){
						oldKey = TopMenuControl.DefaultKey;
					}
					var aObj = selectItem(oldKey);
					if(TopMenuControl.ClickCallBack){
						TopMenuControl.ClickCallBack(aObj);
					}
				}
				_cache[key].shown = false;
			}
		}
		
		//选中tab
		var selectItem = function(key){
			for(var k in _cache){
				var item = _cache[k];
				item.tab.removeClass(_temp.currentStyle);
				item.content.hide();
				item.actived = false;
			}
			if(_cache[key]){
				_cache[key].tab.addClass(_temp.currentStyle).show();
				_cache[key].content.show();
				_cache[key].actived = true;
				_cache[key].shown = true;
			}
			TopMenuControl.ActiveKey = key;	//被激活的KEY
			moveTab();
			return _cache[key];
		}
		
		var Return = {
			Add: function(key,obj,params){
				return insertItem(key,obj,params);
			},
			Bind: function(obj){
				_contentBox = obj.Con;
				$(obj.Tab).html("");
				var temp = ConfigTemplete.tab;
				var box = document.createElement(temp.tagName);
				_tabBox = box;
				obj.Tab.appendChild(box);
				_warpBox = obj.Tab;
				temp.box = box;
				_leftBtn = $(obj.TabLeft);
				_rightBtn = $(obj.TabRight);
				bindBtnEvents(_leftBtn,true);
				bindBtnEvents(_rightBtn,false);
				if(this.DefaultKey != undefined){
					if(MenuData[this.DefaultKey]){
						var obj = MenuData[this.DefaultKey];
						this.Add(this.DefaultKey,obj);
					}
				}
				$(window).bind("resize",function(){
					$(_tabBox).css({left: 0});
					moveTab();
				});
			},
			Refresh: function(){
				if(_cache[TopMenuControl.ActiveKey]){
					_cache[TopMenuControl.ActiveKey].content[0].contentWindow.location.reload();
				}
			},
			Forward:function(){
				if(_cache[TopMenuControl.ActiveKey]){
					_cache[TopMenuControl.ActiveKey].content[0].contentWindow.history.forward();
				}
			},
			Back:function(){
				if(_cache[TopMenuControl.ActiveKey]){
					_cache[TopMenuControl.ActiveKey].content[0].contentWindow.history.back();
				}
			},
			Close: function(key){
				if(key == undefined){
					for(var k in _cache){
						hideItem(k);
					}
				}
				else{
					hideItem(k);
				}
			}
		};
		return Return;
	})();
	
	var MainAPI = (function(){
		var Return = {
			SelectTab: function(url,params){
				var aKey;
				for(var k in  MenuData){
					var item = MenuData[k];
					if(item.url == url){
						aKey = k;
					}
				}
				if(aKey != undefined){
					TopMenuControl.Add(aKey,MenuData[aKey],params);
				}
			},
			FullScreen:function(){
				$('#main').addClass('fullscreen');$('#js_screen_li').hide();$('#js_undo_li').show();
			},
			UndoScreen:function(){
				$('#main').removeClass('fullscreen');$('#js_screen_li').show();$('#js_undo_li').hide();
			}
			
		};
		return Return;
	})();
	
	for(var k in MenuData){
		if(MenuData[k].Default){
			TopMenuControl.DefaultKey = k;
		}
	}
	TopMenuControl.Bind({
							Tab:document.getElementById("js_menu_contents"),
							Con:document.getElementById("main_frame"),
							TabLeft:document.getElementById("js_tab_left_btn"),
							TabRight:document.getElementById("js_tab_right_btn")
						});
	SidbarControl.Bind("#nav_class","#nav_list");
	
	$(document).ready(function(){
		if($.browser.msie && $.browser.version == '6.0'){
			alert("IE6?这东西不流行了，立即去下载一下FireFox吧！");
			window.location.href = "http://www.xiazaiba.com/html/40.html";
		}
		//快捷键
		$(document).keydown(function(e){
			if(e.ctrlKey){
				switch(e.keyCode)
				{
					case 81:	//q
						TopMenuControl.Refresh();
						return false;
					case 73:	//i
						MainAPI.FullScreen();
						return false;
					case 85:	//u
						MainAPI.UndoScreen();
						return false;
					case 66:	//b
						TopMenuControl.Back();
						return false;
					case 78:	//n
						TopMenuControl.Forward();
						return false;
				}
			}
		});
	});