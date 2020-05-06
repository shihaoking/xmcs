(function () {
    var gb_price = "29.90",
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
    for (var i = 0; i < 20; i++) {
        var order_no = getRnd(5);
        var myDateStr = myDate.getFullYear().toString();
        html = html + '<li>易经起名 ' + gx_prefix + '***' + order_no + '<i>' + gb_price + '元</i><span>' + datestr + '</span></li>';
    }
    if ($('#latersMovelist').length > 0) {
        $('#latersMovelist').html(html);
        $(".latersMove").kxbdMarquee({ direction: "up", isEqual: false });
    }
})()
// jQuery(document).ready(function ($) {
//     if (getCookie('loopCookie') == 1) {
//         window.setInterval(checkOrderStatus, 3000);
//     }
//     var softInfo = getSoftInfo($('body').attr('site-from'));
//     $(".software_name").val(softInfo['softname'] + getCookie('weixin'));
//     var order_num = $('#wap_order_num').html();
//     order_num = getQueryString('order_num');
//     if (order_num != '') {
//         checkOrderStatus();
//     }
// });
//
// function addLoopCookie() {
//     window.setInterval(checkOrderStatus, 3000);
//     setCookie("loopCookie", 1, "s300");
// }
//
// function checkOrderStatus() {
//     // var site_from = $('body').attr('site-from'), order_num = getQueryString('order_num');
//     // $('.orderNum').html(order_num);
//     // $('#order_num').val(order_num);
//     // $.ajax({
//     //     url: "/api/userRequest/getOrderInfo.php",
//     //     type: "GET",
//     //     data: {
//     //         "order_num": order_num
//     //     },
//     //     success: function (result) {
//     //         var orderInfo = JSON.parse(result),
//     //             name = orderInfo['xing'],
//     //             gender = orderInfo['gender'],
//     //             dateSolar = orderInfo['birthtimeStr'],
//     //             dateLunar = orderInfo['birthtimeNongliStr'],
//     //             siteFrom = orderInfo['pay_from'],
//     //             order_status = orderInfo['order_status'],
//     //             product_id = orderInfo['product_id'],
//     //             company_middle_num = orderInfo['company_middle_num'],
//     //             company_code = orderInfo['company_code'],
//     //             company_city = orderInfo['company_city'],
//     //             company_industry = orderInfo['company_industry'],
//     //             company_type = orderInfo['company_type'],
//     //             company_phone = orderInfo['phone'],
//     //             software_name = '',
//     //             middle_num_str = '',
//     //             company_code_str = '',
//     //             company_city_str = '',
//     //             company_industry_str = '',
//     //             company_phone_str = '',
//     //             orderStatus_str ='';
//     //             company_type_str = '';
//     //         console.log(orderInfo['phone'])
//     //         console.log(orderInfo)
//     //         var softInfo = getSoftInfo(siteFrom);
//     //         if (!gender || gender == '') {
//     //             gender = '未知'
//     //         }
//     //         if (!dateSolar || dateSolar == '') {
//     //             dateSolar = '时辰未知';
//     //         }
//     //         if (!dateLunar || dateLunar == '') {
//     //             dateLunar = '时辰未知';
//     //         }
//     //         if (!company_middle_num || company_middle_num == '') {
//     //             company_middle_num = '还没有想好';
//     //         }
//     //         if (!company_code || company_code == '') {
//     //             company_code = '还没有想好';
//     //         }
//     //         if (!company_city || company_city == '') {
//     //             company_city = '保密';
//     //         }
//     //         if (!company_industry || company_industry == '') {
//     //             company_industry = '还没有想好';
//     //         }
//     //         if (!company_type || company_type == '') {
//     //             company_type = '还没有想好';
//     //         }
//     //         if (!company_phone || company_phone == '') {
//     //             company_phone = '还没有想好';
//     //         }
//     //         $('.orderUserName').html(name);
//     //         $('.orderUserSex').html(gender);
//     //         $('.orderUserBirthdayDate').html(dateSolar);
//     //         $('.orderUserBirthdayLunar').html(dateLunar);
//     //         $('.orderUserMiddleStringNum').html(company_middle_num);
//     //         $('.orderUserCompanyCode').html(company_code);
//     //         $('.orderUserCity').html(company_city);
//     //         $('.orderUserIndustry').html(company_industry);
//     //         $('.orderUserCompanyType').html(company_type);
//     //         $('.orderUserPhone').html(company_phone);
//     //         $('#order_software_name').val(softInfo.softname);
//     //         $('#order_software_name').val(softInfo.softname);
//     //         var url_home = '';
//     //         var paid_url = '';
//     //         switch (site_from) {
//     //             case 'suan':
//     //                 url_home = 'suan';
//     //                 break;
//     //             case 'suan2':
//     //                 url_home = 'suan2';
//     //                 break;
//     //             case 'wap6':
//     //                 url_home = 'wap6';
//     //                 break;
//     //             case 'suan3':
//     //                 url_home = 'suan3';
//     //                 break;
//     //             case 'score':
//     //                 url_home = 'score';
//     //                 if (product_id == 103 || product_id == '103') url_home = 'wap';
//     //                 break;
//     //             default: url_home = 'wap';
//     //         }
//     //         paid_url = '/' + url_home + '/pay/quming/quminglist.php?order_num=' + order_num + '&order_from=' + site_from;
//     //         orderStatus_str ='未支付';
//     //         if (order_status == 3 || order_status == '3') {
//     //     		orderStatus_str = '已支付';
//     //
//     //             if (getCookie('paid_href') == order_num) {
//     //
//     //             } else {
//     //                 setCookie("paid_href", order_num, "s30");
//     //                 // if (site_from == 'wap6') {
//     //                 //     showModalMasterContact()
//     //                 // }
//     //                 //window.location.href = paid_url;
//     //                 var userAgent = navigator.userAgent;
//     //                 //如果是vivo和oppo的默认浏览器 则进行open跳转
//     //                 if(userAgent.indexOf("VivoBrowser")>-1 || userAgent.indexOf("OppoBrowser")>-1){
//     //                 　　window.open(paid_url);
//     //                     window.location.href = paid_url;
//     //                 }else{
//     //                     window.location.href = paid_url;
//     //                 }
//     //
//     //             }
//     //         } else {
//     //             $('.modal-paid').hide()
//     //         }
//     //         $('.orderStatus').html(orderStatus_str);
//     //     }
//     // });
// }
// $(function () {
//     $('#showme,#unlock').each(function () {
//         $(this).click(function () {
//             $('html, body').animate({
//                 scrollTop: 0
//             }, 500)
//         });
//     });
// });
//
// $(function () {
//     $('.payMethods a').on({
//         click: function () {
//             $('#order_pay_type').val($(this).attr('data-paytype'));
//             $('#payOrder').attr({
//                 'action': 'http://qumingweb.huduntech.com/api/pay/pay_wap.php'
//             }).submit()
//         }
//     })
//     $('.payment-choose a').on({
//         click: function () {
//             $(this).addClass('checked').siblings().removeClass('checked');
//
//             console.log($(this).attr('data-paytype'))
//             $('#order_pay_type').val($(this).attr('data-paytype'));
//         }
//     })
//     $('.btn-pay-now').on({
//         click: function () {
//             $('#payOrder').attr({
//                 'action': 'http://qumingweb.huduntech.com/api/pay/pay_wap.php'
//             }).submit()
//         }
//     })
// })
//
// $(function () {
//     $(window).scroll(function () {
//         var hTop = 150;
//         var docTop = $(this).scrollTop() - 20;
//         if ($('.form-order').length > 0) {
//             hTop = $('.form-order').offset().top
//         }
//         if (docTop >= hTop) {
//             $('.btn-pay_bottomFixed').show();
//             if ($('.btnUnlockFix').length > 0) {
//                 $('.btnUnlockFix').show();
//             }
//         } else {
//             $('.btn-pay_bottomFixed').hide();
//             if ($('.btnUnlockFix').length > 0) {
//                 $('.btnUnlockFix').hide();
//             }
//         }
//     });
//     $('.btn-pay_bottomFixed, .infos-unlock').on({
//         click: function () {
//             $('html, body').animate({
//                 scrollTop: 0
//             }, 500)
//         }
//     })
//     $('.page-buy-unlock, .btnUnlockFix').on({
//         click: function () {
//             $(window).scrollTop(0);
//         }
//     })
//
//     $('.user-info-more').on({
//         click: function () {
//             $('.user-info').css({
//                 'height': 'auto'
//             })
//             $(this).hide();
//         }
//     })
// });
// function showModalMasterContact() {
//     var modal = document.getElementById("modalToShow");
//     setInterval(function () {
//         if (modal.style.display == "none") {
//             modal.style.display = "block";
//         }
//     }, 10000);
// }
