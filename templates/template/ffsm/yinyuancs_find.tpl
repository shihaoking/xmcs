<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8"/>
	<title>精准八字解析-揭开婚姻奥秘-易读网</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
	<meta content="telephone=no" name="format-detection"/>
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link href="/statics/ffsm/yunyincs/1/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
	<link href="/statics/ffsm/yunyincs/style.min.css" rel="stylesheet" type="text/css"/>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
	<h1 class="public_h_con">姻缘测算</h1>
	<a class="public_h_home" href="/"></a><a href="/?ac=history" class="public_h_menu">我的测算</a></header>
<div class="public_banner">
	<img src="/statics/ffsm/yunyincs/1/images/banner.jpg" alt="八字精批"/>
</div>
<div class="order_box_pay">
	<div class="obp_nun">
		订单编号:<{$data.oid}>
	</div>
</div>
<script>
	(function(){
		var num=['【yiduyixue】'];
		var rNum=parseInt(Math.random()*num.length,10);
		document.write('<div style="text-align: center;margin:10px 0 0;padding:0 0 10px;overflow: hidden;"><p style="font-size: 16px;">关注微信号领取赠品或预约大师:</p><p style="color:#FF6632;padding:6px 0;font-size: 18px">'+num[rNum]+'</p><div style="width: 240px;text-align: left;margin:0 auto;line-height: 24px;"><p style="position: relative;padding-left:24px;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%">1</i>【长按上方微信号即可复制】</p><a href="weixin://" style="position: relative;padding-left:24px;color: #FF6632;display: block;text-decoration: none;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%"">2</i>【点我打开微信】</a></div></div>');
	})();
</script>
<div style='text-align:center;'>
<span style='color:#ff0000'>关注微信后回复：面相教程、即可领取赠品</span>
</div>
<!--ads:550-->
<div id="showList">
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			您的八字命盘 <i class="on"></i>
		</p>
		<div class="J_listCon result_list_content" style="display: block;">
			<div class="base_info">
				<p>
					<span>姓名:</span><{$data.data.username}>
				</p>
				<p>
					<span>性别:</span><{if $data.data.gender==1}>男<{else}>女<{/if}>
				</p>
				<p>
					<span>公历:</span><{$data.data.y}>年<{$data.data.m}>月<{$data.data.d}>日 <{$data.data.h}>时
				</p>
				<p>
					<span>农历:</span><{$data.data.lDate}>
				</p>
			</div>
			<ul class="detail_info">
				<li><span class="info_head info_heads info_ts">&nbsp;</span><span class="info_head info_heads">年柱</span><span class="info_head info_heads">月柱</span><span class="info_head info_heads">日柱</span><span class="info_head info_heads">时柱</span></li>
				<li><span class="info_head">十神</span><span><{$pp.shishen1}></span><span><{$pp.shishen2}></span><span><{$pp.shishen3}></span><span><{$pp.shishen4}></span></li>
				<li><span class="info_head">&nbsp; 八</span><span><{$return.user.bazi.0}></span><span><{$return.user.bazi.2}></span><span><{$return.user.bazi.4}></span><span><{$return.user.bazi.6}></span></li>
				<li><span class="info_head">&nbsp; 字</span><span><{$return.user.bazi.1}></span><span><{$return.user.bazi.3}></span><span><{$return.user.bazi.5}></span><span><{$return.user.bazi.7}></span></li>
				<li><span class="info_head">藏干</span><span><{$pp.zanggan1}></span><span><{$pp.zanggan2}></span><span><{$pp.zanggan3}></span><span><{$pp.zanggan4}></span></li>
				<li><span class="info_head">纳音</span><span><{$pp.nayin1}></span><span><{$pp.nayin2}></span><span><{$pp.nayin3}></span><span><{$pp.nayin4}></span></li>

			</ul>
			<div class="main_info">
				<ul>
					<li>
						<div class="clear">
							<span>胎元:</span><{$pp.taiyuan}>
						</div>
						<div class="tss">
							<span>命宫:</span><{$pp.minggong}>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			感情综合点评<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				<{$data.data.username}>的爱情综合分析
			</p>
			<div class="public_con_word">
				<p>
					<{$rglm.aqfx}>
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			结婚建议<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
				<p>
					从<{$data.data.username}>的八字中总体分析结合最近几年的流年运判断，感情运势方面比较一般，但从八字中正官为喜用结合2019己亥年运，感情方面已经处于上升趋势、所以暂时感情运淡还请不要着急、另外你可以在卧室种植一些盆栽最好能开花的，卧室影响一个人的运势因素最大，所以提升卧室生机有利提升总体运势，鲜花象征的爱情、所以种植能开花的盆栽有助提升自身感情运，从而提高感情质量。
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			桃花运指数<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<div class="public_con_word">
				<p><strong>桃花指数：</strong>3颗星，TA外表好看，异性缘还不错</p>
			</div>
			<div class="public_con_word">
				<p><strong><span style="color:#E53333;">桃花运：</span></strong>也许对你而言，身边有没有异性都无所谓。现在的你，心里并没有特别烦恼或想不开的心事，所以对一切人事物都用一视同仁的心态对待。不管是同性或异性，都能跟你很愉快相处，不会有任何的压力。</p>
			</div>
			<div class="public_con_word">
				<p><strong>小贴士：</strong>因为你一视同仁的心态对待他们，异性友人会觉得有距离感，建议你再遇到喜欢的对象时主动些，人总是要对自己的幸福把握好机会！</p>
			</div>
			<p class="public_title">
				命带多少桃花运
			</p>
			<div class="public_con_word">
				<p>
					您命中有:红艳桃花<{if $return.data.zonghe.th}><{$return.data.zonghe.th}><{else}>1<{/if}>朵
				</p>
			</div>
			<div class="public_con_word">

					<img src="/statics/ffsm/bazijingpi/1/images/587dbda116fc0.png" alt="红艳桃花" class="list_pic"/>
						<p class="list_t">
							红艳桃花
						</p>
						<p>
							高雅优美追求者众
						</p>
						<p>
							顾名思义，红艳给人感受如同花开美好又灿烂，主众人见你心喜，本人气质出众，有特殊的魅力与好人缘，以至于本人在爱情追求上如虎添翼。红艳桃花，全名红艳桃花煞。命带红艳桃花，象征当事人外缘极佳，感情世界丰富。除了吸引异性欣赏，命带红艳桃花者，本身性情亦属浪漫多情，面对追求者示爱，很容易动情而接受对方。在你的八字格局里有红艳桃花，象征你发生一见锺情的机率很高，往往会在电石火光间遇到了那个对的人与恋人的发展关系往往是激情四射，当然这样的感情来得快也去得快。因为命带红艳桃花，象征本人异性缘佳，且生性多情。即使身旁已有交往对象，仍会吸引其他异性追求，若本身意志不坚，很容易就风流韵事不断，造成爱情运势不稳、感情容易生变。
						</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			结婚时间<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				不宜早婚
			</p>
			<div class="public_con_word">
				<p>
					八字中<{if $data.data.username==1}>男<{else}>女<{/if}>命伤官透干生财，不宜早婚、最佳结婚年龄22岁、23岁、25岁、27岁。另外结婚<{$data.data.username}>的八字总体而言感情运势一般，如若早婚会出现早婚必离的情况，所以在结婚之前多谈几次恋爱，可以有效的排泄婚后的感情不良因素，从而提高婚后感情质量。
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			配偶性格<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				<{$data.data.username}>的性格
			</p>
			<div class="public_con_word">
				<p>
					比肩为喜用，外表平凡却外虚内实，用心努力之人，善于比较选择，改良创办，意志坚定不易改变立场，与朋友交往重实质情谊。 一般而言比肩是象征意志坚定，自尊心强，分别是非，择善固执，坚守岗位，忍耐心很强，常能在逆境中完成心愿。（重点）
				</p>
			</div>
			<p class="public_title">
				配偶性格
			</p>
			<div class="public_con_word">
				<p>
					伤官心性。优点：领悟力强，理想高远，追求完美生活。有独裁倔强个性。自信甚强，斗志昂扬，学习能力强，易成英雄人物。伤官在命，若非多学多能，就是相貌清秀。在自由事业，精密技术、演艺事业方面，易获特殊成功，也可站在台前或从事口才之事业。缺点：领悟力与兴趣广泛，博而不精。易恃才而骄，不喜世俗礼法拘束，行为易致任性乖张。为达目的，甚或以私害公，伤人而不自知。如原局再财多，则会贪得无厌。好管闲事，易招人误会。
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			稳定系数<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				<{$data.data.username}>的是否稳定？
			</p>
			<div class="public_con_word">
				<p>
				正才为忌神，但夫妻宫为喜用神，表明对方自身条件好、品质好，但却不能帮助自己。另外从你的八字性格上看，婚姻生活会多多少少的受到你的性格影响导致感情淡化。对于<{if $data.data.username==1}>男<{else}>女<{/if}>性而言、婚后控制好自己的性格能够提升感情运势哦！古人云：修身养性才是渡世金方！感情方面也是如此！
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			幸福指数<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				一生的感情运指数
			</p>
			<div class="public_con_word">
				<p>
				其实从总体来看！感情运势早年会有所波折！但婚后感情质量会慢慢上升。除了上述的性格方面和外界因素之外、其导致你感情淡化的另外一个因素就是八字中的命运、我们说一命二运三风水。既然命运如此、那么我们可以通过环境风水来提升这方面的运势！由于风水布局需要因地制宜，故针对你的八字而言，可以佩戴一些黑色或者五行属水的饰品、来增旺你的感情运势。如果有兴趣可以关注下方我们的微信号，可以在线向我们的命理师傅提问哦！
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			助旺指数<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<p class="public_title">
				命中含偏财
			</p>
			<div class="public_con_word">
				<p>
				<{$data.data.username}>的八字上分析有偏财的存在、俗话说：人不得偏财不富、马不吃野草不肥，八字中有偏财、事业财运方面会给对方很大的帮助。虽然你不能得到对方的帮助，但你却有帮助对方的命运，所以在事业财运方面自己要多拿主意多提意见、或许会因为你的一些指点意见让对方在事业财运方面有所收获。八字中有偏财、并不是说一定能帮助对方、但人逢偏财运事业财运比较好罢了！另外你自己也适合做生意干事业。
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<p class="public_words_title J_listTit">
			子女运数<i></i>
		</p>
		<div class="J_listCon result_list_content">
			<div class="public_con_word">
			</div>
			<div class="public_con_word">
				<p>
				<p>1、印星现时柱，子女聪明仁慈，孝顺父母。</p>
				<p>2、阳日阴时先生男后生女。</p>
				<p>3、如果怀孕，预产之年如与丈夫四柱时支相冲，要预防流产。</p>
				<p>4、遇伤官流年易生儿子。</p>
				<p>5、食伤为忌神，但子女宫为喜用神，表明子女自身条件好、品质好，但却不能帮助自己。</p>
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		//展开收缩
		var showList = $('#showList');
		showList.find('.J_listTit').on('click', function() {
			var thisI = $(this).children('i');
			if (!thisI.hasClass('on')) {
				showList.find('.J_listTit').children('i').removeClass('on');
				showList.find('.J_listCon').hide();
				thisI.addClass('on');
				$("html,body").scrollTop(thisI.offset().top - 10);
				$(this).siblings('.J_listCon').show();
			} else {
				thisI.removeClass('on');
				$(this).siblings('.J_listCon').hide();
			}
		});
	});
</script>
<div class="public_fyd_fengqing">
	<div class="public_ff_title">
		关注微信公众号还可以免费测
	</div>
	<div class="public_ff_goods">
		<img src="https://www.yiabs.com/weixin.jpg" alt="">
		<p>
			<span>微信号（yiduyixue）</span>
		</p>
	</div>
</div>
<script>
	(function(){
		var num=['yiduyixue','yiduyixue','yiduyixue'];
		var rNum=parseInt(Math.random()*num.length,10);
		document.write('<div style="text-align: center;margin:10px 0 0;padding:0 0 10px;overflow: hidden;"><p style="font-size: 16px;">更多详细测算，请咨询大师微信号:</p><p style="color:#FF6632;padding:6px 0;font-size: 18px">'+num[rNum]+'</p><div style="width: 240px;text-align: left;margin:0 auto;line-height: 24px;"><p style="position: relative;padding-left:24px;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%">1</i>【长按上方数字复制微信号】</p><a href="weixin://" style="position: relative;padding-left:24px;color: #FF6632;display: block;text-decoration: none;"><i style="font-style: normal;position: absolute;width: 20px;height:20px;line-height: 20px;left:2px;top:2px;line-height: 20px;color: #fff;background: #000;text-align: center;border-radius: 50%"">2</i>【点我打开微信】</a></div></div>');
	})();
</script>
<!--ads:500-->
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#904c38; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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