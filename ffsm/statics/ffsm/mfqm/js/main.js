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

function clearshake() {
    setTimeout(function () {
        $(".shake").removeClass('shake');
    }, 2000)
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

function randomNum(minNum, maxNum) {
    switch (arguments.length) {
        case 1:
            return parseInt(Math.random() * minNum + 1, 10);
            break;
        case 2:
            return parseInt(Math.random() * (maxNum - minNum + 1) + minNum, 10);
            break;
        default:
            return 0;
            break;
    }
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
    if (r != null) return unescape(r[2]); return null;
}


function checkToolType(toolChoosen) {
    var curTool = '', toolFormGet = '';
    switch (toolChoosen) {
        case '1':
            curTool = 'getName';
            $('#bornStatus').val(0);
            bornStatusCheck(0);
            $('.form-groups-name .title-group').html('姓氏：');
            $('.btnKeyWord').text('立即取名');
            $('#smname').attr({
                'placeholder': '必须是汉字，最多两个字',
                'maxlength': 2
            });
            break;
        case '2':
            curTool = 'getNameScore';
            $('#bornStatus').val(1);
            bornStatusCheck(1);
            $('.form-groups-name .title-group').html('姓名：');
            $('.btnKeyWord').text('立即测算');
            $('#smname').attr({
                'placeholder': '必须是汉字，最多四个字',
                'maxlength': 4
            });
            break;
    }
    $('.form-name-get').attr({
        'form-tool-type': curTool
    })
    return curTool;
}
function getSoftInfo(siteFrom) {
    var softInfo = {},
        softs = {
            'wap': {
                'id': 103,
                'softname': '周易起名 联系微信 ',
                'keyword': '周易起名',
                "price": '29.80'
            },
            'suan': {
                'id': 106,
                'softname': '周易算命 联系微信 ',
                'keyword': '周易算命',
                "price": '29.80'
            },
            'suan2': {
                'id': 110,
                'softname': '周易算命 联系微信 ',
                'keyword': '周易算命',
                "price": '39.80'
            },
            'suan3': {
                'id': 111,
                'softname': '周易算命 联系微信 ',
                'keyword': '周易算命',
                "price": '29.80'
            },
            'score': {
                'id': 108,
                'softname': '测名打分 联系微信 ',
                'keyword': '测名打分',
                "price": '29.80'
            },
            'company': {
                'id': 109,
                'softname': '企名宝 联系微信 ',
                'keyword': '企名宝',
                "price": '78.00'
            },
        };
    switch (siteFrom) {
        case 'wap':
        case 'wap2':
        case 'wap3':
        case 'wap4':
        case 'wap5':
        case 'pc':
            softInfo = softs['wap'];
            break;
        case 'suan':
            softInfo = softs['suan'];
            break;
        case 'suan2':
            softInfo = softs['suan2'];
            break;
        case 'suan3':
            softInfo = softs['suan3'];
            break;
        case 'score':
            softInfo = softs['score'];
            if ($('.form-name-get').attr('form-tool-type') == 'getName') {
                softInfo = softs['wap'];
            }
            break;
        case 'wap6':
            softInfo = softs['company'];
            break;
        default: softInfo = softs['wap'];
    }
    return softInfo;
}

(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            var fts = clientWidth / 10;
            if (fts < 32) {
                fts = 32;
            } else if (fts > 72) {
                fts = 72;
            }
            docEl.style.fontSize = fts + 'px';
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

babyMain = (function () {
    return {
        ispc: (function () {
            var userAgent = window.navigator.userAgent.toLowerCase();
            return /windows nt/i.test(userAgent);
        })(),
        isOnline: (function () {
            return navigator.onLine;
        })(),
        isPhoneNum: function (str) {
            return RegExp(/^1[34578]\d{9}$/).test(str);
        },
        setWxCode: function () {
            var weixinArr = [], weixinArrLength = 0, randNum = 0, site_from = $('body').attr('site-from'), wxcode_cookie = '';
            $.ajaxSettings.async = false;
            var weixin_code_json_url = '';
            switch (site_from) {
                case 'suan':
                case 'suan2':
                case 'suan3':
                    weixin_code_json_url = '/api/weixin_code_suan.json';
                    break;
                case 'wap6':
                    weixin_code_json_url = '/api/weixin_code_company.json';
                    break;
                default: weixin_code_json_url = "/api/weixin_code.json";
            }
            $.getJSON(weixin_code_json_url, function (data) {
                weixinArr = data
            });
            weixinArrLength = weixinArr.length;
            randNum = Math.floor(Math.random() * weixinArrLength);
            if (getCookie('weixin')) {
                switch (site_from) {
                    case 'suan':
                    case 'suan2':
                    case 'suan3':
                        if (!getCookie('weixin').isContain('suan')) setCookie("weixin", weixinArr[randNum], "d365");
                        break;
                    case 'wap6':
                        if (!getCookie('weixin').isContain('qm')) setCookie("weixin", weixinArr[randNum], "d365");
                        break;
                    default:
                        if (!getCookie('weixin').isContain('quming')) setCookie("weixin", weixinArr[randNum], "d365");
                }
            } else {
                setCookie("weixin", weixinArr[randNum], "d365");
            }
        },
        siteInfo: function () {
            var curSiteDomain = '',
                info = {
                    "name": "",
                    "title": "",
                    "autoPc": '0',
                    "wxShow": '1',
                    "logo": '0'
                };
            info['siteFrom'] = document.body.getAttribute('site-from');
            info['pageFrom'] = document.body.getAttribute('page-from');
            curSiteDomain = window.location.href;
            $.ajaxSettings.async = false;
            $.getJSON('/api/siteinfo.json', function (data) {
                $.each(data, function (i, item) {
                    if (curSiteDomain.isContain(item.name))
                        info = item;

                });
            });
            return info;
        },
        getSiteInfo: function () {
            var classNameWxShow = '';
            var wxCodeText = '';
            var wxCodeText_bottom = '';
            var info = this.siteInfo();
            var cur_site = window.location.href;
            var site_from = $('body').attr('site-from');
            var page_from = $('body').attr('page-from');
            if (info.autoPc == 1 && this.ispc && $('.page-homepage').length > 0) {
                if (site_from == 'suan') {
                    return;
                }
                window.location.href = '/pc';
            }
            var $wxText = '人工起名';
            if (site_from == 'suan' || site_from == 'score') {
                $wxText = '大师亲算'
            }
            switch (info.wxShow) {
                case '0':
                    wxCodeText = '';
                    classNameWxShow = 'hidden';
                    break;
                case '1':
                    wxCodeText = '加老师微信<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>' + $wxText;
                    wxCodeText_bottom = '加老师微信<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>' + $wxText;
                    classNameWxShow = 'default';
                    break;
                case '2':
                    wxCodeText = '加老师微信' + $wxText;
                    classNameWxShow = 'textOnly';
                    break;
            }
            if (cur_site.isContain('zysmgs') && !$('body').hasClass('page-homepage')) {
                classNameWxShow = 'default';
                wxCodeText = '加老师微信<span class="weixinAccount">' + getCookie('weixin') + '</span>' + $wxText;
            }
            if (info.title && info.title !== '') {
                $('body').addClass(info.name).append('<div class="site-copyright"><span>' + info.title + '</span></div>');
            }
            var is_quming = (site_from == 'wap' || site_from == 'wap2' || site_from == 'wap3' || site_from == 'wap4' || site_from == 'wap5' || site_from == 'wap6' || site_from == 'wap7');
            if (info['logo'] && info['logo'] == 'hudun' && is_quming && page_from == 'homepage') {
                $('.site-header').append('<a class="site-logo"></a>');
            }
            $('.add_dashi_weixin').addClass(classNameWxShow).html(wxCodeText);
            $('.item-addWeixin .add_dashi_weixin').html(wxCodeText_bottom);
            $('.weixinCode').html('<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>');
            $('.weixinCodeText').html(getCookie('weixin'));
        }
    }
})(window)

jQuery(document).ready(function ($) {

    babyMain.setWxCode();
    babyMain.getSiteInfo();

    $('.fixFlag').eq(0).prepend('<div style="width: 100%; height: 1px; overflow: hidden;position: absolute; left: 0; top: -0.75rem;" id="ceForm"></div>');
    $(window).scroll(function () {
        var hTop = 150;
        var docTop = $(this).scrollTop() - 20;
        if ($('#ceForm').length > 0) {
            hTop = $('#ceForm').offset().top
        }
        if (docTop >= hTop) {
            $('.fix, .btnUnlockFix').show();
        } else {
            $('.fix, .btnUnlockFix').hide();
        }
        if ($('.page-homepage.site-qiming-company').length > 0) {
            var formTop = $('.user-infos').offset().top;
            var formBottom = $('.user-infos').outerHeight() + $('.user-infos').offset().top;
            if (docTop > formTop - 300) {
                $('.fix, .btnUnlockFix,.btnNow_getName_BottomFix').hide();
            }
            if (docTop > formBottom) {
                $('.fix, .btnUnlockFix,.btnNow_getName_BottomFix').show();
            }
        }
    });

    $('.fix').click(function () {
        if ($('.fixFlag'.length > 0)) {
            $(window).scrollTop($('#ceForm').offset().top);
        }
        $('.fix').hide();
    });

    $(window).on('scroll', function () {
        if ($('.page-names-detail .top-tite').length > 0 && $(this).scrollTop() > $('.page-names-detail .top-tite').outerHeight()) {
            $('.page-names-detail').addClass('topOrderFixed')
        } else {
            $('.page-names-detail').removeClass('topOrderFixed')
        }
    });

    $(function () {
        $('.btnGetNameNow, .sections-unlock').on({
            click: function () {
                $('html,body').animate({
                    scrollTop: 0
                }, 800);
            }
        })
    })

    if ($('.item-addWeixin').length > 0) {
        $('body').css({
            'padding-bottom': $('.item-addWeixin').outerHeight() + 'px'
        })
    }
    if ($('.btnUnlockFix').length > 0) {
        $('body').css({
            'padding-bottom': $('.btnUnlockFix').outerHeight() + 'px'
        });
        $('.btnUnlockFix').on({
            click: function () {
                $('html,body').animate({
                    scrollTop: 0
                }, 800);
            }
        })
    }
    if ($('.btnNow_getName_QY').length > 0) {
        $('body').css({
            'padding-bottom': $('.btnNow_getName_QY').outerHeight() + 'px'
        })
    }
});


$(function () {
    if ($('.page-history').length > 0 && $('.page-history .orderListItem').length == 0) {
        $('.page-history .orderSearchBox').after('<p class="text-center orderListEmpty"><span>暂无订单记录</span></p>');
    }
})

scrollContent = (function () {
    return {
        user: {
            names: [
                '黄先生',
                '王女士',
                '吴先生',
                '郭先生',
                '汤女士',
                '汪女士',
                '高先生',
                '苏女士',
                '李先生',
                '吴先生',
                '李先生',
                '孙先生',
                '胡先生',
                '李先生',
                '余先生',
                '刘女士',
                '郭女士',
                '孟先生',
                '王先生',
                '亓女士',
            ],
            city: [
                '佛山',
                '宁波',
                '南京',
                '成都',
                '沈阳',
                '台湾',
                '澳门',
                '新加坡',
                '香港',
                '广州',
                '湛江',
                '广西',
                '上海',
                '北京',
                '苏州',
                '天津',
                '重庆',
                '杭州',
                '无锡',
                '青岛',
            ],
            userComments: [
                '比我们这里的算命先生厉害，算得准，也有很好的建议。',
                '还不错，婚姻方面算的很好，推荐的择偶标准也是我想要的。',
                '事业方面实在是分析得太好了，悬着适合自己的工作很重要。',
                '婚姻方面真的准！提供很好的相处建议，对未来的婚姻有信心！',
                '感情内容非常准，希望17年能像大师所说的那样组建幸福家庭！',
                '超赞！分析得很好，大师真的超级厉害！',
                '说我的财富好，我在这一方面确实一直有福气！',
                '事业分析的很准，一直在纠结要不要自己创业，还是听大师的！',
                '大师分析的好准，非常感谢老师的建议指导。',
                '分析得好准，希望17年真如分析所说那样能当上主管。',
                '本来准备下半年结婚的，大师算我下半年结婚的，准！',
                '分析得很详细，比本地的算命先生还要准。',
                '婚姻和事业建议有帮助，值得一看！',
                '算我事业不太好，最近确实亏了不少钱，希望能转机！',
                '结果内容很好，也有很多建议，相信17年一定会更顺利！',
                '事业和财富算得好准，跳槽发展果然是适合我的好选择！',
                '分析还是很准的，对感情有帮助，明年应该就如大师说的结婚！',
                '感谢老师提供的事业建议，明年努力就能升职了！',
                '一生的情况分析的好准，算我17年就能找到女朋友。开心！',
                '分析得好准，非常感谢老师的建议指导！',
            ],
        },
        getRandomNumber: function (n) {
            var numStr = "";
            for (var i = 0; i < n; i++) {
                var num = Math.floor(Math.random() * 10);
                numStr = numStr + num;
            }
            return numStr;
        },
        getOrderListText: function () {
            var self = this,
                gb_price = "29.80",
                containerHtml = '';
            for (var i = 0; i < 10; i++) {
                containerHtml += '<li class="list-item">' +
                    '<span class="name">' + self.user.names.randomValue()[i] + '</span>' +
                    '<span class="num">20***' + self.getRandomNumber(5) + '</span>' +
                    '<span class="time">' + (new Date()).Format("yyyy-MM-dd") + '</span>' +
                    '</li>';
            }
            return containerHtml;
        }
    }
})(window)

$(function () {
    if ($('.page-history').length > 0 && $('.scroll-order-list').length > 0) {
        $('.scroll-order-list .list-items').html(scrollContent.getOrderListText());
        $('.scroll-order-list').kxbdMarquee({ direction: "up", isEqual: false });
    }
})

$('.getToolItem > .toolItem').on({
    click: function () {
        var toolChoosen = $(this).attr('tool-type'), curTool = checkToolType(toolChoosen);
        $(this).addClass('checked').siblings().removeClass('checked');
    }
})

function radioTypeTodo(radioName, radioValue) {
    switch (radioName) {
        case 'bornStatus':
            bornStatusCheck(radioValue);
            break;
        case 'gender':
            babySexCheck(radioValue);
            break;
    }
}
function babySexCheck(sex) {
    switch (status) {
        case '1':
            bornStatusCheck('1')
            break;
        case '0':
            bornStatusCheck('1')
            break;
        case '-1':
            bornStatusCheck('0')
            break;
    }
}

function bornStatusCheck(status) {
    var titleDate = '', titleTime = '', timeShow = '', birthdayPlaceHolder = '';
    if (status == '1') {
        $('.form-groups .radio-group .radio-ele.sexUnknow').removeClass('show');
        titleDate = '出生日期：';
        titleTime = '出生时辰：';
        timeShow = 'show';
        birthdayPlaceHolder = '请选择日期 (可不填)';
        $('.form-groups-sex .radio-group .radio-ele[data-value="1"]').addClass('checked').siblings().removeClass('checked');
        $('#gender').val(1)
        if ($('#gender').val() == '0') {
            $('#gender').val(0)
            $('.form-groups-sex .radio-group .radio-ele[data-value="0"]').addClass('checked').siblings().removeClass('checked');
        }
    } else {
        $('.form-groups .radio-group .radio-ele.sexUnknow').addClass('show');
        titleDate = '预产日期：';
        titleTime = '预产时辰：';
        timeShow = 'hide';
        birthdayPlaceHolder = '请预估宝宝的生日 (可不填)';
        $('.form-groups-bornStatus .radio-group .radio-ele').removeClass('checked').eq(1).addClass('checked');
        $('.form-groups-sex .radio-group .radio-ele').removeClass('checked');
        $('.form-groups-sex .radio-group .radio-ele.sexUnknow').addClass('checked');
        $('.form-groups-sex .radio-group .radio-ele[data-value="-1"]').addClass('checked').siblings().removeClass('checked');
        $('#gender').val(-1)
    }
    if (timeShow == 'show') {
        $('#birthday').attr({
            'data-toid-hour': 'birthday_hour'
        })
    } else {
        $("#birthday, #hour, #minutes").val('')
        $('#birthday').removeAttr('data-toid-hour')
    }
    $('.form-groups-date .title-group').html(titleDate)
    $('.form-groups-time .title-group').html(titleTime)
    $('.form-name-get').attr({
        'form-show-time': timeShow
    })
    $('#birthday').attr({
        'placeholder': birthdayPlaceHolder
    })
}

$('.radio-group .radio-ele').on({
    click: function () {
        var radioName = $(this).parent().attr('radio-name'), radioValue = $(this).attr('data-value');
        $(this).addClass('checked').siblings().removeClass('checked');
        $('#' + radioName).val(radioValue);
        if ($('.form-name-get').length > 0) {
            radioTypeTodo(radioName, radioValue);
        }
    }
})

$(function () {
    $('a[href="weixin://"]').on({
        click: function () {
            if (window.android && window.android.openWeixin) {
                android.openWeixin(getCookie('weixin'));
                return false;
            }
        }
    })
    if (getQueryString('platform') && getQueryString('platform') == 'MeiMingBao_IOS') {
        $('.name-list .list-itmes .list-item a').each(function () {
            var search_symbol = '?';
            if ($(this).attr('href').indexOf("?") != -1) {
                search_symbol = '';
            }
            $(this).attr({
                'href': $(this).attr('href') + search_symbol + '&platform=MeiMingBao_IOS'
            })
        })
        $('.my-order').each(function () {
            var search_symbol = '?';
            if ($(this).attr('href').indexOf("?") != -1) {
                search_symbol = '';
            }
            $(this).attr({
                'href': $(this).attr('href') + search_symbol + '&platform=MeiMingBao_IOS'
            })
        })

        $('.orderListItem a').each(function () {
            var search_symbol = '?';
            if ($(this).attr('href').indexOf("?") != -1) {
                search_symbol = '';
            }
            $(this).attr({
                'href': $(this).attr('href') + search_symbol + '&platform=MeiMingBao_IOS'
            })
        })
    }


})
function loadingPage(url) {
    var animatedLoadingHtml = '<div class="layer-loading js-layer-loading"><div class="layer-loading-box"><div class="layer-loading-border js-loading-border"></div><div class="layer-loading-tray js-loading-tray"></div><div class="layer-loading-pointer js-loading-pointer"></div></div></div>';
    $('body').append(animatedLoadingHtml);
    $('.js-layer-loading').fadeIn();
    setTimeout($('.js-layer-loading').fadeOut(), 6000);
    setTimeout("top.location.href = '" + url + "'", 1000);
}

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
})(window)
iosMeiMingBao.setInfo('2.2.0', false);

$(function () {
    $('.orderSearchBox [type="submit"]').on({
        click: function () {
            var search_value = $('#searchOrder').val();
            if (search_value == '') {
                $('#searchOrder').focus();
                return false;
            }
        }
    })
})
