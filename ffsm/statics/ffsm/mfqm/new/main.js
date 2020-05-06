function clearshake() {
    setTimeout(function () {
        $(".shake").removeClass('shake');
    }, 2000)
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
                'softname': '起名大师 联系微信 ',
                'keyword': '起名大师',
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
            'suan4': {
                'id': 114,
                'softname': '婚姻测算 联系微信 ',
                'keyword': '婚姻测算',
                "price": '29.80'
            },
            'suan6': {
                'id': 116,
                'softname': '桃花测算 联系微信 ',
                'keyword': '桃花测算',
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
        case 'ming1':
        case 'pc':
            softInfo = softs['wap'];
            break;
        case 'suan':
        case 'suan5':
            softInfo = softs['suan'];
            break;
        case 'suan4':
            softInfo = softs['suan4'];
            break;
        case 'suan6':
            softInfo = softs['suan6'];
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
        case 'wap8':
        case 'ming2':
            softInfo = softs['company'];
            break;
        default: softInfo = softs['wap'];
    }
    return softInfo;
}

jQuery(document).ready(function ($) {


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
                if ($('body').attr('site-from') !== 'wap3') {
                    $('html,body').animate({
                        scrollTop: 0
                    }, 800);
                }
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
                '说我的金钱好，我在这一方面确实一直有福气！',
                '事业分析的很准，一直在纠结要不要自己创业，还是听大师的！',
                '大师分析的好准，非常感谢老师的建议指导。',
                '分析得好准，希望17年真如分析所说那样能当上主管。',
                '本来准备下半年结婚的，大师算我下半年结婚的，准！',
                '分析得很详细，比本地的算命先生还要准。',
                '婚姻和事业建议有帮助，值得一看！',
                '算我事业不太好，最近确实亏了不少钱，希望能转机！',
                '结果内容很好，也有很多建议，相信17年一定会更顺利！',
                '事业和金钱算得好准，跳槽发展果然是适合我的好选择！',
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
        birthdayPlaceHolder = '选择您的出生日期';
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


function setupWKWebViewJavascriptBridge(callback) {
    if (window.WKWebViewJavascriptBridge) { return callback(WKWebViewJavascriptBridge); }
    if (window.WKWVJBCallbacks) { return window.WKWVJBCallbacks.push(callback); }
    window.WKWVJBCallbacks = [callback];
    window.webkit.messageHandlers.iOS_Native_InjectJavascript.postMessage(null)
}
try {
    setupWKWebViewJavascriptBridge(function (bridge) {
        $('a[href="weixin://"],.openWeixin').on({
            click: function (e) {
                e.preventDefault()
                bridge.callHandler('openWeiXin', JSON.stringify({ data: getCookie('weixin') }), function (response) { })
            }
        })
    })
} catch (e) {
}


var shengxiao_jinji = {
    0: [[
        '老鼠为第一生肖，排名最前可以称王，名字中宜选用有“王”、“令”、“君”之字。如玲、琴、冠等。',
        '鼠喜欢披彩衣、华而其身。宜有字根：“彡”、“巾”“系”“示”“衣”“采”。这一类字如：彦、彤、形、彬、彩、彭、布、市、矾、希、帝、席，师、常、帧、筛、红、约、级、纯、素、絮、紫、经、绿、纲、绮、缘、继、社、福、棋、祯、禧、掸、礼、初、袁、裕、裴、采、释、洁、吉。',
        '亥子丑三会，老鼠与猪、牛为三会北方水。三会的力量也贵人运，对自己也有帮助。字形如“亥”或“丑”、“牛”的。 如：象、家、豪、豫、众、毅、聚、生、妞、隆、特、产、牟。'
    ], [
        '避免用“午”、“马”等字形。因为子午对冲，子为鼠，午为马，凡是有“午”或“马”的字形均应避免用之，否则犯了对冲，伤害力大。如：马、骏、竹（竹为马象）、许。',
        '避免有用“日”的字形，因为老鼠不喜见光，白天活动危险多，有道是老鼠见光死，有“日”字根则处境危险，易遭受到伤害。如：日、旦、旭、旬、明、昆、易、昊、昀、旺、昌、星、昭、春、昶、时、是、映、昱、晃、晨、景、晶、智、晴、晖、晓。',
        '避免使用有“羊”的字形，因为子未相穿害，“羊鼠相逢，一旦休”，伤害力也很大。譬如羊、善、美、群、羡、翔、妹。'
    ]],
    1: [[
        '有“草”字部首的字。因牛以草为主食，名字有草，代表粮食丰富，内心世界充实，一生不悉吃穿。例如：莉、花、芝、苗、茹、萍、菁、莲、艺、芙、芸、芹、苍、苏、芳、若、英。',
        '有“田”的字根，牛在田野吃草或耕田都适得其所，悠哉享受美食或勤劳耕田，尽其本分，任劳任怨。例如：甲、由、申、甸、男、界、备、思、留、富、畴、疆、苗、蕾。',
        '有“车”字的形字，意味牛拉车，有升格为马之意。牛拉车虽辛苦、劳累，但牛还是认命，不负所托，完成任务，受到主人的肯定，有能力、有担当的牛，有表现的机会。如：连、莲、运、轩、运、轮、轲、轻、轼、辉。生肖属牛人的不宜用之字'
    ], [
        '避免用“心”的部首，因为“心”字代表心脏，主荤食也。牛不食荤，如果肖牛者名字有“心”、“忄”旁者，便易有精神失落感，有肉却食不得。例如：心、志、忠、怡、恒、恩、惠、意、慧、怀等。',
        '避免有“彡”、“巾”、“衣”、“采”、“示”、“系”的部首，为披彩衣之象。牛如果披上彩衣，不是变成祭品，便成为火牛阵，一生为别人无怨无悔地付出，直到老死。例如：彩、彦、彬、希、裕、祖、禄、福、礼、祜、裘、褚、祥、裴。',
        '避免有“王”、“玉”、“君”、“帝”、“大”、“长”、“冠”的部首。人怕出名猪怕壮，牛也忌肥大。牛太大时，易成为牺牲品。例如：玲、玫、珍、珉、理、珠、琴、琪、瑞、瑛、瑜、璋、环、央、奂、奎等。'
    ]],
    2: [[
        '宜有“山”、“木”、“林”之字根，为老虎适得其所之意。因老虎大都栖息在森林，又称森林之王，有“山”、“林”的字根，可以让老虎充分发挥其潜能。其字如：山、岑、岱、峰、峭、峄、岳、峦、木、朵、林、柏、柳、柱、桃、根、栩、株、梁、梭、栋、森、楠、概、荣。',
        '宜有“肉”、“月”、“心”的字根，因老虎为肉食动物，有以上字根，表示粮食丰富，内心充实。可用：月、有、青、朋、朗、望、胜、必、志、念、忠、怡、恬、恒、意、愉、愫、慕、慧、忆、怀。',
        '宜用“马”、“午”、“火”、“戌”、“犬”的字根，因寅午戌三合，能互相帮助，贵人多助之意。可用：马、冯、骏、腾、然、炎、炳、炫、烈、烽、焕、炽、杰、威、成、盛、状、城、猛。'
    ], [
        '避免有蛇的字根，如“辶”、“一”、“︱”、“邑”、“虫”、“廴”。因为“寅”与“巳”相刑害，“蛇遇猛虎似刀戳”。如：巡、迅、造、速、进、远、迁、选、还、邦、那、邱、刑、邰、邵、郎、郑、廷、建、川、仁、虹、蜜、蝶、融、萤、尤、尼、屯。',
        '避免有小“口”、大“口”的字根，因为老虎开口，“不伤人，更伤己”，以及老虎受困之惑，不易展现其威。如：口、台、另、古、名、同、各、合、后、吉、向、吕、告、含、呈、吟、谷、如、吾、和、周、乔、喜、嘉、器、岩、回、因、固、国、园、圆、团、欧。',
        '避免有“日”、“光”的字根，因为老虎大都在树荫下或山洞内，不喜在太阳下。如：日、晶、旦、旭、昆、旺、星、昀、昭、春、昶、晨、普、景、晴、智、暖、晖、替、勖、曾、勋。'
    ]],
    3: [[
        '宜有“草”的字根，因兔子为素食动物，以下字根均喜欢。如：芬、芳、芙、卉、茗、茶、茹、普、菊、寂、董、葵、苇、蔡、蓉、蒋。',
        '宜有“亥”、“未”的字根，因亥卯未三合，兔子与猪、羊称三合，有帮扶之意。如：豪、家、毅、朱、美、善、祥、羡。',
        '宜用有小“口”、大“口”、“宀”的字根，因狡兔三窟，兔子喜欢在洞穴里窜来窜去。如：口、台、吉、谷、向、吕、告、含、呈、吟、吾、和、周、品、味、哈、啥、四、园、围、图、团、容、宋、定、宙、宜、尚、有、家、富。'
    ], [
        '避免用有“辰”、“龙”、“贝”之字根，因为“玉兔逢龙云里去”，地支卯辰相害。如：辰、宸、晨、农、依、龙。',
        '避免选用有“日”、“阳”之字根，因为犯了日月交冲之破绽，兔又代表“月”兔，遇有“日”的字根则会日月对冲。如：日、明、春、旭、晨、易、旺、时、晋、晶、景、普、晚、晴、晖、暖、暑、晰、乾。',
        '避免选用“宇”、“安”，因为“宇”的下半部为“于”，即“我”之意，我也是肖兔，即“宇”字转化为“兔”字，将含冤、受冤枉之意，另外“安”字的下半部为“女”字，即为“汝”字，汝意为肖兔本身，故“安”字在肖兔而言为和“冤”同意，不吉。'
    ]],
    4: [[
        '宜选用有“日”、“月”的字根。因龙喜得月明珠，日、月为其最爱，可增加属龙者的内心世界充实感。其字如：日、月、青、有、旺、清、早、明、昆、易、星、昌、春昶、是、映、洵、晃、晁、时、晨、晶、景、普、晴、晰、暑、暖、晖、畅、云。',
        '宜选用有“星”、“云”、“辰”的字根。因为龙喜行于天空，而与日、月、星、辰为伍。其字根如：星、云、霖、霈、辰、晨、腾、宸、农、浓、依、振。',
        '宜选用有“氵”、“水”之字根。因龙喜水、雨，取龙为雨神，江河之水为水龙王掌管。龙得水，亦适得其所。其字根如：水、冰、永、求、江、沈、汪、添、法、泰、泉、注、沛、泳、淳、海、淋、涵、清、汤、涣、滢、凑、渝、洁、潮、济、瀑、瀚、洒。'
    ], [
        '避免选用有“戌”、“狗”之字根，因辰与戌正冲，犯了正冲，是生肖姓名中的最大破绽。其字如：戌、成、诚、茂、晟、锹、状、狐、猛、犹、猷、狮、狱、独、获、献。',
        '避免选用有小“口”之字根，会形成“困龙”之意。其字女口：台、古、可、句、召、史、司、右、名、同、合、后、吉、向、吕、含、呈、吟、吴、吾、和、同、味、品、哈、咭、唐、哥、哲。',
        '避免选用“草”之字根，龙不喜落人草丛，有龙困浅滩之意。其字如：艾、芬、芳、芙、花、芝、苗、苔、范、符、苓、若、英、茹、茵、莉、庄、萍、莱、菁、菊、董、蕙、莲、萧、蕊。'
    ]],
    5: [[
        '“口”、“山”、“一”字首，因蛇喜欢在洞穴内有隐匿之所，并可栖息、冬眠，在洞穴钻来钻去，悠游自如。洞穴内是其江山。其字如：容、口、台、可、句、名、司、同、如、合、向、含、吕、告、君、呈、吴、周、品、哈、唐、哲、员、哑、喜、乔。',
        '宜有“木”之部首，蛇亦喜欢上树，有升格变成“龙”之意味。如：木、本、未、杰、杏、杉、材、东、林、松、桐、栗、格、桔、栩、栋、枫、森、楚、杨、榜、柏、荣、樊、朴、桥、树。',
        '宜有“乡”、“糸”、“衣”、“示”、“采”、“巾”等披彩衣的字首，可转化为“龙”，有升格意味。其字如：彤、形、彦、彬、彩、彭、彰、影、纪、约、纷、纽、纳、素、细、绮、绍、丝、紫、经、绿、纶、绮、维、练、纬、祝、祚、祖、市、帝、席。想知道自己一生的财运如何, 添加大师微信: fs3945, 免费给你算命!'
    ], [
        '忌有“虎”部字首，因为“虎”与“蛇”相刑害。古云：“蛇遇猛虎似刀戳”，盖地支巳与寅相刑也；“山”之字根亦有虎之意味。如：虎、虔、虚、虞、艮、山、邱、丘、岗、仙、嵘、峥。',
        '忌有“日”之字根，因为蛇怕太阳太热，烤焦其身。蛇大都是在洞穴、树荫下活动，鲜少暴晒日光下。其字如：日、晶、旭、旦、早、旨、旬、旺、晃、曼、明、昊、昌、易、映、昀、春、昱、是、昴、时、晏、昶、晋、晟、晨、普、晴、智、晖、暖、暄。',
        '忌有“草”之字根，俗称“打草惊蛇”，而蛇如在草丛中活动，虽有游走的空间，但也容易被人发现，还要遭受到风霜雨打，稍觉辛苦。其字如：艾、芊、芝、芥、芬、芳、花、芮、芷、苒、苓、苔、苗、若、英、芽、范、茂、茉、茗、兹、荀、茹、草、茜、荃、荷、莉、菊、菁、萍、董、葛、蓁、蓉、莲。'
    ]],

    6: [[
        '宜用有“草”字根之字，因马为素食动物，有草则肥，亦壮，粮食丰盛，则内心世界充实。如：艿芊芋芎苞芙芝芦芩芬芮花芳芷苑苒苓若苡苹茂苜茉茗茱茵茶茹荷草茛荐荃莠莉秣莎茉菁菽萱叶董苇葳蓁倩莲蔡蒋荟苏蕴蓣。甲、丙年生人更吉。',
        '喜用有彩衣的部首，如“糸”、“巾”、“乡”、“衣”，良马方能被人披上彩衣。例如：纪约纯级素绅紫纬绿维纲缘练缇绩缪缨衫衿衫裕装裘形彤采雕彦彩彬彪彰希帆席常。',
        '喜有“目”字根，表示马有大眼睛，美丽有人缘，尤其异性贵人多。例如：目直盱相县盼看眉真睦睿。'
    ], ['不宜有“米”之字根，因马儿吃米吃不饱。米粮不适合马吃，有吃没有饱，无饱足之感。如：米粉粥粒粲精粹。',
        '姓名三个字中不宜见到两个口，因两口马形成一“骂”字，容易招人嫌，是非多、衰运连连、做事不顺。例如：吕咖品哈咭哥启喜煦嘉嘻器。如果姓有一“口”，则名字尽量不宜用选有“口”形之字根。',
        '不宜有两个人的字根，如“彳”，或“彳”再加“彳”，因为好马不跨双鞍，如犯之，则为无节之马，不忠、不贞、滥情、情愁。例如：彼、征、往、役、彷、很、律、徐、得、徒、御、循。'
    ]],
    7: [[
        '羊亦喜五谷杂粮，因羊为素食动物。喜有“米”、“麦”、“示”、“豆”、“稷”、“叔”字根。例如：米粟精粲梁粹禾秀秉秋科秣秦稠稻谷稷稼积稣麦丰艳。',
        '羊喜有大“口”、“山”、“门”之字样，即有洞穴可休息。例如：口阁同周和哈唐回圆园图团容寰。',
        '羊喜有三合或三会的字根，如三合之字根有“豕”与“卯”，三会之字根有“蛇”（巳）与“马（午）”。例如：家豪稼聚卿迎印马骏许。'
    ], [
        '属羊之人不宜有“心”、“十”、“月”之字根，因羊为素食动物，见到肉类荤食，内心不充实，有失落、失意之感，看得到的肉，却不是自己喜欢的粮食，内心定会苦闷抑郁。例如：心必忍忌志忒忘忖忡快忱忸忻忠念悒悟悠情悼惕惟惠想意爱慎愫慈慕慧慷忆应懋怀懿股肯育肴胥胞胡脉能。',
        '属羊之人不喜见到对冲的生肖——“丑”、“牛”、“牝”及相害的生肖“鼠”、“子”之字根，刑克很重。例如：丑牛牡牢牟牧物特牵隆生妞子孔字存孝字孟季学孩孙学游郭享李。',
        '属羊之人不宜见到天罗地网的字，因“辰”为天罗、“未”为地网，同理亦不宜见到“戌”、“狗”，即“辰”、“戌”、“丑”、“未”均不宜见到。“未”为羊，如果羊见到羊，必然先争斗，斗角力一番，也是不吉。例如：辰、晨、戌、成、狄、狐、狮、猛、犹、猷、独、获、献。'
    ]],
    8: [[
        '属猴之人宜喜有“木”的字根，猴子在林间，采食水果，来去自如，荡来荡去，好不悠哉，得其所也。但小猴子学习上树会跌倒受伤，申金克木，宜慎用之。如：本杉杏材杜东松林果柏桐醒桔梁棋栋棠森杨桦机樱。',
        '属猴之人喜见有“人”或“言”的字根，因为猴预防喜欢模仿人类的动作，即“人模人样”，爱做秀、表演，所以名字中有“亻”、“彳”或“人”或“言”字形均佳。如：任仲仿企伊伍休伶布佑何余祭作佩来依俊俐促俏信修值倩伟健备杰傅仪优诒词试诗詹语诚谊。',
        '属猴之人喜有“王”字形，因猴子喜称王，但在称王的过程中必须身经百战，猴王得来不易，又随时会易主，故猴子称王有喜亦有忧，虽然威风，但付出代价太高。如：王玉玲珍珊珏球璇琪琛琴琳环琼珑。'
    ], [
        '属猴之人不宜见有“禾”、“谷”、“田”、“麦”、“稷”、“米”之字形，因猴子喜欢作贱五谷，有句话说：“大猴损五谷”，意谓在田间的猴子，只会践踏、玩弄五谷杂粮罢了，表示浪费挥霍之意。如：田由甲申界留米粉秀秉秋科秦稻谷穗。',
        '属猴之人不喜有“金”、“酉”、“西”、“兑”、“皿”、“鸟”、“月”之字形，因以上字形皆有西方“金”之意，然而，在五行中，金与金相聚，易有刑克、争执，反而不能得其比和之助，更甚而遭到凶灾。“酉”五行即是金，“鸟”为鸡类，属酉也为金，“月”亮在西方，也是属金来论。如：金钊钏钰铜铭锐锋钢钱铎鹏要覃配。',
        '属猴之人不宜见有“豕”猪字形，因地支六害之故，即是“猪遇猴似箭投”，刑克很重，如：亥家象豪豫缘豹貂貌。'
    ]],
    9: [[
        '宜有“禾”、“豆”、“米”、“粱”、“麦”、“粟”之字根，因鸡为食五谷杂粮的动物，整天都在找食粮，见到杂粮，欢欣鼓舞，可以吃撑到脖子，有以上字根，属鸡之人，内心充实饱满。如：禾秀秦程棵谷积米粟粱。',
        '属鸡之人喜用有“山”之字形，为鸡上山头，可展其英姿，有凤凰之象，提升其格局地位。另外，鸡本来都喜欢栖息在树干上睡觉、打盹，安祥自在。如：岂岗贷岳峙岭彬杞柿柏栗杰案栽桐梁栋棠森荣树桦。但“酉”金会克木，也有稍许的破绽，故“木”之偏旁宜慎用之。',
        '属鸡之人喜有“宀”、“冖”之字形，意味鸡在洞穴、屋檐下可遮风避雨，有保护作用。如：守安宋宜宛宙定宜家审宇。'
    ], [
        '属鸡之人不喜见到“金”之字形，因鸡为酉金，但五行中，金与金组合过重，容易犯冲金属杀伐之意，“金”之字意还有“西”、“兑”、“申”、“秋”、“酉”均属之。如：金、钊、钧、铭、锐、锋、钱、钟、镇、秋。',
        '属鸡之人不喜有“大”、“君”、“帝”、“王”字形，因鸡长大往往被作祭品，或为人食用，一生多为别人付出多。如：奇奏奋君群帝玉玫玟玳珉珊珠球琦琪琴瑛莹瑶璞环琼。',
        '属鸡之人不喜见到有“犬”、“犭”、“戌”字形，因“犬”与“犭”、“戌”为狗之意，因地支酉与戌为六害，古云：“金鸡遇犬泪双流。”意味着狗会追咬鸡，鸡犬不宁之意。如：状锹狮猛犹猷独献茂成盛威。'

    ]],
    10: [[
        '狗是最忠于人的动物，所以属狗之人喜有“亻”、“人”、“入”字形，意味着有其饲，并忠于主人、忠于事业、忠于爱情、忠于钱财。如：人今任令仰仲企伸布位住伯余佩佳依俊杰倩值伟健。',
        '属狗之人喜三合之字根，狗为戌，“寅午戌”为三合。寅字形如：虎虔虚。“午”字形如：玛笃骏驻骋骆骐骞腾骧骅。三合的力量对人的帮扶大，人缘、贵人运都好。',
        '狗喜披彩衣，有虎风之味，增加其威势，提升地位之感。如字形是“纟”、“彡”、“巾”、“衣”均是。如：约珍绅维纬彤形彦彩彪彭衣衫绮装褚希佩纶席。'
    ], [
        '狗不喜素食、五谷杂粮类，狗为荤食动物，其牙齿尖锐，可见嗜肉如狂。如有字形是“禾”、“米”、“豆”、“粱”、“稷”、“麦”之字，对狗而言，如食鸡肋，弃之可惜，不吃挨饿。',
        '属狗之人不不有两个口之字，或姓名中合起来有两个口，容易形成“两口犬”为“哭”字，不祥，凡事不顺，多乖逆。如为三品犬则成为“疯狗”，如有一口之犬称“吠”，喜欢多闲事，爱乱叫穷嚷的，所以对属狗之人，最好不用“口”之字形，如姓氏为“吕”就有两个口，若逢流年为狗年，自己又属狗，由当年形成的“哭”字，特别不利自己。',
        '狗见到“日”，有一句话说“狗吠日”，狗看到太阳出来也要乱叫两声，意指爱管闲事，大嘴巴，徒劳无功。如：曰、旭、日、旨、旺、升、昆、昌、明、易、星、购、春、显、是、时、皓、景、晴、智、晶、晓、暇。'
    ]],
    11: [[
        '属猪之人名字喜有“豆”、“禾”、“米”、“草”之字根，因为猪最喜爱吃的食物为“豆饼”及米饭杂粮，吃馊水是不得已。所以名字中有豆字形者，皆可予属猪之人丰盛感和满足感，一生不愁吃穿。如：豆米杰粱集精秀禾秉秦种稻菊苏麦樱。',
        '属猪之人喜得其三合之字形，猪为“亥”，而“亥卯未”为三合。卯为兔，未为羊。如姓名有卯与未之字根则能大有裨益，一生贵人多助，妻贤子孝。如：卯柳卿未善羡羚家。',
        '属猪之人喜“木”、“月”字边，因木属东方，东方卯兔，月兔而亥卯未为三合；同时猪在树下，也可获得短暂歇息。如：林森榆桂柔柏。'
    ], [
        '属猪之人最忌讳之字形，即具其六冲生肖，猪与蛇六冲，蛇之地支为“巳”，其通义之字形如“辶”、“廴”、“川”、“一”、“邑”、“乙”、“弓”，均为一条蛇的形象。犯六冲之字形，伤害性最大，不管六亲之缘份，财运、事业、健康均受影响，不得不慎。如：迅婉凯毅迎逸邦郭邓郑延巡迪建川州一仁三之乙也乾虹蛾蜜蝶强疆弯发张弼纪风凤妃枫。',
        '属猪之人不宜见到有“猴”之字形，古云：“猪遇猿猴似箭投”，与猴子通义的字形如“申”、“袁”、“爱”、“侯”。在八字五行中，亥与申为相害。如犯之，易伤人、伤身、伤情，一切不利。如：申伸绅砷袁侯九爱媛。',
        '属猪之人不宜见有彩衣字表，如：“彡”、“巾”、“衣”、“采”、“纟”，意味着猪准备上供桌前，将其身上华丽的装饰一番。所以属猪之人，不宜有彩衣，否则，变成准备奉献。如：形彤彦彩彬彪彭彰影帆希常褚纪约红纯素绍结紫吉经绿绸维纲绮绩继。'
    ]]
}

function getShengXiaoIntroductionHtml(shengXiaoIndex) {
    if (!shengXiaoIndex) {
        shengXiaoIndex = 1;
    }
    var $shengxiao_html = '';
    var currentIndex = 0;
    currentIndex = shengxiao_jinji[shengXiaoIndex][0].length > shengxiao_jinji[shengXiaoIndex][1].length ? 0 : 1;
    shengxiao_jinji[shengXiaoIndex][0].forEach(function (item, index) {
        var itemIndex = parseInt(index) + 1;
        $shengxiao_html += '<ul><li><p>（' + itemIndex + '）' + item + '</p></li><li><p>（' + itemIndex + '）' + shengxiao_jinji[shengXiaoIndex][1][index] + '</p></li></ul>';
    })
    return $shengxiao_html;
}