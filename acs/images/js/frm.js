var MainWindow;	//父级框架对象
var Page_CacheBotton;  //缓存操作按钮

//初始化自定义输入框
var Page_InitInput = function(){
	$("input[type='text'][jstype]").each(function(i){
		switch($(this).attr("jstype")){
			case "cal":
				Util.Calendar.Bind($(this));
				$(this).addClass("date-text");
				break;
			case "int":
				Util.TextBox.BindInt($(this),{min:""});
				break;
		}
	})
}

//初始化表格
var _OldPostUrl;
var Page_InitTable = function(){
	//表格
	$("input[type='checkbox'][rel='parent']").bind("click",function(){
		$(this).parents("table").find("input[type='checkbox'][rel='child']").attr("checked",this.checked);
	});
	$("form[bind]").each(function(i){
		var form = $(this);
		var tb = $($(this).attr("bind"));
		form.find("input[type='checkbox'][rel='parent']").bind("click",function(){
			tb.find("input[type='checkbox'][rel='parent'],input[type='checkbox'][rel='child']").attr("checked",this.checked);
		});
		tb.find("input[type='checkbox'][rel='parent']").bind("click",function(){
			form.find("input[type='checkbox'][rel='parent']").attr("checked",this.checked);
		});
		form.find("[jstype='btn_post']").bind("click",function(){
			Page_CacheBotton = $(this);
			var checkBoxs = tb.find("input[type='checkbox'][rel='child'][checked=true]");
			
			if(checkBoxs.length){
				if(!_OldPostUrl){
					_OldPostUrl = form.attr("action");
				}
				var hideValues = [];
				checkBoxs.each(function(){
					hideValues.push(this.value);
				});
				var name = "checkboxs";
				var hiddenBox = form.find("[name='checkboxs']");
				if(!hiddenBox.length){
					hiddenBox = $("<input type='hidden' name='"+name+"' />");
					form.append(hiddenBox);
				}
				hiddenBox.val(hideValues.join(","));
				if(Page_CacheBotton.attr("url")){
					Page_CacheBotton.parents("form").attr("action",Page_CacheBotton.attr("url"));
				}
				else{
					Page_CacheBotton.parents("form").attr("action",_OldPostUrl);
				}
				var v = Page_CacheBotton.val()?Page_CacheBotton.val():Page_CacheBotton.html();
				if($(this).attr("isconfirm")){
					Util.MsgBox.Confirm({text:"确认要"+v+"吗？",title:"提示",type:"warm",
										callback:function(r){
											if(r){
												Page_CacheBotton.parents("form").submit();
											}
										}
										});
				}
				else if($(this).attr("isform")){
					var btnele = $(this);
					var con = $($(this).attr("isform"));
					var posturl = $(this).attr("posturl") ? $(this).attr("posturl") : "";
					Util.MsgBox.ShowForm({text:con,title:v,url:posturl,params:{
						'checkboxs':hiddenBox.val()
					},
					showcallback:function(){
						var callback = eval('('+btnele.attr("callback")+')');
						if(callback){
							callback();
						}
					}
					})
					con.show();
				}
				else{
					$(this).parents("form").submit();
				}
			}
			else{
				MainWindow.Util.Result.Show("请选择记录!","warm");
			}
		});
	});
}

//初始按钮
var Page_InitBotton = function(){
	$("[jsbotton]").click(function(){
		Page_CacheBotton = $(this);
		switch($(this).attr("jsbotton")){
			case "confirm":
				var v = Page_CacheBotton.val()?Page_CacheBotton.val():Page_CacheBotton.html();
				Util.MsgBox.Confirm({text:"确认要"+v+"吗？",title:"提示",type:"warm",callback:function(r){
					if(r){
						if(Page_CacheBotton.attr("isajax")){
							MainWindow.Util.Result.Show("处理中...","warm");
							var url = Page_CacheBotton.attr("url")?Page_CacheBotton.attr("url"):Page_CacheBotton.attr("href");
							$.ajax({url:url,cache:false,type:"GET",
															success:function(res){
																try{
																	var r = eval("("+res+")");
																	if(r.state){
																		MainWindow.Util.Result.Show("处理成功！","suc");
																		window.location.reload();
																	}
																	else{
																		MainWindow.Util.Result.Show(r.msg,"err");
																	}
																}catch(e){
																	MainWindow.Util.Result.Show("解析返回的字符错误！","err");
																}
																
															}});
						}
						else{
							window.location.href = Page_CacheBotton.attr("href");
						}
					}
				}});
				return false;
				break;
		}
	})
}

//初始化表单
var Page_InitForm = function(){
	$("form[jstype='vali']").each(function(){
		Util.Validate.BindForm(this,
			{
				DefaultCallBack: function(arr){
					for(var i in arr){
						var dom = $(arr[i]);
						dom.removeClass("error");
						var errorDom = dom.parent().find("span.error");
						if(errorDom.length){
							$(errorDom).hide();
							errorDom.parent().find("span.normal").show();
						}
					}
				},
				ErrorCallBack:function(errorArr){
					//错误显示CallBack 参数errorArr是输入有误的 Dom 对象
					for(var i in errorArr){
						var dom = $(errorArr[i]);
						dom.addClass("error");
						var errorDom = $(dom.parent()).find("span.error");
						$(dom.parent()).find("span.error").hide();
						if(!errorDom.length){
							errorDom = $('<span class="text-hint error">'+dom.attr("errormsg")+'</span>');
							dom.parent().append(errorDom);
						}
						errorDom.parent().find("span.normal").hide();
						errorDom.show();
					}
				},
				ReturnCallBack: function(form,r){
					if(form.attr("onreturn")){
						var rState = eval(form.attr("onreturn"));
						if(!rState){
							return false;
						}
					}
					return r;
				}
			}
		);
	});
}

$(document).ready(function(){
	try{
		MainWindow = parent.window;
	}catch(e){}
	
	Page_InitInput();
	Page_InitTable();
	Page_InitForm();
	Page_InitBotton();
	
	$(document).keydown(function(e){
		if(e.ctrlKey){
			switch(e.keyCode)
			{
				case 81:	//q
					MainWindow.TopMenuControl.Refresh();
					return false;
				case 73:	//i
					MainWindow.MainAPI.FullScreen();
					return false;
				case 85:	//u
					MainWindow.MainAPI.UndoScreen();
					return false;
				case 66:	//b
					MainWindow.TopMenuControl.Back();
					return false;
				case 78:	//n
					MainWindow.TopMenuControl.Forward();
					return false;
			}
		}
	});
});