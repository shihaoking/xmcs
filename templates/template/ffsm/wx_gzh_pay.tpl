<!DOCTYPE html>
 <html>
   <head>
     <meta charset="UTF-8">
     <title></title>
     <script src="/statics/jquery-3.2.1.min.js"></script>
   </head>
   <body>
     <script type="text/javascript">
     
     //return false;
     
       function onBridgeReady() {
         WeixinJSBridge.invoke('getBrandWCPayRequest', {
           "appId": "<{$pay_info.appId}>", //公众号名称，由商户传入
           "timeStamp": "<{$pay_info.timeStamp}>", //时间戳，自1970 年以来的秒数
           "nonceStr": "<{$pay_info.nonceStr}>", //随机串
           "package": "<{$pay_info.package}>",
           "signType": "<{$pay_info.signType}>", //微信签名方式:
           "paySign": "<{$pay_info.paySign}>" //微信签名
         }, function(res) {
           if(res.err_msg == "get_brand_wcpay_request:ok") {
                 // window.location.href = "<{$row.url}>";
				 inquiry();
           }
         });
       }
       if(typeof WeixinJSBridge == "undefined") {
         if(document.addEventListener) {
           document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
         } else if(document.attachEvent) {
           document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
           document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
         }
       } else {
         onBridgeReady();
       }
	   
	   
	   
    function inquiry() {
		
        $.get('/?ct=pay&ac=scanquery&oid=<{$row.oid}>', {t: Date.parse(new Date())}, function (data) {
            if (data.status) {
                window.location = data.url;
            }
        }, 'json');
    }
	   
	   
	   
     </script>
   <{include file='./ffsm/dl_ck.tpl'}>
</body>
 </html>
