
<!DOCTYPE html >
<html lang="en-US" ng-app="myapp">
<head>
<meta name="csrf-param" content="_csrf">
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="telephone=no" name="format-detection" />
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<meta content="no-cache" http-equiv="pragma">
<link rel="stylesheet" type="text/css" href="statics/ffsm_2019/index/css/reset_1.css">
<link rel="stylesheet" type="text/css" href="statics/ffsm_2019/index/css/common_1.css">
<link rel="stylesheet" type="text/css" href="statics/ffsm_2019/index/css/font_1.css">
<script src="statics/ffsm_2019/index/js/modular_1.js"></script>
<script src="statics/ffsm_2019/index/js/rem_1.js"></script>
<script src="statics/ffsm_2019/index/js/vue.min_1.js"></script>
<script src="statics/ffsm_2019/index/js/jquery_1.js"></script>
<title>专业命理大师预测-鑫旺网测算</title>
<script type="text/javascript">
    // 解决使用alert会显示title为域名网址问题
    window.alert = function (name) {
        const iframe = document.createElement('IFRAME');
        iframe.style.display = 'none';
        iframe.setAttribute('src', 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        window.frames[0].window.alert(name);
        iframe.parentNode.removeChild(iframe);
    };
    /*解决第三方网页在微信浏览器中点击图片会自动放大 start */
    // 递归搜索当前元素所有父级，看是否包含有a标签且有href值
    const searchIsHavaTagA = function (currentEle) {
        // 如果一直往上层找，到body还没找到就说明没有了
        if (currentEle.nodeName === 'BODY') {
            return false;
        }
        let parent = currentEle.parentElement;
        if (parent.nodeName === 'A' && parent.getAttribute('href')) {
            return true;
        } else {
            return searchIsHavaTagA(parent);
        }
    }
    $(document).on('click', 'img', function (e) {
        try {
            // 父级里有a标签且href不为空的，不处理
            if (!searchIsHavaTagA(e.target)) {
                e.preventDefault();
            }
        } catch (error) {
            alert('阻止图片默认事件失败');
            console.log('阻止图片默认事件失败');
        }

    })
    /*解决第三方网页在微信浏览器中点击图片会自动放大 end */
</script>

</head>
<body class="navbar-fixed" class="v-cloak">
	<div id="container">
		<link rel="stylesheet" type="text/css" href="statics/ffsm_2019/index/css/reckon-index_1.css">
		<div id="vue_app" v-cloak>
			<link rel="stylesheet" type="text/css" href="statics/ffsm_2019/index/css/header_1.css">
			<div class="container">
				<header class="public_header" v-if="false">
					<h1 class="public_h_con">在线测算</h1>
				</header>

				<div class="banner">
					<img src="statics/ffsm_2019/index/picture/ny-topbanner_1.png" alt="图片" width="100%">
				</div>

				<ul class="item-list">
					<li v-for="(item,key) in list" :key="key" v-cloak><a
						:href="item.jump_url"> <img
							:src="' statics/ffsm_2019/index/images/' + item.theme_img "
							alt="八字精批" width="100%" class="theme-img">
							<div class="info flex flex-center flex-pack-justify">
								<div class="leftArea flex flex-center">
									<img
										:src="' statics/ffsm_2019/index/images/' + item.theme_icon"
										alt="八字精批" alt="" class="theme-icon">
									<div class="title-num">
										<h2>{{ item.theme }}</h2>
										<p>已有{{ item.pay_total }}人测算</p>
									</div>
								</div>
								<img
									:src="' statics/ffsm_2019/index/images/' + item.theme_btn"
									alt="立即测算" class="rightArea">
							</div>
					</a></li>
				</ul>

				<div class="bottom-banner">
					<img src="statics/ffsm_2019/index/picture/ny-bottombanner_1.png" alt="图片" width="100%">
				</div>
			</div>
		</div>
		<script>
    new Vue({
        el:"#vue_app",
        data() {
            return {
                list:[
                    {
                        jump_url: '/?ac=bzyy',
                        theme_img: 'theme-img06.png',
                        theme_icon: 'theme-icon06.png',
                        theme: '恋爱桃花运',
                        order_type: 9,
                        pay_total: '',
                        theme_btn: 'theme-btn06.png'
                    },
                    {
                        jump_url: '/?ac=bazijp',
                        theme_img: 'theme-img01.png',
                        theme_icon: 'theme-icon01.png',
                        theme: '八字精批',
                        order_type: 1,
                        pay_total: '',
                        theme_btn: 'theme-btn01.png'
                    },
                    {
                        jump_url: '/2019',
                        theme_img: 'theme-img05.png',
                        theme_icon: 'theme-icon05.png',
                        theme: '事业运势',
                        order_type: 3,
                        pay_total: '',
                        theme_btn: 'theme-btn05.png'
                    },
                    {
                        jump_url: '/?ac=bazi',
                        theme_img: 'theme-img02.png',
                        theme_icon: 'theme-icon02.png',
                        theme: '八字财运',
                        order_type: 6,
                        pay_total: '',
                        theme_btn: 'theme-btn02.png'
                    },                    
                    {
                        jump_url: '/?ac=aiqingyun',
                        theme_img: 'theme-img08.png',
                        theme_icon: 'theme-icon08.png',
                        theme: '婚缘走势',
                        order_type: 4,
                        pay_total: '',
                        theme_btn: 'theme-btn08.png'
                    },
                    {
                        jump_url: '/?ac=xmfx',
                        theme_img: 'theme-img09.png',
                        theme_icon: 'theme-icon09.png',
                        theme: '姓名测算',
                        order_type: 7,
                        pay_total: '',
                        theme_btn: 'theme-btn09.png'
                    },
                    {
                        jump_url: '/?ac=bazi',
                        theme_img: 'theme-img03.png',
                        theme_icon: 'theme-icon03.png',
                        theme: '流年运程',
                        order_type: 2,
                        pay_total: '',
                        theme_btn: 'theme-btn03.png'
                    },                    
                    {
                        jump_url: '/?ac=hehun',
                        theme_img: 'theme-img04.png',
                        theme_icon: 'theme-icon04.png',
                        theme: '八字合婚',
                        order_type: 11,
                        pay_total: '',
                        theme_btn: 'theme-btn04.png'
                    },
                    {
                        jump_url: '/?ac=ffqm',
                        theme_img: 'theme-img10.png',
                        theme_icon: 'theme-icon10.png',
                        theme: '宝宝起名',
                        order_type: 10,
                        pay_total: '',
                        theme_btn: 'theme-btn10.png'
                    },
                    
                    {
                        jump_url: '/?ac=ziwei',
                        theme_img: 'theme-img07.png',
                        theme_icon: 'theme-icon07.png',
                        theme: '一生运势',
                        order_type: 5,
                        pay_total: '',
                        theme_btn: 'theme-btn07.png'
                    },
                    
                  /*  {
                        jump_url: '/?ac=ziwei',
                        theme_img: 'theme-img11.png',
                        theme_icon: 'theme-icon11.png',
                        theme: '星座测算',
                        order_type: 8,
                        pay_total: '',
                        theme_btn: 'theme-btn11.png'
                    },*/
                ],
            }
        },
        mounted() {},
        methods: {},
        created() {
            var reckon_list = JSON.parse('[{\"order_type\":\"1\",\"user_data\":{\"pay_total\":379523,\"help_rate\":\"96.22\",\"comment_list\":[]}},{\"order_type\":\"2\",\"user_data\":{\"pay_total\":338450,\"help_rate\":\"95.23\",\"comment_list\":[]}},{\"order_type\":\"3\",\"user_data\":{\"pay_total\":364400,\"help_rate\":\"91.24\",\"comment_list\":[]}},{\"order_type\":\"4\",\"user_data\":{\"pay_total\":336314,\"help_rate\":\"94.25\",\"comment_list\":[]}},{\"order_type\":\"5\",\"user_data\":{\"pay_total\":303141,\"help_rate\":\"93.26\",\"comment_list\":[]}},{\"order_type\":\"6\",\"user_data\":{\"pay_total\":303831,\"help_rate\":\"96.27\",\"comment_list\":[]}},{\"order_type\":\"7\",\"user_data\":{\"pay_total\":267340,\"help_rate\":\"95.28\",\"comment_list\":[]}},{\"order_type\":\"8\",\"user_data\":{\"pay_total\":297624,\"help_rate\":\"91.29\",\"comment_list\":[]}},{\"order_type\":\"9\",\"user_data\":{\"pay_total\":273646,\"help_rate\":\"94.30\",\"comment_list\":[]}},{\"order_type\":\"10\",\"user_data\":{\"pay_total\":336352,\"help_rate\":\"93.11\",\"comment_list\":[]}},{\"order_type\":\"11\",\"user_data\":{\"pay_total\":349516,\"help_rate\":\"96.12\",\"comment_list\":[]}}]');
            for(var i=0; i<this.list.length; i++) {
                for(var k=0; k<reckon_list.length; k++) {
                    if(this.list[i].order_type == reckon_list[k].order_type) {
                        this.list[i].pay_total = reckon_list[k].user_data.pay_total
                    }
                }
            }
        },
    })
</script>

	</div>
</body>
</html>
