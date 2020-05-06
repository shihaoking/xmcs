<{include file="admin/header.tpl"}>
<form name="form1" action="?ct=version3&ac=type_do&type=only" method="POST" >
  <table class="form ">
    <input type='hidden' name='id' value='<{if !empty($v.id)}><{$v.id}><{/if}>' />
    <input type='hidden' name='pid' value='<{$pid}>' />
    <input type='hidden' name='level' value='<{$level}>' />
    <tr>
      <td width="80" align="right">父分类 : </td>
      <td width="276"><{$fname}></td>
    </tr>
    <tr>
      <td align="right">名 称 : </td>
      <td><input type='text' name='name' autocomplete="off" value="<{if !empty($v.il_name)}><{$v.il_name}><{/if}>" class='txt150' /></td>
    </tr> 
    <tr>
      <td align="right">缩率图大小 : </td>
      <td><input name='width' id="width"   type="text" value="40" class="txt60" placeholder="长"/> px  -  <input name='height' id="height"   type="text" value="40" class="txt60" placeholder="宽"/> px</td>
    </tr>
    <tr>
      <td align="right">图片上传 : </td>
      <td>
          <span class="ico"><{if !empty($v.il_ico)}><img src="<{$v.il_ico}>" height="50px" width="50px" /><{/if}></span>
          <input type="button" onclick="doUpload(handPic)" value="点击上传">
      </td>
    </tr>
    <tr>
      <td align="right">图片地址 : </td>
      <td> 
          <input name='ico' id="bigico" onblur="getImg(this);"  type="text" value="<{if !empty($v.il_ico)}><{$v.il_ico}><{/if}>" class="l"/>
          <input name='smallico' id="smallico" type="hidden" value="<{if !empty($v.il_smallico)}><{$v.il_smallico}><{/if}>" />
      </td>
    </tr>
    <tr>
      <td align="right">链接地址 : </td>
      <td> <input name='url'  type="text" value="<{if !empty($v.il_url)}><{$v.il_url}><{/if}>" class="l"/></td>
    </tr>
    <tr>
      <td align="right">排 序 : </td>
      <td><input type='text' name='order' autocomplete="off" value="<{if !empty($v.il_order)}><{$v.il_order}><{/if}>" class='txt60' /></td>
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
<{include file="admin/footer.tpl" }> 