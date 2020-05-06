
//普通公共类
var modular_util = (function(){
    var _count = 0;
    /**
     * 获取链接上的参数
     * string 需要获取的参数名称
     */
    var getHref = function(string){
        var reg = new RegExp("(^|&)" + string + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r)return decodeURI(r[2]);
        // return false;
    };

    /**
     * 获取COOKIE
     * c_name COOKIE名称
     */
    var getCookie = function(c_name){
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    };

    /**
     * 设置COOKIE
     * c_name COOKIE名称
     */
    var setCookie = function(c_name,value,expiredays){
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        document.cookie=c_name+ "=" +escape(value)+
            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
    };
    /**
     * ajax封装
     * url 发送请求的地址
     * data 发送到服务器的数据，数组存储，如：{"date": new Date().getTime(), "state": 1}
     * successfn 成功回调函数
     * errorfn 失败回调函数
     * auto_show_errmsg 是否自动弹出错误提示,1开启自动提示，2关闭自动提示
     * type 请求方式
     * contentType  数据类型，1 json （可传递空数据，不能跨域），2 x-www-form-urlencoded （后台开启跨域后可跨域）
     * 调用的时候可先 var params = {} request(url,params,function(res) {
     * })
     */
    var request = function(url,data,successfn,errorfn,auto_show_errmsg,type,contentType){
        data = (data==null || data=="" || typeof(data)=="undefined")? {"date": new Date().getTime()} : data;
        type = type || 'POST';
        errorfn = errorfn || function(e){
            return alert('网络错误');
        }
        auto_show_errmsg = auto_show_errmsg || 1;
        // true 跨域请求
        contentType = contentType || 1;
        if(contentType == 1){
            var contentType = 'application/json;charset=utf-8';
            data = JSON.stringify(data);
        }else{
            var contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
            data = data;
        }
        $.ajax({
            type: type,
            url: url,
            contentType:contentType,
            data:data,
            dataType: "json",
            headers: {
                Devicetype: '5',
                Version: '1.0.0',
                Authorization: '0',
                Usertoken: ''
            },
            success:function(d){
                if(auto_show_errmsg == 1 && d.errcode == 201){
                    alert(d.errmsg);
                }
                return successfn(d);
            },
            error: function(XMLHttpResponse, textStatus, errorThrown){
                console.log("1 异步调用返回失败,XMLHttpResponse.readyState:"+XMLHttpResponse.readyState);
                console.log("2 异步调用返回失败,XMLHttpResponse.status:"+XMLHttpResponse.status);
                console.log("3 异步调用返回失败,textStatus:"+textStatus);
                console.log("4 异步调用返回失败,errorThrown:"+errorThrown);

                return errorfn(XMLHttpResponse);
            }

        });
    };
    // 根据键(key)拿到localStrong的值
    var get_localStorage = function(key){
        return JSON.parse(localStorage.getItem(key));
    };
    // 设置localStrong的键和值
    var set_localStorage = function(key,data){
        localStorage.setItem(key,JSON.stringify(data));
    };
    //不足十向前补零
    function add(num) {
        if(num<10) {
            return '0'+num
        } else {
            return num
        }
    };

    function dateTimeFormat(publishtime) {
        // 把获得的时间戳转换为毫秒
        publishtime = parseInt(publishtime) * 1000;
        // 把获得的时间戳转换成日期格式
        var date = new Date(publishtime);
        // 把现在进入的时间变成毫秒 
        var currTime = Date.parse(new Date());
        // 计算进入时间和获取到的时间的差 单位是秒
        var time = ((parseInt(currTime)) - parseInt(publishtime))/1000 ; 
        var seconds = time;
        // 获取到相差的总分钟数
        var minute = Math.floor(seconds/60);
        // 获取到相差的总小时数
        var hour =  Math.floor(minute/60);
        // 获取到相差的总天数
        var day =  Math.floor(hour/24);
        // time>0是计算已经开服多久了 time小于零的时候是计算预告开服的时间
        if(time > 0 ){

            // 秒转分钟数
            var minuies = time / 60; 
            if (minuies < 60) { 
                return '已开服' + Math.floor(minuies) + "分钟"; 
            } 
            
            var hours = time / 3600;
            if (hours < 24) { 
                return '已开服' + Math.floor(hours) + "小时"+Math.floor(seconds/60-hour*60)+"分钟"; 
            } 
            //秒转天数 
            var days = time / 3600 / 24; 
            if (days < 30) { 
                return '已开服' + Math.floor(days) + "天"+Math.floor((seconds/(60*60)-24*day))+"小时"; 
            } 
            //秒转月 
            var months = time / 3600 / 24 / 30; 
            if (months < 12) { 
                return '已开服' + Math.floor(months) + "月"; 
            } 
           
        }else{
            // 定义根据后台获取到的时间戳的年 月 日 小时 分钟
            var Y = date.getFullYear();
            var M = date.getMonth()+1;
            var D = date.getDate();
            var h = date.getHours();
            var m = date.getMinutes();
            // 定义进入的时间
            var currDate = new Date();
            // 当前的日 年
            var day = currDate.getDate();
            var month = currDate.getMonth()+1;
            var year = currDate.getFullYear();
            if(Y==year&& M==month && D == day ) {
                return "今日"+add(h) + ":"+add(m)+"开服"; 
            }
            if(Y==year) {
                return add(M) + '月' +add(D) + '日' + add(h) +':'+ add(m) + "开服";   
            }
            if(Y!=year) {
                return Y + '年' +add(M) + '月' +add(D) + '日' + add(h) +':'+ add(m) + "开服"; 
            }
        }
    };
    return {
        getHref : getHref,
        getCookie : getCookie,
        setCookie : setCookie,
        request : request,
        get_localStorage : get_localStorage,
        set_localStorage : set_localStorage,
        dateTimeFormat : dateTimeFormat,
    };
})();

//校验类（正则表达式,日期，查重）
var modular_checkdata = (function(){
    return {

    };
})();

//数据转换处理类（日期类，字符串类）
var modular_formatdata = (function(){
    var dates = function(getTime,type){
        seconds = parseInt(getTime) * 1000;
        var date = new Date(seconds);
        var year = date.getFullYear();
        var month = date.getMonth()+1;
        var day = date.getDate();
        var hour = date.getHours();
        var minute = date.getMinutes();
        function add(n) {
            if(n<10) {
                return '0'+n
            }
            return n
        }
        
        if(type==1) {
            return year + '/' + month + '/' + day + ' ' + hour + ':' + minute
        }
        if(type==2) {
            return year+'-'+month+'-'+day
        }
        if(type==3) {
            return year + '年' + month + '月' + day + '日'
        }
        if(type==4) {
            return year + '年' + month + '月' + day + '日  ' +  hour+'时'
        }
        if(type==5) {
            return year + '-' + add(month) + '-' + add(day) + ' '+ add(hour) +':' + add(minute)
        }
        if(type==6) {
            return year + '年' + add(month) + '月' + add(day) + '日 '+ add(hour) +'时' + add(minute)+'分'
        }
    };
    return {
        dates:dates,
    };
})();

//加密解密类
var modular_encryptdata = (function(){
    return {

    };
})();


