<{include file="admin/header.tpl"}>
<div id="contents">  
  <p class="searchdiv"> 关键字搜索：
      <input type="text" class="text m" id="search_value" name="search_value" value="<{if !empty($request.search_value)}><{$request.search_value}><{/if}>" />
      <input type="button" value="搜索" onclick="search('<{$turnto}>');" />
  </p>
  
  <form name="form1" action="<{$turnto}>_do&type=pl" method="POST">  
    <table class="table-sort table-operate tables">
      <tr>
        <th width="5%"> 选</th>
        <th width="10%"> 页面说明 </th>
        <th width="20%"> SEO标题 </th> 
        <th width="20%"> SEO关键字 </th>
        <th width="40%"> SEO描述 </th>   
        <th width="5%"> 操作 </th>
      </tr> 
      <{foreach from=$rs.data item=item key=key}>
      <tr>
        <td><input type='checkbox' name='id[]' value='<{$item.id}>' class='f'/></td> 
        <td><{$item.title}></td>
        <td align="left"><{$item.seotitle}></td>
        <td align="left"><{$item.seokey}></td>
        <td align="left"><{$item.seodesc}></td> 
        <td><a href="javascript:showbox(<{$item.id}>,'<{$turnto}>',650,370,'修改编辑','edit');">修改</a></td>
      </tr>
     <{foreachelse}>
      <tr>
          <td colspan="6"><span class="empty">暂无数据</span></td>
      </tr>
      <{/foreach}>  
    </table>
    <input type="hidden" name="even" value="delete" />
  </form>
</div>
<div id="bottom">
  <div class="fl">
    <button type="button" onclick="showbox('','?ct=list&ac=seo_add',650,370,'添加SEO');">添加SEO</button>
    <input type="button" value="全选" onclick="selectAll('all','.f');" class="button" />
    <input type="button" value="反选" onclick="selectAll('reverse','.f');" class="button" />
    <input type="button" value="不选" onclick="selectAll('none','.f');" class="button" /> 
    <button type="button" onclick="do_delete.operate('delete','.f');">批量删除</button>
  </div>
  <div class="pages"><{$rs.pagination}> </div>
</div>  
 <{include file="admin/footer.tpl"}> 