<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8"/>
	<title>八字综合详批-易读网</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
	<meta content="telephone=no" name="format-detection"/>
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link href="/statics/ffsm/cesuan/cyxp2.css" rel="stylesheet" type="text/css"/>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<audio src="" id="myAudio"></audio>
<script>
        $('#fiex').on('click',function(){//加大师微信一对一亲算
            $('#publicPayPopup').css('display','block');
            $.getJSON("/zhiming/index.php/home-index-jieguoyexfan",{csName:'JP'},function(data){//回调入库
            });
        })
        $('.dashi_zaixian_container').on('click',function(){
            $('#publicPayPopup').css('display','block');
        })
        $('#publicPPClose').on('click',function(){
            $('#publicPayPopup').css('display','none');
        })

        $('.public_pp_box').on('click',function(e){e.stopPropagation();})
        $('#publicPayPopup').on('click',function(){$('#publicPayPopup').css('display','none');})

        $('.kefu_btn').on('click',function(){//大师在线 立即连线
            $('#publicPayPopup').css('display','block');
            $.getJSON("/zhiming/index.php/home-index-jieguoyedszx",{csName:'JP'},function(data){//回调入库
            });
        })
		
function setCookie(cname,cvalue,exdays){
	var d = new Date();
	d.setTime(d.getTime()+(exdays*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname+"="+cvalue+"; "+expires;
}
function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(name)==0) { return c.substring(name.length,c.length); }
	}
	return "";
}

function pop_check(){	
	$("#publicPayPopup").show(); 
	setCookie("pop_zn",1,1);	
 }
$(function(){
	$("#publicPPClose").click(function(){
	m_pop("#publicPayPopup").hide();
  });
});
var pop_zn=getCookie("pop_zn");
if(pop_zn != 1){
window.history.pushState(null, null, document.URL);
window.addEventListener("popstate", function(e) {pop_check();}, false);
}
</script>

<script>
        var num = 1;
        var clearTime;
        function setTimeAnimation(NodeClass){
            num++;
            if(num >3){
                num=1;
            }
            clearTime = setTimeout(function(){
                $(NodeClass).attr('src',"/statics/ffsm/bazijp/img/img_yuyin"+num+".png");
                setTimeAnimation(NodeClass);
            },400)
        }
        

        var audio = document.getElementById('myAudio');
        document.addEventListener("WeixinJSBridgeReady", function () {

            audio.play();
        }, false);


        $('.dashi_point_box').on('click',function(){
            if($(this).attr('data-cid')=='one'){
                clearTimeout(clearTime);
                if($(this).hasClass('play')){
                    $(this).removeClass('play');
                    audio.pause();
                }else{
                    $('.dashi_point_box').removeClass('play');
                    $(this).addClass('play');
                    $('#myAudio').attr('src','https://kyw.5988vip.cn/m/video/bzjp_top.mp3');
                    audio.play();
                    $(this).next('.dashi_audio_time').removeClass('newMsg');
                }
                
            }else if($(this).attr('data-cid')=='two'){
                clearTimeout(clearTime);
                if($(this).hasClass('play')){
                    $(this).removeClass('play');
                    audio.pause();
                }else{
                    $('.dashi_point_box').removeClass('play');
                    $(this).addClass('play');
                    $('#myAudio').attr('src','https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3');
                    audio.play();
                    $(this).next('.dashi_audio_time').removeClass('newMsg');
                }
            }
        });

        audio.addEventListener("play", function(){

            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_top.mp3'){
                clearTimeout(clearTime);
                $('#Atwo').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
                setTimeAnimation('#Aone');
            }
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3'){
                clearTimeout(clearTime);
                $('#Aone').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
                setTimeAnimation('#Atwo');
            }
        });
        
        audio.addEventListener("pause", function(){
            $('.dashi_point_box').removeClass('play');
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_top.mp3'){
                clearTimeout(clearTime);
                $('#Aone').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
            }
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3'){
                clearTimeout(clearTime);
                $('#Atwo').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
            }
        });

    </script>
<div class="container" id="container">
  <div class="wrapper" id="wrapper">
    <section id="page-result">
      <section data-reactroot="">
        <div>
          <section>
            <div class="common-fixed-bottom">
              <div class="list">
                <ul>
                  <li class="left touch">
                    <a href="/">测算大全</a></li>
                  <li class="left kefu">
                    <a href="/?ac=about">客服</a></li>
                  <li class="left index">
                    <a href="http://kyw.5988vip.cn/?ac=cyxp">
                      <span>再测一次</span></a>
                  </li>
                  <li class="left save">感谢测算</li></ul>
              </div>
            </div>
          </section>
          <div class="res-data">
            <div>
              <div class="title-top"></div>
              <div class="user_title">你的信息</div>
              <div class="info">
                <p>姓名：<{$data.data.username}></p>
                <p>性别：<{if $data.data.gender==1}>男<{else}>女<{/if}></p>
                <p>出生：<{$data.data.y}>年<{$data.data.m}>月<{$data.data.d}>日 <{$data.data.h}>时</p>
                <p>
                  <span style="visibility: hidden;">农历：</span>
                  农(阴)历<{$data.data.lDate}></p></div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">一生财运分析</div>
                <div class="ex-com-body">
                  <div>
                    <p class="gdw">一生财运主要是看你的赚钱方式能力，对钱财运用情况及富有程度的方面，而属于你的一生财运状况有以下几方面是</p>
                    <p>根据你的八字情况，你的财星多福气；如遇到好的格局助力，则预示赚钱轻松，能不费太多力气就能取得财富；你财运比较的稳定，而且非常重视自己的享受，对钱财看得比较轻，会花大量的钱财在个人享乐上，因此可能年轻时存不下钱，需要到了中年后才能慢慢积累财富；适合投资服务性质的行业，从事玩乐享受性质服务行业的工作也能从中获利。</p>
                    <p>你的财星旺，如遇好的格局入驻，赚钱将更加顺遂；你一生的整体财运还是不错，投资理财有头脑，做生意有谋略，能获得不俗收益；但若是有忌星干扰，资金周转上会出现问题，金钱消耗大，需要留心本人的经济状况，谨慎处理财务问题；充分利用个人潜质，主动拓展财路，才能财源广进，以财生财。</p>
                    <p>综上所诉，你的财运不俗，而且有财星助力，在得财方面比较顺遂，而且表现为多福气，不会费太多力气便能获得收益，宜往外地发展，赚钱的机会会更多，年轻奋斗努力，晚年积蓄不俗。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>对财运的积极影响</span></div>
                    <p class="gdw">除了上面的财运状况特点，你的八字中还存在着对财运比较重要的积极影响</p>
                    <p>将增加进财，一生财运会增加增厚，赚钱机会更多，能积累不俗财富。</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">正财运和偏财运</div>
                <div class="ex-com-body">
                  <p class="gdw">很多朋友都想知道自身财运如何，有没有偏财运。首先要理清一点定义，所谓的偏财，就是所有数额大小不定的收入；而正财则是所有数额大小规定的收入。</p>
                  <div>
                    <div class="little-tit">
                      <span>你的正财指数：92</span></div>
                    <p>你一生正财运的极好，可谓是财产丰足，财源稳定，一生积蓄不俗，而且会主动求财，求财有方，对钱财的敏感度高，能拓展财路，积累更多的财富。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>你的偏财指数：55</span></div>
                    <p>你一生的偏财运一般，可以通过投机获得一些意外之财，有一点不劳而获的财运，但也不能沉迷投机取巧，还是要回归脚踏实地，才能积累财富。</p>
                  </div>
                  <p class="gdw ex-com-body">正财运和偏财运的好与坏并不会注定人的富有情度，只代表你赚钱是否容易，还有适合那个类型的赚钱方式，看一生的富有情度请关注上面的一生财运分析，还有下面的破财分析。</p></div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">破财分析</div>
                <div class="ex-com-body">
                  <p class="gdw">生活中你是否会抱怨自己没有积储，或者赚钱不算少，但就是留不住钱呢？现在就来分析一下造成破财漏财的原因在哪里。</p>
                  <p class="exp">特别提醒，下面说的破财原因会对你一生财运有不好的影响，如果上面分析你财运好但接下来的破财分析不好，代表你这一生的财运就会变得起伏不定，更应该注意这些导致你破财的原因！！</p>
                  <div>
                    <div class="little-tit">
                      <span>钱财消耗情况</span></div>
                    <p>你在赚钱求财方面损耗情况不算太严重，得财较为稳定，不会出现过多的突发情况，但是也要好好做好资金规划，过度消费支出，也难以积累财富。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>不动产、积储情况</span></div>
                    <p>对你先天不动产厚度产生影响，损耗你的积蓄；继承而来的祖业会因为意外而难以留住，可能会变卖或者是转让他人，需要谨慎为上。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>先天福气情况</span></div>
                    <p>你先天福气比较好，没有被剥削得很严重，还在能承受的范围之内，能抓住属于你的财富收益，晚年稳定。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>漏财分析</span></div>
                    <p>你以稳妥的方式求财，懂得知足常乐之理，钱财对你来说是安全感的来源，多少无所谓，对钱财有自己规划，漏财现象有，投资有损财迹象，经商要当面算清款项，外出开销对号账单，恐有意外开支。</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">得财分析</div>
                <div class="ex-com-body">
                  <p class="exp">选择一个与你八字相符合的工作领域或者行业会令你的事业发展更顺利，有更多进财机会；而当有存款想要投资时，也建议结合自身八字特点来选择理财方式，抓住机遇，减少风险。</p>
                  <div>
                    <div class="little-tit">
                      <span>事业取向</span></div>
                    <p>根据你官星特点，分析你适合从事注重口才、具有奉献精神、细致、有原则性的工作，比如医生、教师、心理医生、传播者、编辑等，能通过这种类型工作充分发挥自身优势，获得财富。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>理财攻略</span></div>
                    <p>根据你官星落入的格局分析得出，在理财投资方面以不动产为主，例如房产、门面置业等，银行定期存基金，不宜进行高风险投资。</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">2018财运变化</div>
                <div class="ex-com-body">
                  <div>
                    <div class="little-tit">
                      <span>财运机遇 异乡获利</span></div>
                    <p>今年你的财运比较好，得财的渠道很多，还有意外的好运，但需要自己好好把握；如果是在外乡发展的话会更有利，有利于赚取外地才，可以多与外地发展合作，会有不俗收益；但利益诱惑很多，注意别因为贪图短小利益而坏了大局。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>女人得财 女性行业</span></div>
                    <p>今年对你有望获得贵人助力，而贵人大都为女性居多，能通过其获得助力和提携，你若能在工作中与其和谐相处，她们能够为你的工作带来很多的解决思路，扩展你财源；如若是从事的行业是跟女性相关、护肤品等，则来财将更加顺利。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>阴谋阳谋 保持清醒</span></div>
                    <p>今年你在求财过程中看似容易得到贵人的助力和的提携，但也不能因此掉以轻心，需要保持清醒头脑，树大招风，恐有小人在背后作祟，要时刻保持谨慎，不能太过冲动，意气用事。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>今年的发财机会</span></div>
                    <p>今年你的财富的提升机会将会在对自身金钱的管理上，也可以理解为财生财，对于创业、投资等都有机会取得成功，看清市场动态，可以尝试出手。而对于上班族而言，业绩表现亦是蒸蒸日上，有机会得到上司赏识而获升迁，或是因公司赚钱而分到红利，获得额外的奖金、奖励。在这一年中，只要不贪心、不违法，也可兼职或多元投资，赚钱的机会还是会有的。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>今年的贵人</span></div>
                    <p>今年贵人之一在兄弟姐妹，代表你亲、表、堂、干兄弟姐妹，都可能是你的贵人，若是经常联络、感情融洽，将可藉由他们升官发财。有困难时，也可以多听取他们的意见，有时可能他们的一句话、一通电话，就能替你解决难题。当然，也代表当你遇到麻烦的时候，能帮助你解决烦恼的人很可能就是他们了。</p>
                    <p>今年贵人之一在父母，简单来说父母就是你今年的贵人，如果你是学生，今年将有赖父母帮助使你寻找到好的补习班、准备升学考试，或是支付学杂费、零用钱方面给予你满意的金额。在精神上也会支持你寻求理想，甚至帮你解决心理上的疑难杂症。所以，应多听父母的劝告和建议，否则将会陷入「远贵人、近小人」的危机。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>今年的人脉帮助</span></div>
                    <p>今年你的人脉之一在朋友交际，代表晚辈如部属、学弟妹将是你成功的关键，只要愿为你效力的人越多，藉由这些贵人的人脉和智慧、创意，你将可轻易突破工作上的阻碍，坐享业绩提升，获得升迁与财富。但记得要善待、关心部属，跟他们一起分享成功的果实，才能创造双赢，保住好运势。</p>
                    <p>今年你的人脉之一是父母，代表你的父母今年可能会特别需要朋友、交际、关爱，为人子女不妨多替父母安排亲友聚会，让他们因亲情、友情的交流而心情愉快。此外，也可能代表父母会因朋友的帮忙升官进财，或是解决一些困难。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>今年的破财原因</span></div>
                    <p>今年你的破财原因之一夫妻配偶，代表你会为另一半花很多钱。未婚男女今年将为了追求另一半而花大钱，或是爱上不该爱的人，被对方狮子大开口而破财。建议你需要好好观察，你的对象都将钱花在什么地方，若是爱赌博、玩股票，即应谨慎思考是否值得投资；若是对方心地善良，将钱花在保值的收藏品上，助他一臂之力则算是流年运势里好的付出。也有可能你的对象没跟你要钱却与你分手。 至于已婚的人，要小心配偶的健康、投资、情绪。夫妻聚少离多可赚更多钱，但也有可能会因配偶的债务投资失败而受连累。若是投资配偶进修或创业，要有长期抗战的心理准备。</p>
                    <p>今年你的破财原因之一在学业、事业职场，代表你将会在这方面花很多钱。如果你还是学生，可能你花费更多金钱来换取学位，又或者需要进行考证补习等增加开销，但以正面的角度来看，也算累积实力，将来出社会更有竞争力。 但如果你已经是在社会工作打拼，今年在职场上恐难发挥，多做多错，甚至是忙中有错，对升职加薪有一定的阻碍作用，甚至会扣发工资。创业者、自营老板更需注意，今年若孤注一掷贸然投资、扩大营业，都可能面临血本无归的命运，最好找人分担投资风险。此外，借贷金钱要十分小心，以免有去无回。</p>
                  </div>
                </div>
              </div>
            </div>
            <div></div>
            <div class="sjb-part">
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">
                  <!-- react-text: 238 -->世界杯期间
                  <!-- /react-text -->
                  <!-- react-text: 239 -->流月财运
                  <!-- /react-text --></div>
                <div class="ex-com-body">
                  <div>
                    <div class="little-tit">
                      <span>本月（戊午月-公历6月5日-7月6日）</span></div>
                    <p class="gdw">吉凶等级:吉</p>
                    <div>
                      <p>这个月的财运很不错，自己的财运主要由自己的一些想法和创作带动起来，你在工作上的灵感或方案有助于你获得肯定，并有望获得一些业绩上的奖励。因此这个月的生财之道主要还是靠本身的思考和先见，做好准备，无论是投资还是平稳的收入，都有望获得一定回报。但需要注意的是，这个月的开销主要是在饮食方面，你为了满足自己的食欲不惜花费重金，日常饮食消费不知不觉会令你“大出血”，为了寻找美食出外旅游那似乎也是正常之事。而且这个月会突然邀约不断，亲朋好友聚餐甚多，自己也主动找人吃大餐。虽然这个月的消费能给你带来很多快乐，但也有学会节制，也要避免因吃喝而令健康出现问题。</p>
                    </div>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>下个月（己未月-公历7月7日-8月6日）</span></div>
                    <p class="gdw">吉凶等级:吉</p>
                    <div>
                      <p>这个月的财运很不错，自己的财运主要由自己的一些想法和创作带动起来，你在工作上的灵感或方案有助于你获得肯定，并有望获得一些业绩上的奖励。因此这个月的生财之道主要还是靠本身的思考和先见，做好准备，无论是投资还是平稳的收入，都有望获得一定回报。但需要注意的是，这个月的开销主要是在饮食方面，你为了满足自己的食欲不惜花费重金，日常饮食消费不知不觉会令你“大出血”，为了寻找美食出外旅游那似乎也是正常之事。而且这个月会突然邀约不断，亲朋好友聚餐甚多，自己也主动找人吃大餐。虽然这个月的消费能给你带来很多快乐，但也有学会节制，也要避免因吃喝而令健康出现问题。</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="sjb-part">
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">
                  <!-- react-text: 256 -->世界杯期间
                  <!-- /react-text -->
                  <!-- react-text: 257 -->流日财运
                  <!-- /react-text --></div>
                <div class="ex-com-body">
                  <div>
                    <div class="little-tit2">
                      <span>今日</span></div>
                    <p class="gdw">吉凶等级:小吉</p>
                    <div>
                      <p>今日财运比较低迷，正财不见好，偏财运更差，自己的消费欲望又特别强，很可能会有大笔消费，吃喝玩乐等也会耗掉你的钱财，能保住自己手头上的钱已经很不错，建议把钱财用在一些稳健的投资上，以免流失过多。</p>
                    </div>
                    <div class="lucky">
                      <div>
                        <span>幸运颜色：</span>
                        <!-- react-text: 268 -->黄色、褐色
                        <!-- /react-text --></div>
                      <div>
                        <span>幸运数字：</span>
                        <!-- react-text: 271 -->0、5
                        <!-- /react-text --></div>
                      <div>
                        <span>开运方位：</span>
                        <!-- react-text: 274 -->西南方、东北方
                        <!-- /react-text --></div>
                      <div>
                        <span>开运食物：</span>
                        <!-- react-text: 277 -->橙、南瓜和红萝卜等含维他命C的食物
                        <!-- /react-text --></div>
                      <div>
                        <span>吉利时辰：</span>
                        <!-- react-text: 280 -->07:00-08:59、13:00-14:59、19:00-20:59、01:00-02:59
                        <!-- /react-text --></div></div>
                  </div>
                  <div>
                    <div class="little-tit2">
                      <span>明日</span></div>
                    <p class="gdw">吉凶等级:小吉</p>
                    <div>
                      <p>今日财运不太好，财富不见增长，投资亦难以得利，运气并不太好，身边的前辈并没有在求财上带来实质的帮助，总之今日并不是一个投资或是消费的好时机，建议你控制支出，保守行事。</p>
                    </div>
                    <div class="lucky">
                      <div>
                        <span>幸运颜色：</span>
                        <!-- react-text: 290 -->白色、金色、银色
                        <!-- /react-text --></div>
                      <div>
                        <span>幸运数字：</span>
                        <!-- react-text: 293 -->4、9
                        <!-- /react-text --></div>
                      <div>
                        <span>开运方位：</span>
                        <!-- react-text: 296 -->西方、西北方
                        <!-- /react-text --></div>
                      <div>
                        <span>开运食物：</span>
                        <!-- react-text: 299 -->洋葱、大蒜和梨等具有抗敏感功能的食物
                        <!-- /react-text --></div>
                      <div>
                        <span>吉利时辰：</span>
                        <!-- react-text: 302 -->15:00-18:59
                        <!-- /react-text --></div></div>
                  </div>
                </div>
              </div>
            </div>
            <div></div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">狗年开运风水布局</div>
                <div class="ex-com-body">
                  <div>
                    <div class="little-tit">
                      <span>脱离单身求桃花</span></div>
                    <p>今年流年桃花位在西北方位，想要脱单的话最紧要的是催旺这个方位，加强桃花运。家中床头或公司中自己的办公桌位于西北方位对自己的桃花较有利。在这个桃花星飞临之处除了摆放鲜花之外，也可以放上粉红水晶、红纹石、红色丝带做成的花或蝴蝶等摆设，既可以点缀家居工作环境，又能给自己带来好姻缘。不过切忌在西北方位放置过多黑色或深色物品，装饰也不宜采用这些颜色，因为这些是灰暗的颜色，不利于求桃花。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>提升感情甜蜜度</span></div>
                    <p>情侣和夫妇今年若想保持关系融洽，增进感情，就要小心今年流年的是非星了。今年的是非星降临东北方位，忌讳在这个方位见到任何绿色的物品或装饰，特别是睡房处于东北方位时更要小心地避忌，否则天天吵架就麻烦了！补救方法是在东北方位多摆放红色物品来改善关系，亦可以插九枝去掉刺的玫瑰来抵御是非星的力量。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>结婚添丁多喜事</span></div>
                    <p>今年的喜庆位在中宫，即房子的中央位置。喜庆位代表一切喜事，催旺这个方位能够带来喜事，尤其有利于嫁娶和生儿育女。今年打算结婚或生小孩的朋友可以在家中的中宫放置红色、绿色的物品，或是带果实的盆栽。而想要结婚的情侣还可以在中宫放置鸳鸯摆设或两个一模一样的公仔催旺姻缘。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>找对靠山保饭碗</span></div>
                    <p>上班族今年如果先要避开裁员危险，就要特别注意自己在办公室的座位是否会出现缺乏“靠山”（背后没有靠墙或高大的柜子遮挡）的情况，如果是这种情况则容易被煞气所冲、削弱运势，若加高椅背或摆放八个石春（一种白色石头）则可以改善运势。另外家中风水也要注意，例如沙发应该靠墙或柜子这种高大稳固的物体，否则也是“缺乏靠山”的情况。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>升职加薪两不误</span></div>
                    <p>今年如果想要在职场上更上一层楼、升职加薪，就要注意催旺家中和办公室文昌星及财星的位置啦。今年的文昌星在正南方位，可以将水培富贵竹四枝置于该方位提高职场运势。今年的八白财星在东南方位，放置有谁的摆设或者红黄二色物品可以催旺财运，有利于加薪。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>生意兴隆财运来</span></div>
                    <p>个体户或者公司老板今年想要生意兴隆，可以通过当旺的财星位置来催旺财运。今年八白财星位置在东南方，可以摆放水培植物带动财气。在店铺或办公室门口朝外摆放一对貔貅可以起到招财的作用，收银机或保险柜上下左右接触的位置则可以摆放聚宝盆这样的风水摆件守住钱财。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>小人是非要远离</span></div>
                    <p>今年若想防住小人、减少是非，最忌在东北方位上动土，因为今年的东北方位有是非星降临，若想要减弱是非星的力量，则应在此方位上摆放红色物品，或者黑曜石水晶摆件。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>改善人缘利发展</span></div>
                    <p>桃花不仅代表感情也代表人缘，改善人际关系可以改善西北方位的风水，因为今年的桃花星降临西北方。可以在该方位放置水培植物加强人际关系，这个方位上的颜色越鲜艳则越有利。在办公室的话，不妨在桌面的西北方位放置小盆的水培植物。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>身体健康离病灾</span></div>
                    <p>今年的正北和正西方位分别为五黄灾星和二黑病星位，对健康都会造成不利影响，其中五黄的影响最大。需要注意家中的沙发、床以及公司中办公桌的座位是否处于这两个方向，长期在这些位置坐卧会容易生病。若要提升健康运则应避免在正北和正西方位动土，亦不宜摆放红黄二色的物品，可以防止铜制或者金色的重物化解霉运。</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">2018年办公室开运风水阵</div>
                <div class="ex-com-body">
                  <p class="gdw">家居风水虽然重要，但在现代社会，人们的工作时间越来越长，在办公室的时间可能比在家的时间还长，如果你认为最近工作不太如意，不妨从办公环境的风水入手，一些小小的改动就可以提升自己的事业运势。</p>
                  <div>
                    <div class="little-tit">
                      <span>职场霉运转好运</span></div>
                    <p>如果你常觉得工作量太大，身心俱疲，精神难以集中，工作情绪不佳，很有可能是因为你的座位有煞气侵袭。离洗手间太近或者办公桌对着尖角会形成煞气，给事业发展带来重重阻力。化解方法是在办公桌的正前方加上板子或其他物品遮挡煞气。如果是独立办公室，煞气则很有可能来自窗外，适宜在床上贴大幅海报或长期拉下窗帘阻挡。</p>
                  </div>
                  <div>
                    <div class="little-tit">
                      <span>化解煞气少是非</span></div>
                    <p>在工作中，如果你自己安分守己、没有招惹别人，但却总莫名其妙遇上小人和是非误会，则有可能是公司中所坐方位容易招惹是非。不妨面朝办公桌，找出是非星所在的东北方位，在该方位上摆九件红色物品（比如红包袋、文具、活页夹等）化解不利。</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="ex-com">
                <div class="title-top"></div>
                <div class="title">犯太岁化解锦囊</div>
                <div class="ex-com-body">
                  <div class="pic"></div>
                  <div>
                    <div class="little-tit2">犯太岁如何自救？</div>
                    <p>坊间流传很多关于犯太岁的说法，其中很大部分都夸大了犯太岁的严重性。一般来说，犯太岁的这一年代表生活中波动大，情绪也容易跟着起伏不定，但不一定就意味着倒霉、运气差。有一部分人甚至在犯太岁时交好运，若是从事经常出外的工作或者常与他人打交道的工作，在外劳碌奔波反而会因犯太岁而得利，取得明显突破。犯太岁亦可认为是踏进人生的新阶段，人生变动难免会带来担忧和恐惧，若能够做好相应的心理准备，谋事在人、成事在天，以积极的态度主动迎接变化，心态好反而有助于应对各种挑战，更加靠近自己的目标。</p>
                    <p>犯太岁为民间对本命年太岁、冲太岁、害太岁、刑太岁等的统称，影响轻重不一，大家若遇上犯太岁的年份，只要做好心理准备，通过行动去积极化解，就不必过分担忧。</p>
                  </div>
                  <div>
                    <div class="little-tit2">2018年（戊戌狗年）犯太岁的生肖</div>
                    <p>2018年（戊戌狗年）犯太岁的生肖包括：狗、龙、羊、牛、鸡。</p>
                  </div>
                  <div>
                    <div class="little-tit2">狗 犯本命年太岁</div>
                    <p>本命年犯太岁的生肖，生活多有变动，但这些变动是好是坏需要看个人的具体命造，但本命年犯太岁有共同的特点，就是容易胡思乱想，情绪起伏大，容易影响到决策，所以需要注意忙中抽空休养身心，适当放松、释放压力。本命年犯太岁，最适宜举办喜事，包括结婚生子、创业转职、乔迁新居等，可以化凶为吉。</p>
                    <p>另外，本命年犯太岁需要注意的还有健康和安全，轻则磕磕碰碰，重则易有血光之灾，所以日常生活应多注意安全，尽量避免参加有风险的活动，同时还可以通过捐血、洗牙等来化解。</p>
                  </div>
                  <div>
                    <div class="little-tit2">龙 冲太岁</div>
                    <p>在各种犯太岁的类型中，属冲太岁的影响变化最大，容易在这一年发生各种人生大事，例如换工作、置业、搬迁、结婚、离婚等，其中感情关系最受影响。很多人在冲太岁时刚好遇到感情方面的挑战，如果不积极应对，则可能会有不少挫折。</p>
                    <p>例如单身者在冲太岁时有机会脱单，不过感情来得快也去得快，难有稳定发展，因此冲太岁之年建立的恋爱关系还是应谨慎，保持观望态度较好。有伴侣的朋友则需要注意，若没有计划结婚或者生儿育女，感情在冲太岁之年容易出现重大冲击，感情关系遭受巨大考验，多有波折，甚至严重者会分手、离婚。因此在冲太岁之年宜采取积极行动化解，比如订婚、结婚、添丁或者聚少离多都有利于关系保持稳定。</p>
                  </div>
                  <div>
                    <div class="little-tit2">羊 刑太岁+破太岁</div>
                    <p>刑太岁，代表这一年遇上轻微麻烦和是非的几率较大，因此影响到人际关系。为了避免是非，影响到自己的生活和情绪，宜行事谨慎，做事低调。破太岁则有破坏之意，代表一些稳固的人际关系容易遭受破坏，甚至严重者会与人反目成仇。虽然其破坏力有限，仍然会影响到运势。同时刑、破太岁，日常生活多有人际方面的困扰，危害不至于太严重，但还是会让自己心烦，所以最好能够注意谨言慎行，避免祸从口出，给自己徒增烦恼。</p>
                  </div>
                  <div>
                    <div class="little-tit2">牛 刑太岁</div>
                    <p>刑太岁，代表这一年遇上轻微麻烦和是非的几率较大，因此影响到人际关系。为了避免是非，影响到自己的生活和情绪，宜行事谨慎，做事低调。</p>
                  </div>
                  <div>
                    <div class="little-tit2">鸡 害太岁</div>
                    <p>害太岁，“害”字意思为“陷害”，代表今年容易招惹小人，虽然对自己影响一般，不必过于担心，不过为了心情舒畅地过完一年，还是少说话、多做事吧。</p>
                  </div>
                  <div>
                    <div class="little-tit2">化太岁大法</div>
                    <p>若自己所属的生肖属于犯太岁的生肖，不必太过慌张，我们的祖先已经总结出一套非常有用的化太岁方法，只要诚心执行，则能够平安度过犯太岁的年份。</p>
                  </div>
                  <div>
                    <div class="little-tit2">一、冲喜</div>
                    <p>化解太岁最常用的方法之一，当属“冲喜”了，坊间亦常流行冲喜的说法。古人常说“太岁当头坐，无喜必有祸”，但“一喜挡三灾”，说明冲喜的传统自古就有。虽然犯太岁多数时候并不至于称得上“灾祸”，生活上多有波折摩擦而已，但“人逢喜事精神爽”，若能在犯太岁之年举办喜事，的确可以将这一年的坏影响降至最低。</p>
                    <p>用于化解太岁的喜事以结婚、生儿育女、置业为最佳，但这些人生大事很难刚巧在这一年发生，但仍有其他喜事可以作为化解方法，比如结拜兄弟、参加寿宴婚宴等来冲喜，出席其他喜庆活动、多吃喜庆食物（如喜糖、喜饼等）也可以提升一些运势。另外还需要注意的是，犯太岁者应尽量避免探病、参加丧事。</p>
                  </div>
                  <div>
                    <div class="little-tit2">二、小心部署计划</div>
                    <p>犯太岁代表变动增多，其中包括搬迁、转职、较大规模的投资（比如生意上的变动或扩张业务）等。变动的走向虽然未知好坏，但人定胜天，若能够做好详尽计划和周全准备，随机应变，心态平和，则能减少不必要的困扰。</p>
                  </div>
                  <div>
                    <div class="little-tit2">三、佩戴生肖饰品</div>
                    <p>犯太岁的人传统上亦会佩戴相应的生肖饰品化解煞气，所有生肖都适宜佩戴玉器，另外春夏季节出生的朋友还可以选择金银材质的饰品，但秋冬出生的朋友就不推荐金银材质了，仍是佩戴玉器为最佳。</p>
                  </div>
                  <div>
                    <div class="little-tit2">2018狗年 犯太岁生肖饰品选择指南</div>
                    <p>狗：宜贴身佩戴兔形之饰物</p>
                    <p>龙：宜贴身佩戴鼠形及猴形之饰物</p>
                    <p>羊：宜贴身佩戴马形之饰物</p>
                    <p>牛：宜贴身佩戴鼠形之饰物</p>
                    <p>鸡：宜贴身佩戴蛇形之饰物</p>
                  </div>
                  <div>
                    <div class="little-tit2">如何选择化太岁的生肖饰品</div>
                    <p>每年的化太岁生肖饰品并不完全相同，一般化太岁都要根据每一个生肖的六合或三合生肖来计算，给每一生肖带来助力的生肖都不止一个，所以每年的化太岁生肖不太一样。</p>
                    <p>十二生肖为事儿地支的代表，中国古代的年份代号均由十天干和十二地支两两组合而成，共有六十个组合。例如2016年的丙申年、2017年的丁酉年，其中“申”“酉”为地支，“丙”“丁”为天干。</p>
                    <p>因为地支的力量在一般情况下比天干强，所以每一年的地支更受重视。不过十二地支的名称和意义较难理解，不便于流传，因此古人便为十二地支分别配上十二种动物，才出现了民间流传甚广的十二生肖。生肖饰品的宜忌搭配，其实就是十二地支的有利组合，也就是下面所说的“六合”与“三合”。</p>
                  </div>
                  <div>
                    <div class="little-tit2">生肖的六合与三合</div>
                    <p>简单说来，“六合”就是把十二生肖分成六组，每组两个生肖互为贵人，“三合”则把十二生肖分成四组，每组生肖欣赏和包容同组的另外两个生肖。与三合比起来，六合生肖之间互助的力量较大，所以一般采用六合的生肖来化煞。</p>
                    <p>六合中每组只有两个生肖，不是你帮我就是我帮你，但每年都有几个生肖犯太岁，如果恰逢同一组中的两个生肖都犯太岁，双方都自身难保，更别说顾及对方了，这种情况下就要从三合生肖中寻找对自己有助力的生肖。同理，若同一组三合生肖中有犯太岁的，也无法给自己所属的生肖化煞。</p>
                    <p>下表列出了十二生肖的六合与三合配对，基本上年年适用，不过今年为戊戌狗年，狗、龙、牛、羊、鸡在本年都犯太岁，所以以x标示，其余生肖可以首选六合，三合亦可以。</p>
                  </div>
                  <div>
                    <div class="little-tit2">2018年狗年化太岁生肖饰品一览表</div>
                    <p>（X：今年不可选择，只作参考）</p>
                  </div>
                  <div>
                    <div class="little-tit2">四、拜太岁</div>
                    <p>拜太岁也是常见的化煞方法，方法可繁可简，下面列举出来的是必要步骤。一般拜太岁可以大致分为三种：</p>
                  </div>
                  <div>
                    <div class="little-tit2">1、前往大寺庙拜太岁</div>
                    <p>很多寺庙都供奉了太岁，较出名的有上海的城隍庙，香港荃湾的圆玄学院等，想去寺院拜太岁的朋友可以在网络上查询自己所在城市有哪些寺庙提供参拜。和小寺庙祭拜的方法不太一样，大寺庙拜祭流程更加讲究，具体步骤如下（各地具体流程可能根据寺庙有所不同，仅供参考）：</p>
                    <p>（1）先准备好太岁疏文（可以在庙外或网上购买），将自己的姓名、年龄、出生日期写上去。</p>
                    <p>（2）首先给六十太岁的统领上香。</p>
                    <p>（3）给当年太岁上香，2018戊戌狗年的太岁为“姜武”，心中默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                    <p>（4）再查询自己出生年所属的太岁，给出生年的太岁上香。</p>
                    <p>（5）逐一给其余太岁上香。</p>
                    <p>（6）最后将太岁疏文焚化。注意焚化疏文要从文首开始，最后才焚化结尾部分。</p>
                  </div>
                  <div>
                    <div class="little-tit2">2、前往小寺庙拜太岁</div>
                    <p>小寺庙通常会将六十位太岁放在一起，所以祭拜的方式相对比大寺庙简单许多，具体步骤如下（各地具体流程可能根据寺庙有所不同，仅供参考）：</p>
                    <p>（1）先准备好太岁疏文（可以在庙外或网上购买），将自己的姓名、年龄、出生日期写上去。</p>
                    <p>（2）给庙里的太岁上香，心中默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                    <p>（3）最后将太岁疏文焚化。注意焚化疏文要从文首开始，最后才焚化结尾部分。</p>
                  </div>
                  <div>
                    <div class="little-tit2">3、家中自行祭拜</div>
                    <p>若不想前往寺庙祭拜，在家中也可以拜太岁，步骤如下：</p>
                    <p>（1）在红纸上写下当年太岁资料，比如今年应写上“戊戌年当年太岁之位”或“戊戌年姜武太岁位”。</p>
                    <p>（2）将红纸放于家中大神（如观音、关帝）旁边。家中若没有设神位，则可以安置在位于西北太岁方的供桌上。</p>
                    <p>（3）用香三支、烛两支、斋菜和六种水果供奉，诚心参拜，默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                    <p>（4）将红纸、太岁疏文焚化。疏文从文首开始焚化，最后焚化结尾的部分。</p>
                    <p>无论使用哪种方法，只要诚心，太岁就会保佑一年平安。适合拜太岁的日子可以参考黄历中的狗年吉日、吉时，准备供奉的物品只需香烛和水果，不需要肉等荤菜。</p>
                    <p>拜太岁之后要记得在年底“还太岁”，酬谢神明一年来的保佑。还太岁最好选在每年的冬至之前，即公历的12月22日或23日，方法跟一般的还愿步骤一样，只需要准备简单的水果和香烛即可。</p>
                  </div>
                  <div>
                    <div class="little-tit2">五、趋吉避凶</div>
                    <p>没有犯太岁的朋友若在运势预测中得知流年运势不佳，亦有方法可以趋吉避凶。</p>
                  </div>
                  <div>
                    <div class="little-tit2">（1）化血光之灾：捐血或放生</div>
                    <p>如果流年运势有容易受伤的迹象，甚至是血光之灾，除了捐血来化解，还可以通过主动去做全身检查、洗牙补牙去“应劫”。也可以进行放生活动，用福德来减少运势的负面冲击，但注意放生应注意不要好心做坏事，最好选择市场上即将成为“刀下亡魂”的家禽或海鲜，注意不能随意放生外来物种破坏生态平衡，也要留意放生地点是否恰当。</p>
                    <p>另外需要注意避免参加危险的活动，平时注意交通安全，开车的朋友小心不要开快车，生活上需比平日更加小心谨慎，不妨给自己买一份保险。</p>
                  </div>
                  <div>
                    <div class="little-tit2">（2）化白事：施棺或赠药</div>
                    <p>如果流年家运不顺，甚至有白事（丧葬）之象，适宜通过“施棺”或赠送医药来稳定家运。“施棺”的意思是向家中有人过世的贫苦人家捐赠丧葬费或向死者家属提供生活上的帮助，这种善举是莫大功德，利人利己，也可以帮助化解家中的白事。</p>
                    <p>此外，主动向生病的贫苦人家赠送医药也是积福的举动。不妨直接捐款给非盈利组织用于公益医疗，资助贫苦大众改善医疗条件，不但可以助人，还可以提高健康运势和家运。</p>
                  </div>
                  <div>
                    <div class="little-tit2">佩戴开运饰品：百解手绳或挂饰</div>
                    <p>流年若不是犯太岁的生肖，但仍想要借助开运饰品来提升整体运势的朋友，可以选择百解手绳或者挂饰。</p>
                    <p>“百解”是中国灵兽之一，玄学上用于镇宅化煞，招福纳财。百解吉祥物人人适用，与其他开运饰品不会相冲，长期佩戴可以消灾解困，保佑出入平安。</p>
                    <p>但凡流年开运或者化太岁的饰物，都是用于化煞挡灾，只适合在当年使用，不宜年年佩戴同一吉祥物。在丢弃前应先将红纸或红包袋包好，为过去一年得到的保佑表达谢意。新年的开运吉祥物也应妥善保存，出现损坏的情况应及早更换。</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
<style>
.public_pp_box {width:90%;}
.public_pp_tit {font-weight:600;padding:5px 0 20px;}
.public_pp_img img {width:270px;height:96px;margin:0 auto;vertical-align:middle;}
.public_pp_add {font-size:12px;color:#333333;margin-top:16px;}
.public_pp_axs {font-size:12px;color:#00b98c;margin-top:5px;}
.public_pp_money {margin-top:25px;}
.public_pp_money img {width:100%;vertical-align:middle;}
.public_pp_ljzf {display:block;border-radius:3px;height:50px;line-height:50px;background-color:#D60F00;font-size:18px;color:#ffffff;text-align:center;margin:27px auto 26px;}
.public_pp_point {padding:0 10px;}
.public_pp_point p {font-size:10px;color:#333333;position:relative;padding-left:20px;text-align:left;margin-bottom:10px;}
.public_pp_point p:nth-child(1):before {content:"注：";display:inline-block;position:absolute;left:0;top:0;font-size:10px;color:#333333;}

.dashi_point_warp {padding:0px 10px 30px 10px;}
.dashi_point_title {font-size:15px;color:#2c170f;}
.dashi_point_content {display:-webkit-flex;display:flex;align-items:center;margin-top:15px;}
.portrint {width:40px;height:40px;border-radius:50%;}
.dashi_point_box {display:-webkit-flex;display:flex;align-items:center;width:170px;height:40px;box-sizing:border-box;padding:10px;border-radius:5px;background-color:#A0E75A;margin-left:20px;position:relative;font-size:16px;color:#ffffff;}
.dashi_point_box::after {content:'';width:0;height:0;display:inline-block;border:20px solid transparent;border-right-color:#A0E75A;position:absolute;left:-28px;z-index:-1;}
.dashi_audio_time {font-size:14px;color:#999999;padding:10px;position:relative;}
.newMsg::after {content:'';width:8px;height:8px;border-radius:50%;background-color:#eb4d4b;display:inline-block;right:0;top:0;position:absolute;}
.dashi_icon {width:24px;height:24px;padding-right:10px;}
.kefu_point {padding:10px;font-size:14px;color:#000000;}
.kefu_btn {height:50px;margin-top:20px;background-color:#FC9208;border-radius:5px;font-size:18px;color:#ffffff;line-height:50px;text-align:center;position:relative;}
.kefu_btn::before {content:'';width:30px;height:30px;background:url('http://kyw.5988vip.cn/statics/ffsm/bazijp/img/wen.png') no-repeat;background-size:100% 100%;display:inline-block;vertical-align:middle;margin-right:15px;margin-bottom:8px;}
.kefu_btn::after {content:"8";font-size:12px;width:20px;height:20px;position:absolute;top:0;margin-left:15px;line-height:20px;text-align:center;color:#ffffff;display:inline-block;background-color:#D40D0A;border-radius:50%;animation:msgSclac 1s infinite ease-out;-webkit-animation:msgSclac 1s infinite ease-out;-moz-animation:msgSclac 1s infinite ease-out;-o-animation:msgSclac 1s infinite ease-out;-ms-zoom-animation:msgSclac 1s infinite ease-out;}
.border2 {}
.fiex_bt {position:fixed;bottom:0;left:0;width:100%;z-index:35;line-height:46px;font-size:16px;height:46px;background-color:rgba(0,0,0,.5);text-align:center;display:none;}
.fiex_bt a {margin:5px 5px 0;line-height:36px;height:36px;text-decoration:none;background-color:red;display:block;font-size:16px;color:#fff;border-radius:5px;}
.fiex_bt a .suo {display:inline-block;height:40px;width:40px;background:url("../images/public/public_lock.png") center/80% no-repeat;vertical-align:top;margin-right:5px;}
.fiex_bt {height:50px;line-height:50px;font-size:18px;}
.fiex_bt a {background-color:#D60F00;height:40px;line-height:40px}

</style>		
          <div class="master-shop-wrapper">
            <div class="title-top"></div>
            <div class="title" style="background-color: rgb(218, 181, 139); color: rgb(255, 255, 255);">大师强烈推荐</div>
            <div class="shop-box">
              <div class="master-shop">
                <div class="master-intro clear">
<div class="dashi_point_warp border2">
            <div class="dashi_point_title">你有一条留言:</div>
            <div class="dashi_point_content">
                <img src="/statics/ffsm/bazijp/img/img-dashitouxiang@2x.png" alt="大师头像" class="portrint">
                <div class="dashi_point_box" data-cid="two">
                    <img src="/statics/ffsm/bazijp/img/img_yuyin3.png" alt="语音进度" id="Atwo" class="dashi_icon">
                </div>
                <div class="dashi_audio_time newMsg">00:45"</div>
            </div>
<audio src="https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3" id="Atwo"></audio>
        </div>
                  <div class="suggest clear">
                    <p>
                      <span>赤霄大师</span>建议：可佩戴
                      <span>黄水晶貔貅手链</span>，化解破财，催旺正偏财。</p></div>
                </div>
                <div class="shop-list">
                  <div>
                    <img src="statics/ffsm/cesuan/images/master_part1.jpg?timestamp=1531118652426"></div>
                  <div>
                    <img src="statics/ffsm/cesuan/images/master_part2.jpg?timestamp=1531118652426"></div>
                  <div>
                    <img src="statics/ffsm/cesuan/images/master_part3.jpg?timestamp=1531118652426"></div>
                  <ul>
                    <li>
                      <h5>1、招财守财</h5>
                      <p>貔貅自古是招财神兽，嘴大吃四方，揽八方之财。可帮你化解破财，防止钱财外流，守住钱财。</p>
                    </li>
                    <li>
                      <h5>2、旺正偏财</h5>
                      <p>黄水晶又名“财富之石”，黄水晶凝聚天地日月精华散发黄色光。黄色光会影响物质生活和财运，催旺正偏财。</p>
                    </li>
                    <li>
                      <h5>3、旺事业</h5>
                      <p>温和的黄光能加强灵气，令人们充满自信与喜悦。佩带黄水晶，能增强自信，坚定自我立场，使事业有如神助。</p>
                    </li>
                  </ul>
                  <div class="buy-btn" style="background-color: rgb(224, 149, 67); color: rgb(255, 255, 255);">搜索《易读网》请购</div></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </div>
</div>

<script>
        var num = 1;
        var clearTime;
        function setTimeAnimation(NodeClass){
            num++;
            if(num >3){
                num=1;
            }
            clearTime = setTimeout(function(){
                $(NodeClass).attr('src',"/statics/ffsm/bazijp/img/img_yuyin"+num+".png");
                setTimeAnimation(NodeClass);
            },400)
        }
        

        var audio = document.getElementById('myAudio');
        document.addEventListener("WeixinJSBridgeReady", function () {

            audio.play();
        }, false);


        $('.dashi_point_box').on('click',function(){
            if($(this).attr('data-cid')=='one'){
                clearTimeout(clearTime);
                if($(this).hasClass('play')){
                    $(this).removeClass('play');
                    audio.pause();
                }else{
                    $('.dashi_point_box').removeClass('play');
                    $(this).addClass('play');
                    $('#myAudio').attr('src','https://kyw.5988vip.cn/m/video/bzjp_top.mp3');
                    audio.play();
                    $(this).next('.dashi_audio_time').removeClass('newMsg');
                }
                
            }else if($(this).attr('data-cid')=='two'){
                clearTimeout(clearTime);
                if($(this).hasClass('play')){
                    $(this).removeClass('play');
                    audio.pause();
                }else{
                    $('.dashi_point_box').removeClass('play');
                    $(this).addClass('play');
                    $('#myAudio').attr('src','https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3');
                    audio.play();
                    $(this).next('.dashi_audio_time').removeClass('newMsg');
                }
            }
        });

        audio.addEventListener("play", function(){

            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_top.mp3'){
                clearTimeout(clearTime);
                $('#Atwo').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
                setTimeAnimation('#Aone');
            }
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3'){
                clearTimeout(clearTime);
                $('#Aone').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
                setTimeAnimation('#Atwo');
            }
        });
        
        audio.addEventListener("pause", function(){
            $('.dashi_point_box').removeClass('play');
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_top.mp3'){
                clearTimeout(clearTime);
                $('#Aone').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
            }
            if($('#myAudio').attr('src')=='https://kyw.5988vip.cn/m/video/bzjp_bottom.mp3'){
                clearTimeout(clearTime);
                $('#Atwo').attr('src',"/statics/ffsm/bazijp/img/img_yuyin3.png");
            }
        });

    </script>
<style>
.public_hot_test {border: 1px solid #d3d3d3;border-radius: 5px;background-color: #fff}
.public_ht_title {border-bottom: 1px solid #d3d3d3;padding: 10px;color: #000;font-weight: 800;text-align: center;font-size: 16px}
.public_ht_ul {position: relative;overflow: hidden;padding:15px 0 0 0;}
.public_ht_ul li {float: left;width: 25%;margin-bottom: 10px;}
.public_ht_ul li a {display: block;}
.public_ht_ul li img {display:block;width:70%;margin:0 auto;}
.public_ht_ul li p {line-height: 24px;height: 26px;font-size: 15px;color: #ad6409;text-align: center;overflow: hidden;}
.public_footer_servers {overflow: hidden;width: 100%;text-align: center;color: #6c6c6c;padding:20px 0px 50px 0px;font-size: 12px;}
.public_footer_servers a {color: #6c6c6c}
</style>
<{include file='./ffsm/footer.tpl'}>
<{include file='./ffsm/dl_ck.tpl'}>
</body>
</html>