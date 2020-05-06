<{include file="admin/header.tpl"}>
<div id="contents">
    
<dl class="search-class">

<a href='?ct=<{$ct}>&ac=<{$ac}>_add' id='list_add'><input type="button" value="增加" id="add" /></a> 
注:若有多位置内容,在<b>描述</b>处用&nbsp;|||&nbsp;隔开;
其中 SEO部分的TKD,
替换码[]内： 
列表页分类名[ {{list_type}} ],
列表页厂商名[  {{list_developer}} ],
列表页运营商名[  {{list_isp}} ],
列表页游戏语言[  {{list_language}} ],
列表页游戏年份[  {{list_year}} ],
列表页标签[  {{list_tag}} ],
详情页游戏名[  {{detail_name}} ],
详情页游戏简介[  {{detail_info}} ]
搜索列表页搜索关键字[  {{search_keyword}} ]

</dl>

<{include file="admin/base/list.tpl"}>

</body>
</html>