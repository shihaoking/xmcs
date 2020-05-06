<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8"/>
	<title><{$data.data.username}>的八字综合详批结果-易读网</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
	<meta content="telephone=no" name="format-detection"/>
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link href="/statics/ffsm/pc/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
	<link href="/statics/ffsm/pc/style.min.css" rel="stylesheet" type="text/css"/>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<a class="public_h_home" href="/"><img src="/statics/ffsm/pc/image/logo.png" alt="在线算命" /></a><a href="?ac=history" class="public_h_menu">订单历史记录</a>
</header>
<div class="order_banner"></div>
<div class="main w960">
<div class="calculation_result_top">
	<div class="crt_content">
		<span>订单编号:<{$data.oid}></span>
	</div>
</div>
<div class="calculation_result_content J_yifu">
<div id="showList">
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>你的八字命盘</span>
		</div>
		<div class="J_listCon">
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
					<!--<li>
						<div class="m_w_bai">
							<span>旺相休囚死: </span>金水土火木
						</div>
					</li>-->
					<li>
						<div class="ts m_w_80">
							<span>喜用神:</span><{$return.data.xiyongshen.data.xishen}>
						</div>
					</li>
					<li>
						<div class="clear">
							<span>胎元:</span><{$pp.taiyuan}>
						</div>
						<div class="tss">
							<span>命宫:</span><{$pp.minggong}>
						</div>
					</li>
					<li>
						<div class="ts_a">
							<span>起大运:</span><{$return.data.xiyongshen.data.dayun}>
						</div>
					</li>
				</ul>
				<dl>
					<dt>大运</dt>
					<dd>
						<div class="num">
							<span><{$return.data.xiyongshen.data.nnnn}></span><span><{$return.data.xiyongshen.data.nnnn+10}></span><span><{$return.data.xiyongshen.data.nnnn+20}></span><span><{$return.data.xiyongshen.data.nnnn+30}></span><span><{$return.data.xiyongshen.data.nnnn+40}></span><span><{$return.data.xiyongshen.data.nnnn+50}></span><span><{$return.data.xiyongshen.data.nnnn+60}></span><span>73</span>
						</div>
						<div class="word">
							<span><{$return.data.xiyongshen.data.yq_text.0}></span><span><{$return.data.xiyongshen.data.yq_text.1}></span><span><{$return.data.xiyongshen.data.yq_text.2}></span><span><{$return.data.xiyongshen.data.yq_text.3}></span><span><{$return.data.xiyongshen.data.yq_text.4}></span><span><{$return.data.xiyongshen.data.yq_text.5}></span><span><{$return.data.xiyongshen.data.yq_text.6}></span><span><{$return.data.xiyongshen.data.yq_text.7}></span>
						</div>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>你的性格分析</span>
		</div>
		<div class="J_listCon">
			<p class="infos">
				您出生于农历<{$return.user.lDate}>，五行生肖为:<{$return.user.sx}>
			</p>
			<div class="public_con_word">
				<{$return.info.sxgx.sxgx}>
			</div>
			<p class="public_title">
				性格优缺点
			</p>
			<div class="public_con_word">
				<p>
					<font color="#ff4632">优点</font>:<{if $return.data.zonghe.yx}><{$return.data.zonghe.yx}><{else}>才智高且具优秀的头脑，行动活泼好动且伶俐。好竞争，手腕敏捷有侠义心情，反应快，能见机行事。社交手腕高明善解人意，很快与人打成一片，但不喜欢被人控制，喜爱追求新鲜事务。聪明、机智、创新有才华，能言善道，有极强的自我表现欲。非常适合演艺和推销工作猴年生的男性精力充沛身体健壮，常表现达观机智勇敢，对环境变化有很强的适应能力生性顽强不服输，拥有多项才能而能居主导地位。求知欲很强，记忆力超人，头脑灵活很有创造力。善于把握机会扩大发展，造成时势，成为大企业家。<{/if}>
				</p>
				<p>
					<font color="#ff4632">缺点</font>:<{if $return.data.zonghe.qd}><{$return.data.zonghe.qd}><{else}>平常爱说大话，有时有反对人之意见虚语或伪诈行为。忽略必需遵守社会全体规范，有点不脚踏实地。生性爱玩缺乏耐心毅力，眼光看得不远，犯有今朝有酒今朝醉的毛病。依赖心很重，好夸张和爱慕虚荣且喜新厌旧，不管做任何事都不会持续太久。狡滑伪善，无耐心不忠实狂妄自大，过份乐观，自负心强喜投机。为了达成目的喜爱说谎骗人，尽管才智出众八面玲珑，却不能以德服人，是典型的机会主义者。猴年生人无论说话做事一定要诚实踏实，否则会一塌糊涂。有自以为是急就章的毛病，所以常导致错误失败。<{/if}>
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>你的财运分析</span>
		</div>
		<div class="J_listCon">
			<p class="public_title">
				流年财运
			</p>
			<div class="public_con_word">
				<p>
					<{if $return.data.zonghe.lncy}><{$return.data.zonghe.lncy}><{else}>你今年的财运浮沉反复，故此不宜大量投资及赌博，以免焦头烂额!幸而正财收入尚算稳定，故此若能量入为出，经济便不会出现赤字问题。此外，必须慎防受骗破财。今年的财运低沉的月份，是农历正月、五月、六月、九月及十二月，必须尽量减少不必要开支。财运较佳的月份，是农历一月、八月及十一月。<{/if}>
				</p>
			</div>
			<p class="public_title">
				先天财运
			</p>
			<div class="public_con_word">
				<p>
					<{if $return.data.zonghe.xtcy}><{$return.data.zonghe.xtcy}><{else}>本命财运，你的财运上从总体上来说是相当不错的。你拥有着让人艳羡的终生不用为钱烦恼的运气。然而由于做人积极且个性外向，是个天生的乐天派的马大哈性格，大都没有储蓄的习惯，手头充裕的时候，常不会做有效的运用，反而是挥霍无度。然而，他们打进了中年以后，却很有可能获得意外之财。如果在理财上如何趋利避害，关键便在于运用、开发好自己的大脑一般都会是大富大贵之人。<{/if}>
				</p>
			</div>
			<p class="public_title">
				注意事项
			</p>
			<div class="public_con_word">
				<p>
					<{if $return.data.zonghe.zhuyi}><{$return.data.zonghe.zhuyi}><{else}>建议主动帮长辈定期做身体检查，一则避免亲人有突发的重大疾病而意外破财，二则主动消费对财运有帮助。易有意料之外的小财运，但难以保存，最好购置保值物品或小投资的方式留财。外地走动财运更好，特别是外出业务合作、表演。<{/if}>
				</p>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>您的爱情以及恋爱建议</span>
		</div>
		<div class="J_listCon">
			<p class="public_title">
				爱情分析
			</p>
			<div class="public_con_word">
				<p>
					<{if $return.data.zonghe.aqfx}><{$return.data.zonghe.aqfx}><{else}>这种类型的<{if $data.data.username==1}>男<{else}>女<{/if}>性有知性的魅力，稍带忧郁的气质很受异性的欢迎。凡是追求的异性，一概来者不拒，一个星期可能和七个人约会。此外，因他具有果敢的行动力，所以也常会主动邀约他人。壬日男性很擅长“一夜风流”，从吃饭、饮酒到饭店这一个过程视以知性的背景，制造了绝妙的气氛，使他们无往不利。由于自由的恋爱观，使他们甚少有从一异性而终的心态。<{/if}>
				</p>
			</div>
			<p class="public_title">
				命带多少桃花运
			</p>
			<div class="public_con_word">
				<p>
					您命中有:红艳桃花<{if $return.data.zonghe.th}><{$return.data.zonghe.th}><{else}>1<{/if}>朵
				</p>
			</div>
			<div class="list">
				<dl>
					<dd><img src="/statics/ffsm/bazijingpi/1/images/587dbda116fc0.png" alt="红艳桃花" class="list_pic"/>
						<p class="list_t">
							红艳桃花
						</p>
						<p>
							高雅优美追求者众
						</p>
						<p>
							顾名思义，红艳给人感受如同花开美好又灿烂，主众人见你心喜，本人气质出众，有特殊的魅力与好人缘，以至于本人在爱情追求上如虎添翼。红艳桃花，全名红艳桃花煞。命带红艳桃花，象征当事人外缘极佳，感情世界丰富。除了吸引异性欣赏，命带红艳桃花者，本身性情亦属浪漫多情，面对追求者示爱，很容易动情而接受对方。在你的八字格局里有红艳桃花，象征你发生一见锺情的机率很高，往往会在电石火光间遇到了那个对的人与恋人的发展关系往往是激情四射，当然这样的感情来得快也去得快。因为命带红艳桃花，象征本人异性缘佳，且生性多情。即使身旁已有交往对象，仍会吸引其他异性追求，若本身意志不坚，很容易就风流韵事不断，造成爱情运势不稳、感情容易生变。
						</p>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>你的健康运势</span>
		</div>
		<div class="J_listCon">
			<div class="public_con_word">
				<p>
					从中医养生上来说，您基本上是<font color="#ff4632"><{$return.info.wharr.wang}></font>型人。
				</p>
			</div>
			<ul class="bazi_pic">
				<li><a href="javascript:;"><img src="/statics/ffsm/bazijingpi/1/images/587c34d949d33.png" alt="images" width="65%"/></a>
					<p>
						金
					</p>
				</li>
				<li><a href="javascript:;"><img src="/statics/ffsm/bazijingpi/1/images/587c34f569f63.png" alt="images" width="75%"/></a>
					<p>
						木
					</p>
				</li>
				<li><a href="javascript:;"><img src="/statics/ffsm/bazijingpi/1/images/587c3506773e3.png" alt="images"/></a>
					<p>
						水
					</p>
				</li>
				<li><a href="javascript:;"><img src="/statics/ffsm/bazijingpi/1/images/587c3516d9b1d.png" alt="images" width="60%"/></a>
					<p>
						火
					</p>
				</li>
				<li><a href="javascript:;"><img src="/statics/ffsm/bazijingpi/1/images/587c35274db39.png" alt="images" width="80%"/></a>
					<p>
						土
					</p>
				</li>
			</ul>
			<div class="public_con_word">
				<p>
					<{$return.data.rgxx.jkfx}>
				</p>
				<p>
					易患疾病:<{$return.info.wharr.whjk.jb}>
				</p>
				<p>
					易发症状:<{$return.info.wharr.whjk.zz}>
				</p>
			</div>
			<p class="public_title">
				养生要点
			</p>
			<div class="public_con_word">
				<p>
					养生要点:<{$return.info.wharr.whjk.yd}>
				</p>
			</div>
			<p class="public_title">
				生活起居
			</p>
			<div class="public_con_word">
				<p>
					生活起居:<{$return.info.wharr.whjk.sh}>
				</p>
			</div>
			<p class="public_title">
				饮食调节
			</p>
			<div class="public_con_word">
				<p>
					饮食调养:<{$return.info.wharr.whjk.ys}>
				</p>
			</div>
			<p class="public_title">
				保健膳食
			</p>
			<div class="public_con_word">
				<p>

				</p>保健膳食:<{$return.info.wharr.whjk.bj}>
			</div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>你的事业成就</span>
		</div>
		<div class="J_listCon">
			<p class="public_title">
				事业分析
			</p>
          <div class="public_con_word">
			<p><{$rglm.syfx}></p><p><{$tywh.hyhw}></p>
           </div>
		</div>
	</div>
	<div class="sl_box">
		<div class="public_title1">
			<span class="left"></span>
			<span class="right"></span>
			<span>您的2020庚子鼠年运势</span>
		</div>
		<div class="J_listCon">
			<p class="public_title">
				流月吉凶
			</p>
			<div class="public_con_word">
				<p>
					本年运势较低落的月份是农历一月、二月、八月、九月、十月在这段时期必须谨言慎行，不投机。较为顺利的月份是农历三月、四月、七月、十一月、十二月积极努力，必有收获。
				</p>
			</div>
			<{foreach from=$return.sx.yf item=v}>
			<p class="public_title">
				<{$v.m}>月<{$v.title}>
			</p>
			<div class="public_con_word">
				<p>
					<{$v.content}>
				</p>
			</div>
			<{/foreach}>
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
</div>
</div>
<p class="public_shadow_bottom"></p>
<div class="public_footer">
<p>易读网</p>
<p>易读网络科技有限公司</p>
<p>地址：安徽亳州</p>
<p>联系我们：admin@090h.com</p>
</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8ee0c9b6b3d55888759fc1d3eda6f394";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>