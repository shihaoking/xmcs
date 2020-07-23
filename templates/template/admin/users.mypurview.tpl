<{include file="admin/header.tpl"}>
<style>
    .bh {
        line-height:24px;
    }
    dl.m_dl {
        margin-left:20px;
        margin-top:10px;
    }
    dl.m_dl dt {
        line-height:48px;
        border-bottom:1px dashed #eee;
        font-size:14px;
    }
    dl.m_dl dd {
        padding-left:20px;
        line-height:36px;
        border-bottom:1px dashed #eee;
    }
</style>
<dl class="search-class" style="border-bottom:1px solid #eee">
    <h3 class='bh'>
        你好：<font color='red'><{$users.user_name}>( <{frame_union do='groups' var=$users.groups}> )</font>
        欢迎登录管理后台
    </h3>
</dl>
<div style="padding-left:10px;padding-top:16px;">

<div style="padding-left:10px;">
    <div class="title" style="line-height:28px;border-bottom:1px dashed #ccc;font-weight:bold;">我的分销</div>
    <div style="line-height:28px;width:460px;padding-top:10px;float: left;">
   <span style="display:-moz-inline-box; display:inline-block; width:150px;">我的余额：<font color='red'><{$users.dl_syjf}> ￥</font></span>
   <span style="display:-moz-inline-box; display:inline-block; width:150px;">我的总收益：<font color='red'><{$users.dl_zjf}> ￥</font></span>

	  <br/>
	  <br/>
	  <span style="display:-moz-inline-box; display:inline-block;font-size: 18px;font-weight: 700;"><font color='red'>可用的分销链接列表</font></span>
   <br/>
   <br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：所有测算项目主页  <font color='red'>支持主页上所有项目提成</font><br/>
   <textarea cols="20" rows="10" id="biao1" style="width: 360px;height: 20px;">https://www.mtws.site/?dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(1)" value="点击复制链接" /></span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：电脑端测算页面  <font color='red'>59.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao2" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=pc&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(2)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5合婚测算  <font color='red'>59.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao3" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=hehun&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(3)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5月老姻缘测算  <font color='red'>39.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao4" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=bzyy&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(4)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5八字详批  <font color='red'>58.8 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao5" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=bazi&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(5)" value="点击复制链接" />
   </span><br/>
</div>

    <div style="line-height:28px;width:460px;padding-top:10px;float: left;">
	  <br/>
	  <br/>
	  <span style="display:-moz-inline-box; display:inline-block;font-size: 18px;font-weight: 700;"></span>
   <br/>
   <br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H52019爱情运分析  <font color='red'>29.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao6" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=aiqingyun&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(6)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5姓名配对  <font color='red'>9.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao7" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=xmpd&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(7)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5八字详批精批  <font color='red'>29.9 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao8" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=bazijp&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(8)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5许愿点灯  <font color='red'>8.8 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao9" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=xydd&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(9)" value="点击复制链接" />
   </span><br/>
   <span style="display:-moz-inline-box; display:block; width:400px;">测算项目：H5号码解析  <font color='red'>8.8 ￥</font><br/>
   <textarea cols="20" rows="10" id="biao10" style="width: 360px;height: 20px;">https://www.mtws.site/?ac=hmjx&dl=<{$users.uid}></textarea><br/><input type="button" onClick="copyUrl2(10)" value="点击复制链接" />
   </span><br/>
</div>
    <div style="line-height:28px;width:525px;padding-top:10px;float: left;">
<h2 style="text-align:center;">
	<span style="color:#E53333;">分销代理推广链接说明</span> 
</h2>
<p>
	复制你的专属推广链接，只要用户下单你即可获取提成。
</p>
<p>
	<strong>关于提现</strong>，请到提现管理栏目，申请提现，提现方式为微信或者支付宝，任何时间内申请提现最迟24小时内到账。
</p>
<p>
	如果你有任何疑问，请联系QQ：910407802获取解答！祝我们合作共赢！
</p>
<p>
	<br />
</p>
<h2 style="text-align:center;">
	<span style="color:#E53333;">推广用图</span> 
</h2>
<p style="text-align:center;">
	<img src="https://sm.yiabs.com/statics/ffsm/index/images/09.jpg" width="260" height="100" alt="" />&nbsp;<img src="/img/banner.jpg" width="260" height="100" alt="" />
</p>
<p style="text-align:center;">
	<img src="/img/banner-jm2.png" width="260" height="100" alt="" />&nbsp;<img src="/img/img_banner.jpg" width="260" height="100" alt="" />
</p>
<p style="text-align:center;">
	<img src="/img/banner.jpg" width="260" height="100" alt="" />&nbsp;<img src="/img/bazihehun.png" width="260" height="100" alt="" />
</p>
</div>
</div>

</div>

<script type="text/javascript"> 
function copyUrl2(str) 
{ 
var Url2=document.getElementById("biao"+str); 
Url2.select(); // 选择对象 
document.execCommand("Copy"); // 执行浏览器复制命令 
alert("已复制好，可贴粘。"); 
} 
</script> 
</body>
</html>