//////////////
function handPic(json){ 
    if(json.error_code===0){  
        $(".ico").html('<img src="/static/upload/'+json.data+'" height="50px"  />');
        $("#ico").attr("value",json.data); 
    }else{
        alert(json.error_message);
    } 
}
function getImg(obj){
    var imgurl = $.trim($(obj).attr("value"));
    if(imgurl) $(".ico").html('<img src="'+imgurl+'" height="50px"  />');
}
function doUpload(callback) {
    callback=callback?callback:handPic;  
    var width = $("#width").val();
    var height=$("#height").val();
    width=width?width:0;
    height=height?height:0;
    $.upload({ 
        url: '?ct=ajax&ac=upload&width='+width+'&height='+height, 
        fileName: 'imgurl', 
        dataType: 'json', 
        onSend: function() {
            return true;
        }, 
        onComplate: function(json) {
            callback(json); 
        }
    });
}
function showbox(id,url,w,h,title,op){
    id=id?id:"";
    op=op?op:"edit";
    title=title?title:"编辑内容";
    w=w?w:700;
    h=h?h:300; 
    tb_show(title, url+'&type=only&even='+op+'&id='+ id +'&TB_iframe=true&height='+h+'&width='+w, true);
} 
///////////////////////












function clearCache(id,act,type){
    var val = $(id).val(); 
    if(!val){
        alert("请输入内容");
        return ;
    }
    $.ajax({
        type:'POST',
        url:'',
        data: { "ct":"version3","ac":"clear","type":type,"act":act,"val":val},
        dataType:'json',
        timeout: 0, 
        success: function(json){ 
            console.log(json);
          // alert(json.error_message);  
        }, 
    });
}



function build_adv(id){
    $.ajax({
        type:'GET',
        url:'',
        data: { "ct":"version3","ac":"build_adv","id":id},
        dataType:'json',
        timeout: 0, 
        success: function(json){ 
            if(json.error_code==0){
               alert(json.error_message); 
               jump(2);
            }else{
               alert(json.error_message); 
            }
        }, 
    });
}


//选择跳转
function eventSelect(id,url){
    $(id).change(function() {
        var val = $(this).attr("value");
        url = url.replace("{val}",val);
        jump(3, url);
    });
}  
function showorhide(){
    $(".mul01 span").click(function(){
        var nextObj = $(this).siblings("ul");
        var css = nextObj.css("display");
        if(css==="block"){
            nextObj.slideUp("fast");
            $(this).addClass("plus");
        }
        if(css==="none"){
             nextObj.slideDown("fast");
             $(this).removeClass("plus");
        }
    }); 
}
function search(url){
    var search_value = encodeURIComponent($("#search_value").val());
    var t = (new Date()).valueOf();
    location.href = url+"&search_value=" + search_value + "&_t=" + t;
}


var do_delete = {
    id:null,
    ct:null,
    ac:null,
    obj:null,
    init:function(){
        obj = this;
    },
    tips:function(ct,ac,id){
        this.init();
        this.id = id;
        this.ct = ct;
        this.ac = ac;
        var msg = " 确定删除该条数据吗？";
        msg += "<br/><a href='javascript:tb_remove();'>点错了</a> | <a href='javascript:obj.del();'>确定执行</a>";
        tb_showmsg(msg); 
    },  
    del:function(){ 
        $.ajax({
            type:'GET',
            url:'',
            data: { "ct":this.ct,"even":"delete","ac":this.ac,"id":this.id,"do":"delete"},
            dataType:'json',
            timeout: 0, 
            success: function(json){ 
                if(json.error_code==0){
                   jump(2);
                }else{
                   alert(json.info); 
                }
            }, 
        });
    },
    operate:function(type,id){
        var ids = getCheckbox(id); 
        if(!ids){
            tb_showmsg("请选择要操作的数据","错误提示","","300px", "80px");
            return;
        }
        type=type?type:"";
        if(type){
            document.form1.even.value = type;
        } 
        var msg = " 确定批量执行？！";
        msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定执行&gt;&gt;</a>";
        tb_showmsg(msg);
    }
}
 


/**
 *type方式，url跳转地址
 *1=返回，2=刷新，3=跳转
 */
function jump(type, url) {
    url = url ? url : "";
    type = type ? type : 1;
    switch (type) {
        case 1:
            window.history.back();
            break;
        case 2:
            window.location.reload();
            break;
        case 3:
            window.location.href = url;
            break;
        case 4:
            window.open(url);
            break;
        case 5:
            top.location.href = url;
            break;
    }
} 


//全选
function selectAll(type, checkboxId) {
    switch (type) {
        case 'all':
            $(checkboxId + ":checkbox").attr("checked", true);
            break;
        case 'none': //全不选  
            $(checkboxId + ":checkbox").attr("checked", false);
            break;
        case 'reverse': //反选
            $(checkboxId + ":checkbox").each(function() {
                $(this).attr("checked", !$(this).attr("checked"));
            });
            break;
    }
}

//获取选中值
function getCheckbox(checkboxId) {
    var idarr = new Array();
    $(checkboxId + ':checked').each(function() {
        idarr.push($(this).attr("value"));
    });
    var ids = idarr.join(",");
    return ids;
}
