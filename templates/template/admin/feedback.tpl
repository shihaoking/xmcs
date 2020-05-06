<{include file="admin/header.tpl"}> 
<div id="contents">
  <form name="form1" action="<{$turnto}>&type=pl" method="POST">
    <table class="table-sort table-operate tables">
      <tr>
        <th> 选</th>
        <th> 留言内容 </th>
        <th> 联系方式 </th>
        <th> 留言时间 </th>
      </tr>
      <{foreach from=$array_fb.data item=item key=key}>
      <tr>
        <td><input type='checkbox' name='id[]' value='<{$item.if_id}>' class='f'/></td>
        <td align="left"><{$item.if_content}> </td>
        <td><{$item.if_contact}> </td>
        <td><{$item.if_time|date_format:'%Y-%m-%d %H:%M:%S'}> </td>
      </tr>
      <{foreachelse}>
      <tr>
          <td colspan="4"><span class="empty">暂无数据</span></td>
      </tr>
      <{/foreach}>
    </table> 
    <input type="hidden" name="even" value="delete" />
  </form>
</div>
<div id="bottom">
  <div class="fl">
        <input type="button" value="全选" onclick="selectAll('all','.f');" class="button" />
        <input type="button" value="反选" onclick="selectAll('reverse','.f');" class="button" />
        <input type="button" value="不选" onclick="selectAll('none','.f');" class="button" />
        <button type="button" onclick="do_delete.operate('delete','.f');">批量删除</button>
  </div>
  <div class="pages"> <{$array_fb.pagination}> </div>
</div>  
<{include file="admin/footer.tpl"}> 