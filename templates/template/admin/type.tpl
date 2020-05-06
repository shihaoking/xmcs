<{include file="admin/header.tpl"}> 
<div id="contents">
    <form name="form1" action="?ct=ios&ac=level_do&type=pl" method="POST">
        <ul class="mul01"><{$html}></ul> 
        <input type="hidden" name="even" value="delete" />
        <input type='hidden' name='tb' value='sorting' /> 
    </form>
</div>
<div id="bottom">
    <div class="fl"> 
          <button type="button" onclick="showbox('','?ct=version3&ac=type_add',630,400,'添加分类');">添加根类别</button> 
    </div>
</div> 
<{include file="admin/footer.tpl" jsfun=$jsfun }> 