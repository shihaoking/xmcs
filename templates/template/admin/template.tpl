<{include file="admin/header.tpl"}>
<div id="contents">   
    <ul class="template">
        <{foreach from=$rs.data item=item key=key}>
        <li><a href="/static/upload/<{$item.preview}>" target="_blank" title="点击查看大图"><img src="/static/upload/200-150-<{$item.preview}>" /><{$item.name}></a></li>
        <{/foreach}> 
    </ul>
</div>
<div id="bottom">
  <div class="fl">
    <button type="button" onclick="showbox('','?ct=list&ac=template',500,250,'新增模板','add');">新增模板</button> 
  </div> 
</div>  
<{include file="admin/footer.tpl"}> 