<{include file="admin/header.tpl"}> 
<form name="form1" action="<{$turnto}>_do&type=only" method="POST">
  <table class="tables_form">
    <{if !empty($v.id)}>
    <input type='hidden' name='id' value='<{$v.id}>' />  
    <{/if}>   
    <tr>
      <td align="right">页面名称 : </td>
      <td><input type='text' name='title' class='txt150'  value='<{if !empty($v.title)}><{$v.title}><{/if}>'/></td>
    </tr> 
    <tr>
      <td align="right">匹配URL : </td>
      <td><input type='text' name='url' class='l'  value='<{if !empty($v.url)}><{$v.url}><{/if}>'/></td>
    </tr>
    <tr>
      <td align="right">SEO标题 : </td>
      <td><input type='text' name='seotitle' class='l'  value='<{if !empty($v.seotitle)}><{$v.seotitle}><{/if}>'/></td>
    </tr>
    <tr>
      <td align="right">SEO关键字 : </td>
      <td><textarea name="seokey" class="tare"><{if !empty($v.seokey)}><{$v.seokey}><{/if}></textarea></td>
    </tr>
    <tr>
      <td align="right">SEO描述 : </td>
      <td><textarea name="seodesc" class="tare"><{if !empty($v.seodesc)}><{$v.seodesc}><{/if}></textarea></td>
    </tr>
    <tr>
        <td height='40'></td>
        <td>
          <button type="submit">提交</button> 
          <button type="reset">重置</button>
        </td>
    </tr>
  </table>
</form>
 
<{include file="admin/footer.tpl"}> 