<{include file="admin/header.tpl"}> 
<form name="form1" action="<{$turnto}>_do&type=only" method="POST">
  <table class="tables_form">  
    <tr>
      <td align="right">应用名称 : </td>
      <td><input type='text' name='flag' class='txt150' readonly="true"  value='<{if !empty($v.flag)}><{$v.flag}><{/if}>'/></td>
    </tr>
    <tr>
      <td align="right">版本号 : </td>
      <td><input type='text' name='version' class='txt150' value='<{if !empty($v.version)}><{$v.version}><{/if}>' /></td>
    </tr>
    <tr>
      <td align="right">下载地址 : </td>
      <td><input type='text' name='url' class='l' value='<{if !empty($v.url)}><{$v.url}><{/if}>' /></td>
    </tr> 
    <tr>
      <td align="right">更新日志 : </td>
      <td><textarea name="logs"><{if !empty($v.logs)}><{$v.logs}><{/if}></textarea></td>
    </tr> 
    <tr>
        <td height='40'><input type='hidden' name='act' value='<{$act}>' />  </td>
        <td>
          <button type="submit">提交</button> 
          <button type="reset">重置</button>
        </td>
    </tr>
  </table>
</form> 
<{include file="admin/footer.tpl"}> 