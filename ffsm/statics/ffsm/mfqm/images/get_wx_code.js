var site_from = document.body.getAttribute('site-from');
var page_from = document.body.getAttribute('page-from');
var weixin_code_json_url = '';
var weixin_code_reg = '';
var siteinfo_json_url = '/api/siteinfo.json';

switch (site_from) {
    case 'suan':
    case 'suan2':
    case 'suan3':
    case 'suan5':
    case 'suan4':
    case 'suan6':
        weixin_code_json_url = '/api/weixin_code_suan.json';
        weixin_code_reg = 'suan';
        break;
    case 'wap6':
    case 'wap8':
    case 'ming2':
    case 'logo':
    case 'logo2':
        weixin_code_json_url = '/api/weixin_code_company.json';
        weixin_code_reg = 'qm';
        break;
    case 'shop1':
    case 'shop2':
    case 'shop3':
        weixin_code_json_url = '/api/weixin_code_shop.json';
        weixin_code_reg = 'suan';
        break;
    default: weixin_code_json_url = "/api/weixin_code.json";
}

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
            var weixinArr = [];
            var weixinArrLength = 0;
            var randNum = 0;
            var wxcode_cookie = '';
            $.ajaxSettings.async = false;
            $.getJSON(weixin_code_json_url, function (data) {
                weixinArr = data
            });
            weixinArrLength = weixinArr.length;
            randNum = Math.floor(Math.random() * weixinArrLength);
            if (getCookie('weixin')) {
                if (weixin_code_reg != '' && !getCookie('weixin').isContain(weixin_code_reg)) {
                    setCookie("weixin", weixinArr[randNum], "d365")
                };
                if (!getCookie('weixin').isContain('quming') || !getCookie('weixin').isContain('qm')) {
                    setCookie("weixin", weixinArr[randNum], "d365")
                };
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
            info['siteFrom'] = site_from;
            info['pageFrom'] = site_from;
            curSiteDomain = window.location.href;
            $.ajaxSettings.async = false;
            $.getJSON(siteinfo_json_url, function (data) {
                $.each(data, function (i, item) {
                    if (curSiteDomain.isContain(item.name)) {
                        info = item;
                    }

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
                    wxCodeText = '加大师微信<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>' + $wxText;
                    wxCodeText_bottom = '加大师微信<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>' + $wxText;
                    classNameWxShow = 'default';
                    break;
                case '2':
                    wxCodeText = '加大师微信' + $wxText;
                    classNameWxShow = 'textOnly';
                    break;
            }
            if (cur_site.isContain('zysmgs') && !$('body').hasClass('page-homepage')) {
                classNameWxShow = 'default';
                wxCodeText = '加大师微信<span class="weixinAccount">' + getCookie('weixin') + '</span>' + $wxText;
            }
            if (info.title && info.title !== '') {
                $('body').addClass(info.name);
                if ($('.copy').length > 0) {
                    $('.copy').html('<div class="site-copyright"><span>' + info.title + '</span></div>')
                } else {
                    $('body').append('<div class="site-copyright"><span>' + info.title + '</span></div>');
                }
            }
            if (page_from == 'homepage') {
                if (info['logo'] && info['logo'] == 'hudun') {
                    $('.site-header').append('<a class="site-logo"></a>');
                } else if (info['logo'] && info['logo'] == 'hudun2') {
                    $('.site-header').append('<a class="site-logo2"></a>');
                }
            }
            $('.add_dashi_weixin').addClass(classNameWxShow).html(wxCodeText);
            $('.item-addWeixin .add_dashi_weixin').html(wxCodeText_bottom);
            $('.weixinCode').html('<a href="weixin://" target="_blank" class="weixinAccount">' + getCookie('weixin') + '</a>');
            $('.weixinCodeText').html(getCookie('weixin'));
        }
    }
})(window)

$(function () {
    babyMain.setWxCode();
    babyMain.getSiteInfo();
})