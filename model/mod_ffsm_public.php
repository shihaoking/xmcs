<?php
if (!defined('CORE')) {
	exit('Request Error!');
}

class mod_ffsm_public {

    /**
     * 60甲子转换五行生肖
     */
    public function jiazi_to_wh_sx($jiazi){

        if($jiazi=='甲子'){//1
            $data['sx'] = '屋上之鼠';
            $data['wh'] = '海中金';
            $data['sx_py'] = 'shu';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='乙丑'){//2
            $data['sx'] = '海内之牛';
            $data['wh'] = '海中金';
            $data['sx_py'] = 'niu';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='丙寅'){//3
            $data['sx'] = '山木之虎';
            $data['wh'] = '炉中火';
            $data['sx_py'] = 'hu';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='丁卯'){//4
            $data['sx'] = '望月之兔';
            $data['wh'] = '炉中火';
            $data['sx_py'] = 'tu';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='戊辰'){//5
            $data['sx'] = '清温之龙';
            $data['wh'] = '大林木';
            $data['sx_py'] = 'long';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='己巳'){//6
            $data['sx'] = '福气之蛇';
            $data['wh'] = '大林木';
            $data['sx_py'] = 'she';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='庚午'){//7
            $data['sx'] = '堂裹之马';
            $data['wh'] = '路旁土';
            $data['sx_py'] = 'ma';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='辛未'){//8
            $data['sx'] = '得禄之羊';
            $data['wh'] = '路旁土';
            $data['sx_py'] = 'yang';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='壬申'){//9
            $data['sx'] = '清透之猴';
            $data['wh'] = '剑峰金';
            $data['sx_py'] = 'hou';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='癸酉'){//10
            $data['sx'] = '楼宿之鸡';
            $data['wh'] = '剑峰金';
            $data['sx_py'] = 'ji';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='甲戌'){//11
            $data['sx'] = '守身之狗';
            $data['wh'] = '山头火';
            $data['sx_py'] = 'gou';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='乙亥'){//12
            $data['sx'] = '过往之猪';
            $data['wh'] = '山头火';
            $data['sx_py'] = 'zhu';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='丙子'){//13
            $data['sx'] = '田内之鼠';
            $data['wh'] = '涧下水';
            $data['sx_py'] = 'shu';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='丁丑'){//14
            $data['sx'] = '湖内之牛';
            $data['wh'] = '涧下水';
            $data['sx_py'] = 'niu';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='戊寅'){//15
            $data['sx'] = '过山之虎';
            $data['wh'] = '城头土';
            $data['sx_py'] = 'hu';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='己卯'){//16
            $data['sx'] = '山林之兔';
            $data['wh'] = '城头土';
            $data['sx_py'] = 'tu';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='庚辰'){//17
            $data['sx'] = '恕性之龙';
            $data['wh'] = '白腊金';
            $data['sx_py'] = 'long';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='辛巳'){//18
            $data['sx'] = '冬藏之蛇';
            $data['wh'] = '白腊金';
            $data['sx_py'] = 'she';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='壬午'){//19
            $data['sx'] = '军中之马';
            $data['wh'] = '杨柳木';
            $data['sx_py'] = 'ma';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='癸未'){//20
            $data['sx'] = '群内之羊';
            $data['wh'] = '杨柳木';
            $data['sx_py'] = 'yang';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='甲申'){//21
            $data['sx'] = '过树之猴';
            $data['wh'] = '井泉水';
            $data['sx_py'] = 'hou';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='乙酉'){//22
            $data['sx'] = '唱午之鸡';
            $data['wh'] = '井泉水';
            $data['sx_py'] = 'ji';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='丙戌'){//23
            $data['sx'] = '自眠之狗';
            $data['wh'] = '屋上土';
            $data['sx_py'] = 'gou';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='丁亥'){//24
            $data['sx'] = '过山之猪';
            $data['wh'] = '屋上土';
            $data['sx_py'] = 'zhu';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='戊子'){//25
            $data['sx'] = '仓内之鼠';
            $data['wh'] = '霹雳火';
            $data['sx_py'] = 'shu';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='己丑'){//26
            $data['sx'] = '栏内之牛';
            $data['wh'] = '霹雳火';
            $data['sx_py'] = 'niu';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='庚寅'){//27
            $data['sx'] = '出山之虎';
            $data['wh'] = '松柏木';
            $data['sx_py'] = 'hu';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='辛卯'){//28
            $data['sx'] = '蟾窟之兔';
            $data['wh'] = '松柏木';
            $data['sx_py'] = 'tu';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='壬辰'){//29
            $data['sx'] = '行雨之龙';
            $data['wh'] = '长流水';
            $data['sx_py'] = 'long';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='癸巳'){//30
            $data['sx'] = '草中之蛇';
            $data['wh'] = '长流水';
            $data['sx_py'] = 'she';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='甲午'){//31
            $data['sx'] = '云中之马';
            $data['wh'] = '沙中金';
            $data['sx_py'] = 'ma';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='乙未'){//32
            $data['sx'] = '敬重之羊';
            $data['wh'] = '沙中金';
            $data['sx_py'] = 'yang';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='丙申'){//33
            $data['sx'] = '山上之猴';
            $data['wh'] = '山下火';
            $data['sx_py'] = 'hou';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='丁酉'){//34
            $data['sx'] = '独立之鸡';
            $data['wh'] = '山下火';
            $data['sx_py'] = 'ji';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='戊戌'){//35
            $data['sx'] = '进山之狗';
            $data['wh'] = '平地木';
            $data['sx_py'] = 'gou';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='己亥'){//36
            $data['sx'] = '道院之猪';
            $data['wh'] = '平地木';
            $data['sx_py'] = 'zhu';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='庚子'){//37
            $data['sx'] = '梁上之鼠';
            $data['wh'] = '壁上土';
            $data['sx_py'] = 'shu';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='辛丑'){//38
            $data['sx'] = '路途之牛';
            $data['wh'] = '壁上土';
            $data['sx_py'] = 'niu';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='壬寅'){//39
            $data['sx'] = '过林之虎';
            $data['wh'] = '金箔金';
            $data['sx_py'] = 'hu';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='癸卯'){//40
            $data['sx'] = '山林之兔';
            $data['wh'] = '金箔金';
            $data['sx_py'] = 'tu';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='甲辰'){//41
            $data['sx'] = '伏潭之龙';
            $data['wh'] = '覆灯火';
            $data['sx_py'] = 'long';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='乙巳'){//42
            $data['sx'] = '出穴之蛇';
            $data['wh'] = '覆灯火';
            $data['sx_py'] = 'she';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='丙午'){//43
            $data['sx'] = '行路之马';
            $data['wh'] = '天河水';
            $data['sx_py'] = 'ma';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='丁未'){//44
            $data['sx'] = '失群之羊';
            $data['wh'] = '天河水';
            $data['sx_py'] = 'yang';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='戊申'){//45
            $data['sx'] = '独立之猴';
            $data['wh'] = '大驿土';
            $data['sx_py'] = 'hou';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='己酉'){//46
            $data['sx'] = '报晓之鸡';
            $data['wh'] = '大驿土';
            $data['sx_py'] = 'ji';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='庚戌'){//47
            $data['sx'] = '寺观之狗';
            $data['wh'] = '钗钏金';
            $data['sx_py'] = 'gou';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='辛亥'){//48
            $data['sx'] = '圈里之猪';
            $data['wh'] = '钗钏金';
            $data['sx_py'] = 'zhu';
            $data['wh_py'] = 'jin';
        }elseif($jiazi=='壬子'){//49
            $data['sx'] = '山上之鼠';
            $data['wh'] = '桑柘木';
            $data['sx_py'] = 'shu';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='癸丑'){//50
            $data['sx'] = '栏内之牛';
            $data['wh'] = '桑柘木';
            $data['sx_py'] = 'niu';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='甲寅'){//51
            $data['sx'] = '立定之虎';
            $data['wh'] = '大溪水';
            $data['sx_py'] = 'hu';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='乙卯'){//52
            $data['sx'] = '得道之兔';
            $data['wh'] = '大溪水';
            $data['sx_py'] = 'tu';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='丙辰'){//53
            $data['sx'] = '天上之龙';
            $data['wh'] = '沙中土';
            $data['sx_py'] = 'long';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='丁巳'){//54
            $data['sx'] = '塘内之蛇';
            $data['wh'] = '沙中土';
            $data['sx_py'] = 'she';
            $data['wh_py'] = 'tu';
        }elseif($jiazi=='戊午'){//55
            $data['sx'] = '廊内之马';
            $data['wh'] = '天上火';
            $data['sx_py'] = 'ma';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='己未'){//56
            $data['sx'] = '草野之羊';
            $data['wh'] = '天上火';
            $data['sx_py'] = 'yang';
            $data['wh_py'] = 'huo';
        }elseif($jiazi=='庚申'){//57
            $data['sx'] = '食果之猴';
            $data['wh'] = '石榴木';
            $data['sx_py'] = 'hou';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='辛酉'){//58
            $data['sx'] = '笼内之鸡';
            $data['wh'] = '石榴木';
            $data['sx_py'] = 'ji';
            $data['wh_py'] = 'mu';
        }elseif($jiazi=='壬戌'){//59
            $data['sx'] = '顾家之狗';
            $data['wh'] = '大海水';
            $data['sx_py'] = 'gou';
            $data['wh_py'] = 'shui';
        }elseif($jiazi=='癸亥'){//60
            $data['sx'] = '林下之猪';
            $data['wh'] = '大海水';
            $data['sx_py'] = 'zhu';
            $data['wh_py'] = 'shui';
        }

        return $data;

    }


}