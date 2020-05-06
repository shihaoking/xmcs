<?php
if( !defined('CORE') ) exit('Request Error!');
/**
 * xingzuo.bazi5.com专题控制器
 *
 * @version 2015.12.23
 */

class ctl_zhuanti {

    public static $userinfo;
    public static $control;
    public $cache_enable = true;//缓存开关,调试时可设为false
    public $cachetime    = 7200;//缓存时间,秒(注意:内容页缓存是单独的在video_view中设置)
    public $cache_prefix = 'www.kaiy8.com';
    public $cache_key    = 'xingzuo/index';
    public $arr_topic = array( 1=>'白羊座', 2=>'金牛座', 3=>'双子座', 4=>'巨蟹座', 5=>'狮子座', 6=>'处女座', 7=>'天秤座', 8=>'天蝎座', 9=>'射手座', 10=>'摩羯座', 11=>'水瓶座', 12=>'双鱼座', 13=>'每月生日',14=>'生日书',15=>'生日花');
    public $pagenums = 10;


    public function __construct()
    {

        if (empty($this->items))
        {
            $this->items = new items();
        }
        tpl::assign('web_url',URL);
        $ct = req::item('ct', 'index');
        tpl::assign('ct', $ct);
		$pid = mod_topic::get_p_id();//获取一级栏目
		tpl::assign('pid',$pid);


        //获取广告
       // $this->getAd();
        $links = mod_index::get_link();
        tpl::assign('links', $links);

        if(isset($_SERVER['REQUEST_URI']) && false !== stripos($_SERVER['REQUEST_URI'],'clearcache')){
            $this->cache_enable = false;
        }

    }

    /**
     * 获取广告
     */
    private function getAd()
    {
        $ad = cache::get($this->cache_prefix,'public_ad');

        if(empty($ad)){
            //后台广告,根据页面获得
            $ad = $this->items->getAdCodeTypeArr(array('common'));
            cache::set($this->cache_prefix,'public_ad',$ad,$this->cachetime); //写缓存
            //cache::set_cache_list($this->cache_prefix,'public_ad');
        }

        tpl::assign('ad', $ad);
    }

    /**
     * xingzuo.bazi5.com专题页
     *
     */
    public function index()
    {

        $content      = array();
        $page = (int) req::item('page', 1);//当前页数
        $key = 'zhuanti_index_'.$page;

        if($this->cache_enable)
        {
            $content = cache::get($this->cache_prefix,$key);
        }

        if(!empty($content)){
            exit($content);
        }

        $pernum=$this->pagenums;//列表条数

        $pageurl = '/zt';//分页url

        $hand_type_arr = array('ztindex_top','public_xbtj','public_jctp');//手动数据


        $handtype_arr = $this->items->getHandTypeId($hand_type_arr);
        $mixdata = $this->getMixData($handtype_arr);
        tpl::assign('m', $mixdata);//<--END 手动数据

        $num=  $this->_count();

        $list = $this->_viewlist($page,$pernum,16);//

        //print_r($list);

        $page_info = util::pagination_lists(array(
            'total_rs'=>$num,
            'current_page'=>$page,
            'page_size'=>$pernum,
            'url_prefix'=>$pageurl
        ));

        $hunpei = mod_index::get_data('shengxiao_data','istop=5',1,12);//婚配表
        tpl::assign('hunpei', $hunpei);//

        //print_r($page_info);

        tpl::assign('pageStr', $page_info);

        tpl::assign('list',  $list);


        $opt_arr = array(
            't'=>'seo_xz_list_t',
            'k'=>'seo_xz_list_k',
            'd'=>'seo_xz_list_d',
        );

        $topicname = $this->arr_topic;

        $rep_arr = array(
            'list_type'=>'星座运势',
        );
        $seoinfo = $this->items->getSiteOpt($opt_arr,$rep_arr);

        tpl::assign('seo', $seoinfo);


        $tpl     = 'index/zhuanti_list.tpl';
        $content = tpl::fetch($tpl);


        cache::set($this->cache_prefix,$key,$content,$this->cachetime); //写缓存

        exit($content);
    }

    public function detail(){

        $content      = array();
        $url = req::item('url', "");//当前ID
        $key='zhuanti_detail_'.$url;
        if(!$url || empty($url)){
            exit("参数不正确。");
        }

        if($this->cache_enable )
        {
            $content = cache::get($this->cache_prefix,$key);
        }

        if(empty($content))
        {
            $ismanagetest = req::item('test','')=='admintest';

            $hand_type_arr = array('ztindex_top', 'ztdetail_hotarticle','ztdetail_similar');//手动数据

            $handtype_arr = $this->items->getHandTypeId($hand_type_arr);

            $mixdata = $this->getMixData($handtype_arr);
            tpl::assign('m', $mixdata);//<--END 手动数据


            $data = mod_index::get_zhuantiinfo($url);

            if(!$data){
                exit("找不到专题信息。");
            }

            if($ismanagetest || ($data['zt']['zt_open']==2 && date("Ymd")>=$data['zt']['zt_date'])) {
                //如果是管理后台测试的或者正常的状态（开启且在开放时间之内的）
                tpl::assign('data', $data['ztdetail']);

            }else {
                tpl::assign('data', false);
            }

            $seoinfo = array('t'=>$data['zt']['zt_seo_title'], 'd'=>$data['zt']['zt_seo_description'], 'k'=>$data['zt']['zt_seo_keywords']);

            tpl::assign('seo', $seoinfo);

            $tpl     = 'index/'.$data['templatetpl'];
            $content = tpl::fetch($tpl);

            cache::set($this->cache_prefix,$key,$content,$this->cachetime); //写缓存
            // cache::set_cache_list($this->cache_prefix,$this->cache_key);

        }

        exit($content);
    }

    /**
     *根据描述的第一个数字来绑定id
     *重新赋值数组-按照第一个数字来区分
     */
    public function getMixtopic($mix,$pid){
        if(!empty($pid))
        {
            $mix = $mix[$pid];
        }

        $num = count($mix);
        for($i=0;$i<$num;$i++){

            if(!empty($mix[$i]['abs_arr'][0]) && is_numeric($mix[$i]['abs_arr'][0])){
                $mix['abs'][$mix[$i]['abs_arr'][0]][] = $mix[$i];
            }

        }

        return $mix['abs'];
    }

    /***
     *提供手动id,原来数据，
     *返回组合数据
    @typeid＝＝'手动id'
     */

    public function type_and_data($typeid,$data,$num){
        $h1 = $this->items->getHandTypeId($typeid);
        $h2 = $this->getMixData($h1);
        $re = pub_mod_video::data_merge($h2[$typeid],$data,$num);
        return $re;
    }


    /**
     *获取详细里面的数组为建重组
     */
    public function getFirstArr($handtype){
        $handtype_arr = $this->items->getHandTypeId($handtype);
        $mixdata = $this->getMixData($handtype_arr);
        $n = $this->getMixtopic($mixdata,$handtype);
        return $n;
    }


    /**
     * 根据分类信息取得混合值
     * @param type $handtype_arr
     */
    public function getMixData($handtype_arr)
    {
        $mixdata = null;

        if (!empty($handtype_arr))
        {
            foreach ($handtype_arr as $code => $varr)
            {
                $shownum = empty($varr['shownum']) ? null : $varr['shownum'];
                $opt_arr = null;

                if (!empty($shownum))
                {
                    //$where = !empty($varr['cid']) ? $where = "LOCATE('{$varr['cid']}',tag)>0" : 1;
                    $ordby = empty($varr['ordby']) ? null : $varr['ordby'];//uptime DESC

                    $opt_arr = array(
                        //'where_site' => $where,
                        'orderby_site' => $ordby,
                        'limit_site' => $shownum,
                        //                'fields_site' => 'abs',
                    );
                }
                //print_r($opt_arr);
                //print_r($varr);
                //         ppr($opt_arr);die;
                //区块的混合取值,包括手动,独立api,auto数据,仅使用此方法即可
                $mixdata[$code] = $this->items->getMixData($varr['id'], $opt_arr, $shownum);

            }
        }
        return $mixdata;
    }


    /**
     * @param integer $classid  分类id
     * @return array
     */
    private function _viewlist($page=1,$pernum=30,$ord=null) {

        $intnow = intval(date("Ymd"));
        $sql='SELECT zt_id,zt_cover,zt_url,zt_remark,zt_seo_title,zt_seo_keywords,zt_date FROM zhuanti where zt_open = 2
           and zt_date<='.$intnow.' order by zt_date desc, zt_open desc, zt_id desc LIMIT '.(($page-1)*$pernum).','.$pernum;

//        if($ord=='1'){//最热
//            $sql.=' ORDER BY click DESC,uptime DESC LIMIT '.(($page-1)*$pernum).','.$pernum;
//        }elseif($ord=='2'){//最新
//            $sql.=' ORDER BY `id` asc  LIMIT '.(($page-1)*$pernum).','.$pernum;
//        }else{
//            $sql.=' ORDER BY `order` desc, uptime DESC  LIMIT '.(($page-1)*$pernum).','.$pernum;
//        }

        $list=db::get_all($sql);
        //格式化输入日期为YYYY年mm月dd日
        for($i=0;$i<count($list);$i++){
            $list[$i]['zt_date'] = date("Y年m月d日",strtotime($list[$i]['zt_date']));
            $list[$i]['zt_seo_keywords'] = implode("    ",explode(',',$list[$i]['zt_seo_keywords']));
            if(stripos($list[$i]['zt_url'],"http://")!==0)
                $list[$i]['zt_url'] = URL.'zt/'.$list[$i]['zt_url'].'.html';
        }

        return $list;
    }

    /**
     * @param integer $classid  分类id
     * @param string $type      类别
     * @param string $year      年份
     * @param string $other 其他筛选条件
     * @return integer
     */
    private function _count() {

        $where = 'WHERE `zt_open`=2 and zt_date<='.date("Ymd");

        $num=db::get_one('select count(1) as num FROM zhuanti '.$where);
        return isset($num['num'])?$num['num']:0;
    }
}