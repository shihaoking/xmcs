var reckon = (function() {
    // 生成UUID
    var UUID = function() {
        var d = new Date().getTime();
        if (window.performance && typeof window.performance.now === "function") {
            d += performance.now(); //use high-precision timer if available
        }
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    };

    // 半小时倒计时
    var time = {
        init: function(countTime) {
            var h = 0;
            var m = 29;
            var s = 59;
            countTime.innerHTML="00 : 29 : 59";
            //进行倒计时显示
            var time = setInterval(function(){
                --s;
                if(s<0){
                    --m;
                    s=59;
                }
                if(m<0){
                    h=0;
                    s=0;
                    m=0;
                }
                function checkTime(i){
                    if (i < 10) {
                        i = '0' + i
                    }
                    return i
                }
                countTime.innerHTML= checkTime(h) + " : " + checkTime(m) + " : " + checkTime(s);
            },1000);
        }
    };
    
    // 向上移动 方法一
    var scrollTop = 0;
    var scrollTip = function(scrollUl) {
        var top=scrollUl.children('li').eq(0).outerHeight();
        // 当li向上移动的top值跟li高度一致的时候 就把第一个li插入到最后一个
        if(Math.abs(scrollTop)==Math.abs(top)){
            scrollUl.children('li').eq(0).appendTo(scrollUl);
            scrollUl.css("top",0);
            scrollTop=0;
            
        }else{
            scrollTop--;
            scrollUl.css("top",scrollTop);
        }
    };

    // 向上移动方法二 jquery 动画语法  $(selector).animate(styles,speed,easing,callback)
    var moveUp = function(selector) {
        var top = selector.find("ul li").outerHeight()
        selector.find("ul").animate({
            marginTop : -top
        },1500,function(){
            $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);
        })
    };

    return {
        UUID : UUID,
        time : time,
        scrollTip: scrollTip,
        moveUp: moveUp,
    }
})()


