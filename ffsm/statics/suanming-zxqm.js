function checkForm() {
	$('.lunpan_box').css('display','block');
	var username = document.login.xing.value;
	if (username == "") {
		alert("没有填姓氏！");
		document.login.username.focus();
     	 $('.lunpan_box').css('display','none');
      	event.preventDefault();
		return false;
	}


	
}