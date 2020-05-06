<{include file="admin/header.tpl"}>
<script lang='javascript'>
function show_data(nid)
{
    tb_show('浏览/编辑记录', '~lurdurl~&even=edit&tb=~tablename~&~primarykey~='+ nid +'&TB_iframe=true&height=450&width=700', true);
}
function do_delete()
{
    document.form1.even.value = 'delete';
    var msg = "你确定要删除选中的记录？！";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定要删除&gt;&gt;</a>";
    tb_showmsg(msg);
}
</script>

<div id="contents">

<form name="formsearch" action="~lurdurl~&even=list" method="POST">
<input type='hidden' name='tb' value='~tablename~' />
<input type='hidden' name='orderby' value='' />
<dl class="search-class">
    <dd>
    关键字：
    <input type='text' name='keyword' style='width:200px;' class='text' value="<{request_em key='keyword'}>" />
    <button type='submit'>搜索</button>
    </dd>
</dl>
</form>

<form name="form1" action="~lurdurl~" method="POST">
<input type='hidden' name='tb' value='~tablename~' />
<input type="hidden" name="even" value="delete" />
<table class="table-sort table-operate">
  <tr>
    ~listtitle~
  </tr>
  <{lurd_list item='v'}>
  <tr>
    ~listitem~
  </tr>
  <{/lurd_list}>
  <tr>
</table>
</form>
</div>

<div id="bottom">
    <div class="fl">
        <button type="button" onclick="tb_show('增加记录', '~lurdurl~&even=add&tb=~tablename~&TB_iframe=true&height=550&width=800', true)">增加记录</button>
        <button type="button" onclick="do_delete();">删除选中记录</button>
    </div>
    <div class="pages">
        <{$lurd_pagination}>
    </div>
</div>

</body>
</html>
 