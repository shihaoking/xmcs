<{include file="admin/header.tpl"}>
<div id="contents">  
  <form name="form1" action="<{$turnto}>_do&type=pl" method="POST">  
    <table class="table-sort table-operate tables">
      <tr> 
        <th width="10%"> 应用 </th>
        <th width="15%"> 版本号 </th>
        <th width="25%"> 下载地址 </th>
        <th width="40%"> 更新说明 </th>  
        <th width="10%"> 操作 </th>
      </tr> 
      <{foreach from=$list item=item key=key}>
      <tr>
        <td><{$item.flag}></td> 
        <td><{$item.version}></td> 
        <td><{$item.url}></td> 
        <td><{$item.logs}></td>
        <td><a href="javascript:showbox('<{$item.flag}>','<{$turnto}>',650,350,'修改编辑','edit');">修改</a></td>
      </tr>
     <{foreachelse}>
      <tr>
          <td colspan="5"><span class="empty">暂无数据</span></td>
      </tr>
      <{/foreach}>  
    </table>
    <input type="hidden" name="even" value="delete" />
  </form>
</div>
    <!--
<div id="bottom">
  <div class="fl">
    <button type="button" onclick="showbox('','?ct=version3&ac=update_add',650,350,'添加配置');">添加配置</button>  
  </div>
</div>  
    -->
 <{include file="admin/footer.tpl"}> 