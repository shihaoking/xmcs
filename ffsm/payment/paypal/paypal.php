<?php
include '../../../core/wxpaycf.php';
$out_trade_no = $_REQUEST['WIDout_trade_no'];

//订单名称，必填
$subject = $_REQUEST['WIDsubject'];

//付款金额，必填
$total_amount = $_REQUEST['WIDtotal_fee'];
//测算项目
$ac = $_REQUEST['ac'];

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf8">
    <title>正在转到付款页</title>
</head>
<body >
		
<form name="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="pay">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="<?php echo PAYPAL;?>">  
			<input type="hidden" name="item_name" value="<?php echo $subject;?>">
			<input id='item_number' type="hidden" name="item_number" value="<?php echo $out_trade_no;?>"> 
			<input id='amount' type="hidden" name="amount" value="<?php echo $total_amount;?>">  <!-- 金额  -->
			<input type="hidden" name="currency_code" value="USD">
			<input type='hidden' name='return' value='<?php echo "http://".SMURL."/?ac=".$ac."&oid=".$out_trade_no."&token=".base64_encode(md5($out_trade_no));?>'> 
			<input type='hidden' name='notify_url' value='<?php echo "http://".SMURL."/?ct=pay&ac=notify_paypal";?>'>  
			<input type='hidden' name='cancel_return' value='<?php echo "http://".SMURL."/?ac=".$ac."&oid=".$out_trade_no;?>'> 
			<input id='invoice' type='hidden' name='invoice' value='<?php echo $out_trade_no;?>'> <!-- 自定义订单号 -->
			<input type='hidden' name='charset' value='utf-8'><!-- 字符集 -->
			<input type="hidden" name="no_shipping" value="1"> <!-- 不要求客户提供收货地址 -->
			<input type="hidden" name="no_note" value="<?php echo $subject;?>"> <!-- 付款说明 -->
			<input type="hidden" name="bn" value="IC_Sample">
			<input type='hidden' name='rm' value='2'>
</form>	
正在跳转Paypal支付，请稍等。。。
<script>
    function sub(){
        document.pay.submit();
    }
    onload(sub())
</script>
</body>
</html>