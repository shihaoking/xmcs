function changeURLArg(url, arg, arg_val) {
    var pattern = arg + '=([^&]*)';
    var replaceText = arg + '=' + arg_val;
    if (url.match(pattern)) {
        var tmp = '/(' + arg + '=)([^&]*)/gi';
        tmp = url.replace(eval(tmp), replaceText);
        return tmp;
    } else {
        if (url.match('[\?]')) {
            return url + '&' + replaceText;
        } else {
            return url + '?' + replaceText;
        }
    }
}
$(function () {
    var _content = [];
    var getMoreList = {
        _default: 18,
        _loading: 18,
        _total: $(".loadmore ul.list li").length,
        init: function () {
            var lis = $(".loadmore .hidden li");
            $(".loadmore ul.list").html("");
            for (var n = 0; n < getMoreList._default; n++) {
                lis.eq(n).appendTo(".loadmore ul.list");
            }
            $(".loadmore ul.list img").each(function () {
                $(this).attr('src', $(this).attr('realSrc'));
            })
            for (var i = getMoreList._default; i < lis.length; i++) {
                _content.push(lis.eq(i));
            }
            $(".loadmore .hidden").html("");
        },
        loadMore: function () {
            var mLis = $(".loadmore ul.list li").length;
            for (var i = 0; i < getMoreList._loading; i++) {
                var target = _content.shift();
                if (!target) {
                    $('.loadmore .more').html("<p>全部加载完毕...</p>");
                    break;
                }
                $(".loadmore ul.list").append(target);
            }
        }
    }
    getMoreList.init();
    $('.add_more').on({
        click: function () {
            getMoreList.loadMore();
            getNameDetailsLink()
            if (_content.length == 0) {
                $('.add_more').html('没有更多了').css({
                    'opacity': '.5'
                });
                return false;
            }
        }
    })

    $('.surname-length>span').on({
        click: function () {
            $('.surname-length .surname-options').show();
        }
    })
    $('.surname-length .surname-options a').on({
        click: function () {
            var is_testing = getQueryString('is_testing');
            $url = '';
            switch ($(this).index()) {
                case 0:
                    $url = changeURLArg($('.namesReget').attr('href'), 'single', 1);
                    $('.surname-length-value').text('单字名');
                    break;
                case 1:
                    $url = changeURLArg($('.namesReget').attr('href'), 'single', 0);
                    $('.surname-length-value').text('双字名');
                    break;
            }
            $('.namesReget').attr({
                href: $url + '&is_testing=' + is_testing
            });
            $('.surname-length .surname-options').hide();
        }
    })
    $(document).on({
        click: function () {
            var topTitle = $('.surname-length');
            if (!topTitle.is(event.target) && topTitle.has(event.target).length === 0) {
                $('.surname-length .surname-options').hide();
            }
        },
        touchend: function () {
            var topTitle = $('.surname-length');
            if (!topTitle.is(event.target) && topTitle.has(event.target).length === 0) {
                $('.surname-length .surname-options').hide();
            }
        }
    })

    function getNameDetailsLink() {
        var is_testing = getQueryString('is_testing');
        if (is_testing) {
            $('.namesReget').attr({
                href: $('.namesReget').attr('href') + '&is_testing=' + is_testing
            });
            $('.name-list .list-item a').each(function () {
                $(this).attr({
                    'href': $(this).attr('href') + '&is_testing=' + is_testing
                })
            })
        }
    }
    getNameDetailsLink()
    $('.g-title-primary span').append('<i class="icon-pattern pattern-top-left">&#xe612;</i><i class="icon-pattern pattern-top-right">&#xe612;</i><i class="icon-pattern pattern-bottom-left">&#xe612;</i><i class="icon-pattern pattern-bottom-right">&#xe612;</i>');
})


/******************增加侧边 在线客服*******************/
$(function () {
    var masterName = "";
    var masterTitle = '大师';
    var masterWxPic = '';
    switch ($("body").attr("site-from")) {
        case 'wap6':
            masterTitle = '老师';
            masterWxPic = 'type-1';
            break;
        case "wap7":
        case 'wap8':
        case 'suan5':
            masterName = "罗永峰";
            masterWxPic = 'type-1';
            masterTitle = '老师';
            break;
        case 'ming2':
        case 'ming1':
            masterName = '张宏毅';
            masterTitle = '老师';
            break;
    }
    $('.mster-name').html(masterName);
    $('.mster-title').html(masterName);
    var wxCode = getCookie('weixin');
    var asideServicesHtml = '<div class="modal-servicse-bg"><div class="modal-servicse"><h1>加'+masterName+masterTitle+'微信起好名字</h1><p><span>每天只通过50个名额</span><span>长按下方按钮复制并添加微信号</span></p><a class="btn-weixin-code">' + wxCode + '</a><a class="btn-open-weixin" href="weixin://">打开微信</a><a class="btn-close">×</a></div></div><div class="aside-contact-group"><div class="aisde-master-weixin '+masterWxPic+'"></div></div>';
    $('body').append(asideServicesHtml);
    $('.modal-servicse-bg, .modal-servicse-bg .btn-close').on({
        click: function (e) {
            if ($(this).is(e.target)) {
                $('.modal-servicse-bg').hide();
            }
        }
    })
    $('.aisde-master-weixin').on({
        click: function () {
            $('.modal-servicse-bg').show();
            $('.modal-servicse').css({
                'margin-top': -0.5 * $('.modal-servicse').outerHeight() + 'px'
            })
        }
    })
})
var dynamicLoading = {
    css: function (path) {
        if (!path || path.length === 0) {
            throw new Error('argument "path" is required !');
        }
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.href = path;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        head.appendChild(link);
    },
    js: function (path) {
        if (!path || path.length === 0) {
            throw new Error('argument "path" is required !');
        }
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.src = path;
        script.type = 'text/javascript';
        head.appendChild(script);
    }
}
dynamicLoading.css("/Public/css/usContact.css");

$(function () {
    $('.zodiac_detaisl_text_list').html(getShengXiaoIntroductionHtml(parseInt($('.zodiac_detaisl_text_list').attr('zodiac-index')) - 1));
    $('.zodiac_detaisl_pics > div > span').eq(parseInt($('.zodiac_detaisl_text_list').attr('zodiac-index')) - 1).addClass('current');
    $('.zodiac_detaisl_pics > div > span').on({
        click: function () {
            var zodiac_detaisl_pic_index = $(this).index() + 1;
            $(this).addClass('current').siblings().removeClass('current');
            $('.zodiac_detaisl_text_list').html(getShengXiaoIntroductionHtml($(this).index()));
            $('.zodiac_detaisl_text > img').attr({
                src: '/Public/images/ver2/pic-zodiac-' + zodiac_detaisl_pic_index + '.png'
            })
        }
    })
})

$(function () {
    var timer_min_count;
    if ($('.audio-xiyongshen').length > 0) {
        if (document.getElementById("bgMusic")) {
            var audio = document.getElementById("bgMusic");
            var audioDuration = parseInt(audio.duration);
            var audioDurationMinute = parseInt(audioDuration / 60);
            var audioDurationText = 0;
            if (audioDuration % 60 < 10) {
                audioDurationText = "" + audioDurationMinute + ":0" + audioDuration % 60 + "";
            } else {
                audioDurationText = "" + audioDurationMinute + ":" + audioDuration % 60 + "";
            }
            if (!audioDuration) audioDurationText = '';
            $('.audio-xiyongshen').find('.weixin-bubble .text .audio-time').html(audioDurationText);
        }
    }
    $('.audio-xiyongshen').on({
        click: function () {
            var audioWrapper = $(this);
            var audio = document.getElementById("bgMusic");
            if (audio.paused) {
                audio.play();
                audioWrapper.find('.weixin-bubble').addClass('playing').removeClass('done');
                audioWrapper.find('.audio-btn-text').html('点击暂停');
                timer_min_count = setInterval(function () {
                    var temp = audio.duration - audio.currentTime;
                    var minute = parseInt(temp / 60);
                    var sec = parseInt(temp % 60);
                    if (sec < 10) {
                        sec = '0' + sec
                    }
                    var time_min = minute + ':' + sec;
                    if (audio.currentTime == audio.duration) {
                        window.clearInterval(timer_min_count);
                        audioWrapper.find('.weixin-bubble').removeClass('playing done');
                        audioWrapper.find('.weixin-bubble .text .audio-time').html(audio.duration);
                        audioWrapper.find('.audio-btn-text').html('点击收听');
                    }
                    audioWrapper.find('.weixin-bubble .text .audio-time').html(time_min);
                }, 1000)
            } else {
                audio.pause();
                audioWrapper.find('.weixin-bubble').removeClass('playing');
                if (audio.currentTime == audio.duration) {
                    audioWrapper.find('.weixin-bubble').addClass('done')
                } else {
                    audioWrapper.find('.weixin-bubble').removeClass('done')
                }
                audioWrapper.find('.audio-btn-text').html('点击收听');
                window.clearInterval(timer_min_count);
            }
        }
    })
    $('.tab-nav > .menu-item+.menu-item').on({
        click: function () {
            if (document.getElementById("bgMusic")) {
                document.getElementById("bgMusic").pause();
                $('.audio-xiyongshen').find('.weixin-bubble').removeClass('playing');
                $('.audio-xiyongshen').find('.audio-btn-text').html('点击收听');
            }
        }
    })
})

$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > $('.nav-menu-namelist').outerHeight() + 20) {
            $('.nav-menu-namelist').addClass('fixed');
            $('body').css({
                'padding-top':$('.nav-menu-namelist').outerHeight()+'px'
            })
        } else {
            $('.nav-menu-namelist').removeClass('fixed');
            $('body').css({
                'padding-top':'0'
            })
        }
    })
})