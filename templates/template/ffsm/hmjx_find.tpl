<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="statics/ffsm/favicon.ico"/>
    <title>车牌号码解析结果-易读网号码测算</title>
    <!--[if lt IE 9]>  
        <script src="/statics/ffsm/hmjx/js/html5.js"></script>
        <script src="/statics/ffsm/hmjx/js/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/statics/ffsm/hmjx/css/zm_share.css"/>
	<link href="/statics/ffsm/public/wap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/statics/ffsm/hmjx/css/_szjx_zhifu_jieguoye.css">
    <script type="text/javascript" src="/statics/ffsm/hmjx/js/rem.js"></script>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <header class="share_header">
        <h1 class="zm">号码解析</h1>
        <a href="/" class="zm_titel"></a>
<a href="/?ac=history" class="zm_cs">我的测算</a>

    </header>
    <h3 class="order_title">订单号：<span><{$data.oid}></span></h3>
    <div class="szjx_result_container">
        <div class="szjx_result_wrap">
            <div class="szjx_top">
                <ul class="szjx_top_wrap">
                    <li class="szjx_top_r">
                        <p>您的号码</p>
                        <p><{$data.data.word}></p>
                    </li>
                                        <li class="szjx_top_r">
                        <p>数字磁场组合</p>
                        <p>(<{$word_z1}>)<{$haomajx.1.jx}>、(<{$word_z3}>)<{$haomajx.3.jx}></p>
                    </li>
                    <li class="szjx_top_r">
                            <p>(<{$word_z1}>)磁场特征</p>
                            <p><{$haomajx.1.content}></p>
                        </li><li class="szjx_top_r">
                            <p>(<{$word_z3}>)磁场特征</p>
                            <p><{$haomajx.3.content}></p>
                        </li>
                </ul>
            </div>
            <!-- 分析类 -->
            <div class="szjx_result_list">
                <!-- <div class="szjx_result_title">数字分析结果</div> -->
                <div class="szjx_result_content">
                    <ul class="szjx_result_ul">
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>从您号码中的(<{$word_z1}>)数字磁场分析您的婚姻：</p>
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                <p>配偶职业不稳定或不理想，与本人的家人亲戚难相处，婚后为家务事而操劳。恋爱及婚姻较早，多波折，夫妻多口舌，争吵难免。 迟婚或婚前多发生过波折反而可以白头偕老，否则仍主感情淡薄，甚至婚后离异。 配偶的祖上有福德，生长于善良的世家，具有谋略与特殊的才艺，有气质，您会怕配偶，适合选择比自己年长的配偶。感情不稳，有分离的可能。
夫妻生活是门学问，需要夫妻双方努力去维系，和谐的夫妻生活关键是知进退，多关心谅解对方，迎合伴侣的感情态度可以有效加强婚姻美满度。婚姻感情需要需要清楚自身的爱情态度，找出自己在感情方面的不足之处，选择真正适合自己的对象，可以查看自身的婚姻感情分析。想要知道伴侣的感情态度就需要结合伴侣的命理信息来分析。</p>

                            </div>
                        </li>
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>从您号码中的(<{$word_z2}>)数字磁场分析您的财运：</p>
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                <p>能白手成家，以口舌求财，多竞争，要拼搏才能赚钱聚财，财利多来自异乡，早年成败不定，中晚年可富足。
财富的好坏虽然命中有定数，但缺乏行动努力一切都变得不现实。但命中财运不好怎么办？就需要看流年的运程，运势不好的年份需要走得慢一点，稳中求胜；运势好的年运可以加快步伐，挑战各种机遇。至于无法留下贮蓄怎么办？自己没法留可以交给其它人帮忙保管，像爸妈、婚姻伴侣都可以，又或者把生活必须外的钱在银行设个定期存款，减低流动性。</p>
           
                            </div>
                        </li>
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>从您号码中的(<{$word_z3}>)数字磁场分析您的事业：</p>
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                <p>创业和管理的能力差，或喜清闲享受，对名利无兴趣，独创性事业难以持久，因而发展前景不明朗。 能白手起家，或由小变大的意义。事业还是比较平稳的，有才干，工作比较踏实，因而受到领导的重视，取得一定的成就。但任管理的职务，则难以发挥能力。 做事欠恒心和积极性，常半途而废，或调动工作。事业先难后易，艰苦奋斗后中晚年成功。
事业成就高低和努力是密不可分，但并不意味着您努力了就可以有收获，关键是努力的方向需要正确的。所以您需要选择适合自己的事业和方向发展，这可以令您更容易发挥自身能力，获得成功。</p>
               
                            </div>
                        </li>
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>从您号码中的(<{$word_z4}>)数字磁场分析您的健康：</p>
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                <p>病灾轻，容易有肾机能疾病，病情不算太重，一生平安。
需要关注自身健康情况，注意保养容易患病的部分，每年的身体检查肯定是必不可少的。预防胜于治疗，注意好自己的作息时间和饮食习惯，有时间再做适量的运动，保持健康其实很容易。</p>
                 
                            </div>
                        </li>
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>您的号码对您的影响总体分析：</p> 
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                <p><{$haomajx.0.content}></p>
                      
                            </div>
                        </li>
                        <li class="szjx_li">
                            <div class="ul_li_title">
                                <p>根据您的号码尾数(<{$word_z6}>)起卦结果分析：</p>
                                <span class="checkPromt">展开</span>
                            </div>
                            <div class="ul_li_content">
                                    <div class="liuyao_msg">

                                        <pre class="liuyao_zt">主变卦   离为火(六冲)  之  火天大有  </pre>
                                            

                                        <div class="liuyao_pan">

                                            <ul class="liuyao_left">
                                                <li>
                                                    <span>白虎</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                    <span>兄弟己巳火</span>
                                                    <span>世</span>
                                                </li>
                                                <li>
                                                    <span>腾蛇</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_2.png" alt=""></span>
                                                    <span>子孙己未土</span>
                                                    <span></span>
                                                </li>
                                                <li>
                                                    <span>勾陈</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                    <span>妻财己酉金</span>
                                                    <span></span>
                                                </li>
                                                <li>
                                                    <span>朱雀</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                    <span>官鬼己亥水</span>
                                                    <span>应</span>
                                                </li>
                                                <li>
                                                    <span>青龙</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_4.png" alt=""></span>
                                                    <span>子孙己丑土</span>
                                                    <span></span>
                                                </li>
                                                <li>
                                                    <span>玄武</span>
                                                    <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                    <span>父母己卯木</span>
                                                    <span></span>
                                                </li>
                                            </ul>

                                            <ul class="liuyao_right">
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                        <span>兄弟己巳火</span>
                                                        <span>应</span>
                                                    </li>
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_2.png" alt=""></span>
                                                        <span>子孙己未土</span>
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                        <span>妻财己酉金</span>
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                        <span>子孙甲辰土</span>
                                                        <span>世</span>
                                                    </li>
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                        <span>父母甲寅木</span>
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <span></span>
                                                        <span class="liuyao_icon"><img src="/statics/ffsm/hmjx/picture/03_1.png" alt=""></span>
                                                        <span>官鬼甲子水</span>
                                                        <span></span>
                                                    </li>
                                                </ul>
                                                
                                        </div>
                                    </div>
                                <div><b>主卦大象</b></div>
                                <p>这个卦是同卦（下离上离）相叠。离者丽也，附着之意，一阴附丽，上下二阳，该卦象征火，内空外明。离为火、为明，太阳反复升落，运行不息，柔顺为心。</p><br/>
                                <p><b>大象：</b>两离火相重，上下通明之象，火有气，但无形，主不实不定之意。</p><br/>
                                <p><b>运势：</b>外观极盛，烈日当空之象，凡事不宜急进及意气用事。</p><br/>
                                <p><b>事业：</b>已快进入顶点，盛极而衰，务必总结经验教训，趋善避邪，以顺自养，居危知危，激励志气，切勿妄动。尤应求助中正的人援助，以期重振事业。</p><br/>
                                <p><b>经商：</b>不要急于求成，宜兢兢业业，忧深虑远，考察市场行情，公平竞争，不可投机取巧，争取与他人密切合作。</p><br/>
                                <p><b>求名：</b>方向未确定之前，不可到处乱撞，应持之以恒，执意追求，虚心向有才德的长者请教。</p><br/>
                                <p><b>婚恋：</b>自己寻找对象恐怕有困难，最好请可靠的朋友、长辈帮忙，不得急躁。双方应相互尊敬，最忌生邪念。</p><br/>
                                <p><b>决策：</b>乐天知命，顺应自然，年轻时急于上进，未能实现理想，但坚持中正、谦和，可无灾祸，时常警觉，更可化险为夷。在危难时要寻求依托，但要慎重选择对象。晚年应知天命，尤不可不顾时势而轻举妄图动。</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
<script>
    let hotcs_item = document.querySelectorAll('.hotcs_item');
    let r_foot = document.querySelectorAll('.r_foot');

    hotcs_item.forEach(function(item){
        item.onclick = function(e){
            var type=this.getAttribute('data-type');
            $.getJSON("/zhiming/index.php/home-index-zmclick",{type:type},function(data){//回调入库
            });
            window.location.href = this.getAttribute('data-url');
        }
    })

    r_foot.forEach(function(item){
        item.childNodes[0].onclick = function(e){
            e.stopPropagation();
            var type=this.getAttribute('data-type');
            if(this.classList.toggle('on')){
                $.getJSON("/zhiming/index.php/home-index-zmclickz",{type:type},function(data){//回调入库
                });
                this.textContent++;
            }else{
                this.textContent--;
            }
        }
    })
</script>
    <script>
        var ul_li_title = document.querySelectorAll('.ul_li_title');
        ul_li_title.forEach(function(item){
            item.onclick = function(){
               var checked = item.classList.toggle('check_active');
               if(checked){
                    item.lastElementChild.innerHTML = "收起";
                    item.nextElementSibling.style.display = "block";
                    // item.nextElementSibling.lastElementChild.style.display = "none";
               }else{
                    item.lastElementChild.innerHTML = "展开";
                    item.nextElementSibling.style.display = "none";
                    // item.nextElementSibling.lastElementChild.style.display = "block";
               }
            }
        })
    </script>
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
.ainuo_foot_nav{display: block; padding: 2px 0; background:#ff5b5b; position: fixed; bottom: 0; width: 100%; z-index: 99999;max-width: 640px;}
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