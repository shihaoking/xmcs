<{include file='admin/header.tpl'}>
<script language='javascript'>
   return true;
</script>
  <style>
input.s {
    width: 350px;
}
</style>
<div style="width:96%;margin:auto;padding:auto">
<form name="myform" jstype="vali" action="?ct=system&ac=<{$ac_url}>" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="even" value="saveedit" />
<table width="100%" class="form">
<{foreach from=$sys_all key=k item=v}>
  <{if $v.name=="pay_type"}>
<tr>
  <td width="200">显示支付方式：</td>
  <td>
  <select name="sys[<{$v.name}>][0]" id="equestion" >
                <option value="0"  <{if $v.config==0}>selected<{/if}> >全部显示</option>
                <option value="1" <{if $v.config==1}>selected<{/if}> >显示微信支付</option>
                <option value="2" <{if $v.config==2}>selected<{/if}> >显示支付宝支付</option>
                <option value="3" <{if $v.config==3}>selected<{/if}> >显示微信和支付宝</option>
                <option value="4" <{if $v.config==4}>selected<{/if}> >只显示3方支付</option>
    			<option value="5" <{if $v.config==5}>selected<{/if}> >只显示paypal支付</option>
              </select>
    <input type='hidden' name='sys[<{$v.name}>][1]' class="text s"  value='<{$v.title}>' />
  </td>
</tr>
 <{/if}>
<{/foreach}>
<{foreach from=$sys_all key=k item=v}>
<{if $v.name!="pay_type"}>
<tr>
  <td width="200"><{$v.title}>：</td>
  <td><input type='input' name='sys[<{$v.name}>][0]' class="text s"  value='<{$v.config}>' /><input type='hidden' name='sys[<{$v.name}>][1]' class="text s"  value='<{$v.title}>' /><input type='hidden' name='sys[<{$v.name}>][2]' class="text s"  value='<{$v.class}>' /></td>
</tr>
<{/if}>
<{/foreach}>
<tr>
  <td colspan='2' align='left' height='30' >
  <input type='hidden' name='dosubmit' value='true'  />
      <button type="submit" >保存设置</button> &nbsp;&nbsp;&nbsp;
  </td>
</tr>

</table>
</form>
</div>

</body>
</html>
