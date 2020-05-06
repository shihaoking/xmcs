var item_to_suan = [];
$(function () {
    // 性别选择 && 出生状态选择
    $('.sm_form_bornStatus span').on({
        click: function () {
            console.log(1)
            $(this).addClass('cur');
            $(this).siblings('span').removeClass('cur');
            var value = $(this).data('value');
            $(this).parent().find('input').val(value);
            if ($('#bornStatus').val() == '0') {
                $('.sm_form_sexChoose span').eq(2).addClass('cur').siblings().removeClass('cur');
                $('#gender').val(-1);
                $('.sm_form_txt_birthday_title').html('预产日期：');
                $('.sm_form_txt_hour_title').html('预产时辰：');
                $('#birthday').attr({
                    'placeholder': '请预估宝宝的生日 (可不填)'
                })
                $('.sm_form_sexChoose span.sexUnknow').addClass('show');
                $("#birthday").val('').removeAttr('data-toid-hour');
                $("#hour").val('')
                $("#minutes").val('')
                $('#minutes,#minutes+label[for="minutes"],.basic-info-more-time').addClass('hidden')
            } else {
                $('.sm_form_sexChoose span.sexUnknow').removeClass('show');
                $('.sm_form_sexChoose span').eq(0).addClass('cur').siblings().removeClass('cur');
                $('#gender').val($('.sm_form_sexChoose span').eq(0).attr('data-value'));
                $('.sm_form_txt_birthday_title').html('出生日期：');
                $('.sm_form_txt_hour_title').html('出生时辰：');
                $('#birthday').attr({
                    'placeholder': '请选择宝宝的生日 (可不填)',
                    'data-toid-hour': 'birthday_hour'
                })
                $('#minutes,#minutes+label[for="minutes"],.basic-info-more-time').removeClass('hidden')

            }
        }
    })
    $('.sm_form_sexChoose span').on({
        click: function () {
            var value = $(this).data('value');
            var index = $(this).index();
            // if ($('#bornStatus').val() == '0') {
            //     return false;
            // }
            // if ($('#bornStatus').val() == '1' && value == '-1') {
            //     return false;
            // }
            $(this).addClass('cur');
            $(this).siblings('span').removeClass('cur');
            $(this).parent().find('input').val(value);
        }
    })
});

$(function () {
    var $Hour = $('#hour');
    var $Minutes = $('#minutes');
    var def_day = '未知';
    var def_value = 0;
    var str = '<option value="' + def_value + '" selected>' + def_day + '</option>';
    $Hour.append(str);
    $Minutes.append(str);
    // 时
    for (var i = 0; i < 24; i++) {
        var hStr = '<option value="' + i + '">' + i + '</option>';
        $Hour.append(hStr);
    }
    //分
    for (var i = 0; i < 60; i++) {
        var minStr = '<option value="' + i + '">' + i + '</option>';
        $Minutes.append(minStr);
    }
})
$(function () {
    for (var i = 0, max = $('.Js_date').length; i < max; i++) {
        var calendar = new lCalendar().init('#' + $('.Js_date').eq(i).attr('id'));
    }
})
$(function () {

    $("#birthday").val('');
    $("#birthday_1").val('');

    $('#bornStatus').val(1);
    var ddte = new Date();
    var site_from = $('body').attr('site-from');
    var page_from = $('body').attr('page-from');
    if (site_from == 'suan') {
        ddte = new Date('1986');
    }

    var curr_d = ddte.getFullYear() + "-" + (ddte.getMonth() + 1) + "-" + ddte.getDate();

    $("#birthday").attr("data-date", curr_d);
    $("#birthday_1").attr("data-date", curr_d);

    if (site_from == 'wap5' && page_from == 'homepage') {
        var date1 = new ruiDatepicker().init({
            triggerId: "#birthday",
            minutesShow: true
        });
    }

    $("#btnGetNameNow, .btnNow_getName_QY, #btnGetNameNow_1").click(function (e) {
        var company_phone_num = '',
            xm = '',
            o = {},
            $_ch_name = $("#smname"),
            $_born_status = $("#bornStatus"),
            $_birthday_input = $("#b_input"),
            $_gender = $("#gender"),
            $_birthday = $("#b_input"),
            $_hour = $("#hour"),
            $_minutes = $("#minutes"),
            $_company_phone_num = $('#company_phone_num'),
            $_company_type = $("#company_type"),
            $_company_code = $('#company_code'),
            $_company_city = $('#company_city'),
            $_company_industry = $('#company_industry'),
            $_company_middle_num = $('#company_middle_num');

        if (e.target.id == 'btnGetNameNow_1' || e.target.parentNode.id == 'btnGetNameNow_1') {
            $_ch_name = $("#smname_1");
            $_birthday_input = $("#b_input_1");
            $_birthday = $("#birthday_1");
            $_company_phone_num = $('#company_phone_num_1');
            $_company_type = $("#company_type_1");
            $_company_code = $('#company_code_1');
            $_company_city = $('#company_city_1');
            $_company_industry = $('#company_industry_1');
            $_company_middle_num = $('#company_middle_num_1');
        }

        if (site_from == 'wap5' && page_from == 'homepage') {
            $_birthday = $("#birthday_date");
            $_hour = $("#birthday_hour");
            $_minutes = $("#birthday_minute");
        }

        // 姓名判断
        $_ch_name.val($_ch_name.val().replace(/[^\u4E00-\u9FA5]/g, ''));
        if ($_ch_name.val() == '' || $_ch_name.val().length > 6) {
            $_ch_name.addClass('shake');
            next = false;
            clearshake();
            $_ch_name.focus();
            return;
        }

        // 生日判断
        if (site_from == 'suan' || $('.form-name-get').attr('form-tool-type') == 'getNameScore') {
            if ($_birthday_input.val() == '') {
                $_birthday.addClass('shake');
                next = false;
                clearshake();
                $_birthday.focus();
                return;
            }
        }

        // 公司联系手机
        if ($('.btnNow_getName_QY').length > 0 || $('.btnGetNameNow_1') && $_company_phone_num.length > 0) {
            var company_phone_num = $_company_phone_num.val();
            var company_phone_num_check = company_phone_num.match(/^1[0-9]{10}$|^106[0-9]{9,12}$/);
            if (company_phone_num_check == '' || company_phone_num_check == null) {
                $_company_phone_num.addClass('shake');
                next = false;
                clearshake();
                $_company_phone_num.focus();
                return false;
            }
        }
        xm = $_ch_name.val() ? $_ch_name.val() : '';
        o.name = xm;
        o.bornStatus = $_born_status.val();
        o.gender = $_gender.val() ? $_gender.val() : '';
        o.birthday = $_birthday_input.val() ? $_birthday_input.val() : '';
        o.birthtime = $_hour.val() ? $_hour.val() : 0;
        o.birthmin = $_minutes.val() ? $_minutes.val() : 0;
        var next = true;
        var order_num = '';
        var weixin_code = '';
        if (getCookie('weixin') != null || getCookie('weixin') != undefined || getCookie('weixin') != '') {
            weixin_code = getCookie('weixin');
        } else {
            weixin_code = weixinArr[randNum];
        }
        var softInfo = getSoftInfo(site_from);
        $.ajax({
            type: "post",
            url: "/orders",
            async: false,
            data: {o: o},
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (re) {
                order = re;
            }
        });
        var paid_url = "/orders/"+order.id+"/pay";
        loadingPage(paid_url);
    })
})

jQuery(document).ready(function ($) {
    var ddte = new Date();
    var curr_d = ddte.getFullYear() + "-" + (ddte.getMonth() + 1) + "-" + ddte.getDate();
    $("#birthday").attr("data-date", curr_d);
});

$(function () {
    $(".commList h5 span").each(function () {
        var v = $(this).text();
        $(this).text(v.replace("CS17", "SHJ"));
    });
})


function GetRequest(strHref, strName) {
    var arrTmp = [];
    if (strHref) {
        if (strHref.indexOf("?") != -1) {
            var str = strHref.substr(1);
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                var arrTemp = strs[i].split("=");
                if (arrTemp[0].toUpperCase() == strName.toUpperCase()) return arrTemp[1];
            }
        }
    }
    return "";
}


function urldecode(encodedString) {
    var output = encodedString;
    var binVal, thisString;
    var myregexp = /(%[^%]{2})/;
    function utf8to16(str) {
        var out, i, len, c;
        var char2, char3;

        out = "";
        len = str.length;
        i = 0;
        while (i < len) {
            c = str.charCodeAt(i++);
            switch (c >> 4) {
                case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
                    out += str.charAt(i - 1);
                    break;
                case 12: case 13:
                    char2 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
                    break;
                case 14:
                    char2 = str.charCodeAt(i++);
                    char3 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x0F) << 12) |
                        ((char2 & 0x3F) << 6) |
                        ((char3 & 0x3F) << 0));
                    break;
            }
        }
        return out;
    }
    while ((match = myregexp.exec(output)) != null
        && match.length > 1
        && match[1] != '') {
        binVal = parseInt(match[1].substr(1), 16);
        thisString = String.fromCharCode(binVal);
        output = output.replace(match[1], thisString);
    }

    output = output.replace(/\\+/g, " ");
    output = utf8to16(output);
    return output;
}




var strname = [
    '黄先生',
    '王女士',
    '吴先生',
    '郭先生',
    '汤女士',
    '汪女士',
    '黄先生',
    '苏女士',
    '李先生',
    '吴先生',
    '李先生',
    '黄先生',
    '胡先生',
    '李先生',
    '余先生',
    '刘女士',
    '郭女士',
    '孟先生',
    '王先生',
    '亓女士',
];
var strname_text = [
    "本来想随便起个名字的，被老婆说，宝宝的名字要叫一辈子的，不能这么随便。参考了好多书籍，典故，还是无法定夺，幸好朋友推荐来这取名，找专业的大师给宝宝起个好名字，对宝宝负责，我老婆还有我爸妈都很满意，不愧是专业人做专业事，谢谢大师",
    "大师真是非常细心，一直起到满意为止，并且详细解说，这是我第二次来大师这里取名了，儿子的名字是大师起的，这次女儿因为名字不太好，所以让大师帮改个名字，已经选好要用的名字了，非常感谢大师不厌其烦的解答，大师人真的非常好。",
    "说实话，名字还是挺满意的，取名字看似简单，其实很费脑的，要叫一辈子的名字，是得慎重再慎重，好在大师水平高，又有耐心，才把宝宝的名字敲定，谢谢！",
    "很给力的大师，指导和分析给的很到位，受教了！",
    "宝宝出生有些时间了，但是名字一直确定不下来，也找过一些免费的起名工具，但是起的名字，看起来总是不满意。王老师对易学很是精通，又是一个很有学识的人，起个名字都很时尚。强烈推荐！！",
    "同事介绍来的，之前找了好几家起名，都没有起到满意的名字，最后在你们这里选到了心仪的名字，谢谢！",
    "说实话，名字起得很好。王老师的服务态度很好，也不厌其烦地帮我起了好几次名字了。这钱花得值，的确是一家专业的公司。",
    "在轻松的聊天过程中帮我分析了困难，会好好配合大师，用人不疑，真心感谢",
    "这个起名很不错啊，各个起名方面考虑得很是全面，而且给起的名字都比较靠谱，不错！",
    "嘿嘿嘿，宝宝的名字有了，叫做叶X伦，具体我就不说出来了哈哈。主要是涵义真的非常的好，完全结合了爸爸妈妈的优点，这样每次念出来都感动的想要落泪。",
    "很多人都推荐这里的老师起名，所以就跟来了，总的来说起名不脱俗套，专门指定跟八字结合的，都能一一满足，时间等的有点急，但是很值得。",
    '爷爷奶奶特别满意！孩子以后懂事的话，也一定会非常满意的，因为名字真的是很有意境，传统但不失典雅，以后肯定是个人才！',
    '名字真的非常好，完全超出我的意料之外，第一个名字不大满意（跟一个远亲的名字重叠），很快就重新给了另外一个名字，真的大气哦！',
];

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

function shuffle(arr) {
    var i, j, temp;
    for (i = arr.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }
    return arr;
};
$(function () {
    var gb_price = "29.80",
        gx_prefix = "20";
    function getRnd(n) {
        var num_str = "";
        for (var i = 0; i < n; i++) {
            var num = Math.floor(Math.random() * 10);
            num_str = num_str + num;
        }
        return num_str;
    }
    var myDate = new Date();
    var month = myDate.getMonth() + 1;
    var date = myDate.getDate();
    var datestr = myDate.getFullYear() + '-' + (month < 10 ? '0' + month : month) + '-' + (date < 10 ? '0' + date : date);
    var html = "";
    for (var i = 0; i < 13; i++) {
        var order_no = getRnd(5);
        var myDateStr = myDate.getFullYear().toString();
        html = html + '<li><h4>' + strname[i] + '<span>' + gx_prefix + '***' + order_no + '</span></h4><p>' + strname_text[i] + '</p></li>';
    }
    if ($('#userFeedBack_content').length > 0) {
        $('#userFeedBack_content').html(html);
        $(".user-feedback").kxbdMarquee({ direction: "up", isEqual: false });
    }
    $('.btnSolution').on({
        click: function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500)
        }
    })
})

// suan
$('.checkbox').on({
    click: function () {

        var cur_item = $(this).attr('data-value');
        if ($(this).hasClass('cur')) {
            $(this).removeClass('cur');
            item_to_suan.removeValue(cur_item);
        } else {
            $(this).addClass('cur');
            item_to_suan.push(cur_item);
        }
    }
})
$('.radio').on({
    click: function () {
        $(this).addClass('cur');
        $(this).siblings('span').removeClass('cur');
        var value = $(this).data('value');
        $(this).parent().find('input').val(value);
    }
})

/******************增加侧边 在线客服*******************/
$(function () {
    var wxCode = getCookie('weixin');
    // var asideServicesHtml = '<div class="modal-servicse-bg"><div class="modal-servicse"><h1>加王道子大师微信起好名字</h1><p><span>每天只通过50个名额</span><span>长按下方按钮复制并添加微信号</span></p><a class="btn-weixin-code">' + wxCode + '</a><a class="btn-open-weixin" href="weixin://">打开微信</a><a class="btn-close">×</a></div></div><div class="aside-contact-group"><a href="http://tb.53kf.com/code/client/10170931/1" target="_blank" class="aisde-online-services"></a><div class="aisde-master-weixin"></div></div>';
    // $('body').append(asideServicesHtml);
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