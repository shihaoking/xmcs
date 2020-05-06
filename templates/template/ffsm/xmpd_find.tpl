<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>姓名配对结果页面-易读网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/xmpeidui/2/style.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">姓名配对</h1>
<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="order_top">
	<img src="/statics/ffsm/xmpeidui/2/images/banner_result.jpg" alt="">
	<div>
		订单号：<{$data.oid}>
	</div>
</div>
<script>
		(function(){
    var num=['yiduyixue','yiduyixue','yiduyixue'];
    var rNum=parseInt(Math.random()*num.length,10);
    document.write('<div style="text-align: center;margin:10px 0 0;padding:0 0 10px;overflow: hidden;"><p style="font-size:16px;color:#fff;">预约大师亲算，请添加微信号咨询：</p><p style="color:#fff;padding:6px 0;font-size: 18px">'+num[rNum]+'</p><div style="width: 240px;text-align: left;margin:0 auto;line-height: 24px;"><p style="position:relative;padding-left:24px;color:#fff;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%">1</i>【长按上方数字复制微信号】</p><a href="weixin://" style="position: relative;padding-left:24px;color:#fff;display: block;text-decoration: none;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%"">2</i>【点我打开微信】</a></div></div>');
})();
	</script>
<!--ads:550-->
<div class="order_info">
	<div class="oi_name">
		<div class="oi_left">
			<h4><{$data.data.malexing}><{$data.data.malename}></h4>
			<p>
				男主角
			</p>
		</div>
		<div class="oi_con">
			<b>VS</b>
			<p>
				配对
			</p>
		</div>
		<div class="oi_right">
			<h4><{$data.data.femalexing}><{$data.data.femalename}></h4>
			<p>
				女主角
			</p>
		</div>
	</div>
	<div class="oi_num">
		<p>
			匹配契合度
		</p>
		<div class="start_4_5">
		</div>
	</div>
</div>
<div class="order_grid">
	<div class="base_tit">
		男女姓名婚姻五格
	</div>
	<div class="og_tit">
		男主角：<{$data.data.malexing}><{$data.data.malename}>
	</div>
	<div class="og_con">
		<div class="og_name">
			<i class="l"></i><i class="c"></i><i class='r'></i>
			<div>
				<{if $return.x2arr==''}><span>1</span><{else}><{$return.x1arr.nxing1}><{/if}>
			</div>
			<div>
            
            <{if $return.x2arr==''}><{$return.x1arr.nxing1}><{else}><{$return.x2arr.nxing2}><{/if}>
				
			</div>
			<div>
				<{$return.m1arr.nming1}>
			</div>
			<div>
				<{if $return.m2arr.nming2!=''}><{$return.m2arr.nming2}><{else}><span>1</span><{/if}>
			</div>
		</div>
		<div class="og_txt">
			<span>天格:<{$return.tdrh_ge_arr.tiange1}></span><span>人格:<{$return.tdrh_ge_arr.renge1}></span><span>地格:<{$return.tdrh_ge_arr.dige1}></span>
		</div>
		<div class="og_all">
			<span>外格:<{$return.tdrh_ge_arr.waige1}></span>
		</div>
		<div class="og_txt">
			<span>总格:<{$return.tdrh_ge_arr.zhongge1}></span>
		</div>
	</div>
	<div class="og_tit">
		女主角：<{$data.data.femalexing}><{$data.data.femalename}>
	</div>
	<div class="og_con og_con_2">
		<div class="og_name">
			<i class="l"></i><i class="c"></i><i class='r'></i>
			<div>
				<{if $return.n2x2arr!=''}><{$return.n2x1arr.n2xing1}><{else}><span>1</span><{/if}>
			</div>
			<div>
				<{if $return.n2x2arr!=''}><{$return.n2x2arr.n2xing2}><{else}><{$return.n2x1arr.n2xing1}><{/if}>
			</div>
			<div>
				<{$return.n2m1arr.n2ming1}>
			</div>
			<div>
				<{if $return.n2m2arr.n2ming2!=''}><{$return.n2m2arr.n2ming2}><{else}><span>1</span><{/if}>
			</div>
		</div>
		<div class="og_txt">
			<span>天格:<{$return.tdrh2_ge_arr.ntiange1}></span><span>人格:<{$return.tdrh2_ge_arr.nrenge1}></span><span>地格:<{$return.tdrh2_ge_arr.ndige1}></span>
		</div>
		<div class="og_all">
			<span>外格:<{$return.tdrh2_ge_arr.nwaige1}></span>
		</div>
		<div class="og_txt">
			<span>总格:<{$return.tdrh2_ge_arr.nzhongge1}></span>
		</div>
	</div>
</div>
<div class="bilateral_character">
	<div class="base_tit">
		双方性格
	</div>
	<div class="bc_box">
		<div class="bc_img">
			<img src="/statics/ffsm/xmpeidui/2/images/wx_<{$return.tdrh_ge_arr.yuanshen.wh_}>.jpg" alt="">
			<p>
				元神：<{$return.tdrh_ge_arr.yuanshen.yuanshen}>
			</p>
		</div>
		<div class="bc_tit">
			男主角：<{$return.data.malexing}><{$return.data.malename}>
		</div>
		<div class="bc_con">
        	<{$return.one_arr.xg1}>
		</div>
	</div>
	<div class="bc_box">
		<div class="bc_img">
			<img src="/statics/ffsm/xmpeidui/2/images/wx_<{$return.tdrh2_ge_arr.yuanshen.wh_}>.jpg" alt="">
			<p>
				元神：<{$return.tdrh2_ge_arr.yuanshen.yuanshen}>
			</p>
		</div>
		<div class="bc_tit bc_tit2">
			女主角：<{$return.data.femalexing}><{$return.data.femalename}>
		</div>
		<div class="bc_con">
			<{$return.two_arr.xg1xx}>
		</div>
	</div>
</div>
<div class="love_fate">
	<div class="base_tit">
		双方爱情宿命
	</div>
	<div class="lf_male">
		<img src="/statics/ffsm/xmpeidui/2/images/male_img.png" alt="">
		<div>
			男主角：<{$return.data.malexing}><{$return.data.malename}>
		</div>
		<p>
        	<{$return.tdrh_ge_arr.yuanshen.msg}>
            
			「一旦认定对方，就会全心全意付出」这是你最迷人的地方。虽然不是最浪漫的情人，但是，绝对是最能带给伴侣安全感的好男人！
		</p>
	</div>
	<div class="lf_female">
		<img src="/statics/ffsm/xmpeidui/2/images/female_img.png" alt="">
		<div>
			女主角：<{$return.data.femalexing}><{$return.data.femalename}>
		</div>
		<p>
        	
            <{$return.tdrh2_ge_arr.yuanshen.msg}>
			你从不吝於向另一半表达心目中浓浓爱意。即使处在暧昧不明的暗恋阶段，你的心仪对象，也绝对逃不过你那热情放送的强力电波。面对爱情，你的态度勇敢而直接，走出失恋/苦恋阴霾的速度，往往快得吓人。
		</p>
	</div>
</div>
<div class="gua_as">
	<div class="base_tit">
		姓名相合卦象
	</div>
	<div class="ga_top">
		<table class="ga_male">
		<tr>
			<th rowspan="3">
				<{$return.x1arr.nxing1}><br><{if $return.x2arr.nxing2}><{$return.x2arr.nxing2}><br/><{/if}><{$return.m1arr.nming1}><br><{$return.m2arr.nming2}>
			</th>
			<td>
				<div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<span></span><span></span>
			</td>
		</tr>
		<tr>
			<td>
				<div>
				</div>
			</td>
		</tr>
		</table>
		<table class="ga_female">
		<tr>
			<th rowspan="3">
				<{$return.n2x1arr.n2xing1}><{if $return.n2x2arr.n2xing2}><br><{$return.n2x2arr.n2xing2}><{/if}><br/><{$return.n2m1arr.n2ming1}><br><{$return.n2m2arr.n2ming2}>
			</th>
			<td>
				<span></span><span></span>
			</td>
		</tr>
		<tr>
			<td>
				<span></span><span></span>
			</td>
		</tr>
		<tr>
			<td>
				<span></span><span></span>
			</td>
		</tr>
		</table>
		<div class="ga_gua">
			<img src="/statics/ffsm/xmpeidui/2/images/gua_img.png" alt="">
			<table>
			<tr>
				<td>
					<{$return.gua.title}>
				</td>
			</tr>
			</table>
		</div>
	</div>
	<div class="ga_txt">
		姓名相合卦象：<{$return.gua.title}>(<{$return.gua.title_txt}>)
	</div>
	<div class="ga_txt">
		卦象等级：<{$return.gua.guayi}>&emsp;<{$return.gua.lv}>
	</div>
	<div class="ga_num">
		评分：<span class="start_4_5"></span>
	</div>
	<div class="ga_txt">
		解析：<br/>
		<{$return.gua.msg}>
	</div>
</div>
<div class="base_block">
	<div class="base_tit">
		爱情危机
	</div>
	<div class="bb_con">
		<img src="/statics/ffsm/xmpeidui/2/images/img_1.jpg" alt="">
		<{if $return.gua.weiji}>
		<{$return.gua.weiji}>
		<{else}>
		男生踏实稳重，女生直率爽朗，是互补型的组合，男生的踏实能给女生带来踏实安定的感觉，而女生的阳光率直也像阳光一样能让男生感觉到快乐和能量，然而两个人性格上的差异既是优点也是缺点，如果两人意见出现较大的分歧时，急惊风的女生一门心思的想要解决，而冷静的男生总是想要思虑周全之后再做沟通，解决矛盾两个人像带有时差一般，问题就那样横在彼此中间。
		<{/if}>
	</div>
</div>
<div class="base_block">
	<div class="base_tit">
		爱情建议
	</div>
	<div class="bb_con">
		<img src="/statics/ffsm/xmpeidui/2/images/img_2.jpg" alt="">
		<{if $return.gua.jianyi}>
		<{$return.gua.jianyi}>
		<{else}>
		一个温吞吞，一个急匆匆，如果两人真的走在一起，不妨像网球双打一样，一个补、一个攻，也许发展更为稳健，当然，大前提是是已经能完全理解和接受对方的特性。男生要更主动、加大追求力度。女生则要学习男生深思熟虑的处事态度，顺着这个趋势，相互补足，彼此迁就，共同进步，你们在生活上就不容易因为太过迥异的性格绊住脚步了。
		<{/if}>
	</div>
</div>
<div class="groom_goods">
	<script>
		(function(){
    var num=['yiduyixue','yiduyixue','yiduyixue'];
    var rNum=parseInt(Math.random()*num.length,10);
    document.write('<div style="text-align: center;margin:10px 0 0;padding:0 0 10px;overflow: hidden;"><p style="font-size: 16px;">更多详细测算，请咨询微信号：</p><p style="color:#FF6632;padding:6px 0;font-size: 18px">'+num[rNum]+'</p><div style="width: 240px;text-align: left;margin:0 auto;line-height: 24px;"><p style="position: relative;padding-left:24px;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%">1</i>【长按上方数字复制微信号】</p><a href="weixin://" style="position: relative;padding-left:24px;color: #FF6632;display: block;text-decoration: none;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%"">2</i>【点我打开微信】</a></div></div>');
})();
	</script>
</div>
<div class="ainuo_foot_nav cl" id="testFixedBtn">
    <ul>
     <li><a href="/"><i class="shouye_1"></i><p>测算首页</p></a></li>
     <li><a href="/?ac=history"><i class="wddd_1"></i><p>订单查询</p></a></li>
     <li><a href="/"class="botpost"><em><i class="lijics_1"></i></em><p>继续测算</p></a></li>
     <li><a href="/"><i class="gengduo_1"></i><p>更多测算</p></a></li>
     <li><a href="/?ac=member"><i class="grzx_1"></i><p>个人中心</p></a></li>
    </ul>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#fa2d5f; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
.ainuo_foot_nav li{width: 20%; text-align: center; float: left;}
.ainuo_foot_nav li a{width: 100%; display: block;}
.ainuo_foot_nav .foothover i{color: #f13030;}
.ainuo_foot_nav li i{display: block; line-height: 25px; height: 25px; margin: auto; padding: 0; width: 25px; overflow: hidden; background-size: 100%;}
.ainuo_foot_nav li a.botpost{position: relative; margin-top: -11px; background-color: rgba(0,0,0,0.0);}
.ainuo_foot_nav li a.botpost em{background: #ffffff; padding: 2px; border: 1px solid #ff5e5e; display: block; border-radius: 50%; width: 30px; height: 30px; margin: 0 auto; margin-bottom: 2px;padding-bottom: 0px;}
.ainuo_foot_nav li p{overflow: hidden; font-size: 12px; height: 16px; line-height: 16px; color: #fff; font-weight: 400;}
.shouye_1{background: url(/statics/ffsm/public/images/shouye.png) no-repeat;}
.wddd_1{background: url(/statics/ffsm/public/images/dingdan.png) no-repeat;}
.lijics_1{background: url(/statics/ffsm/public/images/suan.png) no-repeat;}
.gengduo_1{background: url(/statics/ffsm/public/images/gengduo.png) no-repeat;}
.grzx_1{background: url(/statics/ffsm/public/images/grzx.png) no-repeat;}
</style>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>