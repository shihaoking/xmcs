<{include file='admin/header.tpl'}>
<script language='javascript'>
   return true;
</script>
<div style="width:96%;margin:auto;padding:auto">
<form name="myform" jstype="vali" action="?ct=class&ac=add" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="model" value="video" />
<table width="100%" class="form">
<tr>
  <td>排序：</td>
  <td><input type='input' name='listorder' class="text s"  value='99' /> <span class="text-hint normal">越大越靠前</span></td>
</tr>
<tr>
  <td>分类名称:<font color="red">*</font></td>
  <td><input type='input' name='name' class="text error" errormsg='分类名称不能为空！' vali='notempty' value='' /> <span class="text-hint normal">分类名不能为空！</span></td>
</tr>
<tr>
  <td>目录地址:</td>
  <td><input type='input' name='extra' class="text " value='' /> <span class="text-hint normal">设置目录地址是用于设置伪静态，文章按照常规的设置，算命的设置要修改伪静态规则。</span></td>
</tr>
<tr>
  <td>上级分类：</td>
  <td>
  <select name='parentid'>
  <option value='0'>顶级分类</option>
  <{if !empty($data.classdata)}>
  <{$data.classdata}>
  <{/if}>
  </select>
  </td>
</tr>

<tr>
  <td>栏目模型：</td>
  <td>
  <select name='mid'>
  		<option value='1'>算命</option>
  		<option value='2'>文章</option>
        <option value='3'>单页面</option>
        <option value='4'>解梦</option>
        <option value='5'>星座运势</option>
        <option value='6'>生肖</option>
  </select>
  </td>
</tr>

<tr>
  <td>SEO标题:</td>
  <td><input type='text' name='title' class="text error l"  value='' /></td>
</tr>
<tr>
  <td>SEO关键字:</td>
  <td><input type='text' name='keywords' class="text error l"  value='' /></td>
</tr>
<tr>
  <td>SEO描述:</td>
  <td><textarea name='description' class="text"  /></textarea></td>
</tr>
<tr>
<tr>
  <td colspan='2' align='left' height='30' >
  <input type='hidden' name='dosubmit' value='true'  />
      <button type="submit" >提交</button> &nbsp;&nbsp;&nbsp;
      <button type="reset">重设</button>
  </td>
</tr>

</table>
</form>
</div>

</body>
</html>
