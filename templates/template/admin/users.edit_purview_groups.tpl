<{include file="admin/header.tpl"}>
<style>
   li { line-height:28px; border-bottom:1px dashed #ccc; }
</style>
<script language='javascript'>
function group_add()
{
    var msg = "<form style='margin-top:10px;'>组中文名称：<input type='text' class='text' name='groupname_cn' /><br />";
    msg += "组英文标识：<input type='text' class='text' name='groupname' /><br />";
    msg += "<input type='hidden' name='ct' value='users' />\n<input type='hidden' name='ac' value='addgroups' />\n";
    msg += "<button type='submit' style='margin-top:10px;'>确定增加</button></form>";
    tb_showmsg(msg);
}
</script>

<form name="form1" action="?ct=users&ac=edit_purview_groups&even=saveedit" method="POST" enctype="multipart/form-data">
<div id="contents">
<dl class="search-class" style="border-bottom:1px solid #eee">
    <h3 style="line-height:24px;"> &nbsp;组权限管理 -- <{$group_name}></h3>
</dl>

<div style="padding:15px;">
<{if request('even')==''}>
<ul>
	<li>
	    <span class="label">管理员组：</span>
	    <span style='color:#666'>
	        <a href='?ct=users&ac=index&gp=admin_admin'>成员列表</a> &nbsp; | &nbsp; 
	        开放所有权限
	    </span>
	</li>
	<{foreach from=$access_groups.pools.admin.private key=k item=v}>
	<{if $k != 'admin' }>
	<li>
	    <span class="label"><{$v.name}>：</span>
	    <span>
	        <a href='?ct=users&ac=index&gp=<{$k}>'>成员列表</a> &nbsp; | &nbsp; 
	        <a href='?ct=users&ac=edit_purview_groups&even=edit&group=admin_<{$k}>&pools=admin'>修改组权限</a>
	    </span>
	</li>
	<{/if}>
	<{/foreach}>
</ul>
<{else}>
<{foreach from=$config_apps key=k item=v}>
<div style='padding-left:10px;'>
    <div class='title' style='line-height:28px;border-bottom:1px dashed #ccc;font-weight:bold;'>
        <input type='checkbox' name='groups[]' value='<{$k}>-*'<{if $groups.allow=='*' || in_array('*', $groups.allow.$k) }> checked='checked'<{/if}>/>
        <{$v.app_name}>
    </div>
    <div style='line-height:28px;width:90%;padding-top:10px;'>
       <{foreach from=$v key=kk item=vv name=foo}>
       <{if $kk != 'app_name'  }>
       <{if $smarty.foreach.foo.index > 1 and $smarty.foreach.foo.index-1 mod 4 eq 0}><br /><{/if}>
       <span style="display:-moz-inline-box; display:inline-block; width:200px;"><input type='checkbox' name='groups[]' value='<{$k}>-<{$kk}>'<{if in_array($kk, $groups.allow.$k) }> checked='checked'<{/if}><{if in_array('*', $groups.allow.$k)}>disabled="disabled"<{/if}>/> <{$vv}>
       </span>
       <{/if}>
       <{/foreach}>
    </div>
</div>
<br />
<{/foreach}>
<div class="submit">
    <input type='hidden' name='group' value='<{$request.group}>' />
</div>
<{/if}>
</div>
</div>

<div id="bottom">
    <div class="fl">
        <{if request('even')=='edit'}><button  type="submit">确定保存</button>&nbsp;<{/if}>
        <button type="button" onclick="group_add();">增加用户组</button>
    </div>
</div>
</form>

</body>
</html>
