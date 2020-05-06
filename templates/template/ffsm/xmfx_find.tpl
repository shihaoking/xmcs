<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>姓名详批结果页-易读网</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min.css?v=0817" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/jieming/1/jieming_1.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con">姓名测试</h1>
<a class="public_h_home" href="/?ac=xmfx"></a><a href="/?ac=history&type=3" class="public_h_menu">历史订单</a></header>
<div class="public_banner">
	<img src="/statics/ffsm/jieming/1/images/top02.png" alt="姓名解名"/>
</div>
<div class="public_binding">
	<div class="pb_tit">
		个人资料
	</div>
	<div class="pb_con">
            <table class="baseinfo">
                <tbody>
                <tr>
                    <td>姓：<span class="value-text"><{$data.xing}></span></td>
                    <td>名字：<span class="value-text"><{$data.username}></span></td>
                </tr>
                <tr>
                    <td>性别：<span class="value-text"><{if $data.data.gender==1}>男<{else}>女<{/if}></span></td>
                    <td>生肖：<span class="value-text"><{$return.user.sx}></span></td>
                </tr>
                <tr>
                    <td colspan="2">生日：<span class="value-text"><{$data.birthday}> <{if $data.h <0}>时辰未知<{else}><{$data.h}>时<{/if}></span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        订单编号：<{$oid}>
                    </td>
                </tr>
                </tbody>
            </table>
	</div>
</div>
<div class="jieming_box J_payBottomShow ">
	<div class="jb_title relative">
		您的姓名测算
	</div>
	<div class="jb_content">
		<p>
		农历生日：<{$data.lDate}>
		</p>
		<div class="jbc_gezi">
			<div class="jg_left left">
				<div class="g01 public_w">
					<p class="t">
						迁移宫
					</p>
					<p class="b">
						<span><{$return.tdr_ge.waige}></span><span><{$return.tdr_ge.waige_sancai}></span>
					</p>
				</div>
				<div class="g02 public_w">
					<p class="t">
						命宫
					</p>
					<p class="b">
						<span><{$return.tdr_ge.zhongge}></span><span><{$return.tdr_ge.zongge_sancai}></span>
					</p>
				</div>
			</div>
			<span class="jg_line left"></span>
			<div class="jl_words left">
				<span><span style="color:#f2ac65"><{if $return.xm_arr.xing2}><{$return.xm_arr.xing1}><{else}><{/if}></span></span><span><{if $return.xm_arr.xing2}><{$return.xm_arr.xing2}><{else}><{$return.xm_arr.xing1}><{/if}></span><span><{$return.xm_arr.ming1}></span><span><{if $return.xm_arr.ming2}><{$return.xm_arr.ming2}><{else}>白<{/if}></span>
			</div>
			<div class="jg_bihua left">
				<span><{if $return.bh_wh_arr.bihua2==''}>1<{else}><{$return.bh_wh_arr.bihua2}><{/if}></span><span><{if $return.bh_wh_arr.bihua2==''}><{$return.bh_wh_arr.bihua1}><{else}><{$return.bh_wh_arr.bihua1}><{/if}></span><span><{$return.bh_wh_arr.bihua3}></span><span><{if $return.bh_wh_arr.bihua4}><{$return.bh_wh_arr.bihua4}><{else}>1<{/if}></span>
			</div>
			<div class="jg_line2 left">
				<span></span><span></span><span></span>
			</div>
			<div class="jg_right left">
				<div class=" public_w">
					<p class="t">
						父母宫
					</p>
					<p class="b">
						<span><{$return.tdr_ge.tiange}></span><span><{$return.tdr_ge.tian_sancai}></span>
					</p>
				</div>
				<div class="g02 public_w">
					<p class="t">
						疾厄宫
					</p>
					<p class="b">
						<span><{$return.tdr_ge.renge}></span><span><{$return.tdr_ge.ren_sancai}></span>
					</p>
				</div>
				<div class="g02 public_w">
					<p class="t">
						奴仆宫
					</p>
					<p class="b">
						<span><{$return.tdr_ge.dige}></span><span><{$return.tdr_ge.di_sancai}></span>
					</p>
				</div>
			</div>
		</div>
		<!-- end -->
	</div>
</div>
<div class="jieming_box">
	<div class="jb_title relative">
		您的八字命盘
	</div>
	<div class="jb_bzmp">
		<p class="words">
			下列是您的八字命盘。您是<{$return.info.nayin.2.whsx.sx}>，出生于<{$return.info.nayin.0.whsx.sx}>年。日天干代表您，所以您是属<{$return.info.nayin.2.whsx.wh}>。
		</p>
		<div class="jb_bzmp_content">
			<dl>
				<dt class="ct">年（祖先）</dt>
				<dd class="jb_bzmp_c_dd">
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/wu<{$return.info.nayin.0.whsx.wh_py}>.png" alt="阴火"/>
					</p>
					<p>
						<{$return.info.nayin.0.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.0.layin}>
					</p>
				</div>
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/<{$return.info.nayin.0.whsx.sx_py}>.png" alt="$report['sort']['year'][2]"/>
					</p>
					<p>
						<{$return.info.nayin.0.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.0.whsx.sx}>
					</p>
				</div>
				</dd>
			</dl>
			<dl>
				<dt class="ct">月（父母）</dt>
				<dd class="jb_bzmp_c_dd">
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/wu<{$return.info.nayin.1.whsx.wh_py}>.png" alt="阴火"/>
					</p>
					<p>
						<{$return.info.nayin.1.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.1.layin}>
					</p>
				</div>
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/<{$return.info.nayin.1.whsx.sx_py}>.png" alt=""/>
					</p>
					<p>
						<{$return.info.nayin.1.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.1.whsx.sx}>
					</p>
				</div>
				</dd>
			</dl>
			<dl>
				<dt class="ct">日（自己）</dt>
				<dd class="jb_bzmp_c_dd">
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/wu<{$return.info.nayin.2.whsx.wh_py}>.png" alt=""/>
					</p>
					<p>
						<{$return.info.nayin.2.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.2.layin}>
					</p>
				</div>
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/<{$return.info.nayin.2.whsx.sx_py}>.png" alt=""/>
					</p>
					<p>
						<{$return.info.nayin.2.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.2.whsx.sx}>
					</p>
				</div>
				</dd>
			</dl>
			<dl>
				<dt class="ct">时（子孙）</dt>
				<dd class="jb_bzmp_c_dd">
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/wu<{$return.info.nayin.3.whsx.wh_py}>.png" alt="阳土"/>
					</p>
					<p>
						<{$return.info.nayin.3.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.3.layin}>
					</p>
				</div>
				<div>
					<p>
						<img src="/statics/ffsm/jieming/1/images/bzmp/<{$return.info.nayin.3.whsx.sx_py}>.png" alt=""/>
					</p>
					<p>
						<{$return.info.nayin.3.jiazi}>
					</p>
					<p>
						<{$return.info.nayin.3.whsx.sx}>
					</p>
				</div>
				</dd>
			</dl>
		</div>
		<p class="jb_bzmp_bottom">
			八字命盘从阴阳干支三合历取得。上排是天干由五行“金水木火土”轮流排列。下排是地支用十二生肖顺序排列。十二生肖可转换成五行八字姓名详批是依据文字的音、形、义、意、数的原理，综合姓氏文化、文字阴阳五行，并结合测算者的八字信息，解读你的姓名中所暗藏的各项运势，让你更好的了解自己，掌握命运。
		</p>
	</div>
</div>


<div class="jieming_box">

	<div class="pb_tit jb_title">
		您的性格特征
	</div>

	<div class="jb_bzmp">
		<div class="jb_bzmp_bottom">

			<p>
				<b>优点:</b><{if $return.data.zonghe.yx}><{$return.data.zonghe.yx}><{else}>才智高且具优秀的头脑，行动活泼好动且伶俐。好竞争，手腕敏捷有侠义心情，反应快，能见机行事。社交手腕高明善解人意，很快与人打成一片，但不喜欢被人控制，喜爱追求新鲜事务。聪明、机智、创新有才华，能言善道，有极强的自我表现欲。非常适合演艺和推销工作猴年生的男性精力充沛身体健壮，常表现达观机智勇敢，对环境变化有很强的适应能力生性顽强不服输，拥有多项才能而能居主导地位。求知欲很强，记忆力超人，头脑灵活很有创造力。善于把握机会扩大发展，造成时势，成为大企业家。<{/if}>
			</p>
			<p>
				<b>缺点:</b><{if $return.data.zonghe.qd}><{$return.data.zonghe.qd}><{else}>平常爱说大话，有时有反对人之意见虚语或伪诈行为。忽略必需遵守社会全体规范，有点不脚踏实地。生性爱玩缺乏耐心毅力，眼光看得不远，犯有今朝有酒今朝醉的毛病。依赖心很重，好夸张和爱慕虚荣且喜新厌旧，不管做任何事都不会持续太久。狡滑伪善，无耐心不忠实狂妄自大，过份乐观，自负心强喜投机。为了达成目的喜爱说谎骗人，尽管才智出众八面玲珑，却不能以德服人，是典型的机会主义者。猴年生人无论说话做事一定要诚实踏实，否则会一塌糊涂。有自以为是急就章的毛病，所以常导致错误失败。<{/if}>
			</p>

		</div>

	</div>

</div>


<div class="jieming_box">

	<div class="pb_tit jb_title">
		您的事业职业分析
	</div>

	<div class="jb_bzmp">
		<div class="jb_bzmp_bottom">
			<div class="public_con_word">
              <p><{$rglm.syfx}></p><p><{$tywh.hyhw}></p>
			</div>
		</div>

	</div>

</div>
<div class="jieming_box">

	<div class="pb_tit jb_title">
		您的恋爱婚姻分析
	</div>

	<div class="jb_bzmp">
		<div class="jb_bzmp_bottom">
			<div class="public_con_word">
                    <p><{$rglm.aqfx}></p>
                    <p><{$tywh.aqfx}></p>
			</div>
		</div>

	</div>

</div>
<div class="jieming_box">
	<div class="pb_tit jb_title">
		未来一年
	</div>
	<div class="jb_bzmp">
		<div class="jb_bzmp_bottom">
			<div class="public_con_word">
                            <p><{$myq_text}></p>
                        </div>
                </div>
	</div>
</div>
<style type="text/css">
.ainuo_foot_nav{display: block; padding: 2px 0; background:#d23037; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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