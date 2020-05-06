$(function() {
    $('#switch_qlogin').click(function() {
        $('#switch_login').removeClass("switch_btn_focus").addClass('switch_btn');
        $('#switch_qlogin').removeClass("switch_btn").addClass('switch_btn_focus');
        $('#switch_bottom').animate({
            left: '0px',
            width: '70px'
        });
        $('#qlogin').css('display', 'none');
        $('#web_qr_login').css('display', 'block');
    });
    $('#switch_login').click(function() {
        $('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
        $('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
        $('#switch_bottom').animate({
            left: '154px',
            width: '70px'
        });
        $('#qlogin').css('display', 'block');
        $('#web_qr_login').css('display', 'none');
    });
    if (getParam("a") == '0') {
        $('#switch_login').trigger('click');
    }
});
function logintab() {
    scrollTo(0);
    $('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
    $('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
    $('#switch_bottom').animate({
        left: '154px',
        width: '96px'
    });
    $('#qlogin').css('display', 'none');
    $('#web_qr_login').css('display', 'block');
}
function getParam(pname) {
    var params = location.search.substr(1);
    var ArrParam = params.split('&');
    if (ArrParam.length == 1) {
        return params.split('=')[1];
    } else {
        for (var i = 0; i < ArrParam.length; i++) {
            if (ArrParam[i].split('=')[0] == pname) {
                return ArrParam[i].split('=')[1];
            }
        }
    }
}
var reMethod = "GET",
pwdmin = 6;
$(document).ready(function() {
    $('#reg').click(function() {
        if ($('#user').val() == "") {
            $('#user').focus().css({
                border: "1px solid red",
                boxShadow: "0 0 2px red"
            });
            $('#userCue').html("<font color='red'><b>×用户名不能为空</b></font>");
            return false;
        }
        if ($('#user').val().length < 4 || $('#user').val().length > 16) {
            $('#user').focus().css({
                border: "1px solid red",
                boxShadow: "0 0 2px red"
            });
            $('#userCue').html("<font color='red'><b>×用户名位4-16字符</b></font>");
            return false;
        }
		if ($('#password').val().length < pwdmin) {
            $('#password').focus();
            $('#userCue').html("<font color='red'><b>×密码不能小于" + pwdmin + "位</b></font>");
            return false;
        }
       		 var str=$('#nickname').val();
 			 var reg = new RegExp("^[\u0391-\uFFE5]+$","g");
 			var strs=reg.test(str);

 		 if(strs==false){
			$('#nickname').focus().css({
                border: "1px solid red",
                boxShadow: "0 0 2px red"
            });
            $('#userCue').html("<font color='red'><b>×用户昵称只能输入中文</b></font>");
            return false;
   		  }
        
        if ($('#password2').val() != $('#password').val()) {
            $('#password2').focus();
            $('#userCue').html("<font color='red'><b>×两次密码不一致！</b></font>");
            return false;
        }
       
        $('#regUser').submit();
    });
});
function checkChinese(str){
  
  console.log(str);
  var reg = new RegExp("^[\u0391-\uFFE5]+$","g");
 var strs=reg.test(str);
  console.log(strs);
 return strs;
}