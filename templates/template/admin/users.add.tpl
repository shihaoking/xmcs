<{include file='admin/header.tpl'}>
<script language='javascript'>
    function checkpass()
    {
        if( document.form1.userpwd.value.length < 6 )
        {
            document.getElementById('pwdtest').innerHTML = "<font color='red'>[密码必须大于6位！]</font>";
            return false;
        }
        else
        {
            document.getElementById('pwdtest').innerHTML = "";
            return true;
        }
    }
</script>
<div style="width:450px;margin:auto;padding:auto">
<form name="form1" jstype="vali" action="?ct=users&ac=index&even=saveadd&tb=users" method="POST" onsubmit="return checkpass()" enctype="multipart/form-data">
<table class="form">
<tr>
  <th>用户名：</th>
  <td><input type='input' name='user_name' class="text" value='' /></td>
</tr>
<tr>
  <th>用户昵称：</th>
  <td><input type='input' name='nickname' class="text" value='' placeholder="请输入昵称（必须汉字）"/></td>
</tr>
<tr>
  <th>用户密码：</th>
  <td>
    <input type='input' name='userpwd' id='userpwd' class="text" value='' />
    <span id='pwdtest'>(必须大于6位)</span>
  </td>
</tr>
<tr>
  <th>用户email：</th>
  <td>
    <input type='input' name='email' class="text" value='' />
   </td>
</tr>
<!--<tr>
  <th>提成比例：</th>
  <td>
    <input type='input' name='dl_tcbl' class="text" value='' />
   </td>
</tr>
<tr>
  <th></th>
  <td>
    【提成金额=交易额X（提成比例÷100）】
  </td>
</tr>-->
<tr>
  <th>用户组：</th>
  <td>
    <{foreach from=$cfg_groups.pools.admin.private key=k item=v}>
        <input type='checkbox' name='groups[]' value='admin_<{$k}>' /> <{$v.name}>
    <{/foreach}>
  </td>
</tr>
<tr>
  <td colspan='2' align='center' height='60'>
      <button type="submit">保存</button> &nbsp;&nbsp;&nbsp;
      <button type="reset">重设</button>
  </td>
</tr>
</table>
</form>
</div>

</body>
</html>
