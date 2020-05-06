<{include file='admin/header.tpl'}>

<div style="width:96%;margin:auto;padding:auto">
<form name="myform" jstype="vali" action="?ct=class&ac=edit" method="POST"  enctype="multipart/form-data">
<input type="hidden" name="model" value="video" />
<table width="100%" class="form">
<tr>
  <td>分类ID：</td>
  <td><{$data.id}></td>
</tr>
<tr>
  <td>排序:</td>
  <td><input type='input' name='listorder' class="text s"  value='<{$data.listorder}>' /> <span class="text-hint normal">越大越靠前</span></td>
</tr>
<tr>
  <td>分类名称：<font color="red">*</font></td>
  <td><input type='input' name='name' class="text error" errormsg='分类名称不能为空！' vali='notempty' value='<{$data.name}>' /></td>
</tr>



<tr>
  <td>目录地址（url）:</td>
  <td><input type='input' name='extra' class="text " value='<{$data.extra}>' /> <span class="text-hint normal">设置目录地址是用于设置伪静态，文章按照常规的设置，算命的设置要修改伪静态规则。</span></td>
</tr>

<tr>
  <td>控制器（ct）:</td>
  <td><input type='input' name='f_ct' class="text " value='<{$data.f_ct}>' /> <span class="text-hint normal">控制器即是control的文件如（suanming即指向ctl_suanming）</span></td>
</tr>

<tr>
  <td>方法（ac）:</td>
  <td><input type='input' name='f_ac' class="text " value='<{$data.f_ac}>' /> <span class="text-hint normal">方法即是控制器里面的方法如（rglm即是rglm的方法）</span></td>
</tr>

<tr>
  <td>栏目模型：</td>
  <td>
  <select name='mid'>
  		<option value='1' <{if $data.mid=='1'}>selected="selected"<{/if}>>算命</option>
  		<option value='2' <{if $data.mid=='2'}>selected="selected"<{/if}>>文章</option>
        <option value='3' <{if $data.mid=='3'}>selected="selected"<{/if}>>单页面</option>
        <option value='4' <{if $data.mid=='4'}>selected="selected"<{/if}>>解梦</option>
        <option value='5' <{if $data.mid=='5'}>selected="selected"<{/if}>>星座运势</option>
        <option value='6' <{if $data.mid=='6'}>selected="selected"<{/if}>>生肖</option>
  </select>
  </td>
</tr>

<tr>
  <td>上级分类：</td>
  <td>
  <select name='parentid'>
  <option value='0'>顶级分类</option>
  <{if $data.classdata}>
	<{$data.classdata}>
  <{/if}>
  </select>
<input type='hidden' name='id' value='<{$data.id}>'>
  </td>
</tr>
<tr>
  <td>SEO标题：</td>
  <td><input type='text' name='title' class="text  l"  value='<{$data.title}>' /></td>
</tr>
<tr>
  <td>SEO关键字：</td>
  <td><input type='text' name='keywords' class="text  l"  value='<{$data.keywords}>' /></td>
</tr>
<tr>
  <td>SEO描述：</td>
  <td><textarea name='description' class="text"    /><{$data.description}></textarea></td>
</tr>

<tr>
  <td>是否隐藏：</td>
  <td><select name='status'>
  <option value='0'>正常显示</option>
  <option value='1' <{if $data.status==1}>selected="selected"<{/if}>>隐藏</option>
  </select></td>
</tr>

<tr>
  <td colspan='2' align='left' height='30' >
  <input type='hidden' name='dosubmit' value='true'  />
      <button type="submit" >保存</button> &nbsp;&nbsp;&nbsp;
      <button type="reset">重设</button>
  </td>
</tr>
</table>
</form>
</div>

</body>
</html>
