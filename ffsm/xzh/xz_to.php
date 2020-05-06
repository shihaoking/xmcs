<?php
/**
 * 用sha1算法生成安全签名
 * @param string $strToken 票据
 * @param string $intTimeStamp 时间戳
 * @param string $strNonce 随机字符串
 * @param string $strEncryptMsg 密文消息
 * @return string
orderId	订单编号	string	订单编号【幂等性标识参数】(用于重入判断)，百度订单	是	800020199
tpOrderId	业务方订单编号	string	订单编号	是	900020199
returnData	业务平台方需要的数据	Jsonstring	业务平台方需要的数据	是	{}
status	订单支付状态	Int	1：未支付；2：已支付；-1：订单取消	是	2
unitPrice	单价	Int	单位：分	是	800
count	数量	Int	数量	是	2
payMoney	实付金	Int	扣除各种优惠后用户还支付的金额，单位：分	是	1200
promoMoney	营销金额	Int	营销优惠金额	是	100
hbMoney	红包支付金额	Int	红包支付金额	是	100
hbBalanceMoney	余额支付金额	Int	余额支付金额	是	100
giftCardMoney	抵用券金额	Int	抵用券金额	是	100
payTime	支付	Int	支付完成时间	是	1463037529
payType	支付渠道	Int	支付渠道值	是	9101
partnerId	支付平台	Int	支付平台标识值	是	1000000003
promoDetail	促销详情	Jsonstring	订单参与的促销优惠的详细信息	是
xz_orders
:id orderId tpOrderId status unitPrice count payTime oid openid  payMoney
 */
//系统配置

define('CORE', dirname(__FILE__));

define("zdhf", "你的消息我们已经记录，请微信关注【开运算命网】或【kaiyun99】获取多更详情");

require '../../config/inc_config.php';

//加载核心类库
require '../../core/util.php';
require '../../core/db.php';
require '../../core/function.php';
function getSHA1($strToken, $intTimeStamp, $strNonce, $strEncryptMsg = '')
{
    $arrParams = array(
        $strToken, 
        $intTimeStamp, 
        $strNonce,
    );
    if (!empty($strEncryptMsg)) {
        array_unshift($arrParams, $strEncryptMsg);
    }
    sort($arrParams, SORT_STRING);
    $strParam = implode($arrParams);
    return sha1($strParam);
}
function responseMsg()
    {
        $postStr = file_get_contents("php://input");

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $toUserName = $postObj->ToUserName;
            $fromUserName = $postObj->FromUserName;
         	 $MsgType = $postObj->MsgType;
            $orderId = $postObj->orderId;
            $tpOrderId = $postObj->tpOrderId;
            $returnData = $postObj->returnData;
            $status = $postObj->status;
            $unitPrice = $postObj->unitPrice;
            $count = $postObj->count;
            $payMoney = $postObj->payMoney;
            $payTime = $postObj->payTime;
            $payType = $postObj->payType;
            $partnerId = $postObj->partnerId;
            $event = $postObj->Event;
            $keyword = trim($postObj->Content);
            $time = time();
			/*$cc="<br />tname:".$toUserName."<br />fname:".$fromUserName."<br />event:".$event."<br />keyword:".$keyword
			."<br />订单编号:".$orderId
              ."<br />MsgType:".$MsgType
			."<br />业务方订单编号:".$tpOrderId
			."<br />业务平台方需要的数据:".$returnData
			."<br />订单支付状态:".$status
			."<br />单价:".$unitPrice
			."<br />数量:".$count
			."<br />实付金:".$payMoney
			."<br />支付完成时间:".$payTime
			."<br />支付渠道:".$payType
			."<br />支付平台:".$partnerId;
			file_put_contents("test.php",$cc, FILE_APPEND); */
            // $textTpl = "
			// <xml>
				// <ToUserName><![CDATA[%s]]></ToUserName>
				// <FromUserName><![CDATA[%s]]></FromUserName>
				// <MsgType><![CDATA[%s]]></MsgType>
				// <Event><![CDATA[%s]]></Event>
				// <returnData><![CDATA[%s]]></returnData>
			// </xml>";

			$textTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime><![CDATA[%s]]></CreateTime>
			<MsgType><![CDATA[%s]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			</xml>";

			$pay_Tpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<MsgType><![CDATA[%s]]></MsgType>
			<isConsumed><![CDATA[%s]]></isConsumed>
			</xml>";

            if(!empty($keyword))
            {
                $msgType = "text";
                $contentStr = zdhf;
                $resultStr = sprintf($textTpl, $fromUserName,$toUserName, $time, $msgType, $contentStr);
                echo $resultStr;
             }
			 if(!empty($orderId) && $status==2){
				 $MsgType="mch";
				 $isConsumed=2;
				 $returnData=json_decode($returnData);
				$xz_orders['orderId']=$orderId;
				$xz_orders['oid']=$tpOrderId;
				$xz_orders['status']=$status;
				$xz_orders['unitPrice']=$unitPrice;
				$xz_orders['count']=$count;
				$xz_orders['payTime']=$payTime;
				$xz_orders['openid']=$fromUserName;
				$xz_orders['payMoney']=$payMoney;
				 $resultStr = sprintf($pay_Tpl, $fromUserName,$toUserName, $MsgType, $isConsumed);
				@db::insert('xz_orders',$xz_orders);
				@db::update('ffsm_orders',array('','paytype'=>3,'status'=>1,'paytime'=>time())," `oid`='".$tpOrderId."'");
				 echo $resultStr;
               
			 }
        }else{
            echo "";
            exit;
        }
    }
//测试代码示例
$TOKEN = 'kaiyunwan';
$strSignature = getSHA1($TOKEN, $_GET['timestamp'], $_GET['nonce']);
if ($strSignature == $_GET['signature']) {
    //echo $_GET['echostr'];
	if(empty($_GET['echostr'])){
		responseMsg();
	}
} else {
    echo 'failed';
}
