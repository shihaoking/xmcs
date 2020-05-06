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
                href: $url
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
    $('.g-title-primary span').append('<i class="icon-pattern pattern-top-left">&#xe612;</i><i class="icon-pattern pattern-top-right">&#xe612;</i><i class="icon-pattern pattern-bottom-left">&#xe612;</i><i class="icon-pattern pattern-bottom-right">&#xe612;</i>');
})


/******************增加侧边 在线客服*******************/
$(function () {
    var wxCode = getCookie('weixin');
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
dynamicLoading.css("../css/usContact.css");