<{include file="admin/header.tpl"}>
<div id="contents">
    
<dl class="search-class">
<{include file="admin/base/filter.tpl"}>
    注: <b>独立API标记</b>表示是否采用独立区域数据的API,若无则默认; <b>采集数据类型</b>表示加载自动采集的数据类型,默认则不加载采集数据,可以指定<b>采集数据分类ID</b>,默认为全部分类,以及指定<b>采集数据排序</b>方式
<a href='?ct=<{$ct}>&ac=<{$ac}>_edit' id='list_add'><input type="button" value="增加" id="add" /></a>
</dl>

<{include file="admin/base/list.tpl"}>

</body>
</html>
 