<{include file="admin/header.tpl"}>
<script lang='javascript'>
function show_data(nid)
{
    tb_show('浏览/编辑记录', '?ct=users&ac=login_log&even=edit&tb=users_login_history&autoid='+ nid +'&TB_iframe=true&height=450&width=700', true);
}
function do_delete()
{
    document.form1.even.value = 'delete';
    var msg = "你确定要删除选中的记录？！";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定要删除&gt;&gt;</a>";
    tb_showmsg(msg);
}
function delete_old()
{
    document.form1.even.value = 'delete';
    var msg = "你确定要清空三个月前记录？<br /><font color='#666'>(系统会备份一份记录到文本)</font>";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='?ct=users&ac=del_old_login_log;'>确定操作&gt;&gt;</a>";
    tb_showmsg(msg);
}
</script>

<div id="contents">

<form name="formsearch" method="GET">
<input type='hidden' name='ct' value='users' />
<input type='hidden' name='ac' value='login_log' />
<input type='hidden' name='even' value='list' />
<input type='hidden' name='orderby' value='' />
<dl class="search-class">
    <dd>
    关键字：
    <input type='text' name='keyword' style='width:200px;' class='text' value="<{request_em key='keyword'}>" />
    <button type='submit'>搜索</button>
    </dd>
</dl>
</form>

<form name="form1" action="?ct=users&ac=login_log" method="POST">
<input type='hidden' name='tb' value='users_login_history' />
<input type="hidden" name="even" value="delete" />
<table class="table-sort table-operate">
  <tr>
    <th> <a href='javascript:select_all(null);'>选择</a> </th>
	<th> 用户id </th>
	<th> 用户名 </th>
	<th> 登录ip </th>
	<th> 登录时间 </th>
	<th> 应用池 </th>
	<th> 登录时状态 </th>
  </tr>
  <{lurd_list item='v'}>
  <tr>
   <td><a href="javascript:show_data('<{$v.autoid}>');"><img src='images/images/icons/ico-edit.png' alt='修改' title='修改' border='0' /></a><input type="checkbox" name="autoid[]" value="<{$v.autoid}>" /> <{$v.autoid}> </td>
  <td> <{$v.uid}> </td>
  <td> <{$v.accounts}> </td>
  <td> <{$v.loginip}> </td>
  <td> <{lurd do="format_date" var=$v.logintime format="" }> </td>
  <td> <{$v.pools}> </td>
  <td> <{if $v.loginsta==1}>成功<{else}><font color='red'>失败</font><{/if}> </td>
  </tr>
  <{/lurd_list}>
  <tr>
</table>
</form>
</div>

<div id="bottom">
    <div class="fl">
        <button type="button" onclick="delete_old()">清空三个月前记录</button>&nbsp;
        <button type="button" onclick="do_delete();">删除选中记录</button>
    </div>
    <div class="pages">
        <{$lurd_pagination}>
    </div>
</div>

</body>
</html>
 