<{include file='admin/header.tpl'}>
<script type='text/javascript'>
function do_delete()
{
    document.form1.even.value = 'delete';
    var msg = "你确定要删除选中的记录？！";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定要删除&gt;&gt;</a>";
    tb_showmsg(msg);
}
</script>
<div id="contents">
<form name="formsearch" action="?ct=<{$request.ct}>&ac=<{$request.ac}>&even=list" method="POST">
<input type='hidden' name='tb' value='admin_log' />
<input type='hidden' name='orderby' value='' />
<dl class="search-class">
  <dd>
    <span>关键字：</span>
    <input type='text' name='keyword' value="<{request_em key='keyword'}>" class="text" />
    <button type='submit'>搜索</button>
  </dd>
</dl>
</form><!-- //search -->

<form  name="form1" action="?ct=<{$request.ct}>&ac=<{$request.ac}>" method="POST">
<input type='hidden' name='tb' value='admin_log' />
<input type="hidden" name="even" value="delete" />
<table class="table-sort table-operate">
        <tr>
            <th> <a href="javascript:select_all(null);"><u>选择</u></a> </th>
            <th> 用户名 </th>
            <th> 日志内容 </th>
            <th> 操作时间 </th>
            <th> 系统警告 </th>
            <th> 状态 </th>
        </tr>
	</thead>

	<tbody>
    <{lurd_list item='v'}>
    <tr onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';">
        <td>
            &nbsp;<input type="checkbox" name="id[]" value="<{$v.id}>" chk="yes" /> <{$v.id}>
        </td>
        <td> <{$v.user_name}> </td>
        <td> <span style="<{if $v.isalert==1 && $v.isread==0}>color:red<{/if}>"><{$v.operate_msg}></span> </td>
        <td> <{lurd do='format_date' var=$v.operate_time}> </td>
        <td> <{if $v.isalert==1}><font color='red'>警告</font><{else}>普通<{/if}> </td>
        <td> <{if $v.isalert==1 && $v.isread==0}><font color='red'>未处理</font><{else}>已处理<{/if}> </td>
    </tr>
    <{/lurd_list}>

	</tbody>
</table>
</form>
</div>

<div id="bottom">
    <div class="fl">
        <button type="button" onclick="do_delete();">删除选中记录</button>
    </div>
    <div class="pages">
        <{$lurd_pagination}>
    </div>
</div>
</script>
</body>
</html>
