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
    function done_purview( gurl )
    {
        parent.location.href = gurl;
        parent.ref_parent = false;
        parent.tb_remove();
    }
</script>
<script src="/acs/images/js/ueditor/ueditor.cache.js"></script>
<div style="width:550px;margin:auto;padding:auto">
<form name="form1" action="?ct=users&ac=index&even=saveedit&tb=users" method="POST" onsubmit="return checkpass()" enctype="multipart/form-data">
<{lurd_list item='v'}>
<input type="hidden" name="uid" value="<{$v.uid}>" />
<table class="form">
<tr>
  <th>用户账号：</th>
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
  <th>用户上级ID：</th>
  <td>
    <input type='text' name='sd_uid' id='sd_uid' class="text" value='<{$v.sd_uid}>'  />
    <span>(必须数字，填0为没有上级)</span>
  </td>
</tr>
  <tr>
  <th>提成比例：</th>
  <td>
    <input type='text' name='dl_tcbl' id='dl_tcbl' class="text" value='<{$v.dl_tcbl}>'  />
  </td>
</tr>
<tr>
  <th></th>
  <td>
    提成比例【提成金额=交易额X（提成比例÷100）】
  </td>
</tr>
<tr>
  <th>未提佣金：</th>
  <td>
    <input type='text' name='dl_syjf' id='dl_syjf' class="text" value='<{$v.dl_syjf}>'  />
    <span>(必须小于或等于全部佣金)</span>
  </td>
</tr>
<tr>
  <th>未提佣金：</th>
  <td>
    <input type='text' name='dl_syjf' id='dl_syjf' class="text" value='<{$v.dl_syjf}>'  />
    <span>(必须小于或等于全部佣金)</span>
  </td>
</tr>
<tr>
  <th>全部佣金：</th>
  <td>
    <input type='text' name='dl_zjf' id='dl_zjf' class="text" value='<{$v.dl_zjf}>'  />
    <span></span>
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
    <{foreach from=$cfg_groups.pools.admin.private key=kk item=vv}>
             <input type='checkbox' name='groups[]' value='admin_<{$kk}>' <{if preg_match("/admin_". $kk ."/", $v.groups) }> checked='checked'<{/if}> /> <{$vv.name}>
    <{/foreach}>
    <hr size='1' />
    <a href='javascript:done_purview("?ct=users&ac=user_purview&uid=<{$v.uid}>");'>[为此用户设置独立权限]</a>
  </td>
</tr>


  <td colspan='2' align='center' height='60'>
      <button type="submit">保存</button> &nbsp;&nbsp;&nbsp;
      <button type="reset">重设</button>
  </td>
</tr>
</table>
<{/lurd_list}>
</form>
</div>

</body>
</html>
