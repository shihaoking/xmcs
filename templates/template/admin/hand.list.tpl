<{include file='admin/header.tpl'}>
<div id="contents">
    
<dl class="search-class">
<{include file="admin/base/filter.tpl"}>
<a href='?ct=<{$ct}>&ac=<{$ac}>_edit&select_value=<{$select_value}>' id='list_add'><input type="button" value="增加" id="add" /></a> 注:若有多位置内容,在<b>描述</b>处用&nbsp;|||&nbsp;隔开;

</dl>

<{include file="admin/base/list.tpl"}>

</body>
</html>
 