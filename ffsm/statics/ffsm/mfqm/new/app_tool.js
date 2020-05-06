!function(a){"use strict";function b(a,b){var c=(65535&a)+(65535&b),d=(a>>16)+(b>>16)+(c>>16);return d<<16|65535&c}function c(a,b){return a<<b|a>>>32-b}function d(a,d,e,f,g,h){return b(c(b(b(d,a),b(f,h)),g),e)}function e(a,b,c,e,f,g,h){return d(b&c|~b&e,a,b,f,g,h)}function f(a,b,c,e,f,g,h){return d(b&e|c&~e,a,b,f,g,h)}function g(a,b,c,e,f,g,h){return d(b^c^e,a,b,f,g,h)}function h(a,b,c,e,f,g,h){return d(c^(b|~e),a,b,f,g,h)}function i(a,c){a[c>>5]|=128<<c%32,a[(c+64>>>9<<4)+14]=c;var d,i,j,k,l,m=1732584193,n=-271733879,o=-1732584194,p=271733878;for(d=0;d<a.length;d+=16)i=m,j=n,k=o,l=p,m=e(m,n,o,p,a[d],7,-680876936),p=e(p,m,n,o,a[d+1],12,-389564586),o=e(o,p,m,n,a[d+2],17,606105819),n=e(n,o,p,m,a[d+3],22,-1044525330),m=e(m,n,o,p,a[d+4],7,-176418897),p=e(p,m,n,o,a[d+5],12,1200080426),o=e(o,p,m,n,a[d+6],17,-1473231341),n=e(n,o,p,m,a[d+7],22,-45705983),m=e(m,n,o,p,a[d+8],7,1770035416),p=e(p,m,n,o,a[d+9],12,-1958414417),o=e(o,p,m,n,a[d+10],17,-42063),n=e(n,o,p,m,a[d+11],22,-1990404162),m=e(m,n,o,p,a[d+12],7,1804603682),p=e(p,m,n,o,a[d+13],12,-40341101),o=e(o,p,m,n,a[d+14],17,-1502002290),n=e(n,o,p,m,a[d+15],22,1236535329),m=f(m,n,o,p,a[d+1],5,-165796510),p=f(p,m,n,o,a[d+6],9,-1069501632),o=f(o,p,m,n,a[d+11],14,643717713),n=f(n,o,p,m,a[d],20,-373897302),m=f(m,n,o,p,a[d+5],5,-701558691),p=f(p,m,n,o,a[d+10],9,38016083),o=f(o,p,m,n,a[d+15],14,-660478335),n=f(n,o,p,m,a[d+4],20,-405537848),m=f(m,n,o,p,a[d+9],5,568446438),p=f(p,m,n,o,a[d+14],9,-1019803690),o=f(o,p,m,n,a[d+3],14,-187363961),n=f(n,o,p,m,a[d+8],20,1163531501),m=f(m,n,o,p,a[d+13],5,-1444681467),p=f(p,m,n,o,a[d+2],9,-51403784),o=f(o,p,m,n,a[d+7],14,1735328473),n=f(n,o,p,m,a[d+12],20,-1926607734),m=g(m,n,o,p,a[d+5],4,-378558),p=g(p,m,n,o,a[d+8],11,-2022574463),o=g(o,p,m,n,a[d+11],16,1839030562),n=g(n,o,p,m,a[d+14],23,-35309556),m=g(m,n,o,p,a[d+1],4,-1530992060),p=g(p,m,n,o,a[d+4],11,1272893353),o=g(o,p,m,n,a[d+7],16,-155497632),n=g(n,o,p,m,a[d+10],23,-1094730640),m=g(m,n,o,p,a[d+13],4,681279174),p=g(p,m,n,o,a[d],11,-358537222),o=g(o,p,m,n,a[d+3],16,-722521979),n=g(n,o,p,m,a[d+6],23,76029189),m=g(m,n,o,p,a[d+9],4,-640364487),p=g(p,m,n,o,a[d+12],11,-421815835),o=g(o,p,m,n,a[d+15],16,530742520),n=g(n,o,p,m,a[d+2],23,-995338651),m=h(m,n,o,p,a[d],6,-198630844),p=h(p,m,n,o,a[d+7],10,1126891415),o=h(o,p,m,n,a[d+14],15,-1416354905),n=h(n,o,p,m,a[d+5],21,-57434055),m=h(m,n,o,p,a[d+12],6,1700485571),p=h(p,m,n,o,a[d+3],10,-1894986606),o=h(o,p,m,n,a[d+10],15,-1051523),n=h(n,o,p,m,a[d+1],21,-2054922799),m=h(m,n,o,p,a[d+8],6,1873313359),p=h(p,m,n,o,a[d+15],10,-30611744),o=h(o,p,m,n,a[d+6],15,-1560198380),n=h(n,o,p,m,a[d+13],21,1309151649),m=h(m,n,o,p,a[d+4],6,-145523070),p=h(p,m,n,o,a[d+11],10,-1120210379),o=h(o,p,m,n,a[d+2],15,718787259),n=h(n,o,p,m,a[d+9],21,-343485551),m=b(m,i),n=b(n,j),o=b(o,k),p=b(p,l);return[m,n,o,p]}function j(a){var b,c="";for(b=0;b<32*a.length;b+=8)c+=String.fromCharCode(a[b>>5]>>>b%32&255);return c}function k(a){var b,c=[];for(c[(a.length>>2)-1]=void 0,b=0;b<c.length;b+=1)c[b]=0;for(b=0;b<8*a.length;b+=8)c[b>>5]|=(255&a.charCodeAt(b/8))<<b%32;return c}function l(a){return j(i(k(a),8*a.length))}function m(a,b){var c,d,e=k(a),f=[],g=[];for(f[15]=g[15]=void 0,e.length>16&&(e=i(e,8*a.length)),c=0;16>c;c+=1)f[c]=909522486^e[c],g[c]=1549556828^e[c];return d=i(f.concat(k(b)),512+8*b.length),j(i(g.concat(d),640))}function n(a){var b,c,d="0123456789abcdef",e="";for(c=0;c<a.length;c+=1)b=a.charCodeAt(c),e+=d.charAt(b>>>4&15)+d.charAt(15&b);return e}function o(a){return unescape(encodeURIComponent(a))}function p(a){return l(o(a))}function q(a){return n(p(a))}function r(a,b){return m(o(a),o(b))}function s(a,b){return n(r(a,b))}function t(a,b,c){return b?c?r(b,a):s(b,a):c?p(a):q(a)}"function"==typeof define&&define.amd?define(function(){return t}):a.md5=t}(this);
String.prototype.unique = function () {
    var newStr = '';
    for (var i = 0; i < this.length; i++) {
        if (newStr.indexOf(this[i]) == -1) {
            newStr += this[i];
        }
    }
    return newStr
}

String.prototype.replaceBy = function (A, B) {
    var C = this;
    for (var i = 0; i < A.length; i++) {
        C = C.replace(A[i], B[i]);
    };
    return C;
};

String.prototype.removeFrom = function (A, B) {
    var s = '';
    if (A > 0) s = this.substring(0, A);
    if (A + B < this.length) s += this.substring(A + B, this.length);
    return s;
};

String.prototype.Trim = function () {
    var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}

String.prototype.trimAll = function () {
    return this.replace(/\s+/g, '')
};


String.prototype.endBy = function (A, B) {
    var C = this.length;
    var D = A.length;
    if (D > C) return false;
    if (B) {
        var E = new RegExp(A + '$', 'i');
        return E.test(this);
    } else return (D == 0 || this.substr(C - D, D) == A);
};

String.prototype.startFrom = function (str) {
    return this.substr(0, str.length) == str;
};

String.prototype.isContain = function (subStr) {
    var currentIndex = this.indexOf(subStr);
    if (currentIndex != -1) {
        return true;
    } else {
        return false;
    }
}

String.prototype.isMobile = function () {
    return (/^1[3|4|5|6|7|8|9][0-9]{9}$/.test(this.Trim()));
}

Array.prototype.notempty = function () {
    return this.filter(function (t) {
        t != undefined && t !== null
        return t;
    });
}

Array.prototype.insert = function (index, item) {
    this.splice(index, 0, item);
};

Array.prototype.removeValue = function (val) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == val) {
            this.splice(i, 1);
            break;
        }
    }
};

Array.prototype.randomValue = function () {
    var i, j, temp;
    for (i = this.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        temp = this[i];
        this[i] = this[j];
        this[j] = temp;
    }
    return this;
}

Date.prototype.Format = function (fmt) {
    var o = {
        "M+": this.getMonth() + 1,
        "d+": this.getDate(),
        "h+": this.getHours(),
        "m+": this.getMinutes(),
        "s+": this.getSeconds(),
        "q+": Math.floor((this.getMonth() + 3) / 3),
        "S": this.getMilliseconds()
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 -
        RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length ==
            1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}



function getQueryStrings() {
    var url = decodeURI(location.search);
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        str = str.split("&");
        for (var i = 0; i < str.length; i++) {
            theRequest[str[i].split("=")[0]] = unescape(str[i].split("=")[1]);
        }
    }
    return theRequest;
}

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}

function GetTime(n) {
    var date = new Date();
    var seperator = "-";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (n > 0) strDate = strDate - n;
    if (month >= 1 && month <= 9) { month = "0" + month; }
    if (strDate >= 0 && strDate <= 9) { strDate = "0" + strDate; }
    var currentdate = date.getFullYear() + seperator + month + seperator + strDate;
    return currentdate;
}

function oop() {
    document.getElementById("myModal").style.display = 'block';
}
function gbb() {
    document.getElementById("myModal").style.display = 'none';
}
function twx() {
    window.location.href = "weixin://";
}

window.isPc = function () {
    // console.log(/Android|webOS|iPhone|iPod|BlackBerry/i.test(window.navigator.userAgent))
    return /windows nt/i.test(window.navigator.userAgent.toLowerCase());
}

function baziInfoDetails(bazi) {
    var wxEraYear = '';
    var wxEraMonth = '';
    var wxEraDay = '';
    var wxEraHour = '';
    var cgYear = '';
    var cgMonth = '';
    var cgDay = '';
    var cgHour = '';
    var cgYearWx = '';
    var cgMonthWx = '';
    var cgDayWx = '';
    var cgHourWx = '';
    bazi['wxEraYear'].forEach(function (item, index) {
        wxEraYear += item;
    })
    bazi['wxEraMonth'].forEach(function (item, index) {
        wxEraMonth += item;
    })
    bazi['wxEraDay'].forEach(function (item, index) {
        wxEraDay += item;
    })
    bazi['wxEraHour'].forEach(function (item, index) {
        wxEraHour += item;
    })
    bazi['cgYear'].forEach(function (item, index) {
        cgYear += item;
    })
    bazi['cgMonth'].forEach(function (item, index) {
        cgMonth += item;
    })
    bazi['cgDay'].forEach(function (item, index) {
        cgDay += item;
    })
    bazi['cgHour'].forEach(function (item, index) {
        cgHour += item;
    })
    bazi['cgYearWx'].forEach(function (item, index) {
        cgYearWx += item;
    })
    bazi['cgMonthWx'].forEach(function (item, index) {
        cgMonthWx += item;
    })
    bazi['cgDayWx'].forEach(function (item, index) {
        cgDayWx += item;
    })
    bazi['cgHourWx'].forEach(function (item, index) {
        cgHourWx += item;
    })
    return {
        genderBazi: bazi['sex'] == '男' ? '乾造' : '坤造',
        ssEraYear: bazi['ssEraYear'],
        ssEraMonth: bazi['ssEraMonth'],
        ssEraDay: bazi['ssEraDay'],
        ssEraHour: bazi['ssEraHour'],
        cnEraYear: bazi['cnEraYear'],
        cnEraMonth: bazi['cnEraMonth'],
        cnEraDay: bazi['cnEraDay'],
        cnEraHour: bazi['cnEraHour'],
        nyYear: bazi['nyYear'],
        nyMonth: bazi['nyMonth'],
        nyDay: bazi['nyDay'],
        nyHour: bazi['nyHour'],
        mingju: bazi['mingju'],
        wxEraYear: wxEraYear,
        wxEraMonth: wxEraMonth,
        wxEraDay: wxEraDay,
        wxEraHour: wxEraHour,
        cgYear: cgYear,
        cgMonth: cgMonth,
        cgDay: cgDay,
        cgHour: cgHour,
        cgYearWx: cgYearWx,
        cgMonthWx: cgMonthWx,
        cgDayWx: cgDayWx,
        cgHourWx: cgHourWx,
    }
}

window.MainConfig = {
    isDev: false,
    setDev: function (env) {
        this.isDev = env;
    },
    url: {
        'wap':{
            'payResult': '/wap/pay/quming/quminglist.php',
        },
        'suan':{
            'payResult': '/suan/pay/quming/quminglist.php',
        },
        'suan2':{
            'payResult': '/suan2/pay/quming/quminglist.php',
        },
        'suan3':{
            'payResult': '/suan3/pay/quming/quminglist.php',
        },
        'suan4':{
            'payResult': '/suan4/pay/quming/quminglist.php',
        },
        'suan6':{
            'payResult': '/suan6/pay/quming/quminglist.php',
        },
        'score':{
            'payResult': '/score/pay/quming/quminglist.php',
        },
        'logo':{
            'payResult': '/logo2/result.html',
        },
        'wap6':{
            'payResult': '/wap6/pay/quming/quminglist.php',
        },
        shop1: {
            'payResult': '/shop2/result',
        },
        shop2: {
            'payResult': '/shop2/result',
        },
        shop3: {
            'payResult': '/shop3/result',
        },
        shop4: {
            'payResult': '/shop4/result',
        }
    },
    appInfo: {
        softs: {
            'wap': {
                'id': 103,
                'name': '起名大师',
                'order_type': 0
            },
            'suan': {
                'id': 106,
                'name': '周易算命',
                'order_type': 0
            },
            'suan2': {
                'id': 110,
                'name': '周易算命',
                'order_type': 0
            },
            'suan3': {
                'id': 111,
                'name': '周易算命',
                'order_type': 0
            },
            'score': {
                'id': 108,
                'name': '测名打分',
                'order_type': 0
            },
            'company': {
                'id': 109,
                'name': '企名宝',
                'order_type': 0
            },
            'shop1': {
                'id': 112,
                'name': '周易商城',
                'order_type': 1
            },
            'shop2': {
                'id': 113,
                'name': '周易商城',
                'order_type': 1
            },
            'shop3': {
                'id': 120,
                'name': '周易商城',
                'order_type': 1
            },
            'shop4': {
                'id': 121,
                'name': '周易商城',
                'order_type': 1
            }
        }
    },
    api: {
        domain: '',
        create_order: '/api/order/create_order.php',
        check_order_status: '/api/order/check_order_status.php',
        get: function () {
            "use strict";
            var payFormUrl = MainConfig.isDev ? 'http://testqumingweb.huduntech.com/api/pay/pay_wap.php' : 'http://qumingweb.huduntech.com/api/pay/pay_wap.php';
            if (document.getElementById('payOrder')) {
                document.getElementById('payOrder').setAttribute('action', payFormUrl)
            }
        }
    },
    initAll: function () {
        this.api.get();
    }
};

iosMeiMingBao = (function name(params) {
    return {
        info: {
            platform: '',
            version: '',
            test: false,
        },
        setInfo: function (version, test) {
            this.info['version'] = version;
            this.info['test'] = test;
        },
        getInfo: function () {
            return this.info;
        },
        isTesting: function () {
            var info = this.info;
            var platform = (getQueryString('platform') == 'MeiMingBao_IOS');
            var version = (getQueryString('version') == this.info['version']);
            var test = this.info.test;
            return platform && version && test;
        }
    }
})(window);


window.countDown = (function () {
    var second = 59;
    var minute = 59;
    var hour = 0;
    var count;
    return {
        init: function () {
            var s_container = document.getElementById('second');
            var h_container = document.getElementById('hour');
            var m_container = document.getElementById('minute');
            if (!s_container || !h_container || !m_container) {
                return false;
            }
            if (second < 10) {
                s_container.innerHTML = '0' + second;
            } else {
                s_container.innerHTML = second;
            }
            if (hour < 10) {
                h_container.innerHTML = '0' + hour;
            } else {
                h_container.innerHTML = hour;
            }
            if (minute < 10) {
                m_container.innerHTML = '0' + minute;
            } else {
                m_container.innerHTML = minute;

            }
        },
        minute: function () {
            if (minute > 0) {
                minute--
            } else {
                minute = 59
                countDown.hour();
            }
        },
        hour: function () {
            if (hour > 0) {
                hour--
            } else {
                clearInterval(count)
                hour = 0;
                minute = 0;
                second = 0;
                setTimeout(function () {
                    countDown.init()
                }, 100)
                return false
            }
        },
        second: function () {
            if (second > 0) {
                second--
            } else {
                second = 59
                countDown.minute()
            }
            countDown.init()
        },
        start: function () {
            count = setInterval(function () {
                countDown.second()
            }, 1000)
        }
    }
})(window);

(function () {
    MainConfig.initAll();

    iosMeiMingBao.setInfo('2.2.2', false);

    if (isPc()) {
        document.body.classList.add('pc')
    }

    if (getQueryString('platform') == 'ZhouYiMiaoSuan' && getQueryString('version') == '1.1') {
        iosMeiMingBao.isTesting = function () {
            return false;
        }
    }

    if (typeof localStorage === 'object') {
        try {
            localStorage.setItem('localStorage', 1);
            localStorage.removeItem('localStorage');
        } catch (e) {
            Storage.prototype._setItem = Storage.prototype.setItem;
            Storage.prototype.setItem = function () { };
            alert('您的浏览器当前不支持本地存储，可能您当前处于隐私模式或无痕浏览模式，请关闭隐私模式或无痕浏览模式后再次尝试访问。');
        }
    }
})();

function getCurDate(){
    var now = new Date();
    var year = now.getFullYear();
    if(parseInt(year)<10){
        year = '0' + year;
    }else{
        year = year;
    }

    var month = now.getMonth()+1;
    if(parseInt(month)<10){
        month = '0' + month;
    }else{
        month = month;
    }

    var date = now.getDate();
    if(parseInt(date)<10){
        date = '0' + date;
    }else{
        date = date;
    }
    return year+'-'+month+'-'+date;
}

function getOrderStatuToken(order_num){
    return md5(order_num+getCurDate()+'YXA6XnzjwHf3EeeouZ1bMmmAmw');
}
