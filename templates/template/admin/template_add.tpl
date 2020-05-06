<{include file="admin/header.tpl"}> 
<form name="form1" action="<{$turnto}>_do" method="POST">
  <table class="tables_form">
    <{if !empty($v.id)}>
    <input type='hidden' name='id' value='<{$v.id}>' />  
    <{/if}>   
    <tr>
      <td width="20%" align="right">模板名称 : </td>
      <td width="80%"><input type='text' name='name' class='txt150'  value='<{if !empty($v.name)}><{$v.name}><{/if}>'/></td>
    </tr>  
    <tr>
      <td align="right">图片上传 : </td>
      <td>
          <span class="ico"><{if !empty($v.preview)}><img src="<{$v.preview}>" height="50px" width="50px" /><{/if}></span>
          <input type="hidden" id="width" value="200" />
          <input type="hidden" id="height" value="150" />
          <input type="button" onclick="doUpload(handPic)" value="点击上传"></td>
    </tr>
    <tr>
      <td align="right">图片地址 : </td>
      <td> 
          <input name='preview' id="ico" onblur="getImg(this);"  type="text" value="<{if !empty($v.preview)}><{$v.preview}><{/if}>" class="txt300" /> 
      </td>
    </tr>
    <tr>
      <td align="right">模板路径 : </td>
      <td><input type='text' name='path' class='txt150'  value='<{if !empty($v.path)}><{$v.path}><{/if}>'/></td>
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