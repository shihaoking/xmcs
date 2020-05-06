<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8"/>
	<title> 八字运势_流年运势_十年大运_专业测算_-易读网</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="yes" name="apple-mobile-web-app-capable"/>
	<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
	<meta content="telephone=no" name="format-detection"/>
	<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
	<link href="/statics/ffsm/cesuan/sndy1.css" rel="stylesheet" type="text/css"/>
	<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
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
                    <a href="/?ac=sndy">
                      <span>再测一次</span></a>
                  </li>
                  <li class="left save">感谢测算</li></ul>
              </div>
            </div>
          </section>
          <div>
            <div class="res-tit">您的信息</div>
            <div class="res-content res-content1">
            <p>您的姓名：<{$data.data.username}></p>
            <p>您的性别：<{if $data.data.gender==1}>男<{else}>女<{/if}></p>
            <p>出生日期：</p>
            <p>公历:<{$data.data.y}>年<{$data.data.m}>月<{$data.data.d}>日 <{$data.data.h}>时</p>
            <p>农历:<{$data.data.lDate}></p></div>
            <div class="tips">温馨提示：<p>为了提高测算的准确度和内容的丰富度，老师最近对内容进行了升级调整，更新后的测算结果跟之前会有一定的差异，请以更新后的分析内容为准。</p>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">你的八字命盘</div>
            <div class="yin-dao hide">
              <span>点击展开内容分析，点击标题可收起</span></div>
            <div class="res-content">
              <div class="bazi-mingpan">
                <div class="m-table">
                  <ul class="m-tab-title">
                    <li class="table_01">
                      <img src="/statics/ffsm/cesuan/images/result_table_01.jpg" alt=""></li>
                    <li class="table_02">
                      <img src="/statics/ffsm/cesuan/images/result_table_02.jpg" alt=""></li>
                    <li class="table_03">
                      <img src="/statics/ffsm/cesuan/images/result_table_03.jpg" alt=""></li>
                  </ul>
                  <ul class="data data-one">
                    <li>十神</li>
                      <li><{$pp.shishen1}></li>
                      <li><{$pp.shishen2}></li>
                      <li><{$pp.shishen3}></li>
                      <li><{$pp.shishen4}></li>
                      <li><{$pp.shishen1}></li>
                      <li><{$pp.shishen3}></li>
                      <li><{$pp.shishen1}></li></ul>
                  <ul class="data data-one">
                    <li>天干</li>
                    <li><{$return.user.bazi.0}></li>
                      <li><{$return.user.bazi.2}></li>
                      <li><{$return.user.bazi.4}></li>
                      <li><{$return.user.bazi.6}></li>
                      <li><{$return.user.bazi.2}></li>
                      <li><{$return.user.bazi.0}></li>
                      <li><{$return.user.bazi.4}></li></ul>
                  <ul class="data data-one">
                    <li>地支</li>
                    <li><{$return.user.bazi.1}></li>
                      <li><{$return.user.bazi.3}></li>
                      <li><{$return.user.bazi.5}></li>
                      <li><{$return.user.bazi.7}></li>
                      <li><{$return.user.bazi.3}></li>
                      <li><{$return.user.bazi.1}></li>
                      <li><{$return.user.bazi.7}></li></ul>
                  <ul class="data data-three">
                    <li>藏干</li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan1}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan2}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan3}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan4}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan1}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan5}></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class=""><{$pp.zanggan2}></li></ul>
                    </li>
                  </ul>
                  <ul class="data data-three data-cgss">
                    <li>藏干<br>十神
                      <!-- /react-text --></li>
                     <li>
                        <ul class="three">
                         <{$pp.szanggan1}></ul>
                      </li>
                      <li>
                        <ul class="three">
                         <{$pp.szanggan2}></ul>
                      </li>
                      <li>
                        <ul class="three">
                          <{$pp.szanggan3}></ul>
                      </li>
                      <li>
                        <ul class="three">
                          <{$pp.szanggan4}></ul>
                      </li>
                    <li>
                      <ul class="three">
                        <li class="">
                          <!-- react-text: 287 -->正财
                          <!-- /react-text -->
                          <!-- react-text: 288 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 290 -->正官
                          <!-- /react-text -->
                          <!-- react-text: 291 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 293 -->占
                          <!-- /react-text -->
                          <!-- react-text: 294 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class="">
                          <!-- react-text: 298 -->劫财
                          <!-- /react-text -->
                          <!-- react-text: 299 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 301 -->占
                          <!-- /react-text -->
                          <!-- react-text: 302 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 304 -->占
                          <!-- /react-text -->
                          <!-- react-text: 305 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="three">
                        <li class="">
                          <!-- react-text: 309 -->偏财
                          <!-- /react-text -->
                          <!-- react-text: 310 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 312 -->七杀
                          <!-- /react-text -->
                          <!-- react-text: 313 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 315 -->偏印
                          <!-- /react-text -->
                          <!-- react-text: 316 -->
                          <!-- /react-text --></li></ul>
                    </li>
                  </ul>
                  <ul class="data data-one data-nayin">
                    <li>纳音</li>
                    <li><{$pp.nayin1}></li>
                      <li><{$pp.nayin2}></li>
                      <li><{$pp.nayin3}></li>
                      <li><{$pp.nayin4}></li>
                      <li><{$pp.nayin1}></li>
                      <li><{$pp.nayin3}></li>
                      <li><{$pp.nayin4}></li></ul>
                  <ul class="data data-tow">
                    <li class="fourWorld">十二<br>长生</li>
                    <{$pp.dayunhtml}></ul>
                  <ul class="data data-one">
                    <li>空亡</li>
                    <li>戌亥</li>
                    <li>辰巳</li>
                    <li>午未</li>
                    <li>辰巳</li>
                    <li>寅卯</li>
                    <li>寅卯</li>
                    <li>午未</li></ul>
                  <ul class="data data-four">
                    <li>神煞</li>
                    <li>
                      <ul class="four">
                        <li class="">
                          <!-- react-text: 341 -->贵人
                          <!-- /react-text -->
                          <!-- react-text: 342 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 344 -->占
                          <!-- /react-text -->
                          <!-- react-text: 345 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 347 -->占
                          <!-- /react-text -->
                          <!-- react-text: 348 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 350 -->占
                          <!-- /react-text -->
                          <!-- react-text: 351 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="">
                          <!-- react-text: 355 -->文昌
                          <!-- /react-text -->
                          <!-- react-text: 356 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 358 -->驿马
                          <!-- /react-text -->
                          <!-- react-text: 359 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 361 -->占
                          <!-- /react-text -->
                          <!-- react-text: 362 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 364 -->占
                          <!-- /react-text -->
                          <!-- react-text: 365 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="transparent">
                          <!-- react-text: 369 -->占
                          <!-- /react-text -->
                          <!-- react-text: 370 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 372 -->占
                          <!-- /react-text -->
                          <!-- react-text: 373 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 375 -->占
                          <!-- /react-text -->
                          <!-- react-text: 376 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 378 -->占
                          <!-- /react-text -->
                          <!-- react-text: 379 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="">
                          <!-- react-text: 383 -->贵人
                          <!-- /react-text -->
                          <!-- react-text: 384 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 386 -->占
                          <!-- /react-text -->
                          <!-- react-text: 387 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 389 -->占
                          <!-- /react-text -->
                          <!-- react-text: 390 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 392 -->占
                          <!-- /react-text -->
                          <!-- react-text: 393 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="transparent">
                          <!-- react-text: 397 -->占
                          <!-- /react-text -->
                          <!-- react-text: 398 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 400 -->占
                          <!-- /react-text -->
                          <!-- react-text: 401 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 403 -->占
                          <!-- /react-text -->
                          <!-- react-text: 404 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 406 -->红鸾
                          <!-- /react-text -->
                          <!-- react-text: 407 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="">
                          <!-- react-text: 411 -->羊刃红艳
                          <!-- /react-text -->
                          <!-- react-text: 412 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 414 -->将星
                          <!-- /react-text -->
                          <!-- react-text: 415 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 417 -->占
                          <!-- /react-text -->
                          <!-- react-text: 418 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 420 -->灾煞
                          <!-- /react-text -->
                          <!-- react-text: 421 -->
                          <!-- /react-text --></li></ul>
                    </li>
                    <li>
                      <ul class="four">
                        <li class="">
                          <!-- react-text: 425 -->贵人
                          <!-- /react-text -->
                          <!-- react-text: 426 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 428 -->劫煞
                          <!-- /react-text -->
                          <!-- react-text: 429 -->
                          <!-- /react-text --></li>
                        <li class="transparent">
                          <!-- react-text: 431 -->占
                          <!-- /react-text -->
                          <!-- react-text: 432 -->
                          <!-- /react-text --></li>
                        <li class="">
                          <!-- react-text: 434 -->将星
                          <!-- /react-text -->
                          <!-- react-text: 435 -->
                          <!-- /react-text --></li></ul>
                    </li>
                  </ul>
                </div>
                <div class="main-info">
                  <ul>
                    <li>
                      <span>旺相休囚死 :</span>
                      <span>水木金火土</span></li>
                    <li>
                      <span>喜用神 ：</span>
                      <span><{$return.data.xiyongshen.data.xishen}></span></li>
                    <li>
                      <span>胎元 ：</span>
                      <span><{$pp.taiyuan}></span>
                      <span class="title">日空 ：</span>
                      <span><{$pp.xkrgz}></span></li>
                    <li>
                      <span>起大运 ：</span>
                      <span><{$return.data.xiyongshen.data.dayun}></span></li>
                  </ul>
                  <div class="table-info">
                    <div class="left">大运</div>
                    <div class="auto">
                      <div class="num">
                        <span><{$return.data.xiyongshen.data.nnnn}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+10}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+20}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+30}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+40}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+50}>岁</span>
                          <span><{$return.data.xiyongshen.data.nnnn+60}>岁</span></div>
                        <div class="word">
                          <span><{$return.data.xiyongshen.data.yq_text.0}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.1}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.2}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.3}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.4}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.5}></span>
                          <span><{$return.data.xiyongshen.data.yq_text.6}></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">你的大运分析</div>
            <div class="yin-dao hide">
              <span>点击展开内容分析，点击标题可收起</span></div>
            <div class="res-content">
              <div>
                <div class="sub-tit">当前大运：己亥运（2010年~2019年）</div>
                <div class="red2">综合评价：吉</div>
                <p class="poem">己运原是正官会，水多遇土反为贵</p>
                <p class="poem">财旺生官多祥瑞，身弱遇此有刑亏</p>
                <p class="poem">亥运禄堂倒不妨，求谋顺遂大吉昌</p>
                <p class="poem">买臣五十方豪富，太公八十遇文王</p>
                <p class="poem"></p>
                <p>结合你自身八字信息，目前所走大运对你来说是很不错的，比较适合实现自身的理想抱负，如果你对人生有想法、计划都可以在这个大运多加努力去实现。在这个大运里，你为人忠心、顺从，有理性，诚实，有责任感，头脑好，工作事业稳定，有光明正大的心态，能在事业工作方面取得好成绩，在职位或官位上较易高升，考试较易上榜，官讼较易胜诉，易得长官提拔，自己创业发展空间大，收益丰厚。另一方面，这个大运对于发展人脉关系有利，人人都愿意和你保持良好关系。而且这个大运子女运非常好，单身男性容易找到伴侣，而已婚男士能得到宝宝，和子女相处融合。</p>
              </div>
              <div>
                <div class="sub-tit">下一个大运：戊戌运（2020年~2029年）</div>
                <div class="red2">综合评价：吉</div>
                <p class="poem">戊运推来是七煞，是非口舌不可亏</p>
                <p class="poem">纵然五载无进退，事多混杂乱如麻</p>
                <p class="poem">戌运正财偏官地，财喜两旺不须疑</p>
                <p class="poem">时来风送腾王阁，黄鹤楼中吹玉笛</p>
                <p class="poem"></p>
                <p>结合你自身八字信息，目前所走大运对你来说是很不错的，比较适合实现自身的理想抱负，如果你对人生有想法、计划都可以在这个大运多加努力去实现。在这个大运中，你会变得很有冲劲，有责任感，有领导风范，万丈雄心，充满毅力与勇气，导致你在事业、名气、权利等方面都会很有大的突破，但经过奋斗与竞争才能达成目标，比方说工作得到上司重用，升职加薪，创业者公司也慢慢步入正轨，当官者稳步升迁，求名者名利双休。另一方面，这个大运对于发展人脉关系有利，人人都愿意和你保持良好关系。这个大运子女运非常好，单身男性容易找到伴侣，而已婚男士能得到宝宝，和子女相处融合。</p>
              </div>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">近十年运势分析</div>
            <div class="yin-dao hide">
              <span>点击展开内容分析，点击标题可收起</span></div>
            <div class="res-content">
              <div>
                <div class="con-tit">
                  <!-- react-text: 472 -->2018-2-4
                  <!-- /react-text -->
                  <!-- react-text: 473 -->~
                  <!-- /react-text -->
                  <!-- react-text: 474 -->2019-2-4
                  <!-- /react-text --></div>
                <p>夜雨无情惊醒梦，西风有意折飞花。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 478 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 479 -->七杀
                    <!-- /react-text -->
                    <!-- react-text: 480 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 481 -->武职、军衔、诉讼、外敌、建筑，以及儿女、情人等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 484 -->做事乾脆利落，工作效率高，较易文成武就。侠义助人受人感激，名声显赫，有地位或有权威。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 487 -->个性太张扬，聪明反被聪明误，自己容易受损失。生活起伏较大，身体易受伤残。若为女性早婚不利。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较好，需要有雄心壮志，发展前景好，是不可多得的好运年！如果你做事能保持积极，有责任感，充满毅力与勇气，那么在事业、权利、名气方面都能获得提升，有机会升职加薪，加官进爵，名气大增。不过今年的特点是经过奋斗与竞争才能获利，需要有克服一个又一个难关！</p>
                <p>而由于今年朱雀押运，朱雀属于凶神，在好运年遇上那就代表会为你今年添加麻烦障碍。受到朱雀的影响，你今年容易招惹口舌是非，小人陷害，产生纠纷矛盾有理无人理，有冤无处诉，还要背黑锅，朱雀的危害不得不防。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 493 -->2019-2-4
                  <!-- /react-text -->
                  <!-- react-text: 494 -->~
                  <!-- /react-text -->
                  <!-- react-text: 495 -->2020-2-4
                  <!-- /react-text --></div>
                <p>玉兔催人投宿处，金鸡唤客束行装。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 499 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 500 -->正官
                    <!-- /react-text -->
                    <!-- react-text: 501 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 502 -->职位、名誉、权力、事业竞争、上司，以及子女、若为女性，则其丈夫或男友等均有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 505 -->职位权力易稳固或上升，官司易获胜诉或平反，学业或事业较顺利。若为男性较易获得子女尊重。若为女性，其丈夫较有地位或权威。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 508 -->易遭诽谤财受损，易发生是非争执，影响职位、名誉，兄弟姐妹易发生刑伤。若为女性，其丈夫或男友易有不利事。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较好，求名得名，求财得财，努力能得到回报，是不可多得的好运年！你较为忠心能干，有责任感，愿意接受别人的意见批评，容易成为人人心中的好朋友，获得好名声。正因为有这样光明正大的心态，才能令你今年工作事业稳定，在职位或官位上较易高升，考试较易上榜，官讼较易胜诉，易得长官上司提拔。</p>
                <p>而由于今年白虎押运，白虎属于凶神，在好运年遇上那就代表会为你今年添加麻烦障碍，无灾也有祸。受到白虎的影响，你今年容易招惹口舌是非，有人生安全危机，血光伤疾难料，而且还可能会碰上披孝白事，同时还需要防范天灾横祸，白虎的危害不得不防。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 514 -->2020-2-4
                  <!-- /react-text -->
                  <!-- react-text: 515 -->~
                  <!-- /react-text -->
                  <!-- react-text: 516 -->2021-2-4
                  <!-- /react-text --></div>
                <p>飞符为患又为灾，揪唧无端水破财。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 520 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 521 -->偏印
                    <!-- /react-text -->
                    <!-- react-text: 522 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 523 -->学术研究、爱好特长，以及长辈、 贵人、母亲等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 526 -->较易得贵人帮助，爱好特长易发挥，学术研究较易有成就。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 529 -->学业或事业有波折，生活不安定，名誉有损，或母亲有事。不利子女，易发生交通事故。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较好，出门在外遇贵人，对于权力、名声的发展有帮助，是一个好运年。事业较安定，学业平顺，工作顺利，事事亨通，副业容易有成就。你需要放下架子，搞好人际关系，这样才容易获得长辈或贵人帮助，为自己创造更多的机会。此外，今年你适合开发新业务、新产品，闲来无事可以多独处思考日后的发展方向。</p>
                <p>而由于今年贵神押运，贵神属于吉神，在好的年运遇上会那就是好上加好，今年运势可谓更上一层！得到贵神的帮助，你今年会有更多的喜事和福气，身体健康，病痛伤害减少，凡事都容易有贵人帮助，心情舒畅。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 535 -->2021-2-4
                  <!-- /react-text -->
                  <!-- react-text: 536 -->~
                  <!-- /react-text -->
                  <!-- react-text: 537 -->2022-2-4
                  <!-- /react-text --></div>
                <p>无端夜雨迷秋月，不意狂风折好花。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 541 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 542 -->正印
                    <!-- /react-text -->
                    <!-- react-text: 543 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 544 -->学业、艺术，以及长辈、师长、母亲、女婿等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 547 -->自己的天赋较易发挥，学业艺术方面有发展。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 550 -->劳神费心，工作受自己的情绪影响较大，女性不利子女。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较好，出门在外遇贵人，对于权力、名声的发展有帮助，是一个好运年。你需要待人亲切，慈祥宽厚，那么就容易得父母长辈及贵人的帮助，令生活事业或学业安定平顺，提升名望。今年职位稳定，有升职掌权，好好努力跃升为管理层也未尝不可！</p>
                <p>而由于今年弔客押运，弔客属于凶神，在运势好的年会遇上代表会为你今年或会有不好的事发生。受到弔客的影响，你和亲人朋友容易闹矛盾，心难安，容易有担忧牵挂之事，求财谋利也并非一帆风顺，或有困难麻烦需要去克服。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 556 -->2022-2-4
                  <!-- /react-text -->
                  <!-- react-text: 557 -->~
                  <!-- /react-text -->
                  <!-- react-text: 558 -->2023-2-4
                  <!-- /react-text --></div>
                <p>叩门声急是非多，一见官非病又难。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 562 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 563 -->比肩
                    <!-- /react-text -->
                    <!-- react-text: 564 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 565 -->本身的事业、思想言行、决策、健康安全，以及兄弟姐妹、同学、同事、朋友、近邻等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 568 -->个性张扬，事业心较强，勇于向不利环境挑战，在异乡较顺利，较得朋友之助力。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 571 -->易争强斗胜、独断专行，常遭小人陷害，或受兄弟姐妹、同事或朋友拖累而破财，合作事业易散伙，父亲受牵累。夫妻易生是非。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说是比较好的，头脑灵活，赚钱想法多，人脉关系广，努力拼搏今年收获必定丰厚！假若你能把心胸放开，不要太重视财务和个人的利益得失，多帮助家人朋友，那么就能得到家人朋友相助，工作生活都能逢凶化吉，事业成功，财运亨通。</p>
                <p>而由于今年病符押运，病符属于凶神，在运势好的年份遇上代表会为你本来平顺的生活添加病灾。受到病符的影响，你今年身体容易受病魔困扰，或出现意外血光伤害，而且办事处事也不能一帆风水，关键时刻容易出问题，凡事要三思才能免祸殃。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 577 -->2023-2-4
                  <!-- /react-text -->
                  <!-- react-text: 578 -->~
                  <!-- /react-text -->
                  <!-- react-text: 579 -->2024-2-4
                  <!-- /react-text --></div>
                <p>双飞紫燕两分飞，夫君不永命先归。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 583 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 584 -->比劫
                    <!-- /react-text -->
                    <!-- react-text: 585 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 586 -->本身的思想言行、陈规陋习、决策计划，以及朋友、同辈、兄弟姐妹等有关。
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 589 -->理想远大，进取心强，有主见，敢于与不良现象作斗争。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 592 -->不容易听取别人的意见，固执已见、独断专行，多招惹诽谤有伤名誉。做事没有恒心，说的多做的少。易染上酗酒赌博等恶习。男性要防婚变，女性婚期早不利。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说是比较好的，发展机遇多，危机风险小，可以得到兄弟朋友同事帮助，凡事水到渠成，努力能取得好成绩。所以你需要搞好人脉关系，兄弟朋友同事都识你今年的贵人，他们能在今年为你提供极大的帮助。而如果想要扩充事业、升职加薪，只需努力机会还是有的。</p>
                <p>而由于今年太岁押运，无福便有祸，为你再带来点好运固然是好，最怕为了带来不好的影响，比方说：口舌是非，疾病伤痛，小人侵犯，刀伤车祸等，闲事莫管，出外远行工作需要注意人生安全，今年尽量减少走动。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 598 -->2024-2-4
                  <!-- /react-text -->
                  <!-- react-text: 599 -->~
                  <!-- /react-text -->
                  <!-- react-text: 600 -->2025-2-4
                  <!-- /react-text --></div>
                <p>一朝烟雨一朝晴，晴不多时雨又淋。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 604 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 605 -->食神
                    <!-- /react-text -->
                    <!-- react-text: 606 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 607 -->开业迁居、文学写作、自由职业、专业技术，以及子女、学生、下属、性欲等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 610 -->学业事业较易进步和成功，天赋较易发挥。爱情也较易产生和进展，易交桃花运。女性较易怀胎生育。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 613 -->聪明易被聪明误，产生矛盾，引起官司诉讼。外表光华内里平淡，防过度劳神而损身心；盲目追求爱情而有损名誉及事业。男女要防矛盾和婚变。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说是比较好的，你的计划、理想抱负终于有了实现的机会，可以放手一搏，努力能有满意的收获。你需要友善一点，凡事能按条理计划去做，处事交流多进行面对面的交流，较易得部属或子女倾力协助，事事都会得心应手。需要注意的是今年容易有感情事，不能因为感情烦恼而阻碍了本年的发展。</p>
                <p>而由于今年青龙押运，在你的好运年能遇到青龙吉神，今年运势可谓更上一层！得到青龙帮助，令你创业谋事有贵人相助，官运亨通财运好，贵人高照，添人进口生贵子，喜事重重，远行有财利可得，生意兴隆，财利大好，一切事事如意。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 619 -->2025-2-4
                  <!-- /react-text -->
                  <!-- react-text: 620 -->~
                  <!-- /react-text -->
                  <!-- react-text: 621 -->2026-2-4
                  <!-- /react-text --></div>
                <p>风雨凄凄正愁人，窗前寂寞有谁知。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 625 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 626 -->伤官
                    <!-- /react-text -->
                    <!-- react-text: 627 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 628 -->理想追求、爱好特长、文学技术、公共关系、迁移调动，以及儿女、学生、晚辈、部属、性欲等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 631 -->比平时有较高的智慧和才能，聪明智谋多，在音乐艺术、爱好特长方面较易成功。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 634 -->本性过度暴露，惹事生非好管事，易与人产生过节，孤独寂寞。若为男性易盲目追求爱情而有损名誉及事业。若为女性防婚姻不顺利。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较差，你的计划、理想抱负想要实现非常难，一整年忙碌付出可能真不一定能取得想要的成绩。而且你容易因为爱面子，傲气自满而招惹小人是非，得罪他人，容易受子女或部属连累，或为部属或子女事而烦忧，甚至会以不正当手段求财而惹官非、刑讼坐牢。今年困难重重，事事都要小心谨慎。</p>
                <p>而由于今年丧门押运，丧门是哭星，对你今年运势有不好的影响，在不好的年份遇上可谓雪上加霜。受到丧门的影响，你今年心情浮沉不定，身边亲人朋友生病入院，或有丧事，而你是不适合探病，探病带灾，还需要防小人陷害，事事要小心，以免发生意外。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 640 -->2026-2-4
                  <!-- /react-text -->
                  <!-- react-text: 641 -->~
                  <!-- /react-text -->
                  <!-- react-text: 642 -->2027-2-4
                  <!-- /react-text --></div>
                <p>一日愁来百事多，心中烦恼乱如麻。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 646 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 647 -->偏财
                    <!-- /react-text -->
                    <!-- react-text: 648 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 649 -->商业、财产、金钱，以及父亲、男性的情人、女性的婆婆等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 652 -->人缘好口碑佳，生意买卖比较顺利，富裕发达。若为男性则风流豪爽，易得女人喜欢。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 655 -->本地求财不易得，财虽多但不易存下，婚姻感情易变。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较差，困难重重，尤其是在工作求财方面，一整年忙碌付出可能真不一定能取得想要的成绩。你今年开销大，不节俭，容易沾染赌博恶习，易有意外破耗或财务纠纷，或因财而生灾，甚至惹祸上身，或为财愁苦，商场交易不顺，易损失财产。</p>
                <p>而由于今年六合押运，六合是吉神，可以提升今年的运势，在不好的年份遇上可谓是雪中送炭。受到喜神的影响，今年在逆境中容易有喜事发生，未婚者有结婚的机会，已婚者有机会生贵子，就算遇到困难也可以得到亲戚朋友相助，求财谋利也不至于一无所获。</p>
              </div>
              <div>
                <div class="con-tit">
                  <!-- react-text: 661 -->2027-2-4
                  <!-- /react-text -->
                  <!-- react-text: 662 -->~
                  <!-- /react-text -->
                  <!-- react-text: 663 -->2028-2-4
                  <!-- /react-text --></div>
                <p>黄金久淹在泥沙，有日开藏世共挎。</p>
                <p>
                  <span class="red1">
                    <!-- react-text: 667 -->十神为
                    <!-- /react-text -->
                    <!-- react-text: 668 -->正财
                    <!-- /react-text -->
                    <!-- react-text: 669 -->：
                    <!-- /react-text --></span>
                  <!-- react-text: 670 -->财产、金钱，以及父亲、男性的妻子或女友等有关
                  <!-- /react-text --></p>
                <p>
                  <span class="red">吉象：</span>
                  <!-- react-text: 673 -->财运亨通，有比平时较多求财的机遇。父亲较有利，或容易交上男女友，姻缘不错。
                  <!-- /react-text --></p>
                <p>
                  <span class="blue">凶象：</span>
                  <!-- react-text: 676 -->易引起财产或金钱纠纷，意外破耗。财多伤母克妻，易发生感情破裂。
                  <!-- /react-text --></p>
                <p class="orange">吉象和凶象分别代表今年可能会出现的情况，运势好时，吉象就更容易出现；相反，运势不好时，凶象就更容易出现，需要小心提防。结合你的八字来看：</p>
                <p>今年你的运势总体来说比较一般，工作求财机会与危机并存，辛苦努力会有小成就。事业工作还算比较稳定，赚钱机会也是有的，但你或会因为开销大，不满足现状，主动去追求更好好的工作、更好的赚钱机会，反而会导致你为财所困，可能会因财而生灾，容易惹祸上身。建议在现在基础上去继续努力，大变动收获较小。</p>
                <p>而由于今年官符押运，官符是福祸参半神煞，虽然能提升感情运势，但也可能就会发生一些不愉快的事情了，令你本来就一般的流年运势添加更多的波折。受到官符的影响，你今年会容易招惹口舌是非，或变生出令你担忧牵挂的事情，容易金钱财物损失。</p>
              </div>
            </div>
            <div>
              <div class="res-tit-top"></div>
              <div class="res-tit">您的2018年十二月运气</div>
              <div class="res-content show">
                <div>
                  <div class="sub-tit">正月甲寅运气，紫微高照（阳历2018年2月4日~3月4日）</div>
                  <p>事业进展顺利，并可能获得意外的支持或财利。工作上在这个月容易有新的项目或职位出现。好好的接受挑战，如果你够聪明够努力，一定可以再物质上满足自己，如果不转变、精神上并不能感到充实。</p>
                  <p>财运一般不要有大动作。保守些，是对自己很大的帮助。财运不错，可以尝试进行一点投资，长期低风险的比较合适，购物方面要谨慎别冲动尤其支出大的开销。</p>
                  <p>感情上很顺利，经过长期的努力，两人已经有一定的默契，在一起也很愉快。未婚男女有婚嫁的计划的可能，可以好好安排。</p>
                  <p>健康上现在是你调理身体的好时候、这个月身材变化太大时，特别要留意血压心脏。</p>
                </div>
                <div>
                  <div class="sub-tit">二月乙卯运气，凡事如意（阳历2018年3月5日~4月4日）</div>
                  <p>经营顺利，鸿图大展。工作上非常满足的有成就感，握住吉运，行动宜迅速，做事要敏捷，已经清楚的知道了自己想要什么，那就努力去做，不要顾虑那么多。</p>
                  <p>财务上计划需要改变，投资计划或收获并不会如预期的来临，随著环境的变化而改变，将来也许会有不错的收获。财运不错，会有一些意外之财。</p>
                  <p>感情上正如花逢雨露，满面春风，有婚姻之喜。会很突然有个机会使双方的感情迅速增温，所以请多留心，也须多留意一些节日、生日，为双方制造一些小浪漫。更能稳定感情。</p>
                  <p>健康上多做肩颈部和肩膀的运动。穿鞋子选最舒服的，女孩子最好不要穿太高跟的鞋子，有扭到脚的迹象、容易有膝盖关节的毛病。</p>
                </div>
                <div>
                  <div class="sub-tit">三月丙辰运气，亢龙有悔（阳历2018年4月5日~5月4日）</div>
                  <p>业务上有良机，须具有热忱，专心从事，切戒骄傲自满，得意之时，须防危险。以免乐极生悲。不可高估自己的力量，否则会失败。工作上有被欺骗的迹象，仔细想自己份内的工作细节，没有准备周全就不要贸然开始，相信自己的直觉。只要小心能可胜任所有工作。</p>
                  <p>金钱上可能会对之前的决定而后悔，现在又要重新思考如何选择的时候了，从长远的发展方面来考虑。</p>
                  <p>感情上两人会发生些不愉快，有问题大家面对面的讲清楚会更好。否则因误会，令彼此之间裂痕扩大。相距更远。会有第三者介入机会。并须避免酒色的诱惑。宜小心。注意家庭风波。</p>
                  <p>交际应酬多，喝酒勿过量。健康上要注意泌尿系统，方便的话去医院检查会更好、女性的朋友须注意内分泌及妇科的毛病。注意浮肿，睡前别喝太多水。</p>
                </div>
                <div>
                  <div class="sub-tit">四月丁巳运气，诸事顺调（阳历2018年5月5日~6月5日）</div>
                  <p>工作方面有想法正在构想当中，业务上一切如意伸展，努力经营，保持耐性，先把基础打好，成功会来的。目前都是铺路的准备。处于蓄势待发的状态。对于所计划的事，大都顺利，惟不可太大意。</p>
                  <p>财运不错，金融方面，如果没有问题，可以尝试进行一点投资，长期低风险的比较合适，购物方面要相信自己的直觉。应该把握机会。</p>
                  <p>感情会有新的发展或进入到更深的关系，别拘泥太多细节、也别听太多人的意见。托付终身的对象只有自己知道幸不幸福。</p>
                  <p>对长辈和同事之间的关系多留意，应酬较多，健康上是保健的好时机，多做些合适自己的锻炼身体的活动，可以多给自己准备些营养补品。</p>
                </div>
                <div>
                  <div class="sub-tit">五月戊午运气，龙德保身（阳历2018年6月6日~7月6日）</div>
                  <p>业务上一切如意伸展，工作方面上会有上司主管会有所变动，成为你的贵人，而增加你的重要性，让你拥有很大的成就感，好好努力抱著最大的热情投入工作，你的收获会更多，努力经营，自有佳绩。</p>
                  <p>有新投资，可以计划评估视自己能力，也有很好机会，可以勇敢尝试。但还是要能在自己能掌控范围。</p>
                  <p>感情方面对方缺点可以包容，两人虽没话说，也不致有太大问题，过段时间换个心情就好了。只是相处上会少些激情。自己要调适的。</p>
                  <p>身体上如果你对自己好些马上就能感觉到，如果你暴饮暴食也马上能感受到。避免不必要应酬。注意肾脏和视力衰弱方面的毛病。</p>
                </div>
                <div>
                  <div class="sub-tit">六月己未运气，洁身自爱（阳历2018年7月7日~8月6日）</div>
                  <p>事业方面可以考虑向更高一步迈进，要对自己有信心，现在不适合原地踏步。事情都要谨慎对待，任何细节都会影响到今后。</p>
                  <p>财多逢刼，金钱上要小心不要随便听信被人的话而消费，以免后悔。也别轻易被利诱，投机高利的投资千万在这时先暂时都不要行动。有预购预缴现金部分最好别贪图优惠利益反而最后损失。</p>
                  <p>家庭容易容易起争吵风波，男女都受到外界的诱惑，故应远离声色场所，酒色财气。有很多的机会可以遇到对你不错的异性，其中若有跟你很谈得来的，可就别错过这大好的机会啰。有伴的朋友们与情人可以好好把握良机，家庭若得和合，自可无事。</p>
                  <p>切戒酒色，频繁的应酬生活及工作上有新的挑战。所以有些压力产生而须多注意作息。登山或小型旅行很适合。试著放鬆适当休闲是必要的。</p>
                </div>
                <div>
                  <div class="sub-tit">七月庚申运气，不可大意（阳历2018年8月7日~9月7日）</div>
                  <p>事业方面有跟上司或同事间沟通上或工作分配上有不满的情绪。新的任务及挑战让你分身乏术。同事之间相处也是自己要去化解彼此间的误会。</p>
                  <p>经济上宽裕，不过还是要防范为金钱纠纷，作有效投资还是可行的。可以和家人沟通讨论。</p>
                  <p>这段时间容易遭烂桃花的纠缠，若对对方没意思，就要讲清楚、说明白，否则容易惹来不必要的麻烦。有伴的你，这段时间跟情人容易有争执发生，建议你跟情人要好好沟通，不要什么事情都藏在心底，这样不仅对方不明白，你也会容易胡乱瞎猜，俩人的误会就会更深。</p>
                  <p>健康上要注意饮食的营养，垃圾食品尽量少吃。</p>
                  <p>出外旅行，处世待人宜谨慎，以免招惹事端，尤戒酒色。男女均易被诱惑，故能远离酒色财气，自保安泰。</p>
                </div>
                <div>
                  <div class="sub-tit">八月辛酉运气，慎防风波（阳历2018年9月8日~10月7日）</div>
                  <p>变动职务。工作上稳定，可以用稳操胜券来形容，需要注意的是得到成功的同时也要付出代价，如果不能认同这点成功也不会长久。</p>
                  <p>金钱上要小心不要有借贷情况或者莫名其妙的为别人买单，别让自己成为冤大头。财务上投资要收缩，不可过于重利而不避风险。</p>
                  <p>感情上别被对方牵著鼻子走的倾向，如果心里是属于追求安定、严守自己生活方式的类型，不容许别人踏进自己的内心世界与生活圈中，欠缺协调性，沉默寡言，不会积极地与别人交往，你认为与别人在一起，必须顾虑到对方的感受，如此一来就无法守住自己的生活原则，因此往往选择孤独的道路。</p>
                  <p>行动宜谨慎，须防口舌是非，尢其出外旅行，注意事故或破财，物品遗失等。</p>
                </div>
                <div>
                  <div class="sub-tit">九月壬戍运气，福至心灵（阳历2018年10月8日~11月6日）</div>
                  <p>诸事意外顺调，对新计划，不妨尝试，事业方面可以考虑向更高一步迈进，要对自己有信心，现在不适合原地踏步。事情都要谨慎对待，任何细节都会影响到今后，</p>
                  <p>财运不错，有机会就把握好，赚一笔就收，不要太贪心，一贪则会掉入贪念的无底洞，反而永不知足，怕赚多也收不了手最后还得不偿失，切记。</p>
                  <p>青年男女，经过长期的努力，两人已经有一定的默契，在一起也很愉快。感情上很顺利，时机成熟，有婚嫁的计划的可能，可以进行婚谈、结婚，可以好好安排。</p>
                  <p>健康上之前制定的保养身体的方法可以实施了，想再多都不如行动。包括健身训练、饮食规划，也少不了定期检查。工作与健康必须兼顾，力求平衡，不可顾此失彼。</p>
                  <p>将过多无用的思想排除，将精力真正用在行动上，福分提升是很重要的部分。</p>
                </div>
                <div>
                  <div class="sub-tit">十月癸亥运气，男欢女悦（阳历2018年11月7日~12月6日）</div>
                  <p>工作上非常满足的有成就感，业务发展，财利日进，握住吉运，行动宜迅速，做事要敏捷，做事情都非常开心工作上会有所收获，已经清楚的知道了自己想要什么，那就努力去做，不要顾虑那么多。</p>
                  <p>财运不错，具有稳中求胜之象，可以有金钱进赈作储蓄。但须注意会有一些诱惑、享受花掉一部分。</p>
                  <p>你会找到理想的对象感情上两人相处非常轻鬆和谐，都能真心对待，有什么问题可以和另一半商量，也许会有意想不到的灵感。有伴的朋友们与情人可以好好把握这增加感情的机会。未婚男女，有婚姻之喜。</p>
                  <p>多注意家人的健康，有空可以组织家庭活动，现在的人际关系网不能满足你，要重新认识自己的朋友，不要抗拒变化。有时生活不再是一层不变。</p>
                </div>
                <div>
                  <div class="sub-tit">十一月甲子运气，坚实平顺（阳历2018年12月7日~2019年1月4日）</div>
                  <p>凡事不要好高鹜远，应就平凡中去坚实行动才好，工作上会有值得庆祝的事发生，如果是关于团队的话那就恭喜你，之前的付出会有收获的。朋友当中会有人给你正面的忠告要虚心接受，说好话的不一定都对你有利</p>
                  <p>金钱上可能会对有些决定而后悔，现在又要重新思考如何选择的时候了，从长远的发展方面来考虑。</p>
                  <p>感情上有新的突破口，不过不要表达的太明白。有时候朦胧美更吸引人，尝试用些甜蜜的小手段，会让对方更喜欢你。更是要小心有其他异性接近，不过也只是彼此感情的考验。</p>
                  <p>身体方面上需要好好休息，睡眠要充足，不舒服时，就该看医生，条件允许建议做全身检查。</p>
                </div>
                <div>
                  <div class="sub-tit">十二月乙丑运气，慎言慎行（阳历2019年1月5日~2月3日）</div>
                  <p>工作方面会想很多，可是不够实际，光明正大做事，终会顺利完成愿望。不可打歪主意，或行险侥幸。容易忽视已经拥有的，还是脚踏实地心平气和地的做事。工作方面有严苛工作量，应酬也多，反而容易有意想不到的收获。</p>
                  <p>对金钱有所节制，但该享受时，还是要舍得些，给自己一些生活质量也是应该的。财务上计划需要改变，投资计划或收获并不会如预期的来临，随著环境的变化而改变，将来也许会有不错的收获。</p>
                  <p>爱情方面没有安全感，彼此不信任但不如多花点时间陪伴对方，以免影响双方的关系。若再不好好经营感情，对方会感觉不到爱而离开。</p>
                  <p>生活态度不可暴躁，别让体力透支，超出自己身体负担尤其尽量不要熬夜喝酒，自然安泰平顺。</p>
                </div>
              </div>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">大师对你的忠言</div>
            <div class="res-content show">
              <p>1、四柱喜金，有利的方位是西方，不利南方，东南；其人喜白色，不利红色，喜居住坐西朝东的房子，床的放置东西向，床头在西。</p>
              <p>2、取名用字五行属金的有利。</p>
              <p>3、四柱喜金，应从事与金有关的事业或职业为宜，如经营五金器材，粗铁材或金属工具材料等方面事业，坚硬事业、决断事业、主动别人性质的事业，一切武术家、鉴定师（评估师）、拍卖人员、法官、执法人员、总主宰、汽车界、交通界、金融界、工程业、科学界、武术家、开矿界、民意代表、珠宝界、伐木事业。</p>
              <p>4、事业发展利西、中西, 不利南、东南</p>
              <p>5、吉祥数字为：7,8</p>
              <p>6、吉利楼层末位数为：4,9</p>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">食物开运法</div>
            <div class="res-content show">
              <div class="pic">
                <img src="statics/ffsm/cesuan/images/shi_wu_shui.jpg" alt=""></div>
              <p>都说爱笑的人运气不会太差，正面的心态笑对生活，能给自己带来好的运势。然而大家又是否知道，其实食物对于我们来说，都有非常好的开运作用。每个人都有自己喜欢和不喜欢的颜色。通过食物把不同的色彩带入我们的生活当中，不同的生肖属性的人士通过吃不同颜色的食物，可以令个人运势起到好的改变。</p>
              <p>你的生肖兔五行属木，五行定律中木生火。所以属兔的人士，若想提升个人运势，可多吃红色或紫色的食物或蔬菜。通过吃这些食物可以旺运，例如多吃草莓、樱桃、红萝卜、灯笼椒、西红柿、辣椒、提子、茄瓜等。或者是一些红色的蔬菜都可以进行选择，亦能够很好地增强自身的运势。红色食物一般含有丰富的矿物质，并且可提供丰富的蛋白质来源，有利于增添活力。缺乏红色食品，人体就会容易出现能量下降及缺乏耐性。而紫色的食物则较红色食物少见。</p>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">狗年开运风水布局</div>
            <div class="res-content show">
              <div>
                <div class="con-tit">脱离单身求桃花</div>
                <p>今年流年桃花位在西北方位，想要脱单的话最紧要的是催旺这个方位，加强桃花运。家中床头或公司中自己的办公桌位于西北方位对自己的桃花较有利。在这个桃花星飞临之处除了摆放鲜花之外，也可以放上粉红水晶、红纹石、红色丝带做成的花或蝴蝶等摆设，既可以点缀家居工作环境，又能给自己带来好姻缘。不过切忌在西北方位放置过多黑色或深色物品，装饰也不宜采用这些颜色，因为这些是灰暗的颜色，不利于求桃花。</p>
              </div>
              <div>
                <div class="con-tit">提升感情甜蜜度</div>
                <p>情侣和夫妇今年若想保持关系融洽，增进感情，就要小心今年流年的是非星了。今年的是非星降临东北方位，忌讳在这个方位见到任何绿色的物品或装饰，特别是睡房处于东北方位时更要小心地避忌，否则天天吵架就麻烦了！补救方法是在东北方位多摆放红色物品来改善关系，亦可以插九枝去掉刺的玫瑰来抵御是非星的力量。</p>
              </div>
              <div>
                <div class="con-tit">结婚添丁多喜事</div>
                <p>今年的喜庆位在中宫，即房子的中央位置。喜庆位代表一切喜事，催旺这个方位能够带来喜事，尤其有利于嫁娶和生儿育女。今年打算结婚或生小孩的朋友可以在家中的中宫放置红色、绿色的物品，或是带果实的盆栽。而想要结婚的情侣还可以在中宫放置鸳鸯摆设或两个一模一样的公仔催旺姻缘。</p>
              </div>
              <div>
                <div class="con-tit">找对靠山保饭碗</div>
                <p>上班族今年如果先要避开裁员危险，就要特别注意自己在办公室的座位是否会出现缺乏“靠山”（背后没有靠墙或高大的柜子遮挡）的情况，如果是这种情况则容易被煞气所冲、削弱运势，若加高椅背或摆放八个石春（一种白色石头）则可以改善运势。另外家中风水也要注意，例如沙发应该靠墙或柜子这种高大稳固的物体，否则也是“缺乏靠山”的情况。</p>
              </div>
              <div>
                <div class="con-tit">升职加薪两不误</div>
                <p>今年如果想要在职场上更上一层楼、升职加薪，就要注意催旺家中和办公室文昌星及财星的位置啦。今年的文昌星在正南方位，可以将水培富贵竹四枝置于该方位提高职场运势。今年的八白财星在东南方位，放置有谁的摆设或者红黄二色物品可以催旺财运，有利于加薪。</p>
              </div>
              <div>
                <div class="con-tit">生意兴隆财运来</div>
                <p>个体户或者公司老板今年想要生意兴隆，可以通过当旺的财星位置来催旺财运。今年八白财星位置在东南方，可以摆放水培植物带动财气。在店铺或办公室门口朝外摆放一对貔貅可以起到招财的作用，收银机或保险柜上下左右接触的位置则可以摆放聚宝盆这样的风水摆件守住钱财。</p>
              </div>
              <div>
                <div class="con-tit">小人是非要远离</div>
                <p>今年若想防住小人、减少是非，最忌在东北方位上动土，因为今年的东北方位有是非星降临，若想要减弱是非星的力量，则应在此方位上摆放红色物品，或者黑曜石水晶摆件。</p>
              </div>
              <div>
                <div class="con-tit">改善人缘利发展</div>
                <p>桃花不仅代表感情也代表人缘，改善人际关系可以改善西北方位的风水，因为今年的桃花星降临西北方。可以在该方位放置水培植物加强人际关系，这个方位上的颜色越鲜艳则越有利。在办公室的话，不妨在桌面的西北方位放置小盆的水培植物。</p>
              </div>
              <div>
                <div class="con-tit">身体健康离病灾</div>
                <p>今年的正北和正西方位分别为五黄灾星和二黑病星位，对健康都会造成不利影响，其中五黄的影响最大。需要注意家中的沙发、床以及公司中办公桌的座位是否处于这两个方向，长期在这些位置坐卧会容易生病。若要提升健康运则应避免在正北和正西方位动土，亦不宜摆放红黄二色的物品，可以防止铜制或者金色的重物化解霉运。</p>
              </div>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">2018年民俗注意事项</div>
            <div class="res-content show">
              <div>
                <div>
                  <span class="ms-subTit">做尾禡</span>
                  <div>
                    <p>“做禡”指的是拜祭土地公公的意思。中国人以农立国，所以历代的农民或者商人都会土地十分敬重，他们相信要丰衣足食，就要得到土地公公的庇佑，所以除了农历正月外，其他月份中的初二和十六，他们都会“做禡”，而每年的农历二月初二是“头禡”，“尾禡”就是农历十二月十六日。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">尾禡与无情鸡有何关连？</span>
                    <p>一年二是二次的“做禡”中，以“尾禡”最让人熟悉和被重视。例如公司所有人都会在过年前聚在一起吃顿饭，而席上总会有一道以鸡为主的菜式，相信大家也听过这一个说法：鸡头对著某人，便代表著那人将要被“炒鱿鱼”。这个“无情鸡”传统在今天看来已被视为笑话，但在往日却真有其事的，而这跟“尾禡”的由来有很大关联。据资料显示，原来根据清朝的雇佣制度，“尾禡”别定为评核员工表现的日子。</p>
                    <p>在“尾禡”日子里，雇主除了会分发粮红花奖励员工外，还会借著在祭祀后大家围坐在一起用膳的机会，以含蓄的手法来指出裁员的人选，那就是所谓给人吃“无情鸡”了。</p>
                    <p>如果雇主决定了要辞退某人，便会将已到热荤中的鸡头对准那个下属，那就是代表要请他吃“无情鸡”，而如果鸡头对准的是雇主自己，则代表他不会的辞退任何人。时至今日，仍有少数旧式的酒楼及海味店会在“尾禡”当日祭拜土地及设宴款待辛劳了一整年的员工，而“无情鸡”则已绝少的派上用场了。现代雇主要裁员，派一个“大信封”，直接简单得多。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">祭祀尾禡要准备什么物品？</span>
                    <p>做“尾禡”一般要准备烧肉、鸡、香烛、三杯酒及一对沙田柚（每个柚子都要用红笔在表皮上垂直写“招财进宝”四个字。）衣纸选用运财禄、地主贵人符、贵人马及禄马等，将焚香三拜后将其火化就好了。</p>
                    <p>“做尾禡”不一定要在正日（即农历十二月十六日），其他日子也是可以的，只要那日不与公司负责人的生肖相冲，而且又属于好日子就行了。祭拜后，可以保佑公司来年生意红火，还能消除口舌之争</p>
                  </div>
                </div>
                <div>
                  <span class="ms-subTit">大扫除</span>
                  <div>
                    <span class="ms-subTit1">大扫除有何意义？</span>
                    <p>“年二八，洗邋遢”，玄学家相信，每年一次的大扫除的确有助改善宅气，可在新一年的开始，将旺气引入室内。即便撇开玄学不说，大扫除还有传统节庆般备受重视，因为它提醒人们是时候去旧迎新，将家居收拾干净，无论在外观或心理上，这都是好事。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">应在何日大扫除？</span>
                    <p>选个好日子来去旧迎新，来年家宅运会更加顺利。一般来说，只要日子不跟家中成员的生肖相冲，便可以进行大扫除的事宜。《通胜》中所列的“成日”及“除日”都可以用到，至于“破日”本身的向来不宜祭祀的，不过因为大扫除的有破旧立新的意思，所以不常用的“破日”可以选择进行扫除。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">应如何清洁神位？</span>
                    <p>家里有神为，在大扫除当天，应该以椂柚叶、肩柏、芙蓉或七色花煲水，然后用来擦洗神柜，方法是用新毛巾从上至下、由内至外把所有污垢尽除。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">贴春联有何宜忌？</span>
                    <p>很多家庭都会在大扫除后贴上新春联，这做法可增加新年的喜庆气氛，也象征迎接新的开始。不过，因春联往往会张贴一整年，在颜色以及内容上也会对家宅有影响，所以贴春联时要注意以下两点。</p>
                    <p>第一，不可把红色的春联贴在流年的五黄灾星及二黑病星的方位，因为这样会加强这两颗病星的力量，尤其以五黄灾星为甚。（狗年的五黄灾星及二黑病星，分别位于正北及正西。）</p>
                    <p>第二，春联的字不宜与流年的生肖相冲，否则有犯太岁之象。例如流年为狗年的话，便不应贴上有「狗」字或相同谐音的春联，如“狗马亨通”等等。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">年花有何象征意义？</span>
                    <p>新年的节日气氛热闹，其中最好的活动便是行年宵了。无论经济有多差，每年各个年宵市场中，都有很多人争相买年花回家摆放，一来可美化家居，二来又可讨个意头，可谓一举两得。</p>
                    <p>除了桃花、水仙和桔等“人气年花”外，其他常见的年花也有其象征的吉祥意义：</p>
                    <p>牡丹：富贵、菊花：长寿长久、剑兰：步步高升、万年青：顺利长久、松树：长寿健康、富贵竹：竹报平安、银柳：有银有楼、五代同堂：嫁娶添丁。</p>
                  </div>
                </div>
                <div>
                  <span class="ms-subTit">开年</span>
                  <div>
                    <span class="ms-subTit1">开年饭有何意义？</span>
                    <p>大年初一过后，大部分家庭都会在年初二准备开年，开年即在新的一年进行第一次祭祀仪式，传统上此日子颇受重视，中国人每逢祭祀皆离不开一顿丰富的饭菜，而开年又是旧历新年中的大事，所以不论家庭或公司，为祈求新一年事事顺利，开年饭已成为了一项传统习俗。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">应在何时吃开年饭？</span>
                    <p>开年虽然定于年初二，但祭祀的时间各个地方都有所不同。有些家庭选择在年初一刚过、年初二的凌晨进行拜祭仪式及准备开年饭，这纯粹是风俗习惯，不必严格执行。但要注意年初二也不一定是好日，如果适逢岁破，便要选择在好的时辰来进行拜祭仪式。在上香拜神后，一家人便可一起吃开年饭。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">开年饭要有哪些菜式？</span>
                    <p>传统开年饭要准备的食物，不外乎就是鱼、生菜、烧肉和鸡，最好齐备九款开年菜式，象征“长长久久”。如果是营商者，和员工一起吃开年饭时，适宜在饭桌中央摆放“发财好市”（即发菜蚝豉），象征生意愈做愈好。</p>
                  </div>
                </div>
                <div>
                  <span class="ms-subTit">团年</span>
                  <div>
                    <span class="ms-subTit1">应在何日吃团年饭？</span>
                    <p>现代人生活忙碌，虽然各家各户仍然保留著吃团年饭的习俗，但现在已不一定在年三十晚团年了。其实只要团年的日子并非属于“阴错”、“阳错”或“破日”就好了，而最佳的选择，是在“天德”或“月德”等好日子。</p>
                  </div>
                  <div>
                    <span class="ms-subTit1">有何传统习俗要遵守？</span>
                    <p>从前在家吃一顿团年饭，人们有不少习俗要遵守，但时移世易，不少人为了方便快捷，都会选择一家人出外用膳。以下所提及的习俗仪式仅作参考，不管如何安排团年饭的细节，只要是一家人高高兴兴地聚在一起吃，便已很足够了。</p>
                    <p>一.吃团年饭前，要拜祭神明及祖先。拜菩萨要大香、细香各三支；拜地主要五支香；要在分别拜过五方土地龙神后；然后才上三支香拜祖先。如果有家庭成员未能出席，家人应代其拜祭以示尊重神明。</p>
                    <p>二.团年饭的菜肴要包括至少一款酒（如糯米酒），及要具备意头吉祥的小菜，例如发菜（意谓“发财”）韭菜（意谓“长长久久”）及蚝豉（意谓“好事”）等。另外，要有鱼、、肉、鸡、鸭等四道主菜，再加上另四道小菜，这称为“四盘四碗”，取其谐音“事事如意”。</p>
                    <p>三.在吃团年饭时，各人皆宜添饭，代表“添福添寿”，团年煮的米饭可以准备多一些，可以留出一些，代表“年年有余”，这样可以避免在年初一打开电饭煲时，出现“空空如也”的不吉利的情况。</p>
                    <p>四.饭后长辈会发红包给后辈，放在枕头下的红包指的就是“压岁钱”，注意“压岁钱”的数目应该为双数，这样放在枕头下面，代表来年会有充足的金钱可以使用。</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="res-tit-top"></div>
            <div class="res-tit">犯太岁化解锦囊</div>
            <div class="res-content show">
              <div>
                <span class="ms-subTit">犯太岁如何自救？</span>
                <p>坊间流传很多关于犯太岁的说法，其中很大部分都夸大了犯太岁的严重性。一般来说，犯太岁的这一年代表生活中波动大，情绪也容易跟著起伏不定，但不一定就意味著倒霉、运气差。有一部分人甚至在犯太岁时交好运，若是从事经常出外的工作或者常与他人打交道的工作，在外劳碌奔波反而会因犯太岁而得利，取得明显突破。犯太岁亦可认为是踏进人生的新阶段，人生变动难免会带来担忧和恐惧，若能够做好相应的心理准备，谋事在人、成事在天，以积极的态度主动迎接变化，心态好反而有助于应对各种挑战，更加靠近自己的目标。</p>
                <p>犯太岁为民间对本命年太岁、冲太岁、害太岁、刑太岁等的统称，影响轻重不一，大家若遇上犯太岁的年份，只要做好心理准备，通过行动去积极化解，就不必过分担忧。</p>
                <!-- react-text: 858 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">2018年（戊戌狗年）犯太岁的生肖</span>
                <p>2018年（戊戌狗年）犯太岁的生肖包括：狗、龙、羊、牛、鸡。</p>
                <!-- react-text: 862 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">狗 犯本命年太岁</span>
                <p>本命年犯太岁的生肖，生活多有变动，但这些变动是好是坏需要看个人的具体命造，但本命年犯太岁有共同的特点，就是容易胡思乱想，情绪起伏大，容易影响到决策，所以需要注意忙中抽空休养身心，适当放松、释放压力。本命年犯太岁，最适宜举办喜事，包括结婚生子、创业转职、乔迁新居等，可以化凶为吉。</p>
                <p>另外，本命年犯太岁需要注意的还有健康和安全，轻则磕磕碰碰，重则易有血光之灾，所以日常生活应多注意安全，尽量避免参加有风险的活动，同时还可以通过捐血、洗牙等来化解。</p>
                <!-- react-text: 867 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">龙 冲太岁</span>
                <p>在各种犯太岁的类型中，属冲太岁的影响变化最大，容易在这一年发生各种人生大事，例如换工作、置业、搬迁、结婚、离婚等，其中感情关系最受影响。很多人在冲太岁时刚好遇到感情方面的挑战，如果不积极应对，则可能会有不少挫折。</p>
                <p>例如单身者在冲太岁时有机会脱单，不过感情来得快也去得快，难有稳定发展，因此冲太岁之年建立的恋爱关系还是应谨慎，保持观望态度较好。有伴侣的朋友则需要注意，若没有计划结婚或者生儿育女，感情在冲太岁之年容易出现重大冲击，感情关系遭受巨大考验，多有波折，甚至严重者会分手、离婚。因此在冲太岁之年宜采取积极行动化解，比如订婚、结婚、添丁或者聚少离多都有利于关系保持稳定。</p>
                <!-- react-text: 872 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">羊 刑太岁+破太岁</span>
                <p>刑太岁，代表这一年遇上轻微麻烦和是非的几率较大，因此影响到人际关系。为了避免是非，影响到自己的生活和情绪，宜行事谨慎，做事低调。破太岁则有破坏之意，代表一些稳固的人际关系容易遭受破坏，甚至严重者会与人反目成仇。虽然其破坏力有限，仍然会影响到运势。同时刑、破太岁，日常生活多有人际方面的困扰，危害不至于太严重，但还是会让自己心烦，所以最好能够注意谨言慎行，避免祸从口出，给自己徒增烦恼。</p>
                <!-- react-text: 876 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">牛 刑太岁</span>
                <p>刑太岁，代表这一年遇上轻微麻烦和是非的几率较大，因此影响到人际关系。为了避免是非，影响到自己的生活和情绪，宜行事谨慎，做事低调。</p>
                <!-- react-text: 880 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">鸡 害太岁</span>
                <p>害太岁，“害”字意思为“陷害”，代表今年容易招惹小人，虽然对自己影响一般，不必过于担心，不过为了心情舒畅地过完一年，还是少说话、多做事吧。</p>
                <!-- react-text: 884 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">化太岁大法</span>
                <p>若自己所属的生肖属于犯太岁的生肖，不必太过慌张，我们的祖先已经总结出一套非常有用的化太岁方法，只要诚心执行，则能够平安度过犯太岁的年份。</p>
                <!-- react-text: 888 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">一、冲喜</span>
                <p>化解太岁最常用的方法之一，当属“冲喜”了，坊间亦常流行冲喜的说法。古人常说“太岁当头坐，无喜必有祸”，但“一喜挡三灾”，说明冲喜的传统自古就有。虽然犯太岁多数时候并不至于称得上“灾祸”，生活上多有波折摩擦而已，但“人逢喜事精神爽”，若能在犯太岁之年举办喜事，的确可以将这一年的坏影响降至最低。</p>
                <p>用于化解太岁的喜事以结婚、生儿育女、置业为最佳，但这些人生大事很难刚巧在这一年发生，但仍有其他喜事可以作为化解方法，比如结拜兄弟、参加寿宴婚宴等来冲喜，出席其他喜庆活动、多吃喜庆食物（如喜糖、喜饼等）也可以提升一些运势。另外还需要注意的是，犯太岁者应尽量避免探病、参加丧事。</p>
                <!-- react-text: 893 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">二、小心部署计划</span>
                <p>犯太岁代表变动增多，其中包括搬迁、转职、较大规模的投资（比如生意上的变动或扩张业务）等。变动的走向虽然未知好坏，但人定胜天，若能够做好详尽计划和周全准备，随机应变，心态平和，则能减少不必要的困扰。</p>
                <!-- react-text: 897 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">三、佩戴生肖饰品</span>
                <p>犯太岁的人传统上亦会佩戴相应的生肖饰品化解煞气，所有生肖都适宜佩戴玉器，另外春夏季节出生的朋友还可以选择金银材质的饰品，但秋冬出生的朋友就不推荐金银材质了，仍是佩戴玉器为最佳。</p>
                <!-- react-text: 901 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">2018狗年 犯太岁生肖饰品选择指南</span>
                <p>狗：宜贴身佩戴兔形之饰物</p>
                <p>龙：宜贴身佩戴鼠形及猴形之饰物</p>
                <p>羊：宜贴身佩戴马形之饰物</p>
                <p>牛：宜贴身佩戴鼠形之饰物</p>
                <p>鸡：宜贴身佩戴蛇形之饰物</p>
                <!-- react-text: 909 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">如何选择化太岁的生肖饰品</span>
                <p>每年的化太岁生肖饰品并不完全相同，一般化太岁都要根据每一个生肖的六合或三合生肖来计算，给每一生肖带来助力的生肖都不止一个，所以每年的化太岁生肖不太一样。</p>
                <p>十二生肖为事儿地支的代表，中国古代的年份代号均由十天干和十二地支两两组合而成，共有六十个组合。例如2016年的丙申年、2017年的丁酉年，其中“申”“酉”为地支，“丙”“丁”为天干。</p>
                <p>因为地支的力量在一般情况下比天干强，所以每一年的地支更受重视。不过十二地支的名称和意义较难理解，不便于流传，因此古人便为十二地支分别配上十二种动物，才出现了民间流传甚广的十二生肖。生肖饰品的宜忌搭配，其实就是十二地支的有利组合，也就是下面所说的“六合”与“三合”。</p>
                <div class="pic1">
                  <img src="statics/ffsm/cesuan/images/tian_gan_di_zhi.png" alt=""></div>
              </div>
              <div>
                <span class="ms-subTit">生肖的六合与三合</span>
                <p>简单说来，“六合”就是把十二生肖分成六组，每组两个生肖互为贵人，“三合”则把十二生肖分成四组，每组生肖欣赏和包容同组的另外两个生肖。与三合比起来，六合生肖之间互助的力量较大，所以一般采用六合的生肖来化煞。</p>
                <p>六合中每组只有两个生肖，不是你帮我就是我帮你，但每年都有几个生肖犯太岁，如果恰逢同一组中的两个生肖都犯太岁，双方都自身难保，更别说顾及对方了，这种情况下就要从三合生肖中寻找对自己有助力的生肖。同理，若同一组三合生肖中有犯太岁的，也无法给自己所属的生肖化煞。</p>
                <p>下表列出了十二生肖的六合与三合配对，基本上年年适用，不过今年为戊戌狗年，狗、龙、牛、羊、鸡在本年都犯太岁，所以以x标示，其余生肖可以首选六合，三合亦可以。</p>
                <!-- react-text: 922 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">2018年狗年化太岁生肖饰品一览表</span>
                <p>（X：今年不可选择，只作参考）</p>
                <div class="pic1">
                  <img src="statics/ffsm/cesuan/images/tai_sui_shi_wu.png" alt=""></div>
              </div>
              <div>
                <span class="ms-subTit">四、拜太岁</span>
                <p>拜太岁也是常见的化煞方法，方法可繁可简，下面列举出来的是必要步骤。一般拜太岁可以大致分为三种：</p>
                <!-- react-text: 931 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">1、前往大寺庙拜太岁</span>
                <p>很多寺庙都供奉了太岁，较出名的有上海的城隍庙，香港荃湾的圆玄学院等，想去寺院拜太岁的朋友可以在网络上查询自己所在城市有哪些寺庙提供参拜。和小寺庙祭拜的方法不太一样，大寺庙拜祭流程更加讲究，具体步骤如下（各地具体流程可能根据寺庙有所不同，仅供参考）：</p>
                <p>（1）先准备好太岁疏文（可以在庙外或网上购买），将自己的姓名、年龄、出生日期写上去。</p>
                <p>（2）首先给六十太岁的统领上香。</p>
                <p>（3）给当年太岁上香，2018戊戌狗年的太岁为“姜武”，心中默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                <p>（4）再查询自己出生年所属的太岁，给出生年的太岁上香。</p>
                <p>（5）逐一给其余太岁上香。</p>
                <p>（6）最后将太岁疏文焚化。注意焚化疏文要从文首开始，最后才焚化结尾部分。</p>
                <!-- react-text: 941 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">2、前往小寺庙拜太岁</span>
                <p>小寺庙通常会将六十位太岁放在一起，所以祭拜的方式相对比大寺庙简单许多，具体步骤如下（各地具体流程可能根据寺庙有所不同，仅供参考）：</p>
                <p>（1）先准备好太岁疏文（可以在庙外或网上购买），将自己的姓名、年龄、出生日期写上去。</p>
                <p>（2）给庙里的太岁上香，心中默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                <p>（3）最后将太岁疏文焚化。注意焚化疏文要从文首开始，最后才焚化结尾部分。</p>
                <!-- react-text: 948 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">3、家中自行祭拜</span>
                <p>若不想前往寺庙祭拜，在家中也可以拜太岁，步骤如下：</p>
                <p>（1）在红纸上写下当年太岁资料，比如今年应写上“戊戌年当年太岁之位”或“戊戌年姜武太岁位”。</p>
                <p>（2）将红纸放于家中大神（如观音、关帝）旁边。家中若没有设神位，则可以安置在位于西北太岁方的供桌上。</p>
                <p>（3）用香三支、烛两支、斋菜和六种水果供奉，诚心参拜，默念“戊戌太岁姜武大将军，望将军庇佑弟子今年逢凶化吉，好运常来，身体健康（可加上自己希望的其他愿望），年底定当诚心酬谢。”</p>
                <p>（4）将红纸、太岁疏文焚化。疏文从文首开始焚化，最后焚化结尾的部分。</p>
                <p>无论使用哪种方法，只要诚心，太岁就会保佑一年平安。适合拜太岁的日子可以参考黄历中的狗年吉日、吉时，准备供奉的物品只需香烛和水果，不需要肉等荤菜。</p>
                <p>拜太岁之后要记得在年底“还太岁”，酬谢神明一年来的保佑。还太岁最好选在每年的冬至之前，即公历的12月22日或23日，方法跟一般的还愿步骤一样，只需要准备简单的水果和香烛即可。</p>
                <!-- react-text: 958 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">五、趋吉避凶</span>
                <p>没有犯太岁的朋友若在运势预测中得知流年运势不佳，亦有方法可以趋吉避凶。</p>
                <!-- react-text: 962 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">（1）化血光之灾：捐血或放生</span>
                <p>如果流年运势有容易受伤的迹象，甚至是血光之灾，除了捐血来化解，还可以通过主动去做全身检查、洗牙补牙去“应劫”。也可以进行放生活动，用福德来减少运势的负面冲击，但注意放生应注意不要好心做坏事，最好选择市场上即将成为“刀下亡魂”的家禽或海鲜，注意不能随意放生外来物种破坏生态平衡，也要留意放生地点是否恰当。</p>
                <p>另外需要注意避免参加危险的活动，平时注意交通安全，开车的朋友小心不要开快车，生活上需比平日更加小心谨慎，不妨给自己买一份保险。</p>
                <!-- react-text: 967 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">（2）化白事：施棺或赠药</span>
                <p>如果流年家运不顺，甚至有白事（丧葬）之象，适宜通过“施棺”或赠送医药来稳定家运。“施棺”的意思是向家中有人过世的贫苦人家捐赠丧葬费或向死者家属提供生活上的帮助，这种善举是莫大功德，利人利己，也可以帮助化解家中的白事。</p>
                <p>此外，主动向生病的贫苦人家赠送医药也是积福的举动。不妨直接捐款给非盈利组织用于公益医疗，资助贫苦大众改善医疗条件，不但可以助人，还可以提高健康运势和家运。</p>
                <!-- react-text: 972 -->
                <!-- /react-text --></div>
              <div>
                <span class="ms-subTit">佩戴开运饰品：百解手绳或挂饰</span>
                <p>流年若不是犯太岁的生肖，但仍想要借助开运饰品来提升整体运势的朋友，可以选择百解手绳或者挂饰。</p>
                <p>“百解”是中国灵兽之一，玄学上用于镇宅化煞，招福纳财。百解吉祥物人人适用，与其他开运饰品不会相冲，长期佩戴可以消灾解困，保佑出入平安。</p>
                <p>但凡流年开运或者化太岁的饰物，都是用于化煞挡灾，只适合在当年使用，不宜年年佩戴同一吉祥物。在丢弃前应先将红纸或红包袋包好，为过去一年得到的保佑表达谢意。新年的开运吉祥物也应妥善保存，出现损坏的情况应及早更换。</p>
                <!-- react-text: 978 -->
                <!-- /react-text --></div>
            </div>
          </div>
          <div class="go-top-btn" id="go-top-btn" style="display: none; width: 384px;">
            <img src="statics/ffsm/cesuan/images/go_top.png" alt="回到顶部"></div>
          <div style="height: 3rem;"></div>
        </div>
      </section>
    </section>
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